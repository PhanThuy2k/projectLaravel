<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Sử dụng model phải use model
use App\Models\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     // HIỂN THỊ 
    public function index()
    {
        $category = Category::paginate(3);
        return view('backend.pages.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     // HIỂN THỊ FORM THÊM MỚI 
    public function create()
    {
        return view('backend.pages.category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // THÊM MỚI 
    public function store(Request $request)
    {
         // dd($req->All()); lấy toàn bộ bảng
        // sử dụng câu lệnh thêm mới
        $category = Category::create($request->all());
        
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  HIỂN THỊ FORM SỬA 
    public function edit($id)
    {
        // tìm kiếm khóa chính bằng cách truyền id vào model
        $category = Category::find($id);
        // bắn bien sang để hiển thị dữ liệu cũ
        return view('backend.pages.category.edit', compact('category'));
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  SỬA DỮ LIỆU 
    public function update(Request $request, $id)
    {
         // sử dụng câu lệnh sửa
         $category = Category::find($id)->update($request->all());
         return redirect()->route('category.index');
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // XÓA DỮ LIỆU 
    public function destroy($id)
    {
        // sử dụng câu lệnh xóa
        Category::find($id)->delete(); 
        // tạo with gắn success = xóa thành công
        return redirect()->route('category.index')->with('success','xóa thành công');
    }
}
