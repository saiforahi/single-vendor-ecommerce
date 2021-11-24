<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
class MotherBoard extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;
    protected $fillable=['product_id','brand','model','name','short_name','product_specs','back_panel_specs','memory_specs','storage_specs','internal_specs','front_panel_specs','audio_specs','wireless_specs','software_specs','physical_specs','packaging_specs',];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s A',
        'updated_at' => 'datetime:Y-m-d h:i:s A',
        'deleted_at' => 'datetime:Y-m-d h:i:s A',
        'product_specs' => 'array',
        'back_panel_specs' => 'array',
        'storage_specs' => 'array',
        'memory_specs' => 'array',
        'internal_specs' => 'array',
        'front_panel_specs' => 'array',
        'audio_specs' => 'array',
        'wireless_specs' => 'array',
        'software_specs' => 'array',
        'physical_specs' => 'array',
        'packaging_specs' => 'array',
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
