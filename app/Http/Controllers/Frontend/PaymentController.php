<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function getPayment(){
        return view('frontend_v4.pages.payment.payment');
    }

    public function postPayment(){
        dd(1);
    }
}
