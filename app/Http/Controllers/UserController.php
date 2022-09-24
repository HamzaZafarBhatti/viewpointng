<?php

namespace App\Http\Controllers;

use App\Models\AffliateProfit;
use App\Models\Bank;
use App\Models\MlmPlan;
use App\Models\Plan;
use App\Models\Setting;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $title = 'Dashboard';
        $user = auth()->user();
        $profit = AffliateProfit::with('plan')->whereUser_id($user->id)->where('status', 2)->orderBy('id', 'DESC')->limit(5)->get();
        // return $profit;
        return view('user.index', compact(
            'user',
            'title',
            'profit',
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
        $data['title'] = 'Withdraw Affliate Balance';
        $data['withdraw'] = Withdraw::whereUser_id($user->id)->orderBy('id', 'DESC')->get();
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
            return back()->with('alert', 'You cannot use the default PIN 0000 to perform transactions, please go to the Account Security Page to have your PIN RESET.');
        }
        $set = $data['set'] = Setting::first();
        $user = $data['user'] = User::find(auth()->user()->id);
        if ($request->pin !== $user->pin) {
            return back()->with('alert', 'Pin is not same.');
        }
        // $plan = Plan::first();
        // $amount = $request->amount - ($request->amount * $set->withdraw_charge / 100);
        $amount = $request->amount;
        // if ($plan->min_ref_earn_wd > $request->amount) {
        //     return back()->with('alert', 'You have requested less than your plan defined payment.');
        // }
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
        // return date('Y-m-d');
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
        if ($request->pin !== $user->pin) {
            return back()->with('alert', 'Pin is not same.');
        }
        // $plan = MlmPlan::first();
        // $amount = $request->amount - ($request->amount * $set->withdraw_charge / 100);
        $amount = $request->amount;
        // if ($plan->min_ref_earn_wd > $request->amount) {
        //     return back()->with('alert', 'You have requested less than your plan defined payment.');
        // }
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
}
