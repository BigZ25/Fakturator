<?php

namespace App\Http\Livewire\Modules\Adverts;

use App\Enum\Modules\Adverts\AdvertCategoriesEnum;
use App\Enum\Modules\Adverts\AdvertOperationsEnum;
use App\Http\Livewire\BaseComponents\BaseShowComponent;
use App\Models\Modules\Adverts\Advert;
use App\Models\Modules\Adverts\AdvertPhoto;
use App\Services\Modules\AdvertsService;
use Illuminate\Support\Facades\Artisan;
use WireUi\Traits\Actions;

class AdvertsShow extends BaseShowComponent
{
    use Actions;

    public $photoShowModalUrl;
    public $photoShowModal;
    public $category_tmp;
    public $deleteSingleModal;
    public $addToOlxSingleModal;

    public function mount(int $entity_id)
    {
        $this->title = 'Podgląd ogłoszenia';
        $this->view_path = 'modules.adverts.show';
        $this->currentModule = 'adverts';
        $this->entity_id = $entity_id;
        $this->photoShowModal = false;
        $this->deleteSingleModal = false;
        $this->addToOlxSingleModal = false;
        $this->category_tmp = AdvertCategoriesEnum::ANTIQUES_AND_COLLECTIONS_OTHER_COLLECTIONS;

        Artisan::call('adverts:update_olx_status', [
            'id' => $entity_id,
        ]);
    }

    public function render()
    {
        $this->data = ['advert' => Advert::find($this->entity_id)];

        return parent::render();
    }

    public function openPhotoShowModal(int $photoId)
    {
        $photo = AdvertPhoto::find($photoId);

        $this->photoShowModalUrl = route('adverts.photos.show', [$photo->advert_id, $photo->id]);
        $this->photoShowModal = true;
    }

    public function addToOlx($id)
    {
        AdvertsService::addToQueue($id, AdvertOperationsEnum::ADD_TO_OLX, ['category' => $this->category_tmp]);

        return redirect(request()->header('Referer'));
    }

    public function openDeleteSingleModal($advertId)
    {
        $this->deleteSingleModal = true;
    }

    public function openAddToOlxSingleModal($advertId)
    {
        $this->addToOlxSingleModal = true;
    }
}
