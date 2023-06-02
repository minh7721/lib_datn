<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index(){
        $documents = Document::with('categories')->where('active', true)->limit(10)->get();
        return view('frontend_v4.pages.home.index', compact('documents'));
    }
    public function view(Request $request, $slug){
        $document = Document::where('slug', $slug)->first();
        $pdf_path = $document->source_url;
        return view('frontend_v4.pages.document.detail', compact('pdf_path'));
    }

    public function search(Request $request){
        $documents = Document::where('active', true)->limit(10)->get();
        return view('frontend_v4.pages.search.search', compact('documents'));
    }
}
