<?php

namespace App\Service;

use App\Models\Enums\SourcePayment;
use App\Models\Payment;
use App\Models\User;

class VNPayService
{
    public static function create($price)
    {
        $vnp_TmnCode = config('paymnet_service.vnpay.vnp_TmnCode'); //Mã website tại VNPAY
        $vnp_HashSecret = config('paymnet_service.vnpay.vnp_HashSecret'); //Chuỗi bí mật
        $vnp_Url = config('paymnet_service.vnpay.vnp_Url');
        $vnp_Returnurl = route('frontend_v4.getVNPay');
        $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng
        $vnp_OrderInfo = "Thanh toan qua hoa don qua VNPay";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $price * 100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        return $vnp_Url;
    }

    public static function response()
    {
        if (!empty($_GET)) {
            $vnp_HashSecret = config('paymnet_service.vnpay.vnp_HashSecret');
            $vnp_SecureHash = $_GET['vnp_SecureHash'];
            $inputData = array();
            foreach ($_GET as $key => $value) {
                if (substr($key, 0, 4) == "vnp_") {
                    $inputData[$key] = $value;
                }
            }

            unset($inputData['vnp_SecureHash']);
            ksort($inputData);
            $i = 0;
            $hashData = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
            }
            $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

            if ($secureHash == $vnp_SecureHash) {
                self::insert($inputData);
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    protected static function insert($inputData)
    {
            if (!Payment::where('trading_code', $inputData['vnp_TransactionNo'])->first()){
                if ($inputData['vnp_TransactionStatus'] == 0){
                    $status = 1;
                }else{
                    $status = 0;
                }
                $price_output = ceil($inputData['vnp_Amount']/100);
                Payment::create([
                    'user_id' => \Auth::id() ?? 1,
                    'status' => $status,
                    'price' => $price_output,
                    'trading_code' => $inputData['vnp_TransactionNo'],
                    'transaction_id' => $inputData['vnp_TxnRef'],
                    'message' => $inputData['vnp_OrderInfo'],
                    'source' => SourcePayment::VNPAY
                ]);

                $user = User::where('id', \Auth::id())->first();
                $money = $price_output + $user->money;
                $user->update([
                    'money' =>  $money
                ]);
            }
    }
}
