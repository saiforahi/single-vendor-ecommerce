<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
class Processor extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;
    protected $fillable=['product_id','brand','model','name','general_specs','performance_specs','memory_specs','packaging_specs','power_specs','graphic_specs','price'];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s A',
        'updated_at' => 'datetime:Y-m-d h:i:s A',
        'deleted_at' => 'datetime:Y-m-d h:i:s A',
        'general_specs' => 'array',
        'performance_specs' => 'array',
        'memory_specs' => 'array',
        'packaging_specs' => 'array',
        'graphic_specs' => 'array',
        'power_specs' => 'array',
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
        $this->addMediaCollection('thumb')->useDisk('public')->acceptsMimeTypes(['image/jpeg','image/jpg','image/png'])->withResponsiveImages();
        $this
            ->addMediaCollection('main_image')
            ->useDisk('public')
            ->acceptsMimeTypes(['image/jpeg','image/jpg','image/png'])
            ->withResponsiveImages();
    }
}
