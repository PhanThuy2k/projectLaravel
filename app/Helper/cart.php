<?php

namespace App\Helper;
class Cart {
    // thuoc tinh
    // mang để dựng sản phẩm
    private $items = [];

    public function __construct()
    {
        // lưu mảng items vào session cart
        $this->items = session('cart') ? session('cart') : [];
    }
// Thêm 
        public function add($product,$quantity)
    {
        // thêm các trường vào item
        $item = [
            'id'=>$product->id,
            'name'=>$product->name,
            'image'=>$product->image,
            'status'=>$product->status,
            'quantity'=>$quantity > 0 ? $quantity:1,
            'price'=>$product->sale_price > 0 ? $product->sale_price : $product->price
        ];
        // Thêm mới và cộng số lương khi mua thêm 
        if(isset($this->items[$product->id])){

            $this->items[$product->id]['quantity'] += $quantity;
        }else{
            // lưu khi thêm vào giỏ hàng, lưu mảng rỗng items có key là id = mảng item
            $this->items[$product->id] = $item;
        }
        
        // lưu mảng vào session
        session(['cart' => $this->items]);
    }

    // UPDATE
    public function update($id,$quantity)
    {
        // sửa  
        if(isset($this->items[$id])){
            // không cộng với số lượng cũ
            $this->items[$id]['quantity'] = $quantity > 0 ? $quantity:1;
        }
        session(['cart' => $this->items]);
    } 

    // DELETE
    public function delete($id)
    {
        // xóa 
        if(isset($this->items[$id])){
            unset($this->items[$id]);         
        }
        session(['cart' => $this->items]);
    }
    // xóa toàn bộ session
    public function remove()
    {
        session(['cart' => '']);
    }
// lấy mảng items,getItems mảng 2 chiêu,items mảng 1 chiều
    public function getItems()
    {
        return $this->items;
    }

    // tính tổng tiền
    public function getTotalPrice()
    {
        $totalPrice = 0;
        foreach ($this->items as $item) {
            $totalPrice += $item['quantity'] * $item['price'];
        }
        return $totalPrice; 
    }
 
    // Hiển thị số trên giỏ hàng
     public function getTotalQty()
    {
        $totalPrice = 0;
        foreach ($this->items as $item) {
            $totalPrice += $item['quantity'];
        }
        return $totalPrice; 
    }
}