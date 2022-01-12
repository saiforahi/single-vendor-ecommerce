<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Prebuildpc extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia,SoftDeletes;
    protected $fillable=['product_id','brand','model','name','specifications','features'];
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

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('thumb')->useDisk('public')->acceptsMimeTypes(['image/webp','image/jpeg','image/jpg','image/png'])->withResponsiveImages();
        $this
            ->addMediaCollection('main_image')
            ->useDisk('public')
            ->acceptsMimeTypes(['image/jpeg','image/jpg','image/png','image/webp'])
            ->withResponsiveImages();
    }
    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
