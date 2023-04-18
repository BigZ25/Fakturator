<div>
    {{--    TODO: poprawić bo jak kliknę usuń to formularz się zeruje--}}
    {{--    @if($invoice->id)--}}
    {{--        <div class="pb-3">--}}
    {{--            <x-card padding="p-2" color="bg-white" rounded="rounded-sm">--}}
    {{--                @include('modules/invoices/modals/delete_single',['item' => $invoice])--}}
    {{--                @include('templates.buttons.button',['label' => 'Usuń','color' => 'red','icon' => 'trash','action' => 'openDeleteSingleModal('.$invoice->id.')','disabled' => ???])--}}
    {{--            </x-card>--}}
    {{--        </div>--}}
    {{--    @endif--}}

    <form method="POST" action="{{$invoice->id ? route('invoices.update',$invoice->id) : route('invoices.store')}}" enctype="multipart/form-data" class="ajax-form">
        @if($invoice->id)
            @method('PUT')
        @endif
        @csrf
        <div class="flex">
            <div class="flex-1 pb-3 pr-2">
                <x-card title="Podstawowe dane" color="bg-white flex" rounded="rounded-sm" cardClasses="card-body">
                    <div class="flex flex-wrap">
                        @include('templates.form.text',['width' => 50,'value' => $invoice->number,'name' => 'number', 'label' => 'Numer faktury'])
                        @include('templates.form.select',['width' => 50,'value' => $invoice->payment_method,'name' => 'payment_method','label' => 'Metoda płatności','options' => $lists['payment_methods']])
                    </div>
                    <div class="flex flex-wrap">
                        @include('templates.form.date',['width' => 25,'value' => $invoice->sale_date,'name' => 'sale_date' ,'label' => 'Data sprzedaży'])
                        @include('templates.form.date',['width' => 25,'value' => $invoice->issue_date ,'name' => 'issue_date','label' => 'Data wystawienia'])
                        @include('templates.form.date',['width' => 25,'value' => $invoice->payment_date,'name' => 'payment_date','label' => 'Termin płatności'])
                        @include('templates.form.date',['width' => 25,'value' => $invoice->paid_date,'name' => 'paid_date','label' => 'Zapłacono dnia'])
                    </div>
                    <div class="flex flex-wrap">
                        @include('templates.form.checkbox',['width' => 25,'value' => $invoice->is_printed,'name' => 'is_printed','label' => 'Faktura wydrukowana'])
                        @include('templates.form.checkbox',['width' => 25,'value' => $invoice->is_send,'name' => 'is_send','label' => 'Faktura wysłana'])
                    </div>
                    <div class="flex flex-wrap">
                        @include('templates.form.textarea',['rows' => 5,'width' => 100,'value' => $invoice->notes,'name' => 'is_send','label' => 'Notatki'])
                    </div>
                </x-card>
            </div>
            <div class="flex-1 pb-3">
                <x-card title="Dane nabywcy" color="bg-white flex" rounded="rounded-sm" cardClasses="card-body">
                    <div class="flex flex-wrap">
                        @include('templates.form.text',['width' => 100,'value' => $invoice->buyer_nip,'name' => 'buyer_nip', 'label' => 'NIP'])
                    </div>
                    <div class="flex flex-wrap">
                        @include('templates.form.text',['width' => 100,'value' => $invoice->buyer_name,'name' => 'buyer_name', 'label' => 'Nazwa'])
                    </div>
                    <div class="flex flex-wrap">

                        @include('templates.form.text',['width' => 100,'value' => $invoice->buyer_address,'name' => 'buyer_address', 'label' => 'Adres'])
                    </div>
                    <div class="flex flex-wrap">
                        @include('templates.form.text',['width' => 100,'value' => $invoice->buyer_postcode,'name' => 'buyer_postcode', 'label' => 'Kod pocztowy'])
                    </div>
                    <div class="flex flex-wrap">
                        @include('templates.form.text',['width' => 100,'value' => $invoice->buyer_city,'name' => 'buyer_city', 'label' => 'Miejscowość'])
                    </div>
                    <div class="flex flex-wrap">
                        @include('templates.form.text',['width' => 100,'value' => $invoice->buyer_email,'name' => 'buyer_email', 'label' => 'Adres e-mail'])
                    </div>
                </x-card>
            </div>
        </div>

        @livewire('modules.invoices.items.invoice-items-form',[$invoice->id])
        @if($entity_id === null)
            @include('templates.buttons.store')
        @else
            @include('templates.buttons.update')
        @endif
    </form>
</div>
