<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Service\VNPayService;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index(){
        $documents = Document::with('categories')->where('active', true)->orderByDesc('created_at')->limit(9)->get();
        return view('frontend_v4.pages.home.index', compact('documents'));
    }
    public function view(Request $request, $slug){
        $document = Document::where('slug', $slug)
            ->where('active', true)
            ->where('is_public', true)
            ->first();

        if (!$document){
            $document = Document::where('id', 1)
                ->where('active', true)
                ->first();
        }
        return view('frontend_v4.pages.document.detail', compact('document'));
    }

    public function search(Request $request){
        $documents = Document::where('active', true)->limit(10)->get();
        return view('frontend_v4.pages.search.search', compact('documents'));
    }


    public function VNPayRedirectPayment(){
        $vnpay_service = VNPayService::create();
        return redirect($vnpay_service);
//        $response = VNPayService::response();
    }

    public function VNPayGetResponse(){
        dump($_GET);
        $vnpay_service = VNPayService::response();
        dd($vnpay_service);
    }
}
