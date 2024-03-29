<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable=['product_id','user_id','shipping_address','tracking_code','customer_name','customer_email','customer_phone','payment_type','product_qty'];
    protected $table="orders";
    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s A',
        'updated_at' => 'datetime:Y-m-d h:i:s A',
        'deleted_at' => 'datetime:Y-m-d h:i:s A',
    ];

    public function customer(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function payment_type(){
        return $this->belongsTo(PaymentType::class,'payment_type','id');
    }

    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }
}
