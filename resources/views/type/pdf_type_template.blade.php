<h1>Types table export</h1>
<table>
<tr>
<th>ID</th>
<th>Title</th>
<th>Description</th>
<th>Total tasks</th>

</tr>
{{-- @foreach ($types as $type) --}}
<tr>
<td>{{$type->id}} </td>
<td>{{$type->title}} </td>
<td>{!!$type->description!!}
<td>{{$type->typeTasks->count()}}</td>

</tr>
{{-- @endforeach --}}

</table>
