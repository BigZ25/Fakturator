<h1>Nowe ogłoszenia</h1>

@foreach($invoices as $invoice)
    <a href="{{$invoice->link}}">{{$invoice->name}}</a>
    <br>
@endforeach
