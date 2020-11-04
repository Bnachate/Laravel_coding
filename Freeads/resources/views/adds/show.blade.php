@extends('layouts.app')

@section('content')

<h1>{{$add->title}}</h1>
<small>écrit le {{$add->created_at}}</small>
<div>
{{$add->description}}
</div>
        
        
@endsection