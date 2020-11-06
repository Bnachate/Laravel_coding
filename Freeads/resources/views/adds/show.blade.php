@extends('layouts.apps')

@section('content')
@foreach($add as $key)
<h1>{{$key->title}}</h1>
<p>{{$key->category}}</p>

<small>écrit le {{$key->created_at}}</small>
<div class="col-md-4">
      <img src="..." class="card-img" alt="...">
    </div>
<div>
<p>{{$key->description}}</p> 

</div>
  
<a href="/adds/{{$key->id}}/edit" class="btn btn-lg btn-primary">Editer l'adds</a>
<div style="margin-top:15px;">
{!!Form::open(['action' => ['App\Http\Controllers\AddsController@destroy', $key->id], 'method' => 'POST']) !!}
{{Form::hidden('_method', 'DELETE')}}
{{Form::submit('Supprimer', ['class' => 'btn btn-lg btn-danger'])}}
{!!Form::close() !!}
</div>
@endforeach 
@endsection