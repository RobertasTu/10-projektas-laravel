@extends('layouts.app')

@section('content')



<div class='container'>
    <a class='btn btn-secondary' href='{{route('owner.stat')}}'>Export Statistics</a>
    <a class='btn btn-primary' href='{{route('owner.pdf')}}'>Export owners to PDF</a>

<table class='table table-striped'>
    <tr>
        <a class='btn btn-primary' href='{{route('owner.create')}}'>Add new owner<a>
        <th>ID</th>
        <th>Name Surname</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Actions</th>


    </tr>
    @foreach ($owners as $owner)
    <tr>
        <td>{{$owner->id}} </td>
        <td><a href="{{route('owner.show', [$owner])}}">{{$owner->name}} {{$owner->surname}}</a></td>
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
    @endforeach



</table>

</div>

@endsection
