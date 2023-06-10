<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DocumentRequest;
use App\Libs\CountriesHelper\Countries;
use App\Libs\CountriesHelper\Languages;
use App\Models\Category;
use App\Models\Document;
use App\Models\Enums\TypeDocument;
use App\Service\CountPages;
use App\Service\MakePDF;
use App\Service\MakeText;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\BulkDeleteOperation;

/**
 * Class DocumentCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DocumentCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation {
        store as traitStore;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use BulkDeleteOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Document');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/document');
        $this->crud->setEntityNameStrings('document', 'documents');
        $this->crud->enableDetailsRow();
        $this->crud->enableBulkActions();

    }

    protected function setupListOperation()
    {
        $this->crud->addColumns([
            [
                'name' => 'id',
                'label' => '#',
                'type' => 'preview_file'
            ],
            [
                'name' => 'active',
                'label' => "Active",
                'type' => 'check',
                'orderable' => false,
            ],
            [
                'name' => 'is_public',
                'label' => "public",
                'type' => 'check',
                'orderable' => false,
            ],
            [
                'name' => 'title',
                'label' => 'title',
                'type' => 'text',
                'limit' => 20,
                'wrapper' => ['class' => 'text-truncate'],
            ],
            [
                'name' => 'page_number',
                'label' => 'Page number'
            ],
            [
                'name' => 'price',
                'label' => 'Price',
                'attributes' => ["step" => "any"], // allow decimals
                'suffix' => ".00",
            ],
            [
                'name' => 'type',
                'label' => 'Type',
                'type' => 'closure',
                'function' => function ($entry) {
                    $value = $entry->type;
                    return TypeDocument::getIcon($value);
                }
            ],
            [
                'name' => 'rating_count',
                'label' => 'Total rating'
            ],
            [
                'name' => 'viewed_count',
                'label' => 'Total view'
            ],
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(DocumentRequest::class);

        $this->crud->addField([
            'name' => 'active',
            'label' => "Active",
            'type' => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ]

        ]);

        $this->crud->addField([
            'name' => 'is_public',
            'label' => "public",
            'type' => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-11'
            ]
        ]);

        $this->crud->addField([
            'name' => 'title',
            'label' => "Title",
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ]
        ]);

        $this->crud->addField([
            'name' => 'source_url',
            'label' => "Source",
            'type' => 'upload',
            'upload' => true,
//            'disk' => 'public', // if you store files in the /public folder, please omit this; if you store them in /storage or S3, please specify it;
//            'path' => 'storage/pdftest',
//            'temporary' => 10, // if using a service, such as S3, that requires you to make temporary URLs this will make a URL that is valid for the number of minutes specified
//            'filename' => function ($file) {
//                return md5(uniqid()) . '.' . $file->getClientOriginalExtension();
//            },/college/
//            'prefix'    => 'pdftest/',
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ]
        ]);

        $this->crud->addField([
            'name' => 'category_id',
            'label' => "Category",
            'type' => 'select2',
            'entity' => 'categories',
            'attribute' => 'name',
            'model' => Category::class,
            'allows_null' => false,
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ]
        ]);


        $this->crud->addField([
            'name' => 'price',
            'label' => "Price",
            'type' => 'number',
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ]
        ]);
        $this->crud->addField([
            'name' => 'type',
            'label' => "Type",
            'type' => 'select_from_array',
            'options' => TypeDocument::toOptions(),
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ]
        ]);

        $this->crud->addField([
            'name' => 'language',
            'label' => "Language",
            'type' => 'select2_from_array',
            'options' => Languages::getOptions(),
            'allows_null' => false,
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ]
        ]);
        $this->crud->addField([
            'name' => 'country',
            'label' => "Country",
            'type' => 'select2_from_array',
            'options' => Countries::getOptions(),
            'allows_null' => false,
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ]
        ]);
    }

    protected function showDetailsRow($id)
    {
        dump(Document::findOrFail($id)->toArray());
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }


    /**
     * @throws \Exception
     */
    public function store()
    {
        // do something before validation, before save, before everything
        $response = $this->traitStore();
        $entryId = $this->data['entry']['id'];

        $document = Document::where('id', $entryId)->first();
        $file_upload = $response->getRequest()->file('source_url');
        $disk = "public";
        $destination_path = 'public/pdftest';
        $file_path = $file_upload->store($destination_path);
        $last_path = str_replace("public/", "", $file_path);
        // Format size
        $size = $file_upload->getSize();
        $formattedSize = $document->formatSizeUnits($size);

        $document->source_url = $last_path;
        $document->path = $last_path;
        $document->disks = $disk;
        $document->original_size = $size;
        $document->original_format = $formattedSize;
        $document->save();

        $document = MakePDF::makePdf($document);

        $total_page = CountPages::TotalPages($document);
        // Get fulltext
        $full_text = MakeText::makeText($document);
        // Generate description
        $description = MakeText::makeDescription($full_text);

        $document->page_number = $total_page;
        $document->full_text = $full_text;
        $document->description = $description;
        $document->save();

        return $response;

    }
}
