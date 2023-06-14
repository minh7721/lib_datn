<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Service\VNPayService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function getPayment(){

        return view('frontend_v4.pages.payment.payment');
    }

    public function postPayment(){
        dd(1);
    }

    public function VNPayRedirectPayment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'price' => 'required|numeric|min:10000|max:10000000',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->with('jsAlert', 'Minimum amount is 10.000 VND and maximum amount is 10.000.000 VND');
        }
        $vnpay_service = VNPayService::create($request->price);
        return redirect($vnpay_service);
    }

    public function VNPayGetResponse()
    {
        $vnpay_service = VNPayService::response();
        if ($vnpay_service) {
            return redirect()->route('document.home.index')->with('jsAlert', 'Payment success');
        }
        return redirect()->route('document.home.index')->with('jsAlert', 'Transaction failed, please try again');
    }
}
