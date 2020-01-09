@extends('layouts.app')

@section('content')

<div class="well">
    <div class="row">
        <div class="col-md-4 col-sm-4">
        <img style="width:100%" src="/storage/image/{{$member->image}}">
        </div>

        <div class="col-md-8 col-sm-8">
<h3><small>Name: </small>{{$member->name}}</h3>
<h3><small>Phone Number: </small>{{$member->phone}}</h3>
<h3><small>Address: </small>{{$member->adress}}</h3>
<h3><small>Husband Or Wife: </small>{{$member->Husband_Or_Wife}}</h3>
<h3><small>Children: </small>{{$member->children}}</h3>
<hr>
<small>Added by {{$member->user->name}} on {{$member->created_at}}</small>
<hr>
<a href="/members/{{$member->id}}/edit" class="btn btn-default text-left">Edit</a>

{!!Form::open(['action'=> ['MembersController@destroy', $member->id], 'method'=> 'POST', 'class' => 'text-right'])!!}
{{Form::hidden('_method', 'DELETE')}}
{{Form::submit('Delete', ['class'=> 'btn btn-danger'])}}
{!!Form::close()!!}

      </div>


    </div>

<hr>
<a href="/members" class="btn btn-default">Go Back</a>
</div>
@endsection
