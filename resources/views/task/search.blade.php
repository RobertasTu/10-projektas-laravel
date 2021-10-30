@extends('layouts.app')

@section('content')

<div class='container'>
    {{-- <form action='{{route('task.search')}}' method='GET'>
        <input type='text' name='search' placeholder='enter your search key' />
        <button type='submit'>Search</button>
        @csrf
    </form> --}}


<table class='table table-striped'>
    <tr>
        <th>@sortablelink('id', 'ID')</th>
        <th>@sortablelink('title', 'Title')</th>
        <th>@sortablelink('description', 'Description')</th>
        <th>@sortablelink('type_id', 'Type')</th>
    </tr>
    @foreach ($tasks as $task)
    <tr>
        <td>{{$task->id}} </td>
        <td><a href="{{route('task.show', [$task])}}">{{$task->title}} </td>
        <td>{!!$task->description!!} </td>
        <td>{{$task->taskType->title }} </td>
    </tr>
    @endforeach



</table>
<a class='btn btn-secondary' href='{{route('task.index')}}'>Back</a>

{{-- {{ $companies->links() }} --}}

{!! $tasks->appends(Request::except('page'))->render()  !!}

</div>

@endsection
