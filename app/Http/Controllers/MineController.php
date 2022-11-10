<?php

namespace App\Http\Controllers;

use App\Models\AffliateProfit;
use App\Models\Plan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MineController extends Controller
{
    //
    public function mining_page()
    {
        $data['title'] = 'ViewPoint Video Earning';
        $data['profit'] = AffliateProfit::whereUser_id(auth()->user()->id)->orderBy('id', 'DESC')->get();
        $data['latest_mine'] = AffliateProfit::whereUser_id(auth()->user()->id)->where('status', 0)->latest('id')->first();
        $user = auth()->user();
        $data['user'] = $user;
        if($user->account_type_id == 2) {
            return back();
        }

        return view('user.mining', $data);
    }
    public function mining_start()
    {
        $user = auth()->user();
        $plan = Plan::where('account_type_id', $user->account_type_id)->first();
        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        $random_string = substr(str_shuffle($data), 0, 16);
        $extraction = AffliateProfit::where('user_id', $user->id)->where('status', 0)->latest()->first();
        // return $extraction;
        if (!$extraction) {
            $extraction = AffliateProfit::create([
                'user_id' => $user->id,
                'plan_id' => $plan->id,
                'amount' => $user->balance,
                'trx' => $random_string,
                'status' => 0,
                'end_datetime' => Carbon::now()->addHours($plan->mining_time),
                // 'end_datetime' => Carbon::now()->addSeconds(10),
                'profit' => $plan->percent * $plan->upgrade / 100,
                'start_datetime' => Carbon::now()
            ]);
            return array('status' => '1');
        }
        return array('status' => '0');
    }
    public function mining_thankyou()
    {
        $data['title'] = 'Thank you';
        return view('user.mining_thank_you', $data);
    }
}
