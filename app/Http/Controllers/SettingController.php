<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Etemplate;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['title'] = 'General settings';
        return view('admin.settings.basic-setting', $data);
    }

    public function Email()
    {
        $data['title'] = 'Email settings';
        $data['val'] = Etemplate::first();
        return view('admin.settings.email', $data);
    }

    public function EmailUpdate(Request $request)
    {
        $data = Etemplate::find(1);
        if($data) {
            $data->esender = $request->sender;
            $data->emessage = $request->message;
            $res = $data->save();
        } else {
            $res = Etemplate::create([
                'esender' => $request->sender,
                'emessage' => $request->message,
            ]);
        }
        if ($res) {
            return back()->with('success', 'Update was Successful!');
        } else {
            return back()->with('alert', 'An error occured');
        }
    }

    public function Account()
    {
        $data['title'] = 'Change account details';
        $data['val'] = Admin::first();
        return view('admin.settings.account', $data);
    }

    public function AccountUpdate(Request $request)
    {
        $data = Admin::findOrFail(1);
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $res = $data->save();
        if ($res) {
            return back()->with('success', 'Update was Successful!');
        } else {
            return back()->with('alert', 'An error occured');
        }
    }

    public function Sms()
    {
        $data['title'] = 'Sms settings';
        $data['val'] = Etemplate::first();
        return view('admin.settings.sms', $data);
    }

    public function SmsUpdate(Request $request)
    {
        $data = Etemplate::find(1);
        if($data) {
            $data->smsapi = $request->smsapi;
            $res = $data->save();
        } else {
            $res = Etemplate::create([
                'smsapi' => $request->smsapi,
            ]);
        }
        if ($res) {
            return back()->with('success', 'Update was Successful!');
        } else {
            return back()->with('alert', 'An error occured');
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token', '_method');
        // return $data;
        $setting = Setting::find($id);
        if(empty($request->email_verification)) {
            $data['email_verification'] = 0;
        }
        if(empty($request->sms_verification)) {
            $data['sms_verification'] = 0;
        }
        if(empty($request->email_notify)) {
            $data['email_notify'] = 0;
        }
        if(empty($request->sms_notify)) {
            $data['sms_notify'] = 0;
        }
        if(empty($request->registration)) {
            $data['registration'] = 0;
        }
        if(empty($request->upgrade_status)) {
            $data['upgrade_status'] = 0;
        }
        $res = $setting->update($data);
        if ($res) {
            return back()->with('success', 'Update was Successful!');
        } else {
            return back()->with('alert', 'An error occured');
        }
    }
}
