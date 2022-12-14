<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'details',
        'image',
        'views',
        'status',
        'post_date',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, BlogUser::class);
    }
}
