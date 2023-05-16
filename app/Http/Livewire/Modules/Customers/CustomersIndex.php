<?php

namespace App\Http\Livewire\Modules\Customers;

use App\Http\Livewire\BaseComponents\BaseIndexComponent;
use App\Models\Modules\Customers\Customer;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\{Button, Column, PowerGrid, PowerGridEloquent};
use Illuminate\Support\Facades\DB;

class CustomersIndex extends BaseIndexComponent
{
    public function mount(): void
    {
        parent::mount();

        $this->title = 'Lista klientów';
        $this->box_title = 'Klienci';
        $this->currentModule = 'customers';
        $this->editRoute = 'customers.edit';
        $this->showRoute = 'customers.show';
        $this->customColumns = [
            'full_address' => Customer::fullAddressRaw(),
        ];
    }

    public function datasource(): Builder
    {
        return $this->customDatasource(Customer::query()->where('user_id', '=', auth()->user()->id));
    }

    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('name')
            ->addColumn('nip')
            ->addColumn('full_address');
    }

    /**
     * @return string
     */
    public function getSortField(): string
    {
        return $this->sortField;
    }

    public function columns(): array
    {
        return [
            Column::make('Nazwa', 'name')
                ->searchable()
                ->sortable(),

            Column::make('NIP', 'nip')
                ->searchable()
                ->sortable(),

            Column::make('Pełny adres', 'full_address')
                ->searchableRaw(DB::raw(Customer::fullAddressRaw()))
                ->sortable(),
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
