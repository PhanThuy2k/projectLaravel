<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
// Sử dụng model phải use model
use App\Models\Product;
// Sử dụng model phải use model
use App\Models\Product_Images;
// use request
use App\Http\Requests\product\StoreProductRequest;
use App\Http\Requests\product\UpdateProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  HIỂN THỊ
    public function index()
    {
        // withQueryString() : giữ nguyên tham số khi chyển trang
        $product = Product::Search()->paginate(7)->withQueryString();
        return view('backend.pages.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  HIỂN THỊ THÊM MỚI
    public function create()
    {
        $category = Category::all();
        // bắn biến cate sang để thêm dữ liệu
        return view('backend.pages.product.add', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $Request
     * @return \Illuminate\Http\Response
     */
    // THÊM MỚI
    public function store(StoreProductRequest $request) //tiến hành thêm mới bằng phương thức post ,sử dụng Request tiêm vào phương thức
    {
        // dd($request->all());
        // upload 1 ảnh
        // kiểm tra người dùng có chọn file chưa
        
        if ($request->hasFile('images')) {
            // gắn
            $file = $request->file;
            // lấy tên file
            $file_name = $file->getClientOriginalName();
            // di chuyển vào thư mục upload trong public
            $file->move(public_path('upload'), $file_name);
        }
        // them moi sp
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'image' => $file_name,
            'author' => $request->author,
            'status' => $request->status,
            'description' => $request->editor1,
            'detail' => $request->editor2,
            'category_id' => $request->category_id,

        ]);
        // upload nhieu ảnh
        if ($product) {
            if ($request->hasFile('images')) {
                $files = $request->files;

                foreach ($files as $file) {
                    foreach ($file as $key => $f) {
                        $file_name1 = $file[$key]->getClientOriginalName();
                        $file[$key]->move(public_path('uploads'), $file_name1);
                        Product_Images::create([
                            'product_id' => $product->id,
                            'image' => $file_name1,
                        ]);
                    }
                }
            }
        }

        return redirect()->route('product.index')->with('success', 'thêm mới thành công');
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
    public function edit($id)
    {
        $category = Category::Where('status', 1)->get();
        $product = Product::find($id);
        // bắn bien sang để hiển thị dữ liệu cũ
        return view('backend.pages.product.edit', compact('category', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $Request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {

        // dd($request->all());
        $product = product::find($id);
        if ($request->hasFile('images')) {
            
            // gắn
            $file = $request->file;
            // lấy tên file
            $file_name = $file->getClientOriginalName();
            // di chuyển vào thư mục upload trong public
            $file->move(public_path('upload'), $file_name);
        }else{
            $file_name = $product->image;
        };
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'image' => $file_name,
            'author' => $request->author,
            'status' => $request->status,
            'description' => $request->editor1,
            'detail' => $request->editor2,
            'category_id' => $request->category_id,
        ]
        );
        if ($product) {
            if ($request->hasFile('images')) {
                $files = $request->files;

                foreach ($files as $file) {
                    foreach ($file as $key => $f) {
                        $file_name1 = $file[$key]->getClientOriginalName();
                        $file[$key]->move(public_path('uploads'), $file_name1);
                        Product_Images::create([
                            'product_id' => $product->id,
                            'image' => $file_name1,
                        ]);
                    }
                }
            }
        }
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // sử dụng câu lệnh xóa
        Product::find($id)->delete();
        Product_Images::find($id)->delete();
        // tạo with gắn success = xóa thành công
        return redirect()->route('product.index')->with('success', 'xóa thành công');
    }
}
