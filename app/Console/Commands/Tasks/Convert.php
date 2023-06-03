<?php

namespace App\Console\Commands\Tasks;

use App\DocumentProcess\Builder;
use App\Libs\Nlp\Description\TextRankGenerator;
use App\Models\Document;
use Illuminate\Console\Command;

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

        if ($force){
            $documents = Document::all();
        }
        else{
            $documents = Document::where('full_text', null)->get();
        }
        foreach ($documents as $document){
            $this->makeText($document);
            $this->info("Get fulltext of {$document->id} success");
        }
        return self::SUCCESS;
    }

    protected function makeText(Document $document) {
//        if($document->full_text){
//            return;
//        }
        try {
            $fulltext = $this->makeTextV2($document);
        } catch (\Exception $exception) {
            $this->error("\tConvert fulltext error : " . $exception->getMessage());
        }

        /** Create Description */
        $generator = TextRankGenerator::fromDSFullText($fulltext);
        $description = $generator->getDescription();
        dd($description);
        $document->description = mb_substr($description, 0, 186) . "[r]";

        /** Save fulltext to $document->fulltext */
        $document->update([
            'full_text' => $fulltext
        ]);

    }

    protected function makeTextV2(Document $document) {
        $document_process = Builder::fromDocument($document)->get();
        return $document_process->makeFulltext();
    }
}
