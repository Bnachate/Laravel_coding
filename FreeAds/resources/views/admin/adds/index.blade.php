@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Manage Adds') }}</div>

                @if(session('success'))
                    <div class="alert alert-success mt-2" role="alert">
                        {{session('success')}}
                    </div>
                @elseif(session('warning'))
                    <div class="alert alert-warning mt-2" role="alert">
                        {{session('warning')}}
                    </div>
                @endif

                <div class="card-body">
                    <a href="/admin/adds/create"><button type="button" class="btn btn-success">Create a new add</button></a>
                
                    <table class="table table-bordered table-condensed table-responsive" style="display:table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Categories</th>
                                <th scope="col">Image</th>
                                <th scope="col">Price</th>
                                <th scope="col">Description</th>
                                <th scope="col">Location</th>
                                <th scope="col">Created_at</th>
                                <th scope="col">Actions</th>
                                
                            </tr>
                        </thead>
                        <br>
                        <tbody>
                            @foreach($adds as $add)
                            <tr>
                                <td>{{$add->title}}</td>
                                <td>{{$add->Category}}</td>
                                <td> <img src="{{$add->image}}" style="height:60px"> </td>
                                <td>{{$add->price}}</td>
                                <td>{{$add->description}}</td>
                                <td>{{$add->location}}</td>
                                <td>{{$add->created_at}}</td>
                                <td>
                                    <a href="/admin/adds/edit/{{$add->id}}" class="btn btn-primary border mr-3">Edit</a>
                                    {!!Form::open(['action' => ['App\Http\Controllers\Admin\AdminAddsController@destroy', $add->id],
                                    'method' => 'POST']) !!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                </td>
                            </tr>
                            @endforeach
                            <br>
                        </tbody>
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Categories</th>
                                <th scope="col">Image</th>
                                <th scope="col">Price</th>
                                <th scope="col">Description</th>
                                <th scope="col">Location</th>
                                <th scope="col">Created_at</th>
                                <th scope="col">Actions</th>
                                
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div> 
    </div>   
</div>
@endsection
