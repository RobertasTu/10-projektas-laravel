@extends('layouts.app')

@section('content')
<div class='container'>
    <a class='btn btn-secondary' href='{{route('owner.stat')}}'>Export Statistics</a>
    <a class='btn btn-primary' href='{{route('type.pdf')}}'>Export types to PDF</a>

    <form action='{{route('type.search')}}' method='GET'>
        <input type='text' name='search' placeholder='enter your search key' />
        <button type='submit'>Search</button>
        @csrf
    </form>

    <form action='{{route('type.index')}}' method='GET'>
        @csrf
        <select name='collumnName'>
            @if ($collumnName == 'id')
            <option value="id" selected>ID</option>
        @else
            <option value="id">ID</option>
        @endif


        @if ($collumnName == 'title')
         <option value="title" selected>Title</option>
        @else
            <option value="title">Title</option>
        @endif


                </select>
        <select name='sortBy'>
            @if ($sortBy == 'asc')
            <option value='asc' selected>ASC</option>
            <option value='desc' >DESC</option>
            @else
            <option value='asc'>ASC</option>
            <option value='desc' selected>DESC</option>
            @endif


        </select>
        <button type='submit'>Sort</button>
    </form>
<table class='table table-striped'>
    <tr>
        <a class='btn btn-primary' href='{{route('type.create')}}'>Add new type<a>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Total tasks</th>
        <th>Actions</th>


    </tr>
    @foreach ($types as $type)
    <tr>
        <td>{{$type->id}} </td>
        <td><a href="{{route('type.show', [$type])}}">{{$type->title}} </td>
        <td>{!!$type->description!!}
        <td>{{$type->typeTasks->count()}}</td>

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

{{-- {{ $tasks->links() }} --}}

{!! $types->appends(Request::except('page'))->render()  !!}

</div>


@endsection
