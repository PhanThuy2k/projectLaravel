<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = ['price','quantity','order_id','product_id','status','created_at','updated_at'];

    public function productName()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function orderName()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
    // tìm kiếm theo 
    public function scopeSearch($query)
    {
      $query = $query->where('name','like','%'.request()->keyword.'%');
        return $query;
    }
}
  