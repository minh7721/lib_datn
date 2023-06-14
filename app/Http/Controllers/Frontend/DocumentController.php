<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Document;
use App\Service\VNPayService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::with('categories')
            ->where('active', true)
            ->where('is_public', true)
            ->where('page_number', "<=", 200)
            ->orderByDesc('created_at')
            ->limit(9)
            ->get();

        $top_documents = Document::with('categories')
            ->where('active', true)
            ->where('is_public', true)
            ->orderByDesc('viewed_count')
            ->limit(20)
            ->get();

        $categories = Category::all();

        return view('frontend_v4.pages.home.index', compact('documents', 'top_documents', 'categories'));
    }

    public function view(Request $request, $slug)
    {
        $document = Document::where('slug', $slug)
            ->first();
        if (!$document) {
            $document = Document::where('id', 1)
                ->where('active', true)
                ->where('is_public', true)
                ->first();
        }
        $document->viewed_count++;
        $document->save();
        return view('frontend_v4.pages.document.detail', compact('document'));
    }

    public function search(Request $request)
    {
        $documents = Document::where('active', true)->limit(10)->get();
        return view('frontend_v4.pages.search.search', compact('documents'));
    }

    public function like(Request $request, $slug)
    {
        $document = Document::where('slug', $slug)
            ->first();
        $currentTime = strtotime(Carbon::now()->toTimeString());
        $lastHelpfulTime = strtotime(Carbon::parse($document->updated_at)->toTimeString());
        $timeDiff = $currentTime - $lastHelpfulTime;
//        if ($timeDiff >= 60){
        $document->helpful_count++;
        $document->save();
//            }
        return redirect()->back();
    }

    public function dislike(Request $request, $slug)
    {
        $document = Document::where('slug', $slug)
            ->first();
        $currentTime = Carbon::now();
        $lastHelpfulTime = Carbon::parse($document->updated_at);
        $timeDiff = $currentTime->diffInMinutes($lastHelpfulTime);
//        if ($timeDiff >= 1) {
            $document->unhelpful_count++;
            $document->save();
//        }
        return redirect()->back();
    }

    public function VNPayRedirectPayment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'price' => 'required|numeric|min:10000|max:10000000',
        ]);


        if ($validator->fails()) {
            Session::flash('error', 'Min price is 10000 and max is 10000000');
            return redirect()->back();
        }
        $vnpay_service = VNPayService::create($request->price);
        return redirect($vnpay_service);
    }

    public function VNPayGetResponse()
    {
        $vnpay_service = VNPayService::response();
        if ($vnpay_service) {
            Session::flash('success', 'Recharge successful');
            return redirect()->route('document.home.index');
        }
        Session::flash('error', 'Minimum amount is 10.000 VND and maximum amount is 10.000.000 VND');
        return redirect()->route('document.home.index');
    }

}
