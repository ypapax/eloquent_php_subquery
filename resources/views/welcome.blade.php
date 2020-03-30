@extends('layout')
@section('title')
    Welcome
@endsection
@section('content')
    <h1>Welcome {{$foo}} {{$name}}</h1>
{{--    {!! $no_escape !!}--}}
    <ul>
        @foreach($tasks as $task)
            <li>{{$task}}</li>
        @endforeach
    </ul>
@endsection

