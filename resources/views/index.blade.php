@extends('layouts.base')

@section('title', 'Welcome')


@section('content')
    <p>Search for an actor by name:</p>
    {!! Form::open(array('url' => '/search', 'id'=>'movies-form')) !!}
    	{!! Form::text('name', null, array("placeholder"=>"Name")); !!}
    	{!! Form::submit('Search'); !!}
    {!! Form::close() !!}
@stop