<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1, h2, h3, h4, h5, h6 {
            color: #000;
            font-weight: normal;
        }

        img {
            position: absolute;
            top: 0;
            right: 0;
            width: 20%;
            padding-bottom: 10px;
        }

        @page {
            margin: 30px 30px 30px 30px !important;
        }

        .bordered {
            border-collapse: separate;
            border-spacing: -1px;
            border: none;
        }

        .bordered tr td, .bordered tr th {
            border: 1px solid;
        }

        .bordered tr th {
            background-color: #eeeeee;
        }

        .bordered tr th, .bordered tr td {
            padding-left: 5px;
            padding-right: 5px;
        }

        .bordered tr td {
            text-align: left;
        }

        .bordered tr td.center, .bordered tr th.center {
            text-align: center;
        }

        .bordered tr td.right, .bordered tr th.right {
            text-align: right;
        }

    </style>
</head>
<body>

<table style="width: 100%;">
    <tr>
        <td style="width: 50%; vertical-align: top;">
            <table style="width: 100%;">
                <tr>
                    <td style="padding-bottom: 40px;">
                        <h3><b>Faktura VAT nr {{$invoice->number}}</b></h3>
                    </td>
                </tr>
                <tr>
                    <td style="padding-bottom: 10px;">
                        <h5><b>Data sprzedaży: </b>{{date("d.m.Y",strtotime($invoice->sale_date))}}</h5>
                        <h5><b>Data wystawienia: </b>{{date("d.m.Y",strtotime($invoice->issue_date))}}</h5>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td style="width: 50%; vertical-align: top;">
            <table style="width: 100%;" class="bordered">
                <tr>
                    <th>
                        <h4><b>Sprzedawca</b></h4>
                    </th>
                </tr>
                <tr>
                    <td style="padding:10px;">
                        <h4>{{$invoice->seller_name}}</h4>
                        <h4>NIP: {{$invoice->seller_nip}}</h4>
                        <h4>{{$invoice->seller_address}}</h4>
                        <h4>{{$invoice->seller_postcode}} {{$invoice->seller_city}}</h4>
                    </td>
                </tr>
            </table>
        </td>
        <td style="width: 50%; vertical-align: top;">
            <table style="width: 100%;" class="bordered">
                <tr>
                    <th>
                        <h4><b>Adresat</b></h4>
                    </th>
                </tr>
                <tr>
                    <td style="padding: 10px;">
                        <h4>{{$invoice->company_name}}</h4>
                        <h4>{{$invoice->company_address}}</h4>
                        <h4>{{$invoice->company_postcode . ' ' . $invoice->company_city}}</h4>
                        <h4>{{'NIP: ' . $invoice->company_nip}}</h4>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

@if($invoice->correction_id)

    <table style="width: 100%; padding-top: 10px;">
        <tr>
            <td><h6><b>Przed korektą:</b></h6></td>
        </tr>
        <tr>
            <td style="width: 100%;">
                <table style="width: 100%" class="bordered">
                    <tr>
                        <th><h6>L.p.</h6></th>
                        <th><h6>Nazwa pozycji</h6></th>
                        @if(class_basename($invoice) == 'Income')
                            <th><h6>Ilość</h6></th>
                            <th><h6>J.m.</h6></th>
                            <th><h6>Cena netto</h6></th>
                            <th><h6>Wartość netto</h6></th>
                            <th><h6>Stawka VAT</h6></th>
                            <th><h6>Wartość VAT</h6></th>
                            <th><h6>Wartość brutto</h6></th>
                        @else
                            <th><h6>Kwota obciążeniowa</h6></th>
                        @endif
                    </tr>
                    @foreach($invoice->correction->items as $item)
                        <tr>
                            <td class="center"><h6>{{$loop->index + 1}}.</h6></td>
                            <td><h6>{{$item->name}}</h6></td>
                            @if(class_basename($invoice) == 'Income')
                                <td class="center"><h6>{{$item->quantity}}</h6></td>
                                <td class="center"><h6>{{config('units.incomeItems')[$item->unit]}}</h6></td>
                                <td class="center"><h6>{{formatPriceShow($item->price)}}</h6></td>
                                <td class="center"><h6>{{formatPriceShow($item->netto)}}</h6></td>
                                <td class="center"><h6>{{$item->vat_type}}%</h6></td>
                                <td class="center"><h6>{{formatPriceShow($item->vat)}}</h6></td>
                                <td class="center"><h6>{{formatPriceShow($item->brutto)}}</h6></td>
                            @else
                                <td class="center"><h6>{{formatPriceShow($item->amount)}}</h6></td>
                            @endif
                        </tr>
                    @endforeach
                    <tr style="border: 0;height: 10px;">
                        <td style="border: 0;height: 10px;" colspan="{{class_basename($invoice) == 'Income' ? 9 : 3}}"></td>
                    </tr>
                    <tr>
                        <td style="border: 0" colspan="{{class_basename($invoice) == 'Income' ? 4 : 1}}"></td>
                        <th class="right"><h6><b>Suma:</b></h6></th>
                        @if(class_basename($invoice) == 'Income')
                            <td class="center"><h6>{{formatPriceShow($invoice->correction->netto)}}</h6></td>
                            <td></td>
                            <td class="center"><h6>{{formatPriceShow($invoice->correction->vat)}}</h6></td>
                            <td class="center"><h6>{{formatPriceShow($invoice->correction->brutto)}}</h6></td>
                        @else
                            <td class="center"><h6>{{formatPriceShow($invoice->correction->amount)}}</h6></td>
                        @endif
                    </tr>

                    @if(class_basename($invoice) == 'Income')
                        @if($invoice->correction->items->groupBy('vat_type')->keys()->count() > 1)
                            @foreach($invoice->correction->items->groupBy('vat_type')->keys() as $vat_type)
                                <tr>
                                    <td style="border: 0" colspan="4"></td>
                                    <th class="right"><h6>W tym:</h6></th>
                                    <td class="center"><h6>{{formatPriceShow($invoice->correction->items->where('vat_type',$vat_type)->sum('netto'))}}</h6></td>
                                    <td class="center"><h6>{{$vat_type}}%</h6></td>
                                    <td class="center"><h6>{{formatPriceShow($invoice->correction->items->where('vat_type',$vat_type)->sum('vat'))}}</h6></td>
                                    <td class="center"><h6>{{formatPriceShow($invoice->correction->items->where('vat_type',$vat_type)->sum('brutto'))}}</h6></td>
                                </tr>
                            @endforeach
                        @endif
                    @endif

                </table>
            </td>
        </tr>
    </table>

