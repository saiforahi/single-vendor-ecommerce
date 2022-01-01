<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use App\Models\Product;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Gloudemans\Shoppingcart\Contracts\Buyable;
class Product extends Model implements HasMedia, Buyable
{
    use HasFactory, SoftDeletes, InteractsWithMedia;
    // use Gloudemans\Shoppingcart\CanBeBought;
    protected $fillable=['price','name','brand','model','weight','stock','description','features'];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s A',
        'updated_at' => 'datetime:Y-m-d h:i:s A',
        'deleted_at' => 'datetime:Y-m-d h:i:s A'
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
        $this->addMediaCollection('thumb')->useDisk('media')->acceptsMimeTypes(['image/jpeg','image/jpg','image/png','image/webp'])->withResponsiveImages();
        $this
            ->addMediaCollection('main_image')
            ->useDisk('media')
            ->acceptsMimeTypes(['image/jpeg','image/jpg','image/png','image/webp'])
            ->withResponsiveImages();
    }

    public function getBuyableIdentifier($options = null) {
        return $this->id;
    }
    public function getBuyableDescription($options = null) {
        return $this->name;
    }
    public function getBuyablePrice($options = null) {
        return $this->price;
    }
    public function getBuyableWeight($options = null) {
        return $this->weight;
    }
    public function extendable()
    {
        return $this->morphTo();
    }
}
