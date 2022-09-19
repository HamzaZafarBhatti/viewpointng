<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'percent',
        'duration',
        'period',
        'min_deposit',
        'amount',
        'status',
        'ref_percent',
        'hashrate',
        'image',
        'upgrade',
        'fb_share_amount',
        'indirect_ref_com',
        'code_prefix',
        'code_length',
        'active_period',
        'mining_time',
        'account_type_id',
    ];
}
