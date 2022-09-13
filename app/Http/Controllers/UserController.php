<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('user.index', compact(
            'user',
            'title',
        ));
    }
}
