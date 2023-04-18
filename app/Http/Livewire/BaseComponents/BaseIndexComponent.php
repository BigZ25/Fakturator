<?php

namespace App\Http\Livewire\BaseComponents;

use App\Http\Livewire\Index;
use Livewire\Component;
use Livewire\WithPagination;

class BaseIndexComponent extends Index
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $checkboxes;
    public $forms;
    public $custom_forms;
    public $original_forms;
    public $lists;
    public $current_tab;
    public $sorting_col = 'id';
    public $sorting_direction = 'desc';
    public $active_button = 'cANDpMONTH';

    protected $listeners = ['selectAll' => 'selectAllCheckboxes', 'deselectAll' => 'deselectAllCheckboxes', 'clickActionButton' => 'doActionButton'];

    public function render()
    {
        return parent::render();
    }

    public function searchForm($items)
    {
        $tmp = clone $items;

        if (!empty($this->forms)) {

            foreach ($this->forms as $key => $form) {
                if ($form['value'] != null) {
                    if ($key == 'phrase') {
                        $form['value'] = '"%' . $form['value'] . '%"';
                    } elseif (is_string($form['value'])) {
                        $form['value'] = '"' . $form['value'] . '"';
                    }
                    $tmp->whereRaw($form['field'] . ' ' . $form['operator'] . ' ' . $form['value']);
                }
            }
        }

        if (!empty($this->custom_forms)) {

            foreach ($this->custom_forms as $key => $custom_form) {
                if ($custom_form['query'] != null) {
                    $tmp->whereRaw($custom_form['query']);
                }
            }
        }

        $model = $tmp->getModel();
        $fillable = $model->getFillable();
        $fillable[] = 'id';
        $fillable[] = 'created_at';

        if (!in_array($this->sorting_col, $fillable)) {
            $tmp = $tmp->orderByRaw($this->customSort())->paginate(config('app.pagination'));
        } else {
            $tmp = $tmp->orderBy($this->sorting_col, $this->sorting_direction)->paginate(config('app.pagination'));
        }

        if (count($tmp) < config('app.pagination')) {
            $this->resetPage();
        }

        return $tmp;
    }

    public function countNotViewedMessages($items)
    {
        $items = $items->get();

        $coutner = 0;

        foreach ($items as $item) {

            if ($item->viewed_messages < $item->total_messages) {
                $coutner++;
            }
        }

        return $coutner;
    }

    public function countNotViewedEntities($items)
    {
        $items = $items->get();

        $counter = 0;

        foreach ($items as $item) {
            if ($item->flags && $item->flags->was_viewed == 0) {
                $counter++;
            }
        }

        return $counter;
    }

    public function resetForm()
    {
        $this->active_button = 'cANDpMONTH';

        $this->forms = $this->original_forms;

        foreach ($this->custom_forms as $index => $custom_form) {
            $this->custom_forms[$index]['value'] = null;
        }

        $this->resetPage();
    }

    public function setTab($current_tab)
    {
        $this->current_tab = $current_tab;

        $this->resetPage();
    }

    public function clickCheckbox($index, $value)
    {
        $this->checkboxes[$index]['value'] = $value;
    }

    public function selectAllCheckboxes()
    {
        foreach ($this->checkboxes as $i => $checkbox) {
            $this->checkboxes[$i]['value'] = 1;
        }
    }

    public function deselectAllCheckboxes()
    {
        foreach ($this->checkboxes as $i => $checkbox) {
            $this->checkboxes[$i]['value'] = 0;
        }
    }

    public function doActionButton(string $type)
    {

    }

    public function setDir()
    {
        if ($this->sorting_direction === 'desc') {
            $this->sorting_direction = 'asc';
        } else {
            $this->sorting_direction = 'desc';
        }
    }

    public function sortBy($col)
    {
        if ($this->sorting_col === $col) {
            $this->sorting_direction = $this->sorting_direction === 'desc' ? 'asc' : 'desc';
        } else {
            $this->sorting_col = $col;
            $this->sorting_direction = 'desc';
        }
    }

    protected function customSort(): string
    {
        return "id " . $this->sorting_direction;
    }
}
