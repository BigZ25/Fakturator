<?php

namespace App\Http\Livewire\Modules\Products;

use App\Http\Livewire\BaseComponents\BaseIndexComponent;
use App\Models\Modules\Products\Product;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;

class ProductsIndex extends BaseIndexComponent
{
    public function mount(): void
    {
        parent::mount();

        $this->title = 'Lista produktów';
        $this->box_title = 'Produkty';
        $this->currentModule = 'products';
        $this->editRoute = 'products.edit';
        $this->showRoute = 'products.show';
        $this->customColumns = [
            'netto' => Product::nettoRaw(),
            'vat_type_name' => Product::vatTypeNameRaw(),
            'vat' => Product::vatRaw(),
            'brutto' => Product::bruttoRaw(),
        ];
    }

    public function datasource(): Builder
    {
        return $this->customDatasource(Product::query()->where('user_id', '=', auth()->user()->id));
    }

    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('name')
            ->addColumn('netto')
            ->addColumn('vat_type_name')
            ->addColumn('vat')
            ->addColumn('brutto');
    }

    public function columns(): array
    {
        return [
            Column::make('Nazwa', 'name')
                ->searchable()
                ->sortable(),
            Column::make('Cena netto', 'netto')
                ->searchable()
                ->sortable(),
            Column::make('Stawka VAT', 'vat_type_name')
                ->searchable()
                ->sortable(),
            Column::make('Kwota VAT', 'vat')
                ->searchable()
                ->sortable(),
            Column::make('Cena brutto', 'brutto')
                ->searchable()
                ->sortable(),
        ];
    }

    public function header(): array
    {
        $actions = [
            Button::add('delete')
                ->caption('Dodaj produkt')
                ->class(buttonClass('positive'))
                ->icon('plus')
                ->route('products.create', [])
                ->target('_self'),
        ];

        return array_merge($actions, parent::header());
    }

    public function actions(): array
    {
        return parent::actions();
    }
}
