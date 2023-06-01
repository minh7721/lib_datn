<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function view(Request $request, $filename){
        $pdf_path = 'storage/pdffile/'.$filename;
        return view('frontend_v4.pages.document.detail', compact('pdf_path'));
    }
}
