<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    // protected $table = 'order';
    protected $fillable = ['user_id','address','phone','status','note','created_at','updated_at'];
    public function userName()
    {
        return $this->belongsTo(user::class, 'user_id');
    }
    // tìm kiếm theo id
    public function scopeSearch($query)
    {
      $query = $query->where('id','like','%'.request()->keyword.'%');
        return $query;
    }
   
} 

