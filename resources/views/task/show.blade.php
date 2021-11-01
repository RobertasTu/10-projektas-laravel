@extends('layouts.app')

@section('content')

<div class='container'>


<h1>Information about task</h1>
<table>
    <a href='{{route('task.pdftask', [$task])}}' class='btn btn-primary'>Export Task to PDF</a>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Type</th>
        <th>Start date</th>
        <th>End date</th>
        <th>Logo</th>
    </tr>



        <tr>
            <td>{{ $task->id }}</td>

            <td>{{$task->title}}{{ $task->title }}</td>
            <td>{!! $task->description !!}</td>
            <td>{{ $task->taskType->title }}</td>
            <td>{{ $task->start_date }}</td>
            <td>{{ $task->end }}</td>
            <td>{{ $task->logo }}</td>

            <td>
                <a href='{{route('task.edit',[$task])}}'>Edit</a>
                <form method='POST' action="{{route('task.destroy', [$task]) }}">

                @csrf
                <button type='submit'>Delete</button>

                </form>
            </td>
        </tr>


    </table>
    <a class='btn btn-primary' href='{{route('task.index')}}'>Back</a>
</div>

@endsection
