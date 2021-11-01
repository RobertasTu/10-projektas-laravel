@extends('layouts.app')

@section('content')
<div class='container'>
    <a class='btn btn-secondary' href='{{route('owner.stat')}}'>Export Statistics</a>

    {{-- <form action='{{route('paginationsetting.search')}}' method='GET'>
        <input type='text' name='search' placeholder='enter your search key' />
        <button type='submit'>Search</button>
        @csrf
    </form>

    <form action='{{route('paginationsetting.index')}}' method='GET'>
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
    </form> --}}
<table class='table table-striped'>
    <tr>
        <a class='btn btn-primary' href='{{route('paginationsetting.create')}}'>Add new pagination setting<a>
        <th>ID</th>
        <th>Title</th>
        <th>Value</th>
        <th>Visible</th>
        <th>Actions</th>


    </tr>
    @foreach ($paginationsettings as $paginationsetting)
    <tr>
        <td>{{$paginationsetting->id}} </td>
        <td><a href="{{route('paginationsetting.show', [$paginationsetting])}}">{{$paginationsetting->title}} </td>
        <td>{{$paginationsetting->value}}</td>
        <td>{{$paginationsetting->visible}}</td>


        <td>
            <a href='{{route('paginationsetting.edit',[$paginationsetting])}}' class='btn btn-secondary'>Edit</a>
            <form method="post" action={{route('paginationsetting.destroy',[$paginationsetting])}}>
            @csrf
            <button type="submit" class="btn btn-danger">DELETE</button>
        </form>
    </td>

    </tr>
    @endforeach



</table>

{{-- {{ $tasks->links() }} --}}

{{-- {!! $paginationsetting->appends(Request::except('page'))->render()  !!} --}}

</div>


@endsection
