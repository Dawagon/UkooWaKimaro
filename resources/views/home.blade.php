@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/members/create" class="btn btn-primary">Add New Member</a>
                    <h3>Members</h3>
                    @if (count($members) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Name</th>
                            <td></td>
                            <td></td>
                        </tr>
                        @foreach ($members as $member)
                        <tr>
                            <th>{{$member->name}}</th>
                            <td><a href="/members/{{$member->id}}/edit" class="btn btn-default">Edit</a></td>
                            <td>{!!Form::open(['action'=> ['MembersController@destroy', $member->id], 'method'=> 'POST', 'class' => 'text-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class'=> 'btn btn-danger'])}}
                                {!!Form::close()!!}</td>
                            </tr>
                        @endforeach


                    </table>
                    @else
                        <p>You Have Not Added Any Member</p>
                    @endif



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
