<?php

namespace App\Http\Controllers;

use App\Models\AccountType;
use App\Models\Coupon;
use App\Models\IndirectReferral;
use App\Models\MlmPlan;
use App\Models\Plan;
use App\Models\Referral;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    //
    public function register()
    {
        $data['title'] = 'ViewPoint Account Registration';
        $data['account_types'] = AccountType::whereStatus(1)->get();
        if (Auth::user()) {
            return redirect()->intended('user/dashboard');
        } else {
            return view('user.auth.register', $data);
        }
    }

    public function do_register(Request $request)
    {
        // return $request;
        // $validated = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'username' => 'required|min:5|unique:users|regex:/^\S*$/u',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'phone' => 'required|numeric|min:8|unique:users',
        //     'password' => 'required|string|min:4|confirmed',
        //     'coupon' => 'required|string|regex:/^\S*$/u',
        // ]);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|min:5|unique:users|regex:/^\S*$/u',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|numeric|min:8|unique:users',
            'password' => 'required|string|min:4|confirmed',
            'coupon' => 'string|regex:/^\S*$/u',
        ]);
        // $validated = $validator->validated();
        if ($validator->fails()) {
            // adding an extra field 'error'...
            // $data['title'] = 'Register';
            $errors = $validator->errors();
            Log::info($errors);
            return redirect()->route('user.register')
                ->withErrors($errors)
                ->withInput();
        }

        $coupon_code = Coupon::where('serial', $request->coupon)->first();
        return $coupon_code;
        if (!$coupon_code) {
            return redirect()->route('user.register')
                ->withErrors(['coupon' => 'ACTIVATION CODE INVALID'])
                ->withInput();
        }
        if ($coupon_code->status == 0) {
            return redirect()->route('user.register')
                ->withErrors(['coupon' => 'ACTIVATION CODE used'])
                ->withInput();
        }

        if ($request->account_type_id != $coupon_code->account_type_id) {
            return back()->with('error', 'INCORECT PLAN SELECTED with ACTIVATION CODE');
        }

        $basic = Setting::first();
        if ($basic->email_verification == 1) {
            $email_verify = 0;
        } else {
            $email_verify = 1;
        }

        if ($basic->sms_verification == 1) {
            $phone_verify = 0;
        } else {
            $phone_verify = 1;
        }
        $verification_code = rand(100000, 999999);
        $sms_code = rand(100000, 999999);
        $email_time = Carbon::parse()->addMinutes(5);
        $phone_time = Carbon::parse()->addMinutes(5);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'username' => $request->username,
            'email_verify' => $email_verify,
            'verification_code' => $verification_code,
            'sms_code' => $sms_code,
            'email_time' => $email_time,
            'phone_verify' => $phone_verify,
            'phone_time' => $phone_time,
            'balance' => $request->account_type_id == 1 ? $basic->balance_reg_affiliate : $basic->balance_reg_mlm,
            'ip_address' => user_ip(),
            'status' => 1,
            'coupon_id' => $coupon_code->id,
            'account_type_id' => $request->account_type_id,
            'plan_id' => 10,
            'activated_at' => date('Y-m-d'),
            'password' => bcrypt($request->password),
        ]);
        $coupon_code->update(['status' => 0]);


        // if ($basic->email_verification == 1) {
        //     $text = "Your Email Verification Code Is: $user->verification_code";
        //     $temp = Etemplate::first();
        //     Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->name, $text, 'Email verification'));
        // }
        // if ($basic->sms_verification == 1) {
        //     $message = "Your phone verification code is: $user->sms_code";
        //     send_sms($user->phone, strip_tags($message));
        // }

        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
        ])) {
            login_log();
            return redirect()->route('user.dashboard');
        }
    }

    public function onboarding($username)
    {
        // return $data;
        $data['username'] = $username;
        $data['title'] = 'ViewPoint Account Registration';
        $data['account_types'] = AccountType::whereStatus(1)->get();
        // return json_encode($_SERVER['HTTP_HOST']);
        if (Auth::user()) {
            return redirect()->intended('user/dashboard');
        } else {
            return view('user.auth.referral', $data);
        }
    }

    public function do_onboarding(Request $request)
    {
        // return $request;

        $fields = [
            'name' => 'required|string|max:255',
            'username' => 'required|min:5|unique:users|regex:/^\S*$/u',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|numeric|min:8|unique:users',
            'password' => 'required|string|min:4|confirmed',
            'ref' => 'required|string',
        ];

        if ($request->payment_type == 'activation_code') {
            $fields['coupon'] = 'required|string|regex:/^\S*$/u';
        }

        // return $fields;

        $validator = Validator::make($request->all(), $fields);
        if ($validator->fails()) {
            // adding an extra field 'error'...
            // $data['title'] = 'Register';
            $errors = $validator->errors();
            // return $errors;
            $username = $request->ref;
            return redirect()->route('user.onboarding', $username)
                ->withErrors($errors)
                ->withInput();
        }


        $referee_user = User::with('parent')->whereUsername($request->ref)->first();
        // return $referee_user;
        // return json_encode(!$referee_user->parent->isEmpty());
        if (!$referee_user) {
            return redirect()->route('user.onboarding', $request->ref)
                ->withErrors(['ref' => 'REFERRAL USERNAME INVALID'])
                ->withInput();
        }



        $basic = Setting::first();

        if ($basic->email_verification == 1) {
            $email_verify = 0;
        } else {
            $email_verify = 1;
        }

        if ($basic->sms_verification == 1) {
            $phone_verify = 0;
        } else {
            $phone_verify = 1;
        }

        $verification_code = rand(100000, 999999);
        $sms_code = rand(100000, 999999);
        $email_time = Carbon::parse()->addMinutes(5);
        $phone_time = Carbon::parse()->addMinutes(5);

        if ($request->payment_type == 'paystack') {
            session_start();
            $_SESSION['data'] = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'username' => $request->username,
                'email_verify' => $email_verify,
                'verification_code' => $verification_code,
                'sms_code' => $sms_code,
                'email_time' => $email_time,
                'phone_verify' => $phone_verify,
                'phone_time' => $phone_time,
                'balance' => $request->account_type_id == 1 ? $basic->balance_reg_affiliate : $basic->balance_reg_mlm,
                'ip_address' => user_ip(),
                'status' => 1,
                'account_type_id' => $request->account_type_id,
                'plan_id' => 10,
                'affliate_ref_balance' => 0,
                'activated_at' => date('Y-m-d'),
                'password' => bcrypt($request->password),
                'registered_with_method' => 'paystack',
            ];
            $_SESSION['pass'] = $request->password;
            $_SESSION['referee_user'] = $referee_user;

            $response = $this->pay_with_paystack($request->email, $request->account_type_id);
            Log::info($response);
            $response = json_decode($response);
            if(!$response->status) {
                return redirect()->route('user.onboarding', $request->ref)
                ->with('error', 'Something went wrong! Please contact admin.');
            }
            $url = $response->data->authorization_url;
            return Redirect::to($url);
        }
        // $coupon_code = null;
        // return $coupon_code;
        // if ($request->coupon) {
        $coupon_code = Coupon::where('serial', $request->coupon)->first();
        // return $coupon_code;
        if (!$coupon_code) {
            return redirect()->route('user.onboarding', $request->ref)
                ->with('error', 'ACTIVATION CODE INVALID');
        }
        if ($coupon_code->status == 0) {
            return redirect()->route('user.onboarding', $request->ref)
                ->with('error', 'ACTIVATION CODE used');
        }
        // return $coupon_code;
        if($request->account_type_id != $coupon_code->account_type_id) {
            return redirect()->route('user.onboarding', $request->ref)
                ->with('error', 'USE ACTIVATION CODE OF SELECTED ACCOUNT TYPE');
        }
        // }

        if($request->account_type_id == 1) {
            $balance = $basic->balance_reg_affiliate;
        } else if($request->account_type_id == 2) {
            $balance = $basic->balance_reg_mlm;
        } else if($request->account_type_id == 3) {
            $balance = $basic->balance_reg_premium;
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'username' => $request->username,
            'email_verify' => $email_verify,
            'verification_code' => $verification_code,
            'sms_code' => $sms_code,
            'email_time' => $email_time,
            'phone_verify' => $phone_verify,
            'phone_time' => $phone_time,
            'balance' => $balance,
            'ip_address' => user_ip(),
            'status' => 1,
            'coupon_id' => $coupon_code->id,
            'account_type_id' => $request->account_type_id,
            'plan_id' => 10,
            'affliate_ref_balance' => 0,
            'activated_at' => date('Y-m-d'),
            'password' => bcrypt($request->password),
            'registered_with_method' => 'coupon',
        ];

        $this->add_user($data, $referee_user);

        $coupon_code->update(['status' => 0]);

        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
        ])) {
            login_log();
            return redirect()->route('user.dashboard');
        }
    }

    public function pay_with_paystack($email, $account_type_id)
    {
        $set = Setting::first();
        if ($account_type_id == 1) {
            $amount = $set->video_earn_plan_reg_fee;
        } else if($account_type_id == 2) {
            $amount = $set->mlm_plan_reg_fee;
        } else if($account_type_id == 3) {
            $amount = $set->video_premium_plan_reg_fee;
        }
        $cartid = Str::random(10);

        $url = "https://api.paystack.co/transaction/initialize";

        $fields = [
            'email' => $email,
            'amount' => $amount
        ];

        $fields_string = http_build_query($fields);

        
        $host = $_SERVER['HTTP_HOST'];
        Log::info($host);
        $paystack_key = env('PAYSTACK_TEST_SK');
        if ($host != 'localhost') {
            $paystack_key = env('PAYSTACK_LIVE_SK');
        }

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . $paystack_key,
            "Cache-Control: no-cache",
        ));

        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute post
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public function verify_payment(Request $request)
    {
        session_start();
        $referee_user = $_SESSION['referee_user'];
        unset($_SESSION['referee_user']);
        $data = $_SESSION['data'];
        unset($_SESSION['data']);
        $pass = $_SESSION['pass'];
        unset($_SESSION['pass']);
        // return $_SESSION;
        $trxref = $request->trxref;
        $reference = $request->reference;

        $response = $this->verify_paystack_payment($reference);
        $response = json_decode($response);
        // return $response;
        if ($response->data->status == 'success') {

            $this->add_user($data, $referee_user);

            if (Auth::attempt([
                'username' => $data['username'],
                'password' => $pass,
            ])) {
                login_log();
                return redirect()->route('user.dashboard');
            }
        } else {
            return 'Something Went wrong!';
        }
    }

    public function verify_paystack_payment($reference)
    {

        $host = $_SERVER['HTTP_HOST'];
        $paystack_key = env('PAYSTACK_TEST_SK');
        if ($host != 'localhost') {
            $paystack_key = env('PAYSTACK_LIVE_SK');
        }
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . $reference,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . $paystack_key,
                "Cache-Control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        if ($err) {
            return json_encode([
                'status' => false,
                'message' => "cURL Error #:" . $err
            ]);
        } else {
            return $response;
        }
    }

    public function add_user($input, $referee_user)
    {
        $user = User::create($input);

        // $ref_bonus = $coupon_code->plan->upgrade * $coupon_code->plan->ref_percent / 100;
        // $ref_earning = $referee_user->ref_earning + $ref_bonus;


        $aff_plans = Plan::whereStatus(1)->get();
        $aff_arr = [];
        foreach($aff_plans as $plan) {
            array_push($aff_arr, $plan->account_type_id);
        }

        $mlm_plans = MlmPlan::whereStatus(1)->get();
        $mlm_arr = [];
        foreach($mlm_plans as $plan) {
            array_push($mlm_arr, $plan->account_type_id);
        }

        if (in_array($referee_user->account_type_id, $aff_arr)) {
            $plan = Plan::where('account_type_id', $referee_user->account_type_id)->first();
            $ref_bonus = $plan->upgrade * $plan->ref_percent / 100;
            $ref_earning = $referee_user->affliate_ref_balance + $ref_bonus;
            Referral::create([
                'referral_id' => $user->id,
                'referee_id' => $referee_user->id,
                'referee_ref_earning' => $referee_user->affliate_ref_balance,
                'bonus' => $ref_bonus,
            ]);
            $referee_user->update([
                'affliate_ref_balance' => $ref_earning,
            ]);
        }
        if (in_array($referee_user->account_type_id, $mlm_arr)) {
            $mlm_plan = MlmPlan::where('account_type_id', $referee_user->account_type_id)->first();
            if ($referee_user->cycle_direct_referrals < $mlm_plan->direct_ref_count_cashout) {
                Referral::create([
                    'referral_id' => $user->id,
                    'referee_id' => $referee_user->id,
                    'referee_ref_earning' => 0,
                    'bonus' => 0,
                    // 'referee_ref_earning' => $referee_user->ref_earning,
                    // 'bonus' => $ref_bonus,
                ]);
                $cycle_direct_referrals = $referee_user->cycle_direct_referrals + 1;
                $referee_user->update([
                    // 'ref_earning' => $ref_earning,
                    'cycle_direct_referrals' => $cycle_direct_referrals
                ]);
            } else {
                $user->delete();
                return back()->with('error', 'This User`s DIRECT REFERRALS is Completed.');
            }
        }
        if (!$referee_user->parent->isEmpty()) {
            $parent = User::find($referee_user->parent[0]->id);
            // $indirect_ref_bonus = $coupon_code->plan->upgrade * $coupon_code->plan->indirect_ref_com / 100;
            // $indirect_ref_earning = $parent->indirect_ref_earning + $indirect_ref_bonus;
            if (in_array($parent->account_type_id, $aff_arr)) {
                $plan = Plan::where('account_type_id', $parent->account_type_id)->first();
                $indirect_ref_bonus = $plan->upgrade * $plan->indirect_ref_com / 100;
                $indirect_ref_earning = $parent->affliate_ref_balance + $indirect_ref_bonus;
                IndirectReferral::create([
                    'referral_id' => $user->id,
                    'referee_id' => $parent->id,
                    'referee_ref_earning' => $parent->affliate_ref_balance,
                    'bonus' => $indirect_ref_earning,
                ]);
                $parent->update(['affliate_ref_balance' => $indirect_ref_earning]);
            }
            $mlm_plan = MlmPlan::where('account_type_id', $parent->account_type_id)->first();
            if($mlm_plan) {
                if (in_array($parent->account_type_id, $mlm_arr) && $parent->cycle_indirect_referrals < $mlm_plan->indirect_ref_count_cashout) {
                    IndirectReferral::create([
                        'referral_id' => $user->id,
                        'referee_id' => $parent->id,
                        'referee_ref_earning' => 0,
                        'bonus' => 0,
                        // 'referee_ref_earning' => $parent->indirect_ref_earning,
                        // 'bonus' => $indirect_ref_earning,
                    ]);
                    $cycle_indirect_referrals = $parent->cycle_indirect_referrals + 1;
                    // $parent->update(['indirect_ref_earning' => $indirect_ref_earning]);
                    $parent->update(['cycle_indirect_referrals' => $cycle_indirect_referrals]);
                }
    
                if ($parent->cycle_direct_referrals >= $mlm_plan->direct_ref_count_cashout && $parent->cycle_indirect_referrals >= $mlm_plan->indirect_ref_count_cashout) {
                    $data = [
                        'cycle' => $parent->cycle + 1,
                        'is_locked' => 1,
                    ];
                    if ($parent->cycle >= 1) {
                        $data['balance'] = $parent->balance + 10000;
                        // $data['ref_balance'] = $user->ref_balance + 10000;
                    }
                    $parent->update($data);
                }
            }
        }
        return true;

        // if ($basic->email_verification == 1) {
        //     $text = "Your Email Verification Code Is: $user->verification_code";
        //     $temp = Etemplate::first();
        //     Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->name, $text, 'Email verification'));
        // }
        // if ($basic->sms_verification == 1) {
        //     $message = "Your phone verification code is: $user->sms_code";
        //     send_sms($user->phone, strip_tags($message));
        // }

    }
}
