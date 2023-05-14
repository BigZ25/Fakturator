<div style="width: 50%">
    <form method="POST" action="{{$customer->id ? route('customers.update',$customer->id) : route('customers.store')}}" enctype="multipart/form-data" class="ajax-form">
        @if($customer->id)
            @method('PUT')
        @endif
        @csrf
        <div class="pb-3">
            <x-card title="Podstawowe dane" color="bg-white flex" rounded="rounded-sm" cardClasses="card-body">
                @livewire('templates.company-data',['entity' => $customer])
            </x-card>
        </div>

        @if($customer->id === null)
            @include('templates.buttons.store')
        @else
            @include('templates.buttons.update')
        @endif
    </form>
</div>
