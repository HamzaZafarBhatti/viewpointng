<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Mail\GeneralEmail;
use App\Models\AffliateProfit;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Settings;
use App\Models\Deposits;
use App\Models\Withdraw;
use App\Models\Bank;
use App\Models\Contact;
use App\Models\Ticket;
use App\Models\Reply;
use App\Models\Review;
use App\Models\Etemplate;
use App\Models\IndirectReferral;
use App\Models\MlmPlan;
use App\Models\Plan;
use App\Models\Referral;
use App\Models\StakeReferral;
use App\Models\StakeWithdraw;
use Illuminate\Support\Facades\Mail;




class AdminController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Destroyuser($id)
    {
        $user = User::whereId($id)->delete();
        return back()->with('success', 'User was successfully deleted');
    }

    public function dashboard()
    {
        // return 'hello';
        $data['title'] = 'Dashboard';
        // $data['totalusers'] = User::count() ?? [];
        // $data['blockedusers'] = User::whereStatus(1)->count();
        // $data['activeusers'] = User::whereStatus(0)->count();
        // $data['totalticket'] = Ticket::count();
        // $data['openticket'] = Ticket::whereStatus(0)->count();
        // $data['closedticket'] = Ticket::whereStatus(1)->count();
        // $data['totalreview'] = Review::count();
        // $data['pubreview'] = Review::whereStatus(1)->count();
        // $data['unpubreview'] = Review::whereStatus(0)->count();
        // $data['totaldeposit'] = Deposits::count();
        // $data['approveddep'] = Deposits::whereStatus(1)->count();
        // $data['declineddep'] = Deposits::whereStatus(2)->count();
        // $data['pendingdep'] = Deposits::whereStatus(0)->count();
        // $data['totalplan'] = Plan::count();
        // $data['appplan'] = Plan::whereStatus(1)->count();
        // $data['penplan'] = Plan::whereStatus(0)->count();
        // $data['messages'] = Contact::count();
        return view('admin.dashboard.index', $data);
    }

    public function users()
    {
        $data['title'] = 'Clients';
        $users = User::with('coupon', 'parent')->latest()->get();

        
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
        // return $users;
        foreach ($users as $key => $user) {
            if(in_array($user->account_type_id, $aff_arr)) {
                $user->plan = $user->get_plan();
            }
            if(in_array($user->account_type_id, $mlm_arr)) {
                $user->plan = $user->get_mlm_plan();
            }
        }
        $data['users'] = $users;

        return view('admin.user.index', $data);
    }

    public function Messages()
    {
        $data['title'] = 'Messages';
        $data['message'] = Contact::latest()->get();
        return view('admin.user.message', $data);
    }

    public function Ticket()
    {
        $data['title'] = 'Ticket system';
        $data['ticket'] = Ticket::latest()->get();
        return view('admin.user.ticket', $data);
    }

    public function Email($id, $name)
    {
        $data['title'] = 'Send email';
        $data['email'] = $id;
        $data['name'] = $name;
        return view('admin.user.email', $data);
    }

    public function Promo()
    {
        $data['title'] = 'Send email';
        $data['client'] = $user = User::all();
        return view('admin.user.promo', $data);
    }

    public function Sendemail(Request $request)
    {
        $temp = Etemplate::first();
        Mail::to($request->to)->send(new GeneralEmail($temp->esender, $request->name, $request->message, $request->subject));
        $notification = array('message' => 'Mail Sent Successfuly!', 'alert-type' => 'success');
        return back()->with($notification);
    }

    public function Sendpromo(Request $request)
    {
        $set = Settings::first();
        foreach ($request->email as $email) {
            $user = User::whereEmail($email)->first();
            // send_email($request->to, $user->name, $request->subject, $request->message);
            $temp = Etemplate::first();
            Mail::to($request->to)->send(new GeneralEmail($temp->esender, $request->name, $request->message, $request->subject));
        }
        $notification = array('message' => 'Mail Sent Successfuly!', 'alert-type' => 'success');
        return back()->with($notification);
    }

    public function Replyticket(Request $request)
    {
        $data['ticket_id'] = $request->ticket_id;
        $data['reply'] = $request->reply;
        $data['status'] = 0;
        $data['is_seen'] = 0;
        $res = Reply::create($data);
        if ($res) {
            return back();
        } else {
            return back()->with('alert', 'An error occured');
        }
    }

    public function Destroymessage($id)
    {
        $data = Contact::findOrFail($id);
        $res =  $data->delete();
        if ($res) {
            return back()->with('success', 'Request was Successfully deleted!');
        } else {
            return back()->with('alert', 'Problem With Deleting Request');
        }
    }

    public function Destroyticket($id)
    {
        $data = Ticket::findOrFail($id);
        $res =  $data->delete();
        if ($res) {
            return back()->with('success', 'Request was Successfully deleted!');
        } else {
            return back()->with('alert', 'Problem With Deleting Request');
        }
    }
    public function Manageuser($id)
    {
        $data['client'] = $user = User::with('account_type')->find($id);
        $data['title'] = $user->name;
        $data['withdraw'] = Withdraw::with('user')->whereUser_id($user->id)->orderBy('id', 'DESC')->get();
        $data['profit'] = AffliateProfit::whereUser_id($user->id)->orderBy('id', 'DESC')->get();
        // $data['earning'] = Earning::whereReferral($user->id)->orderBy('id', 'DESC')->get();
        $data['referral'] = Referral::where('referee_id', $user->id)->orderBy('id', 'DESC')->get();
        $data['indirect_referral'] = IndirectReferral::where('referee_id', $user->id)->orderBy('id', 'DESC')->get();
        $data['banks'] = Bank::all();
        return view('admin.user.edit', $data);
    }

    public function Manageticket($id)
    {
        $data['ticket'] = $ticket = Ticket::find($id);
        $data['title'] = '#' . $ticket->ticket_id;
        $data['client'] = User::whereId($ticket->user_id)->first();
        $data['reply'] = Reply::whereTicket_id($ticket->ticket_id)->get();
        return view('admin.user.edit-ticket', $data);
    }

    public function Closeticket($id)
    {
        $ticket = Ticket::find($id);
        $ticket->status = 1;
        $ticket->save();
        return back()->with('success', 'Ticket has been closed.');
    }

    public function Blockuser($id)
    {
        $user = User::find($id);
        $user->is_blocked = 1;
        $user->save();
        return back()->with('success', 'User has been suspended.');
    }

    public function Unblockuser($id)
    {
        $user = User::find($id);
        $user->is_blocked = 0;
        $user->save();
        return back()->with('success', 'User was successfully unblocked.');
    }

    public function Approvekyc($id)
    {
        $user = User::find($id);
        $user->kyc_status = 1;
        $user->save();
        return back()->with('success', 'Kyc has been approved.');
    }


    public function Rejectkyc($id)
    {
        $user = User::find($id);
        $user->kyc_status = '';
        $user->save();
        return back()->with('success', 'Kyc was successfully rejected.');
    }

    public function profile_update(Request $request)
    {
        // return $request;
        $data = User::findOrFail($request->id);
        $data->username = $request->username;
        $data->email = $request->email;
        $data->name = $request->name;
        $data->phone = $request->mobile;
        $data->country = $request->country;
        $data->city = $request->city;
        $data->zip_code = $request->zip_code;
        $data->address = $request->address;
        $data->balance = $request->balance;
        if($request->has('affliate_ref_balance')) {
            $data->affliate_ref_balance = $request->affliate_ref_balance;
        }
        if (empty($request->email_verify)) {
            $data->email_verify = 0;
        } else {
            $data->email_verify = $request->email_verify;
        }
        if (empty($request->phone_verify)) {
            $data->phone_verify = 0;
        } else {
            $data->phone_verify = $request->phone_verify;
        }
        if (empty($request->upgrade)) {
            $data->upgrade = 0;
        } else {
            $data->upgrade = $request->upgrade;
        }
        $res = $data->save();
        if ($res) {
            return back()->with('success', 'Update was Successful!');
        } else {
            return back()->with('alert', 'An error occured');
        }
    }

    public function Profileupdatepin(Request $request)
    {
        $data = User::findOrFail($request->id);
        $data->pin = $request->pin;
        $res = $data->save();
        if ($res) {
            return back()->with('success', 'Update was Successful!');
        } else {
            return back()->with('alert', 'An error occured');
        }
    }

    public function UpdateBankDetails(Request $request)
    {
        // return $request;
        $data = User::findOrFail($request->id);
        $data->bank_id = $request->bank_id;
        $data->bank_account_name = $request->account_name;
        $data->bank_account_no = $request->account_no;
        $data->bank_account_type = $request->account_type;
        $res = $data->save();
        if ($res) {
            return back()->with('success', 'Update was Successful!');
        } else {
            return back()->with('alert', 'An error occured');
        }
    }


    public function logout()
    {
        Auth::guard()->logout();
        session()->flash('message', 'Just Logged Out!');
        return redirect('/viewpointadministration');
    }

    public function resolve_account_number(Request $request)
    {
        $response = resolve_account_number($request->account_number, $request->bank_id);
        // return $response->data->account_name;
        if($response->data) {
            return json_encode([
                'status' => 1,
                'name' => $response->data->account_name
            ]);
        } else {
            return json_encode([
                'status' => 0,
            ]);
        }
    }

    public function upgrade_account($id)
    {
        $user = User::find($id);
        $res = $user->update([
            'account_type_id' => 3
        ]);
        if($res) {
            return back()->with('success', 'Account upgraded to Premium');
        } else {
            return back()->with('error', 'Error: Something went wrong.');
        }
    }
}
