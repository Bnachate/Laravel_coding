@extends('layouts.apps')

@section('content')
<h1>Adds</h1>
<hr>
<a href="/adds/create" class="btn btn-lg btn-primary" style="margin-bottom:15px;">nouvel article</a>
<!--@if(count($adds) >= 1)
    @foreach($adds as $add)
    <div class="well">
        <h3><a href="/adds/{{$add->id}}">{{$add->title}}</a></h3>
        <small>écrit le {{$add->created_at}}</small>
        <p>{{$add->description}}</p>
        <p>{{$add->category}}</p>
        
        
        <hr>
        <p><a href="/adds/{{$add->id}}">Lire la suite ...</a></p>
    </div>
@endforeach
@else
<p>Aucun add existant !<p>
@endif-->

@if(count($adds) >= 1)
    @foreach($adds as $add)
<div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="{{$add->image}}" style="height:100%; width:100%" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><a href="/adds/{{$add->id}}">{{$add->title}}</a></h5>
        <h5 class="card-title">{{$add->category}}</h5>
        
        <p class="card-text">{{$add->description}}</p>
        <p class="card-text"><small class="text-muted">{{$add->created_at}}</small></p>
      </div>
    </div>
  </div>
</div>
@endforeach
@else
<p>Aucun add existant !<p>
@endif
@endsection