@extends('layouts.app')

@section('content')
<h1>Adds</h1>
@if(count($adds) >= 1)
    @foreach($adds as $add)
    <div class="well">
        <h3><a href="/index/{{$add->id}}">{{$add->title}}</a></h3>
        <small>écrit le {{$add->created_at}}</small>
        <p>{{$add->description}}</p>
        
        <hr>
        <p><a href="/index/{{$add->id}}">Lire la suite ...</a></p>
    </div>
@endforeach
@else
<p>Aucun add existant !<p>
@endif
@endsection