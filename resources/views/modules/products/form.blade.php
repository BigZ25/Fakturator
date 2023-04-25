<div>
    {{--    TODO: poprawić bo jak kliknę usuń to formularz się zeruje--}}
    {{--    @if($product->id)--}}
    {{--        <div class="pb-3">--}}
    {{--            <x-card padding="p-2" color="bg-white" rounded="rounded-sm">--}}
    {{--                @include('modules/products/modals/delete_single',['item' => $product])--}}
    {{--                @include('templates.buttons.button',['label' => 'Usuń','color' => 'red','icon' => 'trash','action' => 'openDeleteSingleModal('.$product->id.')','disabled' => ???])--}}
    {{--            </x-card>--}}
    {{--        </div>--}}
    {{--    @endif--}}

    <form method="POST" action="{{$product->id ? route('products.update',$product->id) : route('products.store')}}" enctype="multipart/form-data" class="ajax-form">
        @if($product->id)
            @method('PUT')
        @endif
        @csrf
        <div class="pb-3">
            <x-card title="Podstawowe dane" color="bg-white flex" rounded="rounded-sm" cardClasses="card-body">
                <div class="flex flex-wrap">
                    @include('templates.form.text',['width' => 100,'value' => $product->name,'name' => 'name' ,'label' => 'Nazwa'])
                </div>
                <div class="flex flex-wrap">
                    @include('templates.form.textarea',['rows' => 5,'width' => 100,'value' => $product->description ,'name' => 'description','label' => 'Opis'])
                </div>
            </x-card>
        </div>
        @if($entity_id === null)
            @include('templates.buttons.store')
        @else
            @include('templates.buttons.update')
        @endif
    </form>
</div>
