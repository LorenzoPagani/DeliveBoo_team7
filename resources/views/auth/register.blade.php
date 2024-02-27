@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-4 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name*') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address*') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password*') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>


                        <div class="mb-4 row">
                            <label for="restaurant_name" class="col-md-4 col-form-label text-md-right">Restaurant name*</label>

                            <div class="col-md-6">
                                <input id="restaurant_name" type="text" class="form-control" name="restaurant_name" value="{{ old('restaurant_name') }}" required>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="restaurant_address" class="col-md-4 col-form-label text-md-right">Restaurant address*</label>

                            <div class="col-md-6">
                                <input id="restaurant_address" type="text" class="form-control" name="restaurant_address" value="{{ old('restaurant_address') }}" required>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="vat" class="col-md-4 col-form-label text-md-right">VAT*</label>

                            <div class="col-md-6">
                                <input id="vat" type="text" class="form-control" name="vat" value="{{ old('vat') }}" required>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="restaurant_picture" class="col-md-4 col-form-label text-md-right">Resturant Picture*</label>

                            <div class="col-md-6">
                                <input id="restaurant_picture" type="file" class="form-control" name="restaurant_picture" accept=".png, .jpg, .jpeg"  required>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="restaurant_description" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <input id="restaurant_description" type="text" class="form-control" name="restaurant_description" value="{{ old('restaurant_description') }}" required>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="restaurant_tags" class="col-md-4 col-form-label text-md-right">Tags</label>

                            <div class="col-md-6">
                                <select id="restaurant_tags" class="form-select" multiple name="tags[]">
                                    @foreach ($restaurant_types as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        

                        <div class="mb-4 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
