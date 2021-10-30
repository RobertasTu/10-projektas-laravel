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
        <th>Actions</th>
    </tr>
    @foreach ($types as $type)
    <tr>
        <td>{{$type->id}} </td>
        <td><a href="{{route('type.show', [$type])}}">{{$type->title}} </td>
        <td>{!!$type->description!!} </td>
        <td>{{$task->taskType->title }} </td>
        <td>
            <a href='{{route('type.edit',[$type])}}' class='btn btn-secondary'>Edit</a>
            <form method="post" action={{route('type.destroy',[$type])}}>
            @csrf
            <button type="submit" class="btn btn-danger">DELETE</button>
        </form>
    </td>

    </tr>
    @endforeach



</table>
<a class='btn btn-secondary' href='{{route('task.index')}}'>Back</a>

{{-- {{ $companies->links() }} --}}

{!! $tasks->appends(Request::except('page'))->render()  !!}

</div>

@endsection
