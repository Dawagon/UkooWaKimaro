@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Members</h1>
   @if (count($members) > 0 )
@foreach ($members as $member)
      <div class="well">
          <div class="row">
              <div class="col-md-4 col-sm-4">
              <img style="width:100%" src="/storage/image/{{$member->image}}">
              </div>

              <div class="col-md-8 col-sm-8">
                <h3> <small>Name: </small><a href="/members/{{$member->id}}">{{$member->name}} </a></h3>
                <small>Added by {{$member->user->name}} on {{$member->created_at}}</small>
            </div>


          </div>

      <hr>
      </div>
@endforeach
{{$members->links()}}
   @else
     <p>No Members Foud</p>
   @endif
</div>
@endsection
