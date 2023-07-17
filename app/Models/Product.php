<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category',
        'size',
        'color',
        'price',
        'discount_price',
        'image',
        'status',
        'hot_deal',
        'description',
    ];
    // public function order()
    // {
    //     return $this->belongsToMany(Order::class, 'product_id','qty');
    // }

    // public function order()
    // {
    //     return $this->belongsToMany(Order::class, 'product_id','qty');
    // }
    // public function wishlist(){
    //     // dd('sd');
    //             return $this->belongsTo(Wishlist::class,'product_id','id');
    //         }
    // public function user(){
    //     return $this->belongsTo(User::class,'id');
    // }
   

}
