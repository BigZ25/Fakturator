<?php

namespace App\Http\Livewire\Modules\Notifications;

use App\Classes\App\AppClass;
use App\Http\Livewire\BaseComponents\BaseIndexComponent;
use App\Models\BrowserNotification;

class NotificationsIndex extends BaseIndexComponent
{
    public $page_ids;
    public $all_ids;

    public function mount()
    {
        $this->title = 'Lista powiadomień';
        $this->view_path = 'modules.notifications.index';
        $this->currentModule = 'notifications';
    }

    protected $listeners = ['refreshNotificationsIndex' => 'render'];

    public function render()
    {
        $query = BrowserNotification::query()->where('user_id', '=', auth()->id());

        $notifications = $this->searchForm($query);

        $this->all_ids = $query->get()->pluck('id');
        $this->page_ids = $notifications->pluck('id');

        $this->data = compact('notifications');

        return parent::render();
    }

    public function markAsRead($id)
    {
        $notification = BrowserNotification::find($id);

        if ($notification) {
            $notification->update(['was_viewed' => 1]);

            AppClass::addMessage('Zaznaczono jako przeczytane');
        }
    }

    public function markAllAsRead()
    {
        $notifications = BrowserNotification::query()
            ->whereIn('id', $this->page_ids)
            ->get();

        foreach ($notifications as $notification) {
            $notification->update(['was_viewed' => 1]);
        }

        AppClass::addMessage('Zaznaczono wszystkie jako przeczytane');
    }

    public function deleteAll()
    {
        $notifications = BrowserNotification::query()
            ->whereIn('id', $this->all_ids)
            ->get();

        foreach ($notifications as $notification) {
            $notification->delete();
        }
    }

    public function deleteFromCurrentPage()
    {
        $notifications = BrowserNotification::query()
            ->whereIn('id', $this->page_ids)
            ->get();

        foreach ($notifications as $notification) {
            $notification->delete();
        }
    }

    public function refresh()
    {
        //
    }
}
