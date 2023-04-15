<div class="pb-3">
    <x-card title="Zdjęcia" color="bg-white" rounded="rounded-sm" cardClasses="card-body">
        @if($advert->photos()->count() > 0)
            <div>
                @foreach($advert->photos()->get() as $photo)
                    <img class="img-thumbnail inline-block" src="{{route('adverts.photos.show',[$photo->advert_id,$photo->id])}}" wire:click="openPhotoShowModal({{$photo->id}})">
                @endforeach
            </div>
            <x-modal.card title="Podgląd zdjęcia" blur wire:model.defer="photoShowModal">
                <div>
                    <img src="{{$photoShowModalUrl}}">
                </div>
            </x-modal.card>
        @else
            <h1>Brak zdjęć</h1>
        @endif
    </x-card>
</div>
