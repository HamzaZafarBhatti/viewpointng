<?php

namespace App\Http\Controllers;

use App\Models\AccountType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AccountTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $account_types = AccountType::all();
        $title = 'Account Types';
        return view('admin.account_types.index', compact('account_types', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            AccountType::create([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            Session::flash('success', 'Account Type added.');
        } catch (\Exception $e) {
            Session::flash('error', 'Error! Account Type addition failed.');
        }
        return redirect()->route('admin.account_types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccountType  $accountType
     * @return \Illuminate\Http\Response
     */
    public function show(AccountType $accountType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccountType  $accountType
     * @return \Illuminate\Http\Response
     */
    public function edit(AccountType $accountType)
    {
        //
        $title = 'Edit Account Type';
        return view('admin.account_types.edit', compact('accountType', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccountType  $accountType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccountType $accountType)
    {
        //
        try {
            $accountType->update([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            Session::flash('success', 'Account Type updated.');
        } catch (\Exception $e) {
            Session::flash('error', 'Error! Account Type update failed.');
        }
        return redirect()->route('admin.account_types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccountType  $accountType
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountType $accountType)
    {
        //
    }
}
