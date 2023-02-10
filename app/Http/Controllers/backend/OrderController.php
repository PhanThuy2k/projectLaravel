<?php

namespace App\Http\Controllers\backend;
use App\Models\Order;
use App\Models\orderDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // hiển thị sản phẩm
    public function order()
    { 
        $order = Order::Search()->paginate(6)->withQueryString();
        return view('backend.pages.order.index',compact('order'));
    }
    // chi tiết sp 
    public function orderDetail($id)
    {
        $order = Order::Search()->paginate(6)->withQueryString();
        $orderDetail = orderDetail::Where('order_id', $id)->get();
        return view('backend.pages.order.detail',compact('orderDetail','order'));
    }
    // xóa 
    public function delete($id)
    {
        // dd($id);
        orderDetail::find($id)->delete();
        return redirect()->route('order.index');
    }
    // sửa trạng thái
    public function updateStatus(Request $req,$id)
    {
        $order = Order::find($id)->update(['status'=>$req->status]);
        return redirect()->route('order.index');
    }
}
