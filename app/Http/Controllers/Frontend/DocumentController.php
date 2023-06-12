<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Service\VNPayService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index(){
        $documents = Document::with('categories')
            ->where('active', true)
            ->where('is_public', true)
            ->orderByDesc('created_at')
            ->limit(9)
            ->get();

        $top_documents = Document::with('categories')
            ->where('active', true)
            ->where('is_public', true)
            ->orderByDesc('created_at')
            ->limit(20)
            ->get();

        return view('frontend_v4.pages.home.index', compact('documents', 'top_documents'));
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
        $document->viewed_count++;
        $document->save();
        return view('frontend_v4.pages.document.detail', compact('document'));
    }

    public function search(Request $request){
        $documents = Document::where('active', true)->limit(10)->get();
        return view('frontend_v4.pages.search.search', compact('documents'));
    }

    public function like(Request $request, $slug, $action){
        $document = Document::where('slug', $slug)
            ->first();
        $currentTime = Carbon::now();
        $lastHelpfulTime = Carbon::parse($document->updated_at);
        $timeDiff = $currentTime->diffInMinutes($lastHelpfulTime);
        if ($timeDiff >= 5){
            if ($action == 'like'){
                $document->helpful_count++;
            }
            if ($action == 'unlike'){
                $document->helpful_count--;
            }
            $document->save();
        }
        return redirect()->back();
    }

    public function dislike(Request $request, $slug){

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
