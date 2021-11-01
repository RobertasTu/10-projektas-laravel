<h1>Tasks table export</h1>
<table class="table table-striped">


    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Type</th>
        <th>Owner</th>
        <th>Task start date</th>
        <th>Task end date</th>
    </tr>
    {{-- @foreach ($tasks as $task) --}}
        <tr>
            <td> {{$task->id }}</td>
            <td> {{$task->title }}</td>
            <td> {!!$task->description !!}</td>
            <td> {{$task->taskType->title }}</td>
            <td>{{ $task->taskOwner->name }} {{ $task->taskOwner->surname }} </td>
            <td> {{$task->start_date }}</td>
            <td> {{$task->end_date }}</td>
        </tr>
    {{-- @endforeach --}}
    </table>
