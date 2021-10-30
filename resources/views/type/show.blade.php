@extends('layouts.app')


@section('content')

<div class='container'>

<h2> ID: {{$type->id}}</h2>
<h2> Title: {{$type->title}}</h2>

<h2>Total tasks: {{$tasks_count}}</h2>

@foreach ($tasks as $task)
<p>Task title: {{$task->title}}</p>
<p>Task description: {!!$task->description!!}</p>

@endforeach
<a class='btn btn-secondary' href='{{route('type.index')}}'>Back</a>
</div>


{{-- {{ dd($author->authorBooks) }} --}}


@endsection
