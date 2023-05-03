<?php

namespace App\Http\Livewire\Modules\Customers;

use App\Http\Livewire\BaseComponents\BaseIndexComponent;
use App\Models\Modules\Customers\Customer;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, PowerGrid, PowerGridEloquent};

class CustomersIndex extends BaseIndexComponent
{
    use ActionButton;

    public function mount(): void
    {
        parent::mount();

        $this->title = 'Lista klientów';
        $this->currentModule = 'customers';
    }

    public function datasource(): Builder
    {
        return Customer::query();
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
                ->sortable()
                ->searchable(),

            Column::make('NIP', 'nip')
                ->sortable()
                ->searchable(),

            Column::make('Pełny adres', 'full_address')
                ->sortable()
                ->searchable(),
        ];
    }

    public function header(): array
    {
        $actions = [
            Button::add('delete')
                ->caption('Dodaj klienta')
                ->class(buttonClass('positive'))
                ->icon('plus')
                ->route('customers.create', [])
                ->target('_self'),
        ];

        return array_merge($actions, parent::header());
    }

    public function actions(): array
    {
        return parent::actions();
    }
}
