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
        'balance_reg',
        'email_notify',
        'sms_notify',
        'email_verification',
        'sms_verification',
        'registration',
        'upgrade_status',
        'upgrade_fee',
    ];
}
