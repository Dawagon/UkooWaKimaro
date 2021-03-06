@extends('layouts.app')

@section('content')

<div class="container">
    <h3>Add New Member</h3>
    {!! Form::open(['action' => 'MembersController@store', 'method' => 'POST', 'enctype'=> 'multipart/form-data']) !!}
    <div class="form-group">
 {{Form::label('name', 'Name')}}
 {{Form::text('name' , '', ['class' =>'form-control', 'placeholder' => 'Name'])}}
 {{Form::label('phone', 'Phone Number')}}
 {{Form::number('phone' , '', ['class' =>'form-control', 'placeholder' => 'Phone Number'])}}

 {{Form::label('adress', 'Address')}}
 {{Form::text('adress' , '', ['class' =>'form-control', 'placeholder' => 'Address'])}}

 {{Form::label('Husband_Or_Wife', 'Husband Or Wife')}}
 {{Form::text('Husband_Or_Wife' , '', ['class' =>'form-control', 'placeholder' => 'Husband Or Wife'])}}

 {{Form::label('children', 'Children')}}
 {{Form::text('children' , '', ['class' =>'form-control', 'placeholder' => 'Children'])}}
    </div>
<div class="form-group">
{{Form::file('image')}}
</div>

    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
   {!! Form::close() !!}
@endsection
