@extends('layouts.apps')

@section('content')
<div class="mb-3 displayed" style="color:#FFFFFF; max-width: 540px;">
    <h1><strong style="font-size:50px">Adds</strong></h1>
</div>
    <hr>
   

    @if(count($adds) >= 1)
        @foreach($adds as $add)
            @if($add->category === "Accessories")
    <div class="card mb-3 displayed opacity" style="background-color:#000000; max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <a href="/adds/{{$add->id}}"> <img src="{{$add->image}}" style="height:100%; width:100%"
                        class="card-img" alt="..."></a>
            </div>
            <div class="col-md-8 mb-5">
                <div class="card-body">
                    <h5 class="card-title" style="color:#FFFFFF"><a href="/adds/{{$add->id}}">{{$add->title}}</a></h5>
                    <h5 class="card-title" style="color:#FFFFFF">{{$add->category}}</h5>

                    <p class="card-text" style="color:#FFFFFF">offer by {{$add->username}}</p>
                    <p class="card-text" style="color:#FFFFFF"><small class="text-muted">{{$add->created_at}}</small></p>
                </div>
            </div>
        </div>
    </div>
    @endif
@endforeach
<div class="mb-3 displayed" style="backgounr-color:#000000; max-width: 540px;">
        <div class="row no-gutters" style="color:#000000;">
            {{ $adds->links() }}
            </div>
            <!-- .col-md-12 end -->
        </div>

@else
<p>Aucun add existant !<p>


@endif

<hr>
@endsection