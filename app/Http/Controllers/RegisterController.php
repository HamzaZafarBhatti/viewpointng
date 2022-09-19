<?php

namespace App\Http\Controllers;

use App\Models\AccountType;
use App\Models\Coupon;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    //
    public function register()
    {
        $data['title'] = 'GoldMint Mining Account Registration';
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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|min:5|unique:users|regex:/^\S*$/u',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|numeric|min:8|unique:users',
            'password' => 'required|string|min:4|confirmed',
            'coupon' => 'required|string|regex:/^\S*$/u',
        ]);

        $coupon_code = Coupon::where('serial', $request->coupon)->first();
        // return $coupon_code;
        if (!$coupon_code) {
            return redirect()->route('user.register')
                ->withErrors(['coupon' => 'ACTIVATION PIN CODE INVALID'])
                ->withInput();
        }
        if ($coupon_code->status == 0) {
            return redirect()->route('user.register')
                ->withErrors(['coupon' => 'ACTIVATION PIN CODE used'])
                ->withInput();
        }

        if($request->account_type_id != $coupon_code->account_type_id) {
            return back()->with('error', 'Your coupon code does not match your plan!');
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
}
