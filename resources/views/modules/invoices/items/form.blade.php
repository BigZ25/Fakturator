<div class="pb-3">
    <x-card title="{{$label}}" color="bg-white flex" rounded="rounded-sm" cardClasses="card-body">
        @if(count($items) > 0)
            <div class="flex flex-wrap">
                <div class="mb-2 ml-2 mr-2" style="width: 100%">
                    <table class="w-full table-auto text-left border">
                        <thead>
                        <tr>
                            @include('templates.table.form.th',['label' => "Nazwa",'align' => 'center'])
                            @include('templates.table.form.th',['label' => "Jednostka",'align' => 'center'])
                            @include('templates.table.form.th',['label' => "Ilość",'align' => 'center'])
                            @include('templates.table.form.th',['label' => "Stawka VAT",'align' => 'center'])
                            @include('templates.table.form.th',['label' => "Cena",'align' => 'center'])
                            @include('templates.table.form.th',['label' => "Netto",'align' => 'center'])
                            @include('templates.table.form.th',['label' => "VAT",'align' => 'center'])
                            @include('templates.table.form.th',['label' => "Brutto",'align' => 'center'])
                        </tr>
                        </thead>
                        <tbody class="border">
                        @foreach($items as $index => $item)
                            <tr>
                                @if(!$onlyShow)
                                    @include('templates.table.form.text',['name' => 'items['.$index.'][name]','model' => 'items.'.$index.'.name','value' => $item['name'],'width' => 30])
                                    @include('templates.table.form.select',['name' => 'items['.$index.'][unit]','model' => 'items.'.$index.'.unit','value' => $item['unit'],'options' => $lists['units'],'width' => 10])
                                    @include('templates.table.form.text',['name' => 'items['.$index.'][quantity]','model' => 'items.'.$index.'.quantity','value' => $item['quantity'],'width' => 10])
                                    @include('templates.table.form.select',['name' => 'items['.$index.'][vat_type]','model' => 'items.'.$index.'.vat_type','value' => $item['vat_type'],'options' => $lists['vat_types'],'width' => 10])
                                    @include('templates.table.form.text',['name' => 'items['.$index.'][price]','model' => 'items.'.$index.'.price','value' => $item['price'],'width' => 10])
                                    <td class="text-center">{{formatPriceShow($item['netto'])}}</td>
                                    <td class="text-center">{{formatPriceShow($item['vat'])}}</td>
                                    <td class="text-center">{{formatPriceShow($item['brutto'])}}</td>
                                    @include('templates.table.form.remove',['index' => $index])
                                @else
                                    @include('templates.table.form.text',['value' => $item['name'],'width' => 30,'disabled' => true])
                                    @include('templates.table.form.select',['value' => $item['unit'],'options' => $lists['units'],'width' => 10,'disabled' => true])
                                    @include('templates.table.form.text',['value' => $item['quantity'],'width' => 10,'disabled' => true])
                                    @include('templates.table.form.select',['value' => $item['vat_type'],'options' => $lists['vat_types'],'width' => 10,'disabled' => true])
                                    @include('templates.table.form.text',['value' => $item['price'],'width' => 10,'disabled' => true])
                                    <td class="text-center">{{formatPriceShow($item['netto'])}}</td>
                                    <td class="text-center">{{formatPriceShow($item['vat'])}}</td>
                                    <td class="text-center">{{formatPriceShow($item['brutto'])}}</td>
                                    @if(!$onlyShow)
                                        @include('templates.table.form.remove',['index' => $index])
                                    @endif
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="4"></td>
                            <td class="text-center"><b>Razem:</b></td>
                            <td class="text-center">{{formatPriceShow($totalNetto)}}</td>
                            <td class="text-center">{{formatPriceShow($totalVat)}}</td>
                            <td class="text-center">{{formatPriceShow($totalBrutto)}}</td>
                        </tr>
                        </tfoot>
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
        @if(!$onlyShow)
            <div class="flex flex-wrap">
                <div class="mb-2 ml-2 mr-2" style="width: 100%">
                    @include('templates.buttons.button',['color' => 'positive', 'label' => 'Dodaj pozycję','icon' => 'plus','action' => 'addItem()'])
                </div>
            </div>
        @endif
    </x-card>
</div>
