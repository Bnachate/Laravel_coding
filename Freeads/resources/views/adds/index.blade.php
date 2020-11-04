@extends('layouts.app')

@section('content')
<h1>Adds</h1>
@if(count($adds) >= 1)
    @foreach($adds as $add)
    <div class="well">
        <h3>{{$add->title}}</h3>
        <small>écrit le {{$add->created_at}}</small>
        <p>{{$add->description}}</p>
    </div>
@endforeach
@else
<p>Aucun add existant !<p>
@endif
@endsection