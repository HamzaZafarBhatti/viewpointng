<?php

namespace App\Http\Controllers;

use App\Models\AffliateProfit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
