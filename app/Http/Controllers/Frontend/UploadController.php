<?php

namespace App\Http\Controllers\Frontend;

use App\DocumentProcess\Builder;
use App\DocumentProcess\Converter\DocumentConverter;
use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentRequest;
use App\Libs\MakePath;
use App\Libs\Nlp\Description\TextRankGenerator;
use App\Models\Document;
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
            if ($file_upload = $request->file('file_upload')) {
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
                $document = $this->makePdf($document);
                // Format size
                $size = $file_upload->getSize();

                $formattedSize = $document->formatSizeUnits($size);

                // Get fulltext
                $document_process = Builder::fromDocument($document)->get();
                $full_text = $document_process->makeFulltext();

                // Generate description
                $generator = TextRankGenerator::fromDSFullText($full_text);
                $description = $generator->getDescription();
                $description = mb_substr($description, 0, 186) . "[r]";

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

    protected function makePdf(Document $document)
    {
        $path = $document->source_url ?? $document->path;
        $original_file = \Storage::disk('public')->get($path);
        $convertor = new DocumentConverter();
        if ($path) {
            $pdf_content = $convertor->convert(
                content: $original_file,
                input_format: $document->type,
                output_format: 'pdf',
            );
        } else {
            $pdf_content = $original_file;
        }
        $path = 'pdf_maked/' . MakePath::make($document->id, '') . ".pdf.pdf";
        $saved = \Storage::disk('public')->put($path, $pdf_content);

        if ($saved) {
            $document->update([
                'path' => $path
            ]);
        }
        return $document;
    }
}
