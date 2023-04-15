<h1>Nowe ogłoszenia</h1>

@foreach($adverts as $advert)
    <a href="{{$advert->link}}">{{$advert->name}}</a>
    <br>
@endforeach
