@extends('layouts.appsdash')

@section('content')

<div class="container-fluid ml-5">

    <a href="/adds/create" class="btn btn-lg btn-primary border" style="background-color:#f8fafc; color:#000000">Create you adds</a>
    
    <table class="col-md-10 ml-5 mr-5 mt-5 ">

        <thead class="border border-dark ">

            <tr>
                <th scope="col">Titles</th>
                <th scope="col">Categories</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col">Location</th>
                <th scope="col">Created_at</th>
                <th scope="col" class="text-center">Actions</th>
                
            </tr>
        </thead>
        <br><br>

        <tbody>
            @foreach($adds as $add)
            <tr>

                <td>{{$add->title}}</td>

                <td>{{$add->Category}}</td>



                <td> <img src="{{$add->image}}" style="height:60px"> </td>

                <td>{{$add->price}}</td>

                <td style="max-width:20rem;">{{$add->description}}</td>

                <td>{{$add->location}}</td>

                <td>{{$add->created_at}}</td>


                <td class="row">
                    <a href="/adds/{{$add->id}}/edit" class="btn btn-primary border mr-3">Edit</a>
                    {!!Form::open(['action' => ['App\Http\Controllers\AddsController@destroy', $add->id],
                    'method' => 'POST']) !!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!}

                </td>
            </tr>
            @endforeach
            <br>
        </tbody>
    </table>
  
</div>
@endsection
