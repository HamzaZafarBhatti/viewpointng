<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'image',
        'balance',
        'phone',
        'status',
        'ip_address',
        'last_login',
        'pin',
        'country',
        'zip_code',
        'address',
        'city',
        'verification_code',
        'sms_code',
        'phone_verify',
        'email_verify',
        'upgrade',
        'coupon_id',
        'plan_id',
        'account_type_id',
        'bank_id',
        'bank_account_no',
        'bank_account_type',
        'bank_account_name',
        'show_popup',
        'is_blocked',
        'phone_time',
        'email_time',
        'activated_at',
        'mlm_balance',
        'affliate_balance',
        'ref_balance',
        'cycle_direct_referrals',
        'cycle_indirect_referrals',
        'cycle',
        'locked_referral',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function account_type()
    {
        return $this->belongsTo(AccountType::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
    
    public function mlm_plan()
    {
        return $this->belongsTo(MlmPlan::class);
    }
    public function parent()
    {
        return $this->belongsToMany(User::class, Referral::class, 'referral_id', 'referee_id');
    }
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
