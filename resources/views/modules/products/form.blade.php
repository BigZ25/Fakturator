<div>
    <form method="POST" action="{{$product->id ? route('products.update',$product->id) : route('products.store')}}" enctype="multipart/form-data" class="ajax-form">
        @if($product->id)
            @method('PUT')
        @endif
        @csrf
        <div class="pb-3">
            <x-card title="Podstawowe dane" color="bg-white flex" rounded="rounded-sm" cardClasses="card-body">
                <div class="flex flex-wrap">
                    @include('templates.form.text',['width' => 100,'value' => $product->name,'name' => 'name' ,'label' => 'Nazwa'])
                    @include('templates.form.text',['width' => 100,'value' => $product->vat_type,'name' => 'vat_type' ,'label' => 'VAT'])
                    @include('templates.form.text',['width' => 100,'value' => $product->price,'name' => 'price' ,'label' => 'Cena'])
{{--                    @include('templates.form.text',['width' => 100,'value' => $product->name,'name' => 'name' ,'label' => 'Nazwa'])--}}
{{--                    @include('templates.form.text',['width' => 100,'value' => $product->name,'name' => 'name' ,'label' => 'Nazwa'])--}}
{{--                    @include('templates.form.text',['width' => 100,'value' => $product->name,'name' => 'name' ,'label' => 'Nazwa'])--}}
{{--                    @include('templates.form.text',['width' => 100,'value' => $product->name,'name' => 'name' ,'label' => 'Nazwa'])--}}
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
