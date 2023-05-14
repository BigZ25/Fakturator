<?php

namespace App\Http\Livewire\Modules\Invoices;

use App\Http\Livewire\BaseComponents\BaseIndexComponent;
use App\Models\Modules\Invoices\Invoice;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;

class InvoicesIndex extends BaseIndexComponent
{
    public function mount(): void
    {
        parent::mount();

        $this->title = 'Lista faktur';
        $this->box_title = 'Faktury';
        $this->currentModule = 'invoices';
        $this->editRoute = 'invoices.edit';
        $this->showRoute = 'invoices.show';
    }

    public function datasource(): Builder
    {
        return Invoice::query();
    }

    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('number')
            ->addColumn('issue_date');
    }

    public function columns(): array
    {
        return [
            Column::make('Numer', 'number')
                ->searchable()
                ->sortable(),

            Column::make('Data wystawienia', 'issue_date')
                ->searchable()
                ->sortable(),
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
        $actions = parent::actions();
        $actions[] =
            Button::add('downloadPdf')
                ->caption('Pobierz PDF')
                ->class(buttonClass('indigo'))
                ->icon('document-download')
                ->route('invoices.pdf', ['id'])
                ->target('_blank');

        $actions[] =
            Button::add('copy')
                ->caption('Wystaw podobną')
                ->class(buttonClass('cyan'))
                ->icon('document-duplicate')
                ->route('invoices.copy', ['id'])
                ->target('_self');

        $actions[] =
            Button::add('correction')
                ->caption('Wystaw korektę')
                ->class(buttonClass('stone'))
                ->icon('document-add')
                ->route('invoices.correction', ['id'])
                ->target('_self')
                ->canIf('have_correction', '=', false);

        $actions[] = Button::add('correction')
            ->caption('Zobacz korektę')
            ->class(buttonClass('sky'))
            ->icon('document')
            ->route('invoices.show', ['correction_invoice_id'])
            ->target('_self')
            ->canIf('have_correction', '=', true);

        return $actions;
    }
}
