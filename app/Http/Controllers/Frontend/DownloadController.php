<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function download($id)
    {
        $document = Document::where('id', $id)->first();
        if ($document->price > 0){
            return redirect()->route('frontend_v4.payment.get');
        }
        $public_path = public_path('storage/'.$document->source_url);
        if (file_exists($public_path)) {
            $document->downloaded_count++;
            $document->save();
            return response()->download($public_path, $document->id.'.'.$document->type);
        } else {
            return response()->json(['error' => 'File not found.'], 404);
        }
    }
}
