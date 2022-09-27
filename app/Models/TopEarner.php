<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopEarner extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'status',
        'type', //['mlm', 'aff_ref']
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
