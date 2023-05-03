<?php

namespace App\Http\Livewire\BaseComponents;

use App\Models\Modules\Customers\Customer;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Footer, Header, PowerGrid, PowerGridComponent, Themes\ThemeBase};

class BaseIndexComponent extends PowerGridComponent
{
    use ActionButton;

    /**
     * @throws Exception
     */
    public function render(): Application|Factory|View
    {
        /** @var ThemeBase $themeBase */
        $themeBase = PowerGrid::theme($this->template() ?? powerGridTheme());

        $this->powerGridTheme = $themeBase->apply();

        $this->columns = collect($this->columns)->map(function ($column) {
            return (object) $column;
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
            'data'  => $data,
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
