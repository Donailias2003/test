<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PartitaRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
/**
 * Class PartitaCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PartitaCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Partita::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/partita');
        CRUD::setEntityNameStrings('partita', 'partitas');
        CRUD::denyAccess('show');
        //CRUD::denyAccess('update');
        if (!backpack_user()->hasPermissionTo('Gestione Partite')) {
            CRUD::denyAccess('delete');
        }
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        
        $this->crud->setColumns(['casa', 'trasferta','campo','punti_casa','punti_trasferta']);

    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation([
            'casa' => 'required|min:3',
            'trasferta' => 'required|min:5',
            'campo' => 'required|min:5',
            'data_partita' => 'required',
            'torneo_id' => 'required',
       ]);

       CRUD::addField([
            'name' => 'casa',
            'type' => 'text',
            'label' => "Squadra di casa"
        ]);
        CRUD::addField([
            'name' => 'trasferta',
            'type' => 'text',
            'label' => "Squadra ospite"
        ]);
        CRUD::addField([
            'name' => 'campo',
            'type' => 'text',
            'label' => "Campo della partita"
        ]);
        CRUD::addField(['name' => 'data_partita','type' => 'datetime','label' => "Data della partita"]);
        CRUD::addField([
            'label' => "Torneo della partita",
            'type' => 'select',
            'name' => 'torneo_id', // the method that defines the relationship in your Model
            'entity' => 'torneo', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
        ]);
        CRUD::addField([
            'name' => 'terminata',
            'type' => 'boolean',
            'label' => "Partita terminata"
        ]);
        

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
