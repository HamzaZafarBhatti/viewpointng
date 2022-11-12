<?php

namespace App\Http\Controllers;

use App\Models\AccountType;
use App\Models\MlmPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class MlmPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['title'] = 'MLM Plans';
        $data['plans'] = MlmPlan::all();
        return view('admin.mlm-plans.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['title'] = 'Create MLM Plan';
        return view('admin.mlm-plans.create', $data);
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
        // return $request;
        if(strlen($request->code_prefix) > 4) {
            return back()->with('alert', 'Prefix can only be 4 characters');
        }
        
        if (empty($request->status)) {
            $status = 0;
        } else {
            $status = $request->status;
        }
        $image_name = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'plan_' . time() . '.png';
            $location = 'asset/images/' . $filename;
            Image::make($image)->save($location);
            $image_name = $filename;
        }

        $latest_account_type = AccountType::latest('id')->first();
        $account_type_id = ++$latest_account_type->id;

        $res = MlmPlan::create([
            'name' => $request->name,
            'amount_balance' => $request->amount_balance,
            'min_withdraw_balance' => $request->min_withdraw_balance,
            'status' => $status,
            'direct_ref_count_cashout' => $request->direct_ref_count_cashout,
            'indirect_ref_count_cashout' => $request->indirect_ref_count_cashout,
            'code_prefix' => $request->code_prefix,
            'code_length' => $request->code_length,
            'upgrade' => $request->upgrade,
            'ref_percent' => $request->ref_percent,
            'indirect_ref_com' => $request->indirect_ref_com,
            'amount' => $request->amount,
            'active_period' => $request->active_period,
            'image' => $image_name,
            'account_type_id' => $account_type_id
        ]);
        if ($res) {
            AccountType::create([
                'name' => $res->name,
                'status' => 1,
                'plan_id' => $res->id,
            ]);
            return redirect()->route('admin.mlm-plans.index')->with('success', 'Saved Successfully!');
        } else {
            return back()->with('alert', 'Problem With Creating New Plan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MlmPlan  $mlmPlan
     * @return \Illuminate\Http\Response
     */
    public function show(MlmPlan $mlmPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MlmPlan  $mlmPlan
     * @return \Illuminate\Http\Response
     */
    public function edit(MlmPlan $mlmPlan)
    {
        //
        $title = $mlmPlan->name;
        return view('admin.mlm-plans.edit', compact('title', 'mlmPlan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MlmPlan  $mlmPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MlmPlan $mlmPlan)
    {
        //
        if(strlen($request->code_prefix) > 4) {
            return back()->with('alert', 'Prefix can only be 4 characters');
        }
        
        if (empty($request->status)) {
            $status = 0;
        } else {
            $status = $request->status;
        }
        $image_name = $mlmPlan->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'plan_' . time() . '.png';
            $location = 'asset/images/' . $filename;
            Image::make($image)->save($location);
            $path = './asset/images/';
            File::delete($path . $mlmPlan->image);
            $image_name = $filename;
        }
        $res = $mlmPlan->update([
            'name' => $request->name,
            'amount_balance' => $request->amount_balance,
            'min_withdraw_balance' => $request->min_withdraw_balance,
            'status' => $status,
            'direct_ref_count_cashout' => $request->direct_ref_count_cashout,
            'indirect_ref_count_cashout' => $request->indirect_ref_count_cashout,
            'code_prefix' => $request->code_prefix,
            'code_length' => $request->code_length,
            'upgrade' => $request->upgrade,
            'ref_percent' => $request->ref_percent,
            'indirect_ref_com' => $request->indirect_ref_com,
            'amount' => $request->amount,
            'active_period' => $request->active_period,
            'image' => $image_name,
        ]);
        if ($res) {
            return redirect()->route('admin.mlm-plans.index')->with('success', 'Saved Successfully!');
        } else {
            return back()->with('alert', 'An error occured');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MlmPlan  $mlmPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(MlmPlan $mlmPlan)
    {
        //
        $res =  $mlmPlan->delete();
        if ($res) {
            return back()->with('success', 'Request was Successfully deleted!');
        } else {
            return back()->with('alert', 'Problem With Deleting Request');
        }
    }
}
