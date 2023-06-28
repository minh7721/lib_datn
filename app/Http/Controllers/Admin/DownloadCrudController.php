<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DownloadRequest;
use App\Models\Download;
use App\Models\FacebookUser;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

/**
 * Class DownloadCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DownloadCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Download');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/download');
        $this->crud->setEntityNameStrings('download', 'downloads');
    }

    protected function setupListOperation()
    {
        $this->crud->addColumns([
            [
                'name' => 'id',
                'label' => '#',
            ],
            [
                'name' => 'document_id',
                'label' => 'Document',
                'type' => 'closure',
                'function' => function ($entry) {
                    $document = Download::with('document')->where('id', $entry->id)->first()->document;
                    $title = substr($document->title, 0, 100);
                    return "[{$document->id}] {$title}";
                }
            ],
            [
                'name' => 'user_id',
                'label' => 'User',
                'type' => 'closure',
                'function' => function ($entry) {
                    $user = Download::with('user')->where('id', $entry->id)->first()->user;
                    return "[{$user->id}] {$user->name}";
                }
            ],
            [
                'name' => 'payload',
                'label' => 'Price {$}',
                'type' => 'closure',
//                'escaped' => false,
                'function' => function ($entry) {
                    return $entry->payload['price'] . " $";
                }
            ]
        ]);

        $this->crud->addFilter([
            'name' => 'filter_user_id',
            'type' => 'select2_ajax',
            'label' => 'User',
            'placeholder' => 'Pick a user'
        ],
            url('admin/ajax-user-options'), // the ajax route
            function ($value) {
                if ($value) { //Bug's backpack
                    $this->crud->with('user')->when($value, function (Builder $query, $value) {
                        return $query->whereHas('user', function (Builder $query) use ($value) {
                            $query->where('user_id', $value);
                        });
                    });
                }
            });
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(DownloadRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    public function userOptions(Request $request)
    {
        $term = $request->input('term');
        return User::where('name', 'like', '%' . $term . '%')->get()->pluck('name', 'id');
    }
}
