<div class="pb-3">
    <x-card title="Pozycje na fakturze" color="bg-white flex" rounded="rounded-sm" cardClasses="card-body">
        @if(count($items) > 0)
            <div class="flex flex-wrap">
                <div class="mb-2 ml-2 mr-2" style="width: 100%">
                    <table class="w-full table-auto text-left border">
                        <thead>
                        <tr>
                            @include('templates.table.show.th',['label' => "Nazwa",'align' => 'center'])
                            @include('templates.table.show.th',['label' => "Jednostka",'align' => 'center'])
                            @include('templates.table.show.th',['label' => "VAT",'align' => 'center'])
                            @include('templates.table.show.th',['label' => "Ilość",'align' => 'center'])
                            @include('templates.table.show.th',['label' => "Cena",'align' => 'center'])
                            @include('templates.table.show.th',['label' => "Netto",'align' => 'center'])
                            @include('templates.table.show.th',['label' => "VAT",'align' => 'center'])
                            @include('templates.table.show.th',['label' => "Brutto",'align' => 'center'])
                        </tr>
                        </thead>
                        <tbody class="border">
                        @foreach($items as $index => $item)
                            <tr>
                                @include('templates.table.form.text',['name' => 'links['.$index.'][name]','model' => 'items.'.$index.'.input_link','width' => 70])
                                @include('templates.table.form.select',['name' => 'links['.$index.'][unit]','value' => $item['unit'],'options' => $lists['units'],'width' => 30])
                                @include('templates.table.form.select',['name' => 'links['.$index.'][vat_type]','value' => $item['vat_type'],'options' => $lists['vat_types'],'width' => 30])
                                @include('templates.table.form.text',['name' => 'links['.$index.'][quantity]','model' => 'items.'.$index.'.input_link','width' => 70])
                                @include('templates.table.form.text',['name' => 'links['.$index.'][price]','model' => 'items.'.$index.'.input_link','width' => 70])
{{--                                @include('templates.table.show.text',['name' => 'links['.$index.'][netto]','model' => 'items.'.$index.'.input_link','width' => 70])--}}
{{--                                @include('templates.table.show.text',['name' => 'links['.$index.'][vat]','model' => 'items.'.$index.'.input_link','width' => 70])--}}
{{--                                @include('templates.table.show.text',['name' => 'links['.$index.'][brutto]','model' => 'items.'.$index.'.input_link','width' => 70])--}}
                                @include('templates.table.form.remove',['index' => $index])
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="flex flex-wrap">
                <div class="mb-2 ml-2 mr-2" style="width: 100%">
                    <p>Brak pozycji</p>
                </div>
            </div>
        @endif
        <div class="flex flex-wrap">
            <div class="mb-2 ml-2 mr-2" style="width: 100%">
                @include('templates.buttons.button',['color' => 'positive', 'label' => 'Dodaj pozycję','icon' => 'plus','action' => 'addItem()'])
            </div>
        </div>
    </x-card>
</div>
