<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'esender',
        'mobile',
        'emessage',
        'smsapi',
    ];
}
