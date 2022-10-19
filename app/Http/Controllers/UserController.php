<?php

namespace App\Http\Controllers;

use App\Models\AffliateProfit;
use App\Models\Bank;
use App\Models\Blog;
use App\Models\BlogUser;
use App\Models\Coupon;
use App\Models\IndirectReferral;
use App\Models\MlmPlan;
use App\Models\Plan;
use App\Models\Referral;
use App\Models\Setting;
use App\Models\User;
use App\Models\Withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $title = 'Account Dashboard';
        $user = User::where('id', auth()->user()->id)->first();
        $profit = AffliateProfit::with('plan')->whereUser_id($user->id)->where('status', 2)->orderBy('id', 'DESC')->limit(5)->get();
        // $referrals = ;
        $referrals = $user->get_latest_referrals();
        $shared_posts = BlogUser::where('user_id', auth()->user()->id)->count();
        $sponsor_bal = $shared_posts * Plan::first()->fb_share_amount;
        $total_withdraws_amount = Withdraw::whereUser_id($user->id)->where('status', '1')->sum('amount');
        // return $referrals;
        return view('user.index', compact(
            'user',
            'title',
            'profit',
            'referrals',
            'sponsor_bal',
            'total_withdraws_amount',
        ));
    }

    public function logout()
    {
        Auth::guard()->logout();
        session()->flash('message', 'Just Logged Out!');
        return redirect()->route('user.login');
    }

    public function withdraw()
    {
        $user = User::with('bank')->whereId(auth()->user()->id)->first();
        $data['title'] = 'Withdraw VIDEO EARNINGS to Bank Account';
        $data['withdraw'] = Withdraw::whereUser_id($user->id)->orderBy('id', 'DESC')->whereType(1)->get();
        $bank_name = $user->bank !== null ? $user->bank->name : 'N/A';
        $data['account'] = [
            'account_no' => $user->bank_account_no,
            'account' => $user->bank_account_name . ' - ' . $user->bank_account_no . ' - ' . $bank_name
        ];
        return view('user.withdraw', $data);
    }

    public function withdraw_submit(Request $request)
    {
        // return $request;
        // return date('Y-m-d');
        $today = Carbon::now();
        $transaction_date = Carbon::create($today->year, $today->month, 28);
        // return json_encode($today < $transaction_date);
        if($today < $transaction_date) {
            return back()->with('alert', 'You can cashout your Video Earning Points every 28th of the Month.');
        }
        $validator = Validator::make($request->all(), [
            'amount' => 'required',
            'details' => 'required',
            'pin' => 'required',
        ]);
        if ($validator->fails()) {
            // adding an extra field 'error'...
            $user = User::with('bank')->whereId(auth()->user()->id)->first();
            $data['title'] = 'Withdraw Affliate Balance';
            $data['withdraw'] = Withdraw::whereUser_id($user->id)->orderBy('id', 'DESC')->get();
            $bank_name = $user->bank !== null ? $user->bank->name : 'N/A';
            $data['account'] = [
                'account_no' => $user->bank_account_no,
                'account' => $user->bank_account_name . ' - ' . $user->bank_account_no . ' - ' . $bank_name
            ];
            $data['errors'] = $validator->errors();
            return view('user.withdraw', $data);
        }
        if ($request->pin === '000000') {
            return back()->with('alert', 'You cannot use the default PIN 000000 to perform transactions, please go to the Account Security Page to have your PIN RESET.');
        }
        $set = $data['set'] = Setting::first();
        $user = $data['user'] = User::find(auth()->user()->id);
        if ($request->pin !== $user->pin) {
            return back()->with('alert', 'Pin is not same.');
        }
        $plan = Plan::first();
        // $amount = $request->amount - ($request->amount * $set->withdraw_charge / 100);
        $amount = $request->amount;
        if ($plan->min_deposit > $request->amount) {
            return back()->with('alert', 'You have requested less than your plan defined payment.');
        }
        // $last_wd = Withdraw::whereUser_id($user->id)->latest()->first();
        // if ($last_wd) {
        //     $end = Carbon::parse($last_wd->created_at);
        //     $now = Carbon::now();
        //     $length = $end->diffInDays($now);
        //     if ($length < $plan->min_ref_earn_wd_cycle) {
        //         return back()->with('alert', 'You have already requested this payment.');
        //     }
        // }
        if ($user->balance > $amount || $user->balance == $amount) {
            $sav['user_id'] = Auth::user()->id;
            $sav['amount'] = $amount;
            $sav['status'] = '0';
            $sav['type'] = 1;
            $sav['account_no'] = $request->details;
            Withdraw::create($sav);
            $user->balance = $user->balance - $amount;
            $user->save();
            // if ($set->email_notify == 1) {
            //     $temp = Etemplate::first();
            //     Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, 'We are currently reviewing your withdrawal request of ₦' . $request->amount . '. Thanks for working with us.', 'Withdraw Request currently being Processed'));
            // }
            return back()->with('success', 'Withdrawal request has been submitted, you will be updated shortly.');
        } else {
            return back()->with('alert', 'Insufficent balance.');
        }
    }

    public function withdraw_ref()
    {
        $user = User::with('bank')->whereId(auth()->user()->id)->first();
        $data['title'] = 'Withdraw Referral Balance';
        $data['withdraw'] = Withdraw::whereUser_id($user->id)->orderBy('id', 'DESC')->whereType(3)->get();
        $bank_name = $user->bank !== null ? $user->bank->name : 'N/A';
        $data['account'] = [
            'account_no' => $user->bank_account_no,
            'account' => $user->bank_account_name . ' - ' . $user->bank_account_no . ' - ' . $bank_name
        ];
        return view('user.withdraw_ref', $data);
    }

    public function withdraw_ref_submit(Request $request)
    {
        // return $request;
        // return date('Y-m-d')
        $today = Carbon::now();
        $day_of_week = $today->format('l');
        if($day_of_week != 'Sunday' && $day_of_week != 'Wednesday') {
            return back()->with('alert', 'You can request for your Ref Earning Balance Payout every Sundays and Wednesdays to your BANK Account only.');
        }

        $validator = Validator::make($request->all(), [
            'amount' => 'required',
            'details' => 'required',
            'pin' => 'required',
        ]);
        if ($validator->fails()) {
            // adding an extra field 'error'...
            $user = User::with('bank')->whereId(auth()->user()->id)->first();
            $data['title'] = 'Withdraw Referral Balance';
            $data['withdraw'] = Withdraw::whereUser_id($user->id)->orderBy('id', 'DESC')->get();
            $bank_name = $user->bank !== null ? $user->bank->name : 'N/A';
            $data['account'] = [
                'account_no' => $user->bank_account_no,
                'account' => $user->bank_account_name . ' - ' . $user->bank_account_no . ' - ' . $bank_name
            ];
            $data['errors'] = $validator->errors();
            return view('user.withdraw_ref', $data);
        }
        if ($request->pin === '000000') {
            return back()->with('alert', 'You cannot use the default PIN 000000 to perform transactions, please go to the Account Security Page to have your PIN RESET.');
        }
        $set = $data['set'] = Setting::first();
        $user = $data['user'] = User::find(auth()->user()->id);
        if ($request->pin != $user->pin) {
            return back()->with('alert', 'Pin is not same.');
        }
        $plan = Plan::first();
        // $amount = $request->amount - ($request->amount * $set->withdraw_charge / 100);
        $amount = $request->amount;
        if ($plan->min_ref_wd > $request->amount) {
            return back()->with('alert', 'You have requested less than your plan defined payment.');
        }
        $amount = $request->amount;
        if ($user->affliate_ref_balance > $amount || $user->affliate_ref_balance == $amount) {
            $sav['user_id'] = Auth::user()->id;
            $sav['amount'] = $amount;
            $sav['status'] = '0';
            $sav['type'] = 3;
            $sav['account_no'] = $request->details;
            Withdraw::create($sav);
            $user->affliate_ref_balance = $user->affliate_ref_balance - $amount;
            $user->save();
            // if ($set->email_notify == 1) {
            //     $temp = Etemplate::first();
            //     Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, 'We are currently reviewing your withdrawal request of ₦' . $request->amount . '. Thanks for working with us.', 'Withdraw Request currently being Processed'));
            // }
            return back()->with('success', 'Withdrawal request has been submitted, you will be updated shortly.');
        } else {
            return back()->with('alert', 'Insufficent balance.');
        }
    }

    public function withdraw_mlm()
    {
        $user = User::with('bank')->whereId(auth()->user()->id)->first();
        $data['title'] = 'Withdraw MLM Balance';
        $data['withdraw'] = Withdraw::whereUser_id($user->id)->orderBy('id', 'DESC')->get();
        $bank_name = $user->bank !== null ? $user->bank->name : 'N/A';
        $data['account'] = [
            'account_no' => $user->bank_account_no,
            'account' => $user->bank_account_name . ' - ' . $user->bank_account_no . ' - ' . $bank_name
        ];
        return view('user.withdraw_mlm', $data);
    }

    public function withdraw_mlm_submit(Request $request)
    {
        // return $request;
        // return date('Y-m-d')
        // $today = Carbon::now();
        // $transaction_date = Carbon::create($today->year, $today->month, 28);
        // // return json_encode($today < $transaction_date);
        // if($today < $transaction_date) {
        //     return back()->with('alert', 'You can cashout your Video Earning Points every 28th of the Month.');
        // }
        $last_wd = Withdraw::whereUser_id(auth()->user()->id)->whereType(2)->latest()->first();
        // return $last_wd;
        if ($last_wd) {
            $end = Carbon::parse($last_wd->created_at);
            $now = Carbon::now();
            $length = $end->diffInDays($now);
            // return $length;
            if ($length < 1) {
                return back()->with('alert', 'You have already requested this payment.');
            }
        }

        $validator = Validator::make($request->all(), [
            'amount' => 'required',
            'details' => 'required',
            'pin' => 'required',
        ]);
        if ($validator->fails()) {
            // adding an extra field 'error'...
            $user = User::with('bank')->whereId(auth()->user()->id)->first();
            $data['title'] = 'Withdraw MLM Balance';
            $data['withdraw'] = Withdraw::whereUser_id($user->id)->orderBy('id', 'DESC')->get();
            $bank_name = $user->bank !== null ? $user->bank->name : 'N/A';
            $data['account'] = [
                'account_no' => $user->bank_account_no,
                'account' => $user->bank_account_name . ' - ' . $user->bank_account_no . ' - ' . $bank_name
            ];
            $data['errors'] = $validator->errors();
            return view('user.withdraw_mlm', $data);
        }
        if ($request->pin === '000000') {
            return back()->with('alert', 'You cannot use the default PIN 0000 to perform transactions, please go to the Account Security Page to have your PIN RESET.');
        }
        $set = $data['set'] = Setting::first();
        $user = $data['user'] = User::find(auth()->user()->id);
        if ($user->is_locked == 0) {
            return back()->with('alert', 'You cannot withdrawal option. Your balance is locked.');
        }
        if ($request->pin !== $user->pin) {
            return back()->with('alert', 'Pin is not same.');
        }
        $plan = MlmPlan::first();
        // $amount = $request->amount - ($request->amount * $set->withdraw_charge / 100);
        $amount = $request->amount;
        if ($plan->min_withdraw_balance > $request->amount) {
            return back()->with('alert', 'You have requested less than your plan defined payment.');
        }
        if ($user->balance > $amount || $user->balance == $amount) {
            $sav['user_id'] = Auth::user()->id;
            $sav['amount'] = $amount;
            $sav['status'] = '0';
            $sav['type'] = 2;
            $sav['account_no'] = $request->details;
            Withdraw::create($sav);
            $user->balance = $user->balance - $amount;
            $user->save();
            // if ($set->email_notify == 1) {
            //     $temp = Etemplate::first();
            //     Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, 'We are currently reviewing your withdrawal request of ₦' . $request->amount . '. Thanks for working with us.', 'Withdraw Request currently being Processed'));
            // }
            return back()->with('success', 'Withdrawal request has been submitted, you will be updated shortly.');
        } else {
            return back()->with('alert', 'Insufficent balance.');
        }
    }

    public function profile_edit()
    {
        $data['title'] = "Profile";
        $data['banks'] = Bank::whereStatus(1)->get();
        // $data['data_operators'] = DataOperator::whereStatus(1)->get();
        return view('user.profile', $data);
    }
    public function profile_update_basic(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $res = $user->update($request->except('_token'));
        if ($res) {
            return back()->with('success', 'Profile Updated Successfully.');
        } else {
            return back()->with('error', 'Error Updating Profile.');
        }
    }

    public function update_bank_details(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        if ($request->pin === '000000') {
            return back()->with('alert', 'You cannot use the default PIN 000000 to perform transactions, please go to the Account Security Page to have your PIN RESET.');
        }
        if ($request->pin !== $user->pin) {
            return back()->with('alert', 'Pin is not same.');
        }
        $user->update([
            'bank_id' => $request->bank_id,
            'bank_account_no' => $request->account_no,
            'bank_account_name' => $request->account_name,
            'bank_account_type' => $request->account_type,
        ]);
        return back()->with('success', 'Bank Details Updated Successfully.');
    }

    public function changePin()
    {
        $data['title'] = "Change Pin";
        return view('user.pin', $data);
    }

    public function submitPin(Request $request)
    {
        // return $request;
        $this->validate($request, [
            'current_pin' => 'required',
            'pin' => 'required|max:6|confirmed'
        ]);
        try {
            $set = Setting::first();
            $user = User::findOrFail(auth()->user()->id);
            $c_pin = $user->pin;
            if ($request->current_pin == $c_pin) {
                $user->update(['pin' => $request->pin]);
                return redirect()->route('user.pin')->with('success', 'Pin Changed Successfully.');
                // if ($request->pin == $request->pin_confirmation) {
                //     if ($set->email_notify == 1) {
                //         $temp = Etemplate::first();
                //         Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, 'Please click on this link to confirm the pin change: <a href="' . route('confirm.changePin', $request->pin) . '">Click Here!</a>. Thanks for working with us.', 'Request for Pin Change', 1));
                //     }
                //     return back()->with('pin_success', 'A confirmation email has been sent to your EMAIL for your PIN Change confirmation. Please go to your EMAIL to your to confirm your PIN Change setup. Thank you!');
                // } else {
                //     return back()->with('alert', 'New Pin Does Not Match.');
                // }
            } else {
                return back()->with('alert', 'Current Pin Not Match.');
            }
        } catch (\PDOException $e) {
            return back()->with('alert', $e->getMessage());
        }
    }

    public function confirmChangePin($pin)
    {
        try {
            $c_id = Auth::user()->id;
            $user = User::findOrFail($c_id);
            $user->pin = $pin;
            $user->save();
            return redirect()->route('user.password')->with('success', 'Pin Changed Successfully.');
        } catch (\PDOException $e) {
            return redirect()->route('user.password')->with('alert', $e->getMessage());
        }
    }

    public function reactivate_plan(Request $request)
    {
        // return $request;
        $validator = Validator::make($request->all(), [
            'pin' => 'required|string|regex:/^\S*$/u',
        ]);
        if ($validator->fails()) {
            // adding an extra field 'error'...
            // $data['title'] = 'Register';
            $errors = $validator->errors();
            $html = '';
            foreach ($errors->all() as $error) {
                $html .= $error;
            }
            return redirect()->route('user.dashboard')->with('alert', $html);
        }

        $coupon_code = Coupon::where('serial', $request->pin)->first();
        // return $coupon_code;
        if (!$coupon_code) {
            return redirect()->route('user.dashboard')->with('alert', 'ACTIVATION PIN CODE INVALID');
        }
        if ($coupon_code->status == 0) {
            return redirect()->route('user.dashboard')->with('alert', 'ACTIVATION PIN CODE used');
        }
        if ($coupon_code->account_type_id == 1) {
            return redirect()->route('user.dashboard')->with('alert', 'ACTIVATION PIN CODE IS NOT MLM PLAN CODE');
        }
        $user = User::find(auth()->user()->id);

        $user->update([
            'cycle_direct_referrals' => 0,
            'cycle_indirect_referrals' => 0,
            'is_locked' => 0,
        ]);
        $coupon_code->update(['status' => 0]);
        return redirect()->route('user.dashboard')->with('success', 'PLAN IS RE-ACTIVATED');
    }

    public function changePassword()
    {
        $data['title'] = "Security";
        // $g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();
        // $set = Setting::first();
        // $user = User::find(Auth::user()->id);
        // if ($user->fa_status) {
        //     $secret = $user->googlefa_secret;
        // } else {
        //     $secret = $g->generateSecret();
        // }
        // return $secret;
        // $site = $set->site_name;
        // $data['secret'] = $secret;
        // $data['image'] = \Sonata\GoogleAuthenticator\GoogleQrUrl::generate($user->email, $secret, $site);
        return view('user.password', $data);
    }

    public function submitPassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|min:5|confirmed'
        ]);
        try {

            $c_password = Auth::user()->password;
            $c_id = Auth::user()->id;
            $user = User::findOrFail($c_id);
            // return json_encode(Hash::check($request->current_password, $c_password));
            if (Hash::check($request->current_password, $c_password)) {
                if ($request->password == $request->password_confirmation) {
                    $password = bcrypt($request->password);
                    $user->password = $password;
                    $user->save();
                    return back()->with('success', 'Password Changed Successfully.');
                } else {
                    return back()->with('alert', 'New Password Does Not Match.');
                }
            } else {
                return back()->with('alert', 'Current Password Not Match.');
            }
        } catch (\PDOException $e) {
            return back()->with('alert', $e->getMessage());
        }
    }
    public function latest_sponsored_post()
    {
        $data['title'] = 'VIDEO VIRAL SHARE';
        $post = Blog::where('post_date', Carbon::now()->format('Y-m-d'))->latest()->first();
        if($post) {
            $post->title_slug = Str::slug($post->title);
            $post->title_slug = Str::slug($post->title);
        }
        $data['post'] = $post;
        // return $data['post'];
        return view('user.latest_sponsored_post', $data);
    }
    public function digitalskillscourses()
    {
        $data['title'] = 'Digital Skills & Courses';
        $post = Blog::where('post_date', Carbon::now()->format('Y-m-d'))->latest()->first();
        if($post) {
            $post->title_slug = Str::slug($post->title);
            $post->title_slug = Str::slug($post->title);
        }
        $data['post'] = $post;
        // return $data['post'];
        return view('user.digitalskillscourses', $data);
    }


    public function creditReferralAmount(Request $request)
    {
        // return $request;
        $user = auth()->user();
        $record = BlogUser::where('user_id', $user->id)->where('blog_id', $request->post_id)->first();
        if ($record) {
            return json_encode(array('status' => '0'));
            return redirect()->route('user.viral_shares.history')->with('error', "You have already earned from today's VIRAL SHARE. You can now go back to your dashboard to continue to earn from other social activities which RubicNetwork offers.");
        }
        $trending_id = $request->post_id;
        $plan = Plan::first();
        $user = User::find($user->id);
        $user->update(
            [
                'balance' => $user->balance + $plan->fb_share_amount
            ]
        );
        BlogUser::create([
            'user_id' => $user->id,
            'blog_id' => $trending_id,
        ]);
        $data['is_shared'] = false;
        if (auth()->user()) {
            $user_shared_post = Blog::whereHas('users', function ($q) {
                $q->where('users.id', auth()->user()->id);
            })->where('id', $trending_id)->first();
            $data['is_shared'] = $user_shared_post !== null ? true : false;
        }
        $data['post'] = Blog::find($trending_id);
        $html = view('front.partial-single', $data)->render();
        return json_encode(array('status' => '1', 'html_text' => $html));
    }

    public function referrals()
    {
        $title = 'Referrals';
        $referrals = Referral::with('referral')->whereRefereeId(auth()->user()->id)->get();
        $indirect_referrals = IndirectReferral::with('referral')->whereRefereeId(auth()->user()->id)->get();
        return view('user.referral', compact('referrals', 'indirect_referrals', 'title'));
    }
    
    public function account_suspended()
    {
        Auth::guard()->logout();
        $title = 'Account Suspended';
        return view('errors.account_suspended', compact('title'));
    }
}
