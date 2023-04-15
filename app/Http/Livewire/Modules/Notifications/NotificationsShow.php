<?php

namespace App\Http\Livewire\Modules\Notifications;

use App\Classes\App\AppClass;
use App\Http\Livewire\BaseComponents\BaseShowComponent;
use App\Models\BrowserNotification;
use App\Models\Modules\Observations\Observation;

class NotificationsShow extends BaseShowComponent
{
    public function mount(int $entity_id)
    {
        $this->title = 'Podgląd powiadomienia';
        $this->view_path = 'modules.notifications.show';
        $this->currentModule = 'notifications';
        $this->entity_id = $entity_id;
    }

    public function render()
    {
        $this->data = ['notification' => BrowserNotification::find($this->entity_id)];

        return parent::render();
    }

    public function markAsRead()
    {
        $notification = BrowserNotification::find($this->entity_id);

        if ($notification) {
            $notification->update(['was_viewed' => 1]);

            AppClass::addMessage('Zaznaczono jako przeczytane');
        }
    }
}
