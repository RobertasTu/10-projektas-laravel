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
                                    <input id="paginationsetting_title" type="text" class="form-control @error('paginationsetting_title') is-invalid @enderror" name="paginationsetting_title"  required autocomplete="paginationsetting_title" autofocus>
                                    @error('paginationsetting_title')
                                    <span role="alert" class="invalid-feedback">
                                        {{$message}}
                                    </span>
                                @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="paginationsetting_value" class="col-md-4 col-form-label text-md-right">{{ __('Pagination setting value:') }}</label>

                                <div class="col-md-6">
                                    <input id="paginationsetting_value" type="text" class="form-control @error('paginationsetting_value') is-invalid @enderror" name="paginationsetting_value"  required autocomplete="paginationsetting_value" autofocus>
                                    @error('paginationsetting_value')
                                    <span role="alert" class="invalid-feedback">
                                        {{$message}}
                                    </span>
                                @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="paginationsetting_visible" class="col-md-4 col-form-label text-md-right">{{ __('Pagination setting visible:') }}</label>
                                <div class="col-md-6">
                                    <input id="paginationsetting_visible" type="checkbox" class="form-control @error('paginationsetting_visible') is-invalid @enderror" name="paginationsetting_visible" value='1'>
                                    @error('paginationsetting_visible')
                                    <span role="alert" class="invalid-feedback">
                                        {{$message}}
                                    </span>
                                @enderror
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
