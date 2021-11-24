<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use App\Models\Product;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Storage extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;
    protected $fillable=['product_id','brand','model','name','storage_specs','short_name','performance_specs','ssd_specs','packaging_specs','physical_specs','reliability_specs'];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s A',
        'updated_at' => 'datetime:Y-m-d h:i:s A',
        'deleted_at' => 'datetime:Y-m-d h:i:s A',
        'storage_specs' => 'array',
        'performance_specs' => 'array',
        'reliability_specs' => 'array',
        'ssd_specs' => 'array',
        'packaging_specs' => 'array'
    ];
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('main_image')
              ->width(247)
              ->height(300)
              ->sharpen(10)
              ->queued();
        
        $this->addMediaConversion('thumb')
        ->width(74)
        ->height(62)
        ->sharpen(10)
        ->queued();
    }
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('thumb')->useDisk('public')->acceptsMimeTypes(['image/jpeg','image/jpg','image/png','image/webp'])->withResponsiveImages();
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
