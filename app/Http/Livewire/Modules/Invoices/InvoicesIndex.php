<?php

namespace App\Http\Livewire\Modules\Invoices;

use App\Http\Livewire\BaseComponents\BaseIndexComponent;
use App\Models\Modules\Invoices\Invoice;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;

class InvoicesIndex extends BaseIndexComponent
{
    use ActionButton;

    public function mount(): void
    {
        parent::mount();

        $this->title = 'Lista faktur';
        $this->currentModule = 'invoices';
    }

    public function datasource(): Builder
    {
        return Invoice::query();
    }

    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
//            ->addColumn('name')
//            ->addColumn('nip')
            ->addColumn('number');
    }

    public function columns(): array
    {
        return [
            Column::make('Numer', 'number')
                ->sortable(),
//
//            Column::make('NIP', 'nip')
//                ->sortable(),
//
//            Column::make('Pełny adres', 'full_address')
//                ->sortable(),
        ];
    }

    public function header(): array
    {
        $actions = [
            Button::add('delete')
                ->caption('Dodaj fakturę')
                ->class(buttonClass('positive'))
                ->icon('plus')
                ->route('invoices.create', [])
                ->target('_self'),
        ];

        return array_merge($actions, parent::header());
    }

    public function actions(): array
    {
        return parent::actions();
    }

//    public $item;
//    public $deleteSingleModal;
//    public $addToOlxSingleModal;
//    public $category_tmp;
//
//    public function mount()
//    {
//        $this->title = 'Lista faktur';
//        $this->view_path = 'modules.invoices.index';
//        $this->currentModule = 'invoices';
//        $this->item = null;
////        $this->deleteSingleModal = false;
////        $this->addToOlxSingleModal = false;
////        $this->category_tmp = InvoiceCategoriesEnum::ANTIQUES_AND_COLLECTIONS_OTHER_COLLECTIONS;
//
////        $this->lists = [
////            'statuses' => InvoiceStatusesEnum::getSelectList(),
////            'olx_statuses' => InvoiceOlxStatusesEnum::getSelectList(),
////            'categories' => InvoiceCategoriesEnum::getSelectList(),
////        ];
//
////        $this->forms = [
////            'phrase' => ['field' => Invoice::searchField(), 'operator' => 'like', 'value' => null],
////            'status' => ['field' => 'status', 'operator' => '=', 'value' => null],
////            'olx_status' => ['field' => 'olx_status', 'operator' => '=', 'value' => null],
////        ];
//
//        $this->original_forms = $this->forms;
//    }
//
//    public function render()
//    {
//        $invoices = $this->searchForm(Invoice::query()->where('user_id', '=', auth()->user()->id));
//
//        $i = 0;
//
//        foreach ($invoices as $invoice) {
//            $this->checkboxes[$i]['model'] = class_basename($invoice);
//            $this->checkboxes[$i]['db_id'] = $invoice->id;
//
//            $i++;
//        }
//
//        $this->data = compact('invoices');
//
//        return parent::render();
//    }
//
//    public function openDeleteSingleModal($invoiceId)
//    {
//        $this->item = Invoice::find($invoiceId);
//        $this->deleteSingleModal = true;
//    }
//
//    public function openAddToOlxSingleModal($invoiceId)
//    {
//        $this->item = Invoice::find($invoiceId);
//        $this->addToOlxSingleModal = true;
//    }
//
//    protected function customSort(): string
//    {
//        if ($this->sorting_col === 'full_name_with_item_number') {
//            return "(SELECT CONCAT(IF(production_number IS NULL,CONCAT('Funko Pop ',production,' ',name),CONCAT('Funko Pop ',production,' ',production_number,' ',name)),' #',item_number) FROM invoices adv WHERE adv.id=invoices.id) " . $this->sorting_direction;
//            //return $this->full_name . ' #' . $this->item_number;
////            if ($this->production_number === null) {
////                return 'Funko Pop ' . $this->production . ' ' . $this->name;
////            }
////
////            return 'Funko Pop ' . $this->production . ' ' . $this->production_number . ' ' . $this->name;
//        }
//
//        return parent::customSort();
//    }
}
