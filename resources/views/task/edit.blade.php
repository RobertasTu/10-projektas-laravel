@extends('layouts.app')

@section('content')

    <div class="container">
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            <ul>
                <li>{{$error}}</li>
            </ul>
        </div>
        @endforeach
    @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit task') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('task.update', [$task]) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="task_title" class="col-md-4 col-form-label text-md-right">{{ __('Task title:') }}</label>

                                <div class="col-md-6">
                                    <input id="task_title" type="text" class="form-control @error('task_title') is-invalid @enderror" name="task_title"  value='{{$task->title}}' required autocomplete="task_title" autofocus>
                                    @error('task_title')
                                    <span role="alert" class="invalid-feedback">
                                        <strong>*{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="task_description" class="col-md-4 col-form-label text-md-right" >{{ __('Task description:') }}</label>

                                <div class="col-md-6">

                                   <textarea class='summernote' name='task_description' required>
                                       <p>{!! $task->description !!}</p>
                                   </textarea>
                                </div>
                            </div>

                            <div class="form-group row">

                                <label for="task_type_id" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="task_typeid">


                                        @foreach ($types as $type)
                                            <option value="{{$type->id}}" @if($type->id == $task->type_id) selected @endif>{{$type->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="task_start_date" class="col-md-4 col-form-label text-md-right">{{ __('Task start date:') }}</label>
                                <div class="col-md-6">
                            <input type="text" name="task_start_date" class="form-control" value='{{$task->start_date}}'>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="task_end_date" class="col-md-4 col-form-label text-md-right">{{ __('Task end date:') }}</label>
                                <div class="col-md-6">
                            <input type="text" name="task_end_date" class="form-control" value='{{$task->end_date}}'>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="task_logo" class="col-md-4 col-form-label text-md-right">{{ __('Task logo:') }}</label>
                                <div class="col-md-6">
                            <input type="file" name="task_logo" class="form-control">
                            <img src='{{$task->logo}}' alt='{{$task->logo}}' style='width:400px'>
                            <p>{{$task->logo}}</p>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('UPDATE TASK') }}
                                    </button>
                                </div>



                                <a href='{{route('task.index')}}'>Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
	    $(document).ready(function() {
	        $('.summernote').summernote();
	    });
	</script>
    @endsection
