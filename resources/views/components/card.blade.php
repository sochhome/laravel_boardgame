@props(['highlight' => false])

<div @class (['highlight' => $highlight, "card"])>
    {{$slot}}
    <a href="{{$attributes->get('href')}}" class ="btn"> {{ $highlight ? 'On Sale!' : 'View Details' }}</a>
</div>