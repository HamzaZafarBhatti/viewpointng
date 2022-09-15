<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MlmCoupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial',
        'status',
        'mlm_plan_id',
    ];

    public function mlm_plan() {
        return $this->belongsTo(MlmPlan::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
