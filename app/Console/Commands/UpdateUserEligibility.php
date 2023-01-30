<?php

namespace App\Console\Commands;

use App\Models\Referral;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateUserEligibility extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:user-eligibility {--reset=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the eligibility of users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $reset = $this->option('reset');
        $users = User::all();
        if($reset) {
            foreach ($users as $user) {
                $user->update([
                    'is_eligible' => 0,
                ]);
            }
            return 0;
        }
        foreach ($users as $user) {
            $is_eligible = $this->getUserEligibility($user);
            $this->info(json_encode($is_eligible));
            $user->update([
                'is_eligible' => $is_eligible,
                'has_withdawn' => 0
            ]);
        }
        return 0;
    }

    
    public function getUserEligibility($user)
    {
        $now = Carbon::now();
        if($now->day > 28) {
            $date = Carbon::create(null, null, 28, 0, 0, 0);
        } else {
            $date = Carbon::create(null, $now->month - 1, 28, 0, 0, 0);
        }
        $set = Setting::first();
        if($user->account_type_id == 3) {
            $referrals = Referral::where('referee_id', $user->id)->where('created_at', '>', $date)->whereHas('referral', function($q) {
                $q->where('account_type_id', 1);
            })->count();
            if($referrals >= $set->required_affliate_refs_prem_eligibility) {
                return true;
            }
            $referrals = Referral::where('referee_id', $user->id)->where('created_at', '>', $date)->whereHas('referral', function($q) {
                $q->where('account_type_id', 3);
            })->count();
            if($referrals >= $set->required_prem_refs_prem_eligibility) {
                return true;
            }
        }
        if($user->account_type_id == 1) {
            $referrals = Referral::where('referee_id', $user->id)->where('created_at', '>', $date)->whereHas('referral', function($q) {
                $q->where('account_type_id', 1);
            })->count();
            if($referrals >= $set->required_affliate_refs_affliate_eligibility) {
                return true;
            }
            $referrals = Referral::where('referee_id', $user->id)->where('created_at', '>', $date)->whereHas('referral', function($q) {
                $q->where('account_type_id', 3);
            })->count();
            if($referrals >= $set->required_prem_refs_affliate_eligibility) {
                return true;
            }
        }
        return false;
    }
}
