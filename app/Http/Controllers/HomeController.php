<?php

namespace App\Http\Controllers;

use App\Mail\GeneralEmail;
use App\Models\Etemplate;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function showLinkRequestForm()
    {
        $data['title'] = 'Recover Password';
        return view('user.auth.passwords.email', $data);
    }

    public function sendResetLinkEmail(Request $request)
    {
        // return $request;
        $validated = $request->validate([
            'email' => 'required|string|email',
        ]);
        $user = User::whereEmail($request->email)->first();
        if (!$user) {
            return back()->with('warning', 'We can\'t find a user with that e-mail address.');
        }
        $to = $user->email;
        $name = $user->name;
        $subject = 'Password Reset';
        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        $code = substr(str_shuffle($data), 0, 30);
        $link = route('user.password.reset_token', $code);
        $message = "Use This Link to Reset Password: <br>";
        $message .= "<a href='" . $link . "'>" . $link . "</a>";
        // return $message;
        $is_html = 1;
        DB::table('password_resets')->insert(
            ['email' => $to, 'token' => $code,  'created_at' => date("Y-m-d h:i:s")]
        );
        // send_email($to,  $name, $subject,$message);
        // $temp = Etemplate::first();
        Mail::to($to)->send(new GeneralEmail($name, $message, $subject, $is_html));
        return back()->with('success', 'Password Reset Link Sent To Your E-mail');
    }

    public function showResetForm(Request $request, $token)
    {
        $tk = DB::table('password_resets')->where('token', $token)->latest()->first();
        // return $tk;
        if ($tk == null) {
            return redirect()->route('user.password.reset')->with('error', 'Token Not Found!!');
        }
        $email = $tk->email;
        return view('user.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $email, 'title' => 'Recover Password']
        );
    }


    public function reset(Request $request)
    {
        // return $request;
        // $this->validate($request, $this->rules(), $this->validationErrorMessages());
        $validated = $request->validate([
            'password' => 'required|string|confirmed',
        ]);
        $tk = DB::table('password_resets')->where('token', $request->token)->latest()->first();
        $user = User::whereEmail($tk->email)->first();
        if (!$user) {
            return back()->with('warning', 'Email don\'t match!!');
        }
        $user->update(['password' => bcrypt($request->password)]);
        return back()->with('success', 'Successfully Password Reset.');
    }
}
