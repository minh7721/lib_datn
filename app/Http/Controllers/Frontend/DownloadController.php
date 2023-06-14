<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Download;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function download($id, $slug)
    {
        $document = Document::where('id', $id)
            ->where('slug', $slug)
            ->first();
        if ($document->price > 0){
            return redirect()->route('frontend_v4.payment.get');
        }
        $public_path = public_path('storage/'.$document->source_url);
        $user_id = \Auth::id() ?? 1;
        $price = $document->price;
        if (file_exists($public_path)) {
            Download::create([
                'user_id' => $user_id,
                'document_id' => $id,
                'payload' => [
                    'price' => $price
                ]
            ]);
            $document->downloaded_count++;
            $document->save();
            return response()->download($public_path, $document->id.'.'.$document->type);
        } else {
            return response()->json(['error' => 'File not found.'], 404);
        }
    }
}
