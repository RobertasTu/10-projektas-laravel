@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add type') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('type.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="type_title" class="col-md-4 col-form-label text-md-right">{{ __('Type title:') }}</label>

                                <div class="col-md-6">
                                    <input id="type_title" type="text" class="form-control @error('type_title') is-invalid @enderror" name="type_title"  required autocomplete="type_title" autofocus>
                                    @error('type_title')
                                    <span role="alert" class="invalid-feedback">
                                        {{$message}}
                                    </span>
                                @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type_description" class="col-md-4 col-form-label text-md-right" >{{ __('Type description:') }}</label>
                               <div class="col-md-6">
                                   <textarea class='summernote @error('type_description') is-invalid @enderror' name='type_description' value= '{{ old('type_description')}}'required>
                                   </textarea>
                                   @error('type_description')
                                   <span role="alert" class="invalid-feedback">
                                       {{$message}}
                                   </span>
                               @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('ADD Type') }}
                                    </button>
                                </div>



                                <a href='{{route('type.index')}}'>Back</a>
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
