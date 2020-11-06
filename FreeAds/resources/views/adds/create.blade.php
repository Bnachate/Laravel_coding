@extends('layouts.apps')

@section('content')
    <h1> Création d'articles</h1>
    {!! Form::open(['action' => '\App\Http\Controllers\AddsController@store', 'method' => 'POST']) !!}
        <div class="form-group"> 
        {{Form::label('title', 'Titre')}}
        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Ecrivez le titre de votre produit'])}}
        </div>
        <div class="form-group"> 
        {{Form::label('price', 'Prix')}}
        {{Form::text('price', '', ['class' => 'form-control', 'placeholder' => 'Ecrivez le prix de votre produit'])}}
        </div>
        <div class="form-group"> 
        {{Form::label('location', 'Adresse')}}
        {{Form::text('location', '', ['class' => 'form-control', 'placeholder' => 'Ecrivez votre adresse'])}}
        </div>
        <div class="form-group"> 
        {{Form::label('category_id', 'Catégorie')}}
        {{Form::select('category_id', ['1' => 'Game Console', '2' => 'Video Games', '3' => 'Accessories'])}};
        </div>
        <div class="form-group"> 
        {{Form::file('image')}};
        </div>
        <div class="form-group"> 
        {{Form::label('description', 'Description')}}
        {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description de votre produit'])}}
        </div>
        {{Form::submit('Créer votre article', ['class' => 'btn btn-lg btn-primary'])}}
    {!! Form::close() !!}
@endsection