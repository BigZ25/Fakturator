<div>
    <form method="POST" action="{{$invoice->id ? route('invoices.update',$invoice->id) : ($invoice->correctionParent ? route('invoices.store') . '?correction=' . $entity_id : route('invoices.store'))}}" enctype="multipart/form-data" class="ajax-form">
        @if($invoice->id)
            @method('PUT')
        @endif
        @csrf
        <div class="flex pb-3">
            <div class="flex-1 pr-2">
                <x-card title="Podstawowe dane" color="bg-white flex" rounded="rounded-sm" cardClasses="card-body">
                    <div class="flex flex-wrap">
                        @include('templates.form.text',['width' => 50,'value' => $invoice->number,'name' => 'number', 'label' => 'Numer faktury'])
                        @include('templates.form.select',['width' => 50,'value' => $invoice->payment_method,'name' => 'payment_method','label' => 'Metoda płatności','options' => $lists['payment_methods']])
                    </div>
                    <div class="flex flex-wrap">
                        @include('templates.form.date',['width' => 50,'value' => $invoice->sale_date,'name' => 'sale_date' ,'label' => 'Data sprzedaży'])
                        @include('templates.form.date',['width' => 50,'value' => $invoice->issue_date ,'name' => 'issue_date','label' => 'Data wystawienia'])
                    </div>
                    <div class="flex flex-wrap">
                        @include('templates.form.date',['width' => 50,'value' => $invoice->payment_date,'name' => 'payment_date','label' => 'Termin płatności'])
                        @include('templates.form.date',['width' => 50,'value' => $invoice->paid_date,'name' => 'paid_date','label' => 'Zapłacono dnia'])
                    </div>
                    <div class="flex flex-wrap">
                        @include('templates.form.checkbox',['width' => 50,'value' => $invoice->is_printed,'name' => 'is_printed','label' => 'Faktura wydrukowana'])
                        @include('templates.form.checkbox',['width' => 50,'value' => $invoice->is_send,'name' => 'is_send','label' => 'Faktura wysłana'])
                    </div>
                    <div class="flex flex-wrap">
                        @include('templates.form.textarea',['rows' => 5,'width' => 100,'value' => $invoice->notes,'name' => 'notes','label' => 'Notatki'])
                    </div>
                </x-card>
            </div>
            <div x-data="tabs">
                <div class="grid grid-cols-3 cursor-pointer">
                    <div :class="getClasses(1)" @click="setActive(1)">
                        <h3 class="text-md font-medium text-secondary-700 dark:text-secondary-400 whitespace-normal">Dane nabywcy</h3>
                    </div>
                    <div :class="getClasses(2)" @click="setActive(2)">
                        <h3 class="text-md font-medium text-secondary-700 dark:text-secondary-400 whitespace-normal">Dane odbiorcy</h3>
                    </div>
                </div>
                <div>
                    <div x-show="isActive(1)" x-transition:enter.duration.500ms>
                        <x-card color="bg-white flex" rounded="rounded-sm" cardClasses="card-body" style>
                            @livewire('templates.company-data',['entity' => $invoice, 'id' => $entity_id, 'prefix' => 'buyer'])
                            <div class="flex flex-wrap">
                                @include('templates.form.text',['width' => 100,'value' => $invoice->send_email,'name' => 'send_email' ,'label' => 'Adres e-mail'])
                            </div>
                        </x-card>
                    </div>
                    <div x-show="isActive(2)" x-transition:enter.duration.500ms>
                        <x-card color="bg-white flex" rounded="rounded-sm" cardClasses="card-body">
                            @livewire('templates.company-data',['entity' => $invoice, 'id' => $entity_id, 'prefix' => 'recipient'])
                        </x-card>
                    </div>
                </div>
            </div>
        </div>
        @if($invoice->correctionParent)
                @livewire('modules.invoices.items.invoice-items-form',[$invoice->correctionParent->id,'Pozycje na fakturze przed korektą',true])
        @endif
        @livewire('modules.invoices.items.invoice-items-form',[$entity_id,$invoice->correctionParent ? 'Pozycje na fakturze po korekcie' : 'Pozycje na fakturze'])
        @if($invoice->id === null)
            @include('templates.buttons.store')
        @else
            @include('templates.buttons.update')
        @endif
    </form>
</div>
