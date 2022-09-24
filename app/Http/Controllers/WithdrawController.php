<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Setting;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    public function affliate_withdraw_log()
    {
        $data['title'] = 'Affliate Balance Withdraw logs';
        $data['withdraw'] = Withdraw::with('user')->whereType(1)->latest('id')->get();
        return view('admin.withdrawal_affliate.index', $data);
    }
    public function affliate_withdraw_approve(Request $request)
    {
        // return $request;
        $data = Withdraw::findOrFail($request->id);
        $user = User::find($data->user_id);
        $set = Setting::first();
        if($request->payment_value) {
            $payment_value = $request->payment_value;
        } else {
            $payment_value = $data->amount;
        }
        // return $payment_value;
        $remainder_amount = 0;
        if ($request->payment == 1) {
            if ($payment_value > $data->amount) {
                return back()->with('alert', 'The withdrawal amount is less than your input amount!');
            }
            $remainder_amount = $data->amount - $payment_value;
            // $user->balance += $remainder_amount;
            // $user->save();
            // $data->amount = $payment_value;
        }
        $user->update([
            'show_popup' => 1,
            'balance' => $user->balance + $remainder_amount
        ]);
        $res = $data->update([
            'status' => '1',
            'amount' => $payment_value
        ]);
        // $earner = TopEarner::where('user_id', $data->user_id)->where('type', 1)->first();
        // if (!$earner) {
        //     $earn_data = [
        //         'user_id' => $user->id,
        //         'name' => $user->name,
        //         'amount' => $data->amount,
        //         'status' => 1,
        //         'type' => 1
        //     ];
        //     // return 'if';
        //     $earner = TopEarner::create($earn_data);
        // } else {
        //     // return 'hello';
        //     $earner->amount += $data->amount;
        //     $earner->update(['amount' => $earner->amount]);
        // }
        // if ($set->email_notify == 1) {
        //     $temp = Etemplate::first();
        //     Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, 'Withdrawal request of ₦' . substr($data->amount, 0, 9) . ' has been approved<br>Thanks for working with us.', 'Withdraw Request has been approved', 1));
        // }
        if ($res) {
            Notification::create([
                'user_id' => $user->id,
                'title' => 'Affliate Balance WITHDRAWAL - SUCCESSFUL  - NGN' . $data->amount,
                'msg' => 'Your Withdrawal Request from your Affliate Balance has been APPROVED. Kindly POST your Payment Credit ALERT!',
                'is_read' => 0
            ]);
            return redirect()->route('admin.affliate.withdraw_log')->with('success', 'Request was Successfully approved!');
        } else {
            return redirect()->route('admin.affliate.withdraw_log')->with('alert', 'Problem With Approving Request');
        }
    }

    public function affliate_withdraw_approved()
    {
        $data['title'] = 'Approved Affliate Balance Withdraw';
        $data['withdraw'] = Withdraw::with('user')->whereType(1)->whereStatus('1')->latest('id')->get();
        // $data['withdraw'] = Withdraw::whereStatus(1)->orderBy('id', 'DESC')->get();
        return view('admin.withdrawal_affliate.approved', $data);
    }

    public function affliate_withdraw_approve_multi(Request $request)
    {
        // return $request;

        $set = Setting::first();
        foreach ($request->ids as $id) {
            $data = Withdraw::findOrFail($id);
            $user = User::find($data->user_id);
            $user->update(['show_popup' => 1]);
            $res = $data->update(['status' => '1']);
            // $earner = TopEarner::where('user_id', $data->user_id)->where('type', 1)->first();
            // if (!$earner) {
            //     $earn_data = [
            //         'user_id' => $user->id,
            //         'name' => $user->name,
            //         'amount' => $data->amount,
            //         'status' => 1,
            //         'type' => 1
            //     ];
            //     // return 'if';
            //     $earner = TopEarner::create($earn_data);
            // } else {
            //     // return 'hello';
            //     $earner->amount += $data->amount;
            //     $earner->update(['amount' => $earner->amount]);
            // }
            // return 'out';
            // if ($set->email_notify == 1) {
            //     $temp = Etemplate::first();
            //     Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, 'Withdrawal request of ₦' . substr($data->amount, 0, 9) . ' has been approved<br>Thanks for working with us.', 'Withdraw Request has been approved'));
            // }
            Notification::create([
                'user_id' => $user->id,
                'title' => 'Affliate Balance WITHDRAWAL - SUCCESSFUL  - NGN' . $data->amount,
                'msg' => 'Your Withdrawal Request from your Affliate Balance has been APPROVED. Kindly POST your Payment Credit ALERT!',
                'is_read' => 0
            ]);
        }
        return true;
    }

    public function affliate_withdraw_unpaid()
    {
        $data['title'] = 'Unpaid Affliate Balance Withdraw';
        $data['withdraw'] = Withdraw::with('user')->whereStatus('0')->whereType(1)->latest('id')->get();
        return view('admin.withdrawal_affliate.unpaid', $data);
    }

    public function affliate_withdraw_delete($id)
    {
        $data = Withdraw::findOrFail($id);
        // return json_encode($data->status == '0');
        if ($data->status == '0') {
            return back()->with('alert', 'You cannot delete an unpaid withdraw request');
        } else {
            $res =  $data->delete();
            if ($res) {
                return back()->with('success', 'Request was Successfully deleted!');
            } else {
                return back()->with('alert', 'Problem With Deleting Request');
            }
        }
    }

    public function affliate_withdraw_decline($id)
    {
        $data = Withdraw::findOrFail($id);
        $user = User::find($data->user_id);
        $set = Setting::first();
        $res = $data->update(['status' => '2']);
        $user->update(['balance' => $user->balance + $data->amount]);
        // if ($set->email_notify == 1) {
        //     $temp = Etemplate::first();
        //     Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, 'Withdrawal request of ₦' . substr($data->amount, 0, 9) . ' has been declined<br>Thanks for working with us.', 'Withdraw Request has been declined'));
        // }
        if ($res) {
            Notification::create([
                'user_id' => $user->id,
                'title' => 'Affliate Balance WITHDRAWAL - DECLINED - NGN' . $data->amount,
                'msg' => 'Your Withdrawal Request from your Affliate Balance has been DECLINED - Please update your Bank account and try again or contact Rubic Network Support.',
                'is_read' => 0
            ]);
            return back()->with('success', 'Request was Successfully declined!');
        } else {
            return back()->with('alert', 'Problem With Declining Request');
        }
    }

    public function affliate_withdraw_declined()
    {
        $data['title'] = 'Declined Withdraw';
        $data['withdraw'] = Withdraw::with('user')->whereType(1)->whereStatus('2')->latest('id')->get();
        return view('admin.withdrawal_affliate.declined', $data);
    }

    public function mlm_withdraw_log()
    {
        $data['title'] = 'MLM Balance Withdraw logs';
        $data['withdraw'] = Withdraw::with('user')->whereType(2)->latest('id')->get();
        return view('admin.withdrawal_mlm.index', $data);
    }
    public function mlm_withdraw_approve(Request $request)
    {
        // return $request;
        $data = Withdraw::findOrFail($request->id);
        $user = User::find($data->user_id);
        $set = Setting::first();
        if($request->payment_value) {
            $payment_value = $request->payment_value;
        } else {
            $payment_value = $data->amount;
        }
        // return $payment_value;
        $remainder_amount = 0;
        if ($request->payment == 1) {
            if ($payment_value > $data->amount) {
                return back()->with('alert', 'The withdrawal amount is less than your input amount!');
            }
            $remainder_amount = $data->amount - $payment_value;
            // $user->balance += $remainder_amount;
            // $user->save();
            // $data->amount = $payment_value;
        }
        $user->update([
            'show_popup' => 1,
            'balance' => $user->balance + $remainder_amount
        ]);
        $res = $data->update([
            'status' => '1',
            'amount' => $payment_value
        ]);
        // $earner = TopEarner::where('user_id', $data->user_id)->where('type', 1)->first();
        // if (!$earner) {
        //     $earn_data = [
        //         'user_id' => $user->id,
        //         'name' => $user->name,
        //         'amount' => $data->amount,
        //         'status' => 1,
        //         'type' => 1
        //     ];
        //     // return 'if';
        //     $earner = TopEarner::create($earn_data);
        // } else {
        //     // return 'hello';
        //     $earner->amount += $data->amount;
        //     $earner->update(['amount' => $earner->amount]);
        // }
        // if ($set->email_notify == 1) {
        //     $temp = Etemplate::first();
        //     Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, 'Withdrawal request of ₦' . substr($data->amount, 0, 9) . ' has been approved<br>Thanks for working with us.', 'Withdraw Request has been approved', 1));
        // }
        if ($res) {
            Notification::create([
                'user_id' => $user->id,
                'title' => 'MLM Balance WITHDRAWAL - SUCCESSFUL  - NGN' . $data->amount,
                'msg' => 'Your Withdrawal Request from your MLM Balance has been APPROVED. Kindly POST your Payment Credit ALERT!',
                'is_read' => 0
            ]);
            return redirect()->route('admin.mlm.withdraw_log')->with('success', 'Request was Successfully approved!');
        } else {
            return redirect()->route('admin.mlm.withdraw_log')->with('alert', 'Problem With Approving Request');
        }
    }

    public function mlm_withdraw_approved()
    {
        $data['title'] = 'Approved MLM Balance Withdraw';
        $data['withdraw'] = Withdraw::with('user')->whereType(2)->whereStatus('1')->latest('id')->get();
        // $data['withdraw'] = Withdraw::whereStatus(1)->orderBy('id', 'DESC')->get();
        return view('admin.withdrawal_mlm.approved', $data);
    }

    public function mlm_withdraw_approve_multi(Request $request)
    {
        // return $request;

        $set = Setting::first();
        foreach ($request->ids as $id) {
            $data = Withdraw::findOrFail($id);
            $user = User::find($data->user_id);
            $user->update(['show_popup' => 1]);
            $res = $data->update(['status' => '1']);
            // $earner = TopEarner::where('user_id', $data->user_id)->where('type', 1)->first();
            // if (!$earner) {
            //     $earn_data = [
            //         'user_id' => $user->id,
            //         'name' => $user->name,
            //         'amount' => $data->amount,
            //         'status' => 1,
            //         'type' => 1
            //     ];
            //     // return 'if';
            //     $earner = TopEarner::create($earn_data);
            // } else {
            //     // return 'hello';
            //     $earner->amount += $data->amount;
            //     $earner->update(['amount' => $earner->amount]);
            // }
            // return 'out';
            // if ($set->email_notify == 1) {
            //     $temp = Etemplate::first();
            //     Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, 'Withdrawal request of ₦' . substr($data->amount, 0, 9) . ' has been approved<br>Thanks for working with us.', 'Withdraw Request has been approved'));
            // }
            Notification::create([
                'user_id' => $user->id,
                'title' => 'MLM Balance WITHDRAWAL - SUCCESSFUL  - NGN' . $data->amount,
                'msg' => 'Your Withdrawal Request from your MLM Balance has been APPROVED. Kindly POST your Payment Credit ALERT!',
                'is_read' => 0
            ]);
        }
        return true;
    }

    public function mlm_withdraw_unpaid()
    {
        $data['title'] = 'Unpaid MLM Balance Withdraw';
        $data['withdraw'] = Withdraw::with('user')->whereStatus('0')->whereType(2)->latest('id')->get();
        return view('admin.withdrawal_mlm.unpaid', $data);
    }

    public function mlm_withdraw_delete($id)
    {
        $data = Withdraw::findOrFail($id);
        // return json_encode($data->status == '0');
        if ($data->status == '0') {
            return back()->with('alert', 'You cannot delete an unpaid withdraw request');
        } else {
            $res =  $data->delete();
            if ($res) {
                return back()->with('success', 'Request was Successfully deleted!');
            } else {
                return back()->with('alert', 'Problem With Deleting Request');
            }
        }
    }

    public function mlm_withdraw_decline($id)
    {
        $data = Withdraw::findOrFail($id);
        $user = User::find($data->user_id);
        $set = Setting::first();
        $res = $data->update(['status' => '2']);
        $user->update(['balance' => $user->balance + $data->amount]);
        // if ($set->email_notify == 1) {
        //     $temp = Etemplate::first();
        //     Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, 'Withdrawal request of ₦' . substr($data->amount, 0, 9) . ' has been declined<br>Thanks for working with us.', 'Withdraw Request has been declined'));
        // }
        if ($res) {
            Notification::create([
                'user_id' => $user->id,
                'title' => 'MLM Balance WITHDRAWAL - DECLINED - NGN' . $data->amount,
                'msg' => 'Your Withdrawal Request from your MLM Balance has been DECLINED - Please update your Bank account and try again or contact Rubic Network Support.',
                'is_read' => 0
            ]);
            return back()->with('success', 'Request was Successfully declined!');
        } else {
            return back()->with('alert', 'Problem With Declining Request');
        }
    }

    public function mlm_withdraw_declined()
    {
        $data['title'] = 'Declined Withdraw';
        $data['withdraw'] = Withdraw::with('user')->whereType(2)->whereStatus('2')->latest('id')->get();
        return view('admin.withdrawal_mlm.declined', $data);
    }
}
