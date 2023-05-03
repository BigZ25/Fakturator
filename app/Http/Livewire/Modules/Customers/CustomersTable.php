<?php

namespace App\Http\Livewire\Modules\Customers;

use App\Models\Modules\Customers\Customer;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class CustomersTable extends PowerGridComponent
{
    use ActionButton;

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Header::make()->showSearchInput(),
            Footer::make()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Customer::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('name')
            ->addColumn('nip')
            ->addColumn('full_address');
    }

    public function columns(): array
    {
        return [
            Column::make('Nazwa', 'name')
                ->sortable(),

            Column::make('NIP', 'nip')
                ->sortable(),

            Column::make('Pełny adres', 'full_address')
                ->sortable(),
        ];
    }

    public function header(): array
    {
        return [
            Button::add('delete')
                ->caption('Usuń zaznaczone')
                ->class(buttonClass('red'))
                ->icon('trash')
                ->emit('openDeleteModal', ['class' => Customer::class, 'ids' => $this->checkboxValues]),
        ];
    }

//    protected function getListeners()
//    {
//        return array_merge(
//            parent::getListeners(), [
//            'eventX',
//            'eventY',
//            'test',
//        ]);
//    }
//
//    public function test($ids)
//    {
//        dd($ids);
//    }

    public function actions(): array
    {
        return [
            Button::add('edit')
                ->caption('Edycja')
                ->class(buttonClass('amber'))
                ->icon('pencil')
                ->route('customers.edit', ['entity_id' => 'id'])
                ->target('_self'),

            Button::add('delete')
                ->caption('Usuń')
                ->class(buttonClass('red'))
                ->icon('trash')
                ->emit('openDeleteModal', ['class' => Customer::class, 'ids' => 'id']),
        ];
    }
}
