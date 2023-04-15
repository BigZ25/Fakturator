<?php

namespace App\Http\Livewire;

use App\Http\Livewire\BaseComponents\BaseFormComponent;
use App\Models\User;

class AccountSettingsForm extends BaseFormComponent
{
    public function mount()
    {
        $this->title = 'Ustawienia konta';
        $this->view_path = 'account_settings';
        $this->currentModule = 'account_settings';

        $user = User::find(auth()->id());

        $this->data = compact('user');
    }

    public function render()
    {
        return parent::render();
    }
}
