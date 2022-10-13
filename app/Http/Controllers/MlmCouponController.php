<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\MlmPlan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MlmCouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $plans = MlmPlan::whereStatus(1)->get();
        $coupons = Coupon::with('mlm_plan')->where('account_type_id', 2)->latest()->get();
        $title = 'Generate Coupons';
        return view('admin.mlm-coupons.index', compact('plans', 'title', 'coupons'));
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
            $qty = $request->quantity;
            $plan = MlmPlan::find($request->mlm_plan_id);
            // return $plan;

            $chars = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $now = Carbon::now();
            for ($i = 0; $i < $qty; $i++) {
                $data[] = [
                    'serial' => $plan->code_prefix . substr(str_shuffle($chars), 0, $plan->code_length - 4),
                    'mlm_plan_id' => $request->mlm_plan_id,
                    'account_type_id' => $plan->account_type_id,
                    'created_at' => $now,
                    'updated_at' => $now
                ];
            }
            $codes = array();
            foreach ($data as $val) {
                array_push($codes, $val['serial']);
            }
            // return $data;
            Coupon::insert($data);
            Session::flash('success', 'Coupon Codes successfully generated!');
            // Session::put('download_link', 'https://rubicnetwork.com/rubicnetworkadministration/coupons/download');
            $url = route('admin.mlm-coupons.download');
            Session::put('mlm_download_link', $url);
            Session::put('mlm_codes', json_encode($codes, JSON_PRETTY_PRINT));
        } catch (\Exception $e) {
            Session::flash('error', 'Error: ' . $e->getMessage());
        }
        return redirect()->route('admin.mlm-coupons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function coupons_download()
    {
        // return 'ello';
        // return Session::get('download_link');
        $codes = Session::get('mlm_codes');
        // return $codes;
        Session::forget(['mlm_codes', 'mlm_download_link']);
        // File::delete(public_path('/upload/codes/latest_rubic_codes.txt'));
        // File::put(public_path('/upload/codes/latest_rubic_codes.txt'),$codes);
        // return response()->download(public_path('/upload/codes/latest_rubic_codes.txt'));
        return response($codes)
            ->withHeaders([
                'Content-Type' => 'text/plain',
                'Cache-Control' => 'no-store, no-cache',
                'Content-Disposition' => 'attachment; filename="latest_mlm_codes.txt',
            ]);
    }
}
