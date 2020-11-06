@extends('layouts.apps')

@section('content')
@foreach($add as $key)
<h1>Adds</h1>
    <hr>
    <div class="card mb-3 displayed opacity" style="max-width: 540px;">
        <div class="row no-gutters">
        <div class="col-md-4">
                <img src="{{$key->image}}" style="height:100%; width:100%" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$key->title}}</h5>
                    <h5 class="card-title">{{$key->category}}</h5>

                    <p class="card-text">{{$key->description}}</p>
                    <p class="card-text"><small class="text-muted">{{$key->created_at}}</small></p>
                </div>
            </div>
        </div>
    </div>
    <a href="/adds/{{$key->id}}/edit displayed" class="btn btn-lg btn-primary">Editer l'adds</a>
    <div style="margin-top:15px;">
        {!!Form::open(['action' => ['App\Http\Controllers\AddsController@destroy', $key->id], 'method' => 'POST']) !!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Supprimer', ['class' => 'btn btn-lg btn-danger'])}}
        {!!Form::close() !!}
    </div>

    @endforeach
    @endsection