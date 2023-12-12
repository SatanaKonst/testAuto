<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CarRequest;
use App\Models\CarMark;
use App\Models\CarModel;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CarCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CarCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Car::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/car');
        CRUD::setEntityNameStrings('car', 'cars');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(CarRequest::class);
//        CRUD::setFromDb(); // set fields from db columns.

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
        CRUD::field([
            'name' => 'mark_id',
            'label' => "Марка",
            'type' => 'select_from_array',
            'options' => CarMark::getSelectVariant(),
            'allows_null' => false,
            'default' => '1',
        ]);
        CRUD::field([
            'name' => 'model_id',
            'label' => "Модель",
            'type' => 'select_from_array',
            'options' => CarModel::getSelectVariant(),
            'allows_null' => false,
            'default' => '1',
        ]);
        CRUD::field('year')->label('Год');
        CRUD::field([   // Color
            'name' => 'color',
            'label' => 'Цвет',
            'type' => 'color',
            'default' => '',
            'allows_null' => true,
        ]);
        CRUD::field('mileage')->label('Пробег');

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
