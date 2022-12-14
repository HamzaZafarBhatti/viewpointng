<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'site_name',
        'site_desc',
        'email',
        'mobile',
        'address',
        'balance_reg_affiliate',
        'balance_reg_mlm',
        'balance_reg_premium',
        'email_notify',
        'sms_notify',
        'email_verification',
        'sms_verification',
        'registration',
        'upgrade_status',
        'upgrade_fee',
        'affiliate_yt_link',
        'referral',
        'mlm_plan_reg_fee',
        'video_earn_plan_reg_fee',
        'video_premium_plan_reg_fee',
    ];
}
