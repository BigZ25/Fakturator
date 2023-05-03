<div>
    <form method="POST" action="{{$product->id ? route('products.update',$product->id) : route('products.store')}}" enctype="multipart/form-data" class="ajax-form">
        @if($product->id)
            @method('PUT')
        @endif
        @csrf
        <div class="pb-3">
            <x-card title="Podstawowe dane" color="bg-white flex" rounded="rounded-sm" cardClasses="card-body">
                <div class="flex flex-wrap">
                    @include('templates.form.text',['width' => 25,'value' => $product->name,'name' => 'name' ,'label' => 'Nazwa'])
                    @include('templates.form.select',['width' => 25,'value' => $product->vat_type,'name' => 'vat_type' ,'label' => 'VAT','options' => $lists['vat_types']])
                    @include('templates.form.text',['width' => 25,'value' => $product->price,'name' => 'price' ,'label' => 'Cena'])
                    @include('templates.form.text',['width' => 25,'value' => $product->quantity,'name' => 'quantity' ,'label' => 'Ilość'])
                </div>
            </x-card>
        </div>
        @if($product->id === null)
            @include('templates.buttons.store')
        @else
            @include('templates.buttons.update')
        @endif
    </form>
</div>
