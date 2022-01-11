<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class GeneralSetting extends Model 
{
    use HasFactory, SoftDeletes;
    protected $fillable=['app_description', 'about_us_content', 'contact_us_content'];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s A',
        'updated_at' => 'datetime:Y-m-d h:i:s A',
        'deleted_at' => 'datetime:Y-m-d h:i:s A',
        'app_description' => 'array',
        'about_us_content' => 'array',
        'contact_us_content' => 'array'
       
    ];
}