@endif

<table style="width: 100%; padding-top: 10px;">
    @if($invoice->correction_id)
        <tr>
            <td><h6><b>Po korekcie:</b></h6></td>
        </tr>
    @endif
    <tr>
        <td style="width: 100%;">
            <table style="width: 100%" class="bordered">
                <tr>
                    <th><h6>L.p.</h6></th>
                    <th><h6>Nazwa pozycji</h6></th>
                    @if(class_basename($invoice) == 'Income')
                        <th><h6>Ilość</h6></th>
                        <th><h6>J.m.</h6></th>
                        <th><h6>Cena netto</h6></th>
                        <th><h6>Wartość netto</h6></th>
                        <th><h6>Stawka VAT</h6></th>
                        <th><h6>Wartość VAT</h6></th>
                        <th><h6>Wartość brutto</h6></th>
                    @else
                        <th><h6>Kwota obciążeniowa</h6></th>
                    @endif
                </tr>
                @foreach($invoice->items as $item)
                    <tr>
                        <td class="center"><h6>{{$loop->index + 1}}.</h6></td>
                        <td><h6>{{$item->name}}</h6></td>
                        @if(class_basename($invoice) == 'Income')
                            <td class="center"><h6>{{$item->quantity}}</h6></td>
                            <td class="center"><h6>{{config('units.incomeItems')[$item->unit]}}</h6></td>
                            <td class="center"><h6>{{formatPriceShow($item->price)}}</h6></td>
                            <td class="center"><h6>{{formatPriceShow($item->netto)}}</h6></td>
                            <td class="center"><h6>{{$item->vat_type}}%</h6></td>
                            <td class="center"><h6>{{formatPriceShow($item->vat)}}</h6></td>
                            <td class="center"><h6>{{formatPriceShow($item->brutto)}}</h6></td>
                        @else
                            <td class="center"><h6>{{formatPriceShow($item->amount)}}</h6></td>
                        @endif
                    </tr>
                @endforeach
                <tr style="border: 0;">
                    <td style="border: 0;height: 10px;" colspan="{{class_basename($invoice) == 'Income' ? 9 : 3}}"></td>
                </tr>
                <tr>
                    <td style="border: 0" colspan="{{class_basename($invoice) == 'Income' ? 4 : 1}}"></td>
                    <th class="right"><h6><b>Suma:</b></h6></th>
                    @if(class_basename($invoice) == 'Income')
                        <td class="center"><h6>{{formatPriceShow($invoice->netto)}}</h6></td>
                        <td></td>
                        <td class="center"><h6>{{formatPriceShow($invoice->vat)}}</h6></td>
                        <td class="center"><h6>{{formatPriceShow($invoice->brutto)}}</h6></td>
                    @else
                        <td class="center"><h6>{{formatPriceShow($invoice->amount)}}</h6></td>
                    @endif
                </tr>

                @if(class_basename($invoice) == 'Income')
                    @if($invoice->items->groupBy('vat_type')->keys()->count() > 1)
                        @foreach($invoice->items->groupBy('vat_type')->keys() as $vat_type)
                            <tr>
                                <td style="border: 0" colspan="4"></td>
                                <th class="right"><h6>W tym:</h6></th>
                                <td class="center"><h6>{{formatPriceShow($invoice->items->where('vat_type',$vat_type)->sum('netto'))}}</h6></td>
                                <td class="center"><h6>{{$vat_type}}%</h6></td>
                                <td class="center"><h6>{{formatPriceShow($invoice->items->where('vat_type',$vat_type)->sum('vat'))}}</h6></td>
                                <td class="center"><h6>{{formatPriceShow($invoice->items->where('vat_type',$vat_type)->sum('brutto'))}}</h6></td>
                            </tr>
                        @endforeach
                    @endif
                @endif

                @if($invoice->correction_id)
                    <tr style="border: 0;">
                        <td style="border: 0;height: 20px;" colspan="{{class_basename($invoice) == 'Income' ? 9 : 3}}"></td>
                    </tr>
                    <tr>
                        <td style="border: 0" colspan="{{class_basename($invoice) == 'Income' ? 4 : 1}}"></td>
                        <th class="right"><h6>Przed korektą:</h6></th>
                        @if(class_basename($invoice) == 'Income')
                            <td class="center"><h6>{{formatPriceShow($invoice->correction->netto)}}</h6></td>
                            <td></td>
                            <td class="center"><h6>{{formatPriceShow($invoice->correction->vat)}}</h6></td>
                            <td class="center"><h6>{{formatPriceShow($invoice->correction->brutto)}}</h6></td>
                        @else
                            <td class="center"><h6>{{formatPriceShow($invoice->correction->amount)}}</h6></td>
                        @endif
                    </tr>
                    <tr>
                        <td style="border: 0" colspan="{{class_basename($invoice) == 'Income' ? 4 : 1}}"></td>
                        <th class="right"><h6>Po korekcie:</h6></th>
                        @if(class_basename($invoice) == 'Income')
                            <td class="center"><h6>{{formatPriceShow($invoice->netto)}}</h6></td>
                            <td></td>
                            <td class="center"><h6>{{formatPriceShow($invoice->vat)}}</h6></td>
                            <td class="center"><h6>{{formatPriceShow($invoice->brutto)}}</h6></td>
                        @else
                            <td class="center"><h6>{{formatPriceShow($invoice->amount)}}</h6></td>
                        @endif
                    </tr>
                    <tr>
                        <td style="border: 0" colspan="{{class_basename($invoice) == 'Income' ? 4 : 1}}"></td>
                        <th class="right"><h6><b>Różnica:</b></h6></th>
                        @if(class_basename($invoice) == 'Income')
                            <td class="center"><h6>{{formatPriceShow($invoice->netto - $invoice->correction->netto)}}</h6></td>
                            <td></td>
                            <td class="center"><h6>{{formatPriceShow($invoice->vat - $invoice->correction->vat)}}</h6></td>
                            <td class="center"><h6>{{formatPriceShow($invoice->brutto - $invoice->correction->brutto)}}</h6></td>
                        @else
                            <td class="center"><h6>{{formatPriceShow($invoice->amount - $invoice->correction->amount)}}</h6></td>
                        @endif
                    </tr>
                @endif

            </table>
        </td>
    </tr>
