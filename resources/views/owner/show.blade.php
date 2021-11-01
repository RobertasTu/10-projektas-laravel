@extends('layouts.app')

@section('content')

<div class='container'>
    <a href='{{route('owner.pdfowner', [$owner])}}' class='btn btn-primary'>Export Owner PDF</a>

<table class='table table-striped'>
    <tr>
        <a class='btn btn-primary' href='{{route('owner.create')}}'>Add new owner</a>
        <th>ID</th>
        <th>Name Surname</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Actions</th>


    </tr>

    <tr>
        <td>{{$owner->id}} </td>
        <td>{{$owner->name}} {{$owner->surname}} </td>
        <td>{{$owner->email}}</td>
        <td>{{$owner->phone}}</td>


        <td>
            <a href='{{route('owner.edit',[$owner])}}' class='btn btn-secondary'>Edit</a>
            <form method="post" action={{route('owner.destroy',[$owner])}}>
            @csrf
            <button type="submit" class="btn btn-danger">DELETE</button>
        </form>
    </td>

    </tr>




</table>

<a href='{{route('owner.index')}}'>Back</a>

</div>

@endsection
