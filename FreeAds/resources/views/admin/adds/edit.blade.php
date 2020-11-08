@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <h1> Edition d'articles</h1>
            {!! Form::open(['action' => ['\App\Http\Controllers\Admin\AdminAddsController@update', $adds->id], 'method' => 'POST']) !!}
                <div class="form-group"> 
                {{Form::label('title', 'Titre')}}
                {{Form::text('title', $adds->title, ['class' => 'form-control', 'placeholder' => 'Ecrivez le titre de votre produit'])}}
                </div>
                <div class="form-group"> 
                {{Form::label('price', 'Prix')}}
                {{Form::text('price', $adds->price, ['class' => 'form-control', 'placeholder' => 'Ecrivez le prix de votre produit'])}}
                </div>
                <div class="form-group"> 
                {{Form::label('location', 'Adresse')}}
                {{Form::text('location', $adds->location, ['class' => 'form-control', 'placeholder' => 'Ecrivez votre adresse'])}}
                </div>
                <div class="form-group"> 
                {{Form::label('category_id', 'Catégorie')}}
                {{Form::select('category_id', ['1' => 'Game Console', '2' => 'Video Games', '3' => 'Accessories'])}}
                </div>
                <div class="form-group"> 
                {{Form::file('image')}}
                </div>
                
                <div class="form-group"> 
                {{Form::label('description', 'Description')}}
                {{Form::textarea('description', $adds->description, ['class' => 'form-control', 'placeholder' => 'Description de votre produit'])}}
                </div>
                {{Form::hidden('_method', 'POST')}}
                {{Form::submit('Modifiez votre article', ['class' => 'btn btn-lg btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection