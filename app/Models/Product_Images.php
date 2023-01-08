<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Images extends Model
{
    protected $fillable = ['image','product_id'];
    use HasFactory;
}

