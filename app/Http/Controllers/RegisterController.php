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
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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
            'coupon' => 'required|string|regex:/^\S*$/u',
        ]);
        // $validated = $validator->validated();
        if ($validator->fails()) {
            // adding an extra field 'error'...
            // $data['title'] = 'Register';
            $errors = $validator->errors();
            // return $errors;
            return redirect()->route('user.register')
                ->withErrors($errors)
                ->withInput();
        }

        $coupon_code = Coupon::where('serial', $request->coupon)->first();
        // return $coupon_code;
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
        if (Auth::user()) {
            return redirect()->intended('user/dashboard');
        } else {
            return view('user.auth.referral', $data);
        }
    }

    public function do_onboarding(Request $request)
    {
        // return $request;
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|min:5|unique:users|regex:/^\S*$/u',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|numeric|min:8|unique:users',
            'password' => 'required|string|min:4|confirmed',
            'coupon' => 'required|string|regex:/^\S*$/u',
            'ref' => 'required|string',
        ]);
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
        // return json_encode(!$referee_user->parent->isEmpty());
        if (!$referee_user) {
            return redirect()->route('user.onboarding', $request->ref)
                ->withErrors(['ref' => 'REFERRAL USERNAME INVALID'])
                ->withInput();
        }

        $coupon_code = Coupon::where('serial', $request->coupon)->first();
        // return $coupon_code;
        if (!$coupon_code) {
            return redirect()->route('user.onboarding', $request->ref)
                ->withErrors(['coupon' => 'ACTIVATION CODE INVALID'])
                ->withInput();
        }
        if ($coupon_code->status == 0) {
            return redirect()->route('user.onboarding', $request->ref)
                ->withErrors(['coupon' => 'ACTIVATION CODE used'])
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
            'affliate_ref_balance' => 0,
            'activated_at' => date('Y-m-d'),
            'password' => bcrypt($request->password),
        ]);

        // $ref_bonus = $coupon_code->plan->upgrade * $coupon_code->plan->ref_percent / 100;
        // $ref_earning = $referee_user->ref_earning + $ref_bonus;


        $mlm_plan = MlmPlan::first();
        $plan = Plan::first();

        if($referee_user->account_type_id == 1){
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
        if ($referee_user->account_type_id == 2) {
            if($referee_user->cycle_direct_referrals < $mlm_plan->direct_ref_count_cashout){
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
            if($parent->account_type_id == 1) {
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
            if ($parent->account_type_id == 2 && $parent->cycle_indirect_referrals < $mlm_plan->indirect_ref_count_cashout) {
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
                if($parent->cycle >= 1) {
                    $data['balance'] = $parent->balance + 10000;
                    // $data['ref_balance'] = $user->ref_balance + 10000;
                }
                $parent->update($data);
            }
        }
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
}
