<?php

namespace App\Http\Controllers;
// Sử dụng model phải use model 
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // HIỂN THỊ DỮ LIỆU  
    public function list()
    { 
        // biến = class model::all()
        // $category = Category::all();
        // phân trang bằng paginate
        $category = Category::paginate(4);
        return view('backend/page/listCategory',compact('category'));// dùng hàm compact bắn biến sang view
    }
}
