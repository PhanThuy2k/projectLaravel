<?php

namespace App\Http\Controllers\payment;

use App\Helper\Cart;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    // VIEW THANH TOÁN MOMO
    public function momo()
    {
        return view('fontend.pages.momo');
    }

    // chuyen qua chuoi json
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data),
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }


    // THANH TOÁN MOMO ATM
    public function paymentMomoAtm(request $req)
    {
        // dd($req);
        $address = $req->address;
        $phone = $req->phone;
        $status = $req->status;
        $note = $req->note;
        // chuyển về trang thanh toán momo
        $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";
        // thông tin tài khoản nhận tiền
        $partnerCode = 'MOMO_ATM_DEV';
        $accessKey = 'w9gEg8bjA2AM2Cvr';
        $secretKey = 'mD9QAVi4cm9N844jh5Y2tqjWaaJoGVFM';
        $orderInfo = "Thanh toán qua MoMo";
        // $cart = $cart->getTotalPrice();
        $cart = new Cart();
        $amount = (string) $cart->getTotalPrice();
        $orderid = time() . "";
        // trang sau khi thanh toan xong
        $returnUrl = "http://127.0.0.1:8000/postMomo?address=$address&phone=$phone&note=$note&status=$status";
        $notifyurl = "http://localhost:8000/atm/ipn_momo.php";
        // Lưu ý: link notifyUrl không phải là dạng localhost
        $bankCode = "SML";
        $requestId = time() . "";
        $requestType = "payWithMoMoATM";
        // dd(1);
        $extraData = "";
        //before sign HMAC SHA256 signature
        $rawHashArr = array(
            'partnerCode' => $partnerCode,
            'accessKey' => $accessKey,
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderid,
            'orderInfo' => $orderInfo,
            'bankCode' => $bankCode,
            'returnUrl' => $returnUrl,
            'notifyUrl' => $notifyurl,
            'extraData' => $extraData,
            'requestType' => $requestType,
        );
        // echo $serectkey;die;

        $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId=" . $requestId . "&bankCode=" . $bankCode . "&amount=" . $amount . "&orderId=" . $orderid . "&orderInfo=" . $orderInfo . "&returnUrl=" . $returnUrl . "&notifyUrl=" . $notifyurl . "&extraData=" . $extraData . "&requestType=" . $requestType;
        // tạo ra 1 mã
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        // dd($signature);
        // mang du lieu
        $data = array(
            'partnerCode' => $partnerCode,
            'accessKey' => $accessKey,
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderid,
            'orderInfo' => $orderInfo,
            'returnUrl' => $returnUrl,
            'bankCode' => $bankCode,
            'notifyUrl' => $notifyurl,
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature,
        );
        $result = $this->execPostRequest($endpoint, json_encode($data));
        // dd('result');
        $jsonResult = json_decode($result, true); // decode json
        error_log(print_r($jsonResult, true));
        // dd($jsonResult);
        return $jsonResult;
        // header('Location: ' . $jsonResult['payUrl']);
    }
 

    // THANH TOÁN MOMOQR
    public function paymentMomoQR(Request $req)
    {
        $address = $req->address;
        $phone = $req->phone;

        $status = $req->status;
        $note = $req->note;
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        $partnerCode = 'MOMO_ATM_DEV';
        $accessKey = 'w9gEg8bjA2AM2Cvr';
        $secretKey = 'mD9QAVi4cm9N844jh5Y2tqjWaaJoGVFM';
        // chuyển về trang thanh toán momo
        $orderInfo = "Thanh toán qua MoMo";

        //số tiền
        $cart = new Cart();
        $amount = $cart->getTotalPrice();
        // thời gian
        $orderId = time() . "";
        // trang sau khi thanh toán xong
        $redirectUrl = "http://127.0.0.1:8000/postMomo?address=$address&phone=$phone&note=$note&status=$status";
        $ipnUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
        $extraData = "";

        $requestId = time() . "";
        $requestType = "captureWallet";
        // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
        //before sign HMAC SHA256 signature
        // tạo mã
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        // tạo ra 1 mã
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        // mảng thông tin
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature,
        );
        // trả về trang thanh toán đổi $data thanh json
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true); // decode json
        return $jsonResult;
    }


    // khi ấn vào đặt hàng 
    public function paymentMomo(request $req)
    {
        if ($req->paymentType == 'atm') {
            $rs = $this->paymentMomoAtm($req);
            return redirect()->to($rs['payUrl']);
        }
        if ($req->paymentType == 'qr') {
            $rs = $this->paymentMomoQR($req);
            return redirect()->to($rs['payUrl']);
        }
    }


    // THÊM MỚI BẢNG ORDER VÀ ORDER DETAIL
    public function postMomo(Request $req, Cart $cart)
    {
        // dd($cart);
        if (isset($_GET['partnerCode'])) {
            $note = $req->note ? $req->note : '';
            // thêm mới order
            $order = Order::create([
                'user_id' => Auth::user()->id,
                'address' => $req->address,
                'phone' => $req->phone,
                'status' => $req->status,
                'note' => $note,
            ]);

            foreach ($cart->getItems() as $value) {
                // thêm mới orderDetail
                $OrderDetail = OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $value['id'],
                    'price' => $value['price'],
                    'quantity' => $value['quantity'],
                    'status' => $value['status'],

                ]);
            }
            // xóa session
            $cart->remove();
            return redirect()->route('user.checkOrder');
        }
    }
}
