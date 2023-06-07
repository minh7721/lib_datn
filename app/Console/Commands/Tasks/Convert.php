<?php

namespace App\Console\Commands\Tasks;

use App\DocumentProcess\Builder;
use App\DocumentProcess\Converter\DocumentConverter;
use App\Libs\MakePath;
use App\Libs\Nlp\Description\TextRankGenerator;
use App\Models\Document;
use App\Models\Enums\TypeDocument;
use Illuminate\Console\Command;

/**
 * @property DocumentConverter $convertor
 */
class Convert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:convert
    {--f|force : Force to reconvert}

    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get fulltext document';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $force = $this->option('force');

        $this->convertor = new DocumentConverter();

        if ($force) {
            $documents = Document::all();
//            $documents = Document::where('id', 6)->get();
        } else {
            $documents = Document::where('full_text', null)->get();
        }
        foreach ($documents as $document) {
            try {
                $this->makePdf($document);
                $this->makeText($document);
                $this->info("Get fulltext of {$document->id} success");
            }
            catch (\Exception $err){
                continue;
            }
        }
        return self::SUCCESS;
    }


    protected function makePdf(Document $document)
    {
//        if ($document->source_url) {
//            return;
//        }

//        if (!$document->original_file && !$document->pdf) {
//            throw new \Exception("No original file when make pdf for document " . $document->id);
//        }

        $path = $document->source_url;
        $original_file = \Storage::disk('public')->get($path);
        if ($document->source_url) {
            $pdf_content = $this->convertor->convert(
                content: $original_file,
                input_format: $document->type,
                output_format: 'pdf',
            );
        } else {
            $pdf_content = $original_file;
        }
        $path =  'pdf_maked/'.MakePath::make($document->id, '') . ".pdf.pdf";
        $saved = \Storage::disk('public')->put($path, $pdf_content);

        if($saved){
           $document->update([
               'path' => $path
           ]);
        }
        else{
            $this->error("Can not save file");
        }
//        $preview_max_pages = 20;
//        $min_diff_page_count = 5;
//
//        if ($document->pages < $preview_max_pages + $min_diff_page_count
//            || ($document->preview)) {
//            return;
//        }
//        $preview_content = $this->convertor->convert(
//            content: $pdf_content,
//            input_format: 'pdf',
//            output_format: 'pdf',
//            options: ['first_page' => 1, 'last_page' => $preview_max_pages]
//        );
    }

    protected function makeText(Document $document)
    {
//        if ($document->full_text && $document->description) {
//            return;
//        }
        try {
            $fulltext = $this->makeTextV2($document);
            dump($fulltext);
        } catch (\Exception $exception) {
            $this->error("\tConvert fulltext error : " . $exception->getMessage());
        }

        dump("Done full-text");
        /** Create Description */
        $generator = TextRankGenerator::fromDSFullText($fulltext);
        $description = $generator->getDescription();
        $description = mb_substr($description, 0, 186) . "[r]";

        dump("Done description: {$description}");
        /** Save fulltext to $document->fulltext */
        $document->update([
            'full_text' => $fulltext,
            'description' => $description
        ]);

    }

    protected function makeTextV2(Document $document)
    {
        $document_process = Builder::fromDocument($document)->get();
        return $document_process->makeFulltext();
    }
}
