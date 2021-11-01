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
                    <div class="card-header">{{ __('Add owner') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('owner.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="owner_name" class="col-md-4 col-form-label text-md-right">{{ __('Owner name:') }}</label>
                                <div class="col-md-6">
                                    <input id="owner_name" type="text" class="form-control @error('owner_name') is-invalid @enderror" name="owner_name"  required autocomplete="owner_name" autofocus>
                                    @error('owner_name')
                                    <span role="alert" class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="owner_surname" class="col-md-4 col-form-label text-md-right">{{ __('Owner surname:') }}</label>

                                <div class="col-md-6">
                                    <input id="owner_surname" type="text" class="form-control @error('owner_surname') is-invalid @enderror" name="owner_surname"  required autocomplete="owner_surname" autofocus>
                                    @error('owner_surname')
                                    <span role="alert" class="invalid-feedback">
                                        <strong>*{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="owner_email" class="col-md-4 col-form-label text-md-right">{{ __('Owner email:') }}</label>

                                <div class="col-md-6">
                                    <input id="owner_email" type="text" class="form-control @error('owner_email') is-invalid @enderror" name="owner_email"  required autocomplete="owner_email" autofocus>
                                    @error('owner_email')
                                    <span role="alert" class="invalid-feedback">
                                        <strong>*{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="owner_phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone number:') }}</label>

                                <div class="col-md-6">
                                    <input id="owner_phone" type="text" class="form-control @error('owner_phone') is-invalid @enderror" name="owner_phone"  required autocomplete="owner_phone" autofocus>
                                    @error('owner_phone')
                                    <span role="alert" class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('ADD Owner') }}
                                    </button>
                                </div>

                                <a href='{{route('owner.index')}}'>Back</a>

                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>








                            @endsection
