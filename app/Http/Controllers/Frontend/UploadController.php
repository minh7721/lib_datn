<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentRequest;
use App\Models\Document;
use App\Service\MakePDF;
use App\Service\MakeText;
use Illuminate\Support\Facades\Session;


class UploadController extends Controller
{
    public function getUpload()
    {
        return view('frontend_v4.pages.upload.upload');
    }

    public function postUpload(DocumentRequest $request)
    {
        try {
            if ($file_upload = $request->file('source_url')) {
                $disk = "public";
                $destination_path = 'public/pdftest';
                $file_path = $file_upload->store($destination_path);
                $last_path = str_replace("public/", "", $file_path);
                $document = Document::create([
                    'title' => $request->title,
                    'category_id' => $request->category,
                    'page_number' => $request->page_number,
                    'price' => $request->price,
                    'type' => $request->type_document,
                    'disks' => $disk,
                    'source_url' => $last_path,
                    'path' => $last_path,
                    'language' => $request->language,
                    'country' => $request->country,
                    'active' => true,
                    'is_public' => true,
                    'is_approved' => 1,
                    'can_download' => true
                ]);
                $document = MakePDF::makePdf($document);
                // Format size
                $size = $file_upload->getSize();

                $formattedSize = $document->formatSizeUnits($size);

                // Get fulltext
                $full_text = MakeText::makeText($document);
                // Generate description
                $description = MakeText::makeDescription($full_text);

                $document->update([
                    'original_size' => $size,
                    'original_format' => $formattedSize,
                    'full_text' => $full_text,
                    'description' => $description,
                ]);

                Session::flash('success', 'Upload success');
                return redirect()->back();
            } else {
                Session::flash('error', 'You have not selected a document');
                return redirect()->back();
            }

        } catch (\Exception $err) {
            Session::flash('error', 'Upload failed!!!');
            return redirect()->back();
        }
    }
}
