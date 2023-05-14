<table style="width: 100%; padding-top: 10px;">
    @if(isset($label) && $label)
        <tr>
            <td><h6><b>{{$label}}</b></h6></td>
        </tr>
    @endif
    <tr>
        <td style="width: 100%;">
            <table style="width: 100%" class="bordered">
                <tr>
                    <th><h6>L.p.</h6></th>
                    <th><h6>Nazwa</h6></th>
                    <th><h6>Jednostka</h6></th>
                    <th><h6>Ilość</h6></th>
                    <th><h6>Stawka VAT</h6></th>
                    <th><h6>Cena</h6></th>
                    <th><h6>Netto</h6></th>
                    <th><h6>VAT</h6></th>
                    <th><h6>Brutto</h6></th>
                </tr>
                @foreach($items as $item)
                    <tr>
                        <td class="center"><h6>{{$loop->index + 1}}.</h6></td>
                        <td><h6>{{$item->name}}</h6></td>
                        <td class="center"><h6>{{$item->unit_name}}</h6></td>
                        <td class="center"><h6>{{$item->quantity}}</h6></td>
                        <td class="center"><h6>{{$item->vat_type_name}}</h6></td>
                        <td class="center"><h6>{{formatPriceShow($item->price)}}</h6></td>
                        <td class="center"><h6>{{formatPriceShow($item->netto)}}</h6></td>
                        <td class="center"><h6>{{formatPriceShow($item->vat)}}</h6></td>
                        <td class="center"><h6>{{formatPriceShow($item->brutto)}}</h6></td>
                    </tr>
                @endforeach
                <tr style="border: 0;">
                    <td style="border: 0;height: 10px;" colspan="9"></td>
                </tr>
                <tr>
                    <td style="border: 0" colspan="5"></td>
                    <th class="right"><h6><b>Suma:</b></h6></th>
                    <td class="center"><h6>{{formatPriceShow($items->sum('netto'))}}</h6></td>
                    <td class="center"><h6>{{formatPriceShow($items->sum('vat'))}}</h6></td>
                    <td class="center"><h6>{{formatPriceShow($items->sum('brutto'))}}</h6></td>
                </tr>
                @if($items->groupBy('vat_type')->keys()->count() > 1)
                    @foreach($items->groupBy('vat_type')->keys() as $vat_type)
                        @php
                            $vat_type_name = $items->where('vat_type',$vat_type)->first()->vat_type_name;
                        @endphp
                        <tr>
                            <td style="border: 0" colspan="5"></td>
                            <th class="right"><h6>W tym (VAT {{$vat_type_name}}):</h6></th>
                            <td class="center"><h6>{{formatPriceShow($items->where('vat_type',$vat_type)->sum('netto'))}}</h6></td>
                            <td class="center"><h6>{{formatPriceShow($items->where('vat_type',$vat_type)->sum('vat'))}}</h6></td>
                            <td class="center"><h6>{{formatPriceShow($items->where('vat_type',$vat_type)->sum('brutto'))}}</h6></td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </td>
    </tr>
</table>
