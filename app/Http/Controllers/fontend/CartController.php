<?php

namespace App\Http\Controllers\fontend;

use App\Helper\Cart;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 
// CART
class CartController extends Controller
{
    // thêm sản phẩm 
    public function add(Request $req, $id)
    {
        // lấy theo id
        $product = product::find($id);
        $quantity = $req->quantity;
        // găn biến cart mới 
        $cart = new Cart();
        $cart->add($product, $quantity);
        // return về trang cart
        return redirect()->route('cart.show');
    }

    // view trang  đơn hàng
    public function show(cart $cart)
    {
        $category = Category::orderBy('id', 'DESC')->get();
        return view('fontend.pages.cart', compact('cart','category'));
        // dd($cart->getItem());
    }
    // Sửa đơn hàng
    public function update(Request $req, $id)
    {
        $quantity = $req->quantity;
        $cart = new Cart();
        $cart->update($id, $quantity);
        return redirect()->route('cart.show');
    }
    // Xóa đơn hàng
    public function delete(Cart $cart, $id)
    {
        $cart->delete($id);
        return redirect()->route('cart.show');
    }
    // kiểm tra login khi đặt hàng
    public function checkOut()
    { 
        if (Auth::check()) {

        $category = Category::orderBy('id', 'DESC')->get();
        $product = Product::orderBy('id', 'DESC')->get();
        return view('fontend.pages.checkOut', compact('category','product'));
        } else {
            return redirect()->route('user.login')->with('mess', 'vui lòng đăng nhập để mua hàng');
        }
    }
 
    // View đơn hàng khi đã thanh toán xong
    public function checkOrder(Cart $cart)
    {
        $category = Category::all();
        $order = Order::orderBy('id', 'DESC')->get();
        return view('fontend.pages.checkOrder',compact('category','order'));
    }

     // View đơn hàng khi xem chi tiet 
     public function checkOrderDetail($id)
     {
         $category = Category::all();
         $orderDetail = orderDetail::Where('order_id', $id)->get();
         return view('fontend.pages.checkOrderDetail',compact('category','orderDetail'));
     }

    //  VIEW THANH TOÁN KHI NHẬN HÀNG 
    public function paymentoffline()
    {
        return view('fontend.pages.paymentOffline');
    }
    // THÊM MỚI BẢNG ORDER VÀ ORDER DETAIL
    public function postPaymentoffline(Request $req,Cart $cart)
    {
        try {
            // thêm mới order
            $order = Order::create([
                'user_id' => Auth::user()->id,
                'address' => $req->address,
                'phone' => $req->phone,
                'status'=>$req->status,
                'note' => $req->note, 
            ]);
            foreach ($cart->getItems() as $value) {
            // thêm mới orderDetail
                $OrderDetail = OrderDetail::create([
                    'order_id'=>$order->id,
                    'product_id'=>$value['id'],
                    'price'=>$value['price'],
                    'quantity'=>$value['quantity'],
                    // 'status' => $value['status'],
                ]);
            }
            // xóa session
            $cart->remove();
            return redirect()->route('user.checkOrder');
             
            
        } catch (\Throwable $th) {
        }
    }
}
