@extends('layouts.apps')

@section('content')
    <h1> Création d'articles</h1>
    {!! Form::open(['action' => '\App\Http\Controllers\AddsController@store', 'method' => 'POST']) !!}
        <div class="form-group"> 
        {{Form::label('title', 'Title')}}
        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'write the title'])}}
        </div>
        <div class="form-group"> 
        {{Form::label('price', 'Price')}}
        {{Form::text('price', '', ['class' => 'form-control', 'placeholder' => 'write your price product'])}}
        </div>
        <div class="form-group"> 
        {{Form::label('location', 'Address')}}
        {{Form::text('location', '', ['class' => 'form-control', 'placeholder' => 'where are you come from?'])}}
        </div>
        <div class="form-group"> 
        {{Form::label('category_id', 'Category')}}
        {{Form::select('category_id', ['1' => 'Game Console', '2' => 'Video Games', '3' => 'Accessories'])}};
        </div>
        <div class="form-group"> 
        {{Form::file('image')}};
        </div>
        <div class="form-group"> 
        {{Form::label('description', 'Description')}}
        {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'describe your add'])}}
        </div>
        
        {{Form::submit('Create your add', ['class' => 'btn btn-lg btn-primary'])}}
    {!! Form::close() !!}
@endsection