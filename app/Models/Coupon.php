<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial',
        'status',
        'plan_id',
        'mlm_plan_id',
        'account_type_id',
    ];

    public function plan() {
        return $this->belongsTo(Plan::class);
    }
    public function mlm_plan() {
        return $this->belongsTo(MlmPlan::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function getAffliatePlan()
    {
        return Plan::first();
    }
    public function getMlmPlan()
    {
        return MlmPlan::first();
    }
}
