@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add pagination setting') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('paginationsetting.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="paginationsetting_title" class="col-md-4 col-form-label text-md-right">{{ __('Pagination setting title:') }}</label>

                                <div class="col-md-6">
                                    <input id="paginationsetting_title" type="text" class="form-control @error('title') is-invalid @enderror" name="paginationsetting_title"  required autocomplete="paginationsetting_title" autofocus>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="paginationsetting_value" class="col-md-4 col-form-label text-md-right">{{ __('Pagination setting value:') }}</label>

                                <div class="col-md-6">
                                    <input id="paginationsetting_value" type="text" class="form-control @error('value') is-invalid @enderror" name="paginationsetting_value"  required autocomplete="paginationsetting_value" autofocus>

                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('ADD pagination setting') }}
                                    </button>
                                </div>



                                <a href='{{route('paginationsetting.index')}}'>Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
