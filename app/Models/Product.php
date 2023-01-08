<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name','price','sale_price','image','status','description','detail','category_id'];
    use HasFactory;
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
}
