<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ui extends Model
{
    use HasFactory;

    protected $fillable = [
       's6_title',
       's7_title',
       's8_title',
       's8_body',
       's7_body',
       's7_image',
       's6_body',
       's5_title',
       's5_body',
       's4_title',
       's4_body',
       's4_image',
       's3_title',
       's3_body',
       's3_image',
       's2_title',
       's2_body',
       's2_image',
       's1_title',
       'header_title',
       'header_body',
       'nav_type',
       'total_assets',
       'experience',
       'traders',
       'countries',
       'item1_title',
       'item1_body',
       'item2_title',
       'item2_body',
       'item3_title',
       'item3_body',
    ];
}
