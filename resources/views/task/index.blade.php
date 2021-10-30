@extends('layouts.app')

@section('content')
<div class='container'>

    <form action='{{route('task.search')}}' method='GET'>
        <input type='text' name='search' placeholder='enter your search key' />
        <button class='search' type='submit'>Search</button>
        @csrf
    </form>

    <form action='{{route('task.filter')}}' method='GET'>
        @csrf
        <div class="form-group row">
            <label for="task_typeid" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
                <div class='col-md-6'>
                     <select class="form-control" name="task_typeid">
                        @foreach ($types as $type)
                            <option name='filter' value="{{$type->id}}">{{$type->title}}</option>
                          @endforeach
                        </select>
                </div>
                     <button type='submit' class='btn btn-primary'>Filter</button>

        </div>

    </form>

        {{-- <div class="form-group row">
            <label for="task_type_id" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
            <div class="col-md-6">
                <select class="form-control" name="task_typeid">
                    @foreach ($types as $type)
                        <option value="{{$type->id}}">{{$type->title}}</option>
                    @endforeach
                </select>
            </div>
        </div> --}}

        <form action='{{route('task.index')}}' method='GET'>
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

        @if ($collumnName == 'description')
            <option value="description" selected>Description</option>
        @else
            <option value="description">Description</option>
        @endif --}}

        @if ($collumnName == 'type_id')
            <option value="type_id" selected>Type</option>
        @else
            <option value="type_id">Type</option>
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

<table class='table table-striped'>
    <tr>
        <a class='btn btn-primary' href='{{route('task.create')}}'>Add new task<a>
        <th>@sortablelink('id', 'ID')</th>
        <th>@sortablelink('title', 'Title')</th>
        <th>@sortablelink('description', 'Description')</th>
        <th>@sortablelink('type_id', 'Type')</th>
        <th>@sortablelink('start_date', 'Start date')</th>
        <th>@sortablelink('end_date', 'End_date')</th>
        <th>Actions</th>

        {{-- <th>Logo</th> --}}
    </tr>
    @foreach ($tasks as $task)
    <tr>
        <td>{{$task->id}} </td>
        <td><a href="{{route('task.show', [$task])}}">{{$task->title}} </td>
        <td>{!!$task->description!!} </td>
        <td>{{ $task->taskType->title }} </td>
        <td>{{$task->start_date}} </td>
        <td>{{$task->end_date}} </td>
        <td>
            <a href='{{route('task.edit',[$task])}}' class='btn btn-secondary'>Edit</a>
            <form method="post" action={{route('task.destroy',[$task])}}>
            @csrf
            <button type="submit" class="btn btn-danger">DELETE</button>
        </form>
    </td>

    </tr>
    @endforeach


</table>

<div class='pages' style='background-color:transparent'>
    <div class='pages-pag' style='background-color:transparent'>
        {!! $tasks->appends(Request::except('page'))->render()  !!}
        {{-- @foreach ($tasks as $task) --}}
        {{-- <a href='{{ route('task.index', [$task])}}' title='{{ $task->title }}'>({{ $task->title()->count()}})</a> @endforeach --}}

    </div>

    {{-- {{ $tasks->links() }} --}}

</div>


</div>


@endsection
