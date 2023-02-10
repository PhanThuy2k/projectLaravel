<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $table = 'products';
    protected $fillable = ['name','price','sale_price','image','author','status','description','detail','category_id'];
    use HasFactory;
    // đảo ngược của 1 nhiều
    public function getCategoryName()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    
    // tìm kiếm
    public function scopeSearch($query)
    {
      $query = $query->where('name','like','%'.request()->keyword.'%');

        return $query;
    } 
    // 1 sp co nhiều ảnh
    public function imgs()
    {
        return $this->hasMany(Product_Images::class);
    }
}
