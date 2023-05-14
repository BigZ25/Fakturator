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
        @include('templates.pdf.partials.company_data',['label' => 'Sprzedawca', 'prefix' => 'seller'])
        @include('templates.pdf.partials.company_data',['label' => 'Nabywca', 'prefix' => 'buyer'])
    </tr>
    @if($invoice->has_recipient)
        <tr>
            <td></td>
            @include('templates.pdf.partials.company_data',['label' => 'Odbiorca', 'prefix' => 'recipient'])
        </tr>
    @endif
</table>

@if($invoice->is_correction)
    @include('templates.pdf.partials.items',['items' => $invoice->correctionParent->items, 'label' => 'Przed korektą:'])
@endif

@include('templates.pdf.partials.items',['items' => $invoice->items, 'label' => $invoice->is_correction ? 'Po korekcie:' : ''])

@if($invoice->is_correction)
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
                        <th></th>
                        <th><h6>Netto</h6></th>
                        <th><h6>VAT</h6></th>
                        <th><h6>Brutto</h6></th>
                    </tr>
                    <tr>
                        <th class="right"><h6>Przed korektą:</h6></th>
                        <td class="center"><h6>{{formatPriceShow($invoice->correctionParent->netto)}}</h6></td>
                        <td class="center"><h6>{{formatPriceShow($invoice->correctionParent->vat)}}</h6></td>
                        <td class="center"><h6>{{formatPriceShow($invoice->correctionParent->brutto)}}</h6></td>
                    </tr>
                    <tr>
                        <th class="right"><h6>Po korekcie:</h6></th>
                        <td class="center"><h6>{{formatPriceShow($invoice->netto)}}</h6></td>
                        <td class="center"><h6>{{formatPriceShow($invoice->vat)}}</h6></td>
                        <td class="center"><h6>{{formatPriceShow($invoice->brutto)}}</h6></td>
                    </tr>
                    <tr>
                        <th class="right"><h6><b>Różnica:</b></h6></th>
                        <td class="center"><h6>{{formatPriceShow($invoice->netto - $invoice->correctionParent->netto)}}</h6></td>
                        <td class="center"><h6>{{formatPriceShow($invoice->vat - $invoice->correctionParent->vat)}}</h6></td>
                        <td class="center"><h6>{{formatPriceShow($invoice->brutto - $invoice->correctionParent->brutto)}}</h6></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
@endif

<table style="width: 100%; padding-top: 10px;">
    <tr>
        <td style="width: 100%;">
            <table style="width: 100%;border: 1px solid;">
                <tr>
                    <td style="padding: 5px 0 0 5px;">
                        <h5><b>Do zapłaty:</b> {{formatPriceShow($invoice->brutto)}}</h5>
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
                        <h5><b>Tytuł płatności:</b> Faktura VAT nr {{$invoice->number}}</h5>
                    </td>
                </tr>
                <tr>
                    <td style=" border-top: 1px solid black;padding: 5px 0 5px 5px;">
                        <h5><b>Uwagi:</b></h5>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0px 0 5px 5px;">
                        <h5>{{$invoice->notes}}</h5>
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
                        <h5>podpis osoby upoważnionej do wystawienia faktury</h5>
                    </td>
                </tr>
            </table>
        </td>
        <td style="width: 50%;">
            <table style="width: 100%;border: 1px solid;border-collapse: collapse;">
                <tr>
                    <td style="padding: 0 0 5px 0;vertical-align:bottom;text-align:center;height: 100px;">
                        <h5>podpis osoby upoważnionej do odbioru faktury</h5>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

</body>
</html>



