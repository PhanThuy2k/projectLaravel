<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//  tên model phải là số it
class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'status'];
    use HasFactory;
      // tìm kiếm
      public function scopeSearch($query)
      {
        $query = $query->where('name','like','%'.request()->keyword.'%');
          return $query;
      }
    
}

 