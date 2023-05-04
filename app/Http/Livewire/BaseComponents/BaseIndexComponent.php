<?php

namespace App\Http\Livewire\BaseComponents;

use App\Models\Modules\Customers\Customer;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Footer, Header, PowerGrid, PowerGridComponent, Themes\ThemeBase};

class BaseIndexComponent extends PowerGridComponent
{
    use ActionButton;

    public $editRoute = null;
    public $showRoute = null;
    public $box_title;
    public $customColumns = [];

    /**
     * @throws Exception
     */
    public function render(): Application|Factory|View
    {
        /** @var ThemeBase $themeBase */
        $themeBase = PowerGrid::theme($this->template() ?? powerGridTheme());

        $this->powerGridTheme = $themeBase->apply();

        $this->columns = collect($this->columns)->map(function ($column) {
            return (object)$column;
        })->toArray();

        $this->relationSearch = $this->relationSearch();

        $data = $this->fillData();

        if (method_exists($this, 'initActions')) {
            $this->initActions();
            if (method_exists($this, 'header')) {
                $this->headers = $this->header();
            }
        }

        /** @phpstan-ignore-next-line */
        $this->totalCurrentPage = method_exists($data, 'items') ? count($data->items()) : $data->count();

        return $this->renderView($data);
    }

    private function renderView(mixed $data): Application|Factory|View
    {
        return view('template', [
            'path' => $this->powerGridTheme->layout->table,
            'data' => $data,
            'theme' => $this->powerGridTheme,
            'table' => 'livewire-powergrid::components.table',
        ])->extends('index')
            ->section('template');
    }

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Header::make()->showSearchInput(),
            Footer::make()
                ->showRecordCount(),
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

    public function actions(): array
    {
        $actions = [];

        if ($this->showRoute !== null) {
            $actions[] = Button::add('edit')
                ->caption('Szczegóły')
                ->class(buttonClass('info'))
                ->icon('document-text')
                ->route($this->showRoute, ['entity_id' => 'id'])
                ->target('_self');
        }

        if ($this->editRoute !== null) {
            $actions[] = Button::add('edit')
                ->caption('Edycja')
                ->class(buttonClass('amber'))
                ->icon('pencil')
                ->route($this->editRoute, ['entity_id' => 'id'])
                ->target('_self');
        }

        $actions[] = Button::add('delete')
            ->caption('Usuń')
            ->class(buttonClass('red'))
            ->icon('trash')
            ->emit('openDeleteModal', ['class' => $this->datasource()->getModel()::class, 'ids' => 'id']);

        return $actions;
    }

    protected function customDatasource($query)
    {
        $columns[] = DB::raw('*');

        foreach ($this->customColumns as $as => $customColumn) {
            $columns[] = DB::raw($customColumn . " AS " . $as);
        }

        return $query->select($columns);
    }
}
