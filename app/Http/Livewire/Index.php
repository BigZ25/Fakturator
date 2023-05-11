<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Index extends Component
{
    public $view_path;
    public $title;
    public $data;
    public $activeModule;
    public $show;
    public $inject;
    public $breadcrumbs;

    public function boot()
    {
        $this->listeners['pageLoaded'] = 'pageLoaded';
    }

    public function render()
    {
        if ($this->inject) {
            return view($this->view_path, $this->data);
        }

        return view('template', [
            'path' => $this->view_path,
            'component_data' => $this->data,
            'title' => $this->title,
            'modules' => config('modules'),
        ])->extends('index')
            ->section('template');
    }

    public function openDeleteModal($class, $ids)
    {
        $this->emit('openDeleteModal', compact('class', 'ids'));
    }
}
