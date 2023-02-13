<?php

namespace App\Http\Controllers\fontend;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // trang chinh 
    public function home()
    {  
        // tìm theo id và giảm dần
        $product = Product::orderBy('id', 'DESC')->get();
        $product = Product::paginate(12);
        $category = Category::orderBy('id', 'DESC')->get();
        return view('fontend.home',compact('product','category'));
    }
    // tìm kiếm
    public function search(Request $req)
    {
        // $keywords = $req->keyword;
        $product = Product::orderBy('id', 'DESC')->where('name','like','%'.request()->keyword.'%')->get();
        $category = Category::orderBy('id', 'DESC')->get();
        // dd($product);
        return view('fontend.pages.search',compact('product','category'));
    }
     
    // trang chi tiết sp
    public function Information($id)
    {
        $category = Category::orderBy('id', 'DESC')->get();
        // lấy id
        $product = Product::find($id);
        // lấy toàn bộ
        $products = Product::orderBy('id', 'DESC')->get();
        // dd($product);
        return view('fontend.pages.productInformation',compact('product','products','category'));
    }
    // trang all sp
    public function All()
    {
        $category = Category::orderBy('id', 'DESC')->get();
        $product = product::paginate(12);
        // dd($product);
        return view('fontend.pages.productAll', compact('product', 'category'));
    }
    // trang chi tiết danh mục
    public function detail($id)
    { 
        $categorys = category::find($id);
        // lấy toàn bộ
        $category = category::orderBy('id', 'DESC')->get();
        $product = product::where('category_id',$id)->paginate(20);
        return view('fontend.pages.categoryDetail',compact('product','category','categorys'));
    }
    
} 
