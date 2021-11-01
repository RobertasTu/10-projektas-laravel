@extends('layouts.app')

@section('content')
<div class='container'>

<h1>Total Owners: {{$owners_count}}</h1>
<h1>Total Types: {{$types_count}}</h1>
<h1>Total Tasks: {{$tasks_count}}</h1>

<a class='btn btn-secondary' href='{{route('owner.index')}}'>Go to owners table</a>
<a class='btn btn-secondary' href='{{route('type.index')}}'>Go to type table</a>
<a class='btn btn-secondary' href='{{route('task.index')}}'>Go to task table</a>
</div>



@endsection
