<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MlmPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'amount_balance',
        'min_withdraw_balance',
        'status',
        'direct_ref_count_cashout',
        'indirect_ref_count_cashout',
        'code_prefix',
        'code_length',
        'image',
        'account_type_id',
    ];
}
