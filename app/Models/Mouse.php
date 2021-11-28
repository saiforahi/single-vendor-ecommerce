<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
class Mouse extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;
    protected $fillable=['product_id','brand','model','name','specifications','short_name'];
    protected $table="mice";
    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s A',
        'updated_at' => 'datetime:Y-m-d h:i:s A',
        'deleted_at' => 'datetime:Y-m-d h:i:s A',
        'specifications' => 'array',
        
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
    // public function product()
    // {
    //     return $this->hasOne('App\Models\Processor', 'child_id', 'product_id')
    //         ->whereImageableType('App\Models\Processor');
    // }
}
