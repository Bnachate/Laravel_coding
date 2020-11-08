@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Manage Users') }}</div>

                @if(session('success'))
                    <div class="alert alert-success mt-2" role="alert">
                        {{session('success')}}
                    </div>
                @elseif(session('warning'))
                    <div class="alert alert-warning mt-2" role="alert">
                        {{session('warning')}}
                    </div>
                @endif

                <div class="ml-4 mt-2">
                    <a href="{{ route('admin.users.create') }}">
                        <button type="button" class="btn btn-success">{{ __('Add User') }}</button>
                    </a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-condensed table-responsive" style="display:table">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Email Verified</th>
                            <th scope="col">Admin</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th>{{ $user->id }}</th>
                                    <th>{{ $user->first_name }}</th>
                                    <th>{{ $user->last_name }}</th>
                                    <th>{{ $user->username }}</th>
                                    <th>{{ $user->phone_number }}</th>
                                    <th>{{ $user->email }}</th>
                                    <th>{{ $user->email_verified_at }}</th>
                                    <th>{{ $user->type }}</th>
                                    <th>
                                        <a href="{{ route('admin.users.edit', $user->id) }}">
                                            <button type="button" class="btn btn-primary btn-sm">Edit</button> 
                                        </a>

                                        <form method="POST" action="{{ route('admin.users.delete', $user->id) }}" class="float-right">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Email Verified</th>
                            <th scope="col">Admin</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                    </table>

                    {{$users->links()}}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
