@extends('layouts.apps')
@section('content')

<body>
<div class="container-fluid">

    @foreach($adds as $add)
    <div class="card mb-3 ml-5 mr-5 mb-5" style="max-width: 700px">
        <span class="border border-primary">
        <div class="row no-gutters">
            <div class="col-xs-4">
                <div class="col-md-8 ">
                <img src="{{$add->image}}" class="card-img-top ml-2 mt-2 mb-2 rounded img-responsive center-block background-size: cover" style="width: 175px ;" alt=""> 
                </div>
            </div>



            <div class="col-md-6 ml-5 ">
                <div class="card-body ">
                    <div class="row no-gutters">
                        <h4 class="card-title text-left text-body font-weight-bold" >{{$add->title}}</h4>
                        <h5 class="card-title text-right ml-5">{{$add->category}}</h5>
                    </div>
                    <h5 class="card-text text-body text-center border border-primary rounded" style="width: 70px">{{$add->price}} €</h5>
                    <p class="card-text text-body">{{$add->description}}</p>
                    <p class="card-text text-body"><small class="text-muted">Offer by {{$add->username}}</small></p>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @endsection