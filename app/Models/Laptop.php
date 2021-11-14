<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
// use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Laptop extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia,SoftDeletes;
    protected $fillable=['product_id','brand_id','name','specifications','features','price'];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s A',
        'updated_at' => 'datetime:Y-m-d h:i:s A',
        'deleted_at' => 'datetime:Y-m-d h:i:s A',
        'specifications' => 'array',
    ];
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
              ->width(160)
              ->height(160)
              ->sharpen(10)
              ->queued();
    }
}