</table>

<table style="width: 100%; padding-top: 10px;">
    <tr>
        <td style="width: 100%;">
            <table style="width: 100%;border: 1px solid;">
                <tr>
                    <td style="padding: 5px 0 0 5px;">
                        <h5><b>Do zapłaty:</b> {{formatPriceShow(class_basename($invoice) == 'Income' ? $invoice->brutto : $invoice->amount)}}</h5>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0 0 5px 5px;">
                        <h5><b>Słownie:</b> {{$invoice->totalInWords}}</h5>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<table style="width: 100%; padding-top: 10px;">
    <tr>
        <td style="width: 100%;">
            <table style="width: 100%;border: 1px solid;border-collapse: collapse;">
                <tr>
                    <td style="padding: 5px 0 0 5px;">
                        <h5><b>Forma płatności:</b> {{$invoice->payment_method == 0 ? 'przelew' : 'gotówka'}}</h5>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 5px 0 5px 5px;">
                        <h5><b>Termin płatności:</b> {{date("d.m.Y",strtotime($invoice->payment_date))}}</h5>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0 0 5px 5px;">
                        <h5><b>Tytuł płatności:</b> {{class_basename($invoice) == 'Income' ? 'Faktura VAT' : 'Nota obciążeniowa'}} nr {{$invoice->number}}</h5>
                    </td>
                </tr>
                <tr>
                    <td style=" border-top: 1px solid black;padding: 5px 0 5px 5px;">
                        <h5><b>Uwagi:</b></h5>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0px 0 5px 5px;">
                        <h5>{{$invoice->internal_notes}}</h5>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<table style="width: 100%; padding-top: 10px;">
    <tr>
        <td style="width: 50%;">
            <table style="width: 100%;border: 1px solid;border-collapse: collapse;">
                <tr>
                    <td style="padding: 0 0 5px 0;vertical-align:bottom;text-align:center;height: 100px;">
                        <h5>podpis osoby upoważnionej do wystawienia noty</h5>
                    </td>
                </tr>
            </table>
        </td>
        <td style="width: 50%;">
            <table style="width: 100%;border: 1px solid;border-collapse: collapse;">
                <tr>
                    <td style="padding: 0 0 5px 0;vertical-align:bottom;text-align:center;height: 100px;">
                        <h5>podpis osoby upoważnionej do odbioru noty</h5>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

</body>
</html>



