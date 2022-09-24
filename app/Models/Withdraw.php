<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'status',
        'account_no',
        'type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->select('id', 'name', 'username');
    }

    protected function bankName(): Attribute
    {
        return Attribute::make(
            get: function () {
                $user = User::where('bank_account_no', $this->account_no)->first();
                if(!$user) {
                    return 'N/A';
                }
                return $user->bank->name;
            },
        );
    }
}
