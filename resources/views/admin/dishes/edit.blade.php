@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>Edit dish</h1>
        <form action="{{ route('admin.dishes.update', $dish->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Dish name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') ?? $dish->name }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="picture">Dish picture</label>
                <input type="text" class="form-control @error('picture') is-invalid @enderror" id="picture" name="picture" value="{{ old('picture') ?? $dish->picture }}" placeholder="Enter picture URL">
                @error('picture')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Dish description</label>
                <textarea class="form-control @error('description') is-invalid @enderror"  id="description" name="description" rows="3">{{ $dish->description }}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="ingredients">Ingredients</label>
                <textarea class="form-control @error('ingredients') is-invalid @enderror" name="ingredients" id="ingredients" cols="30" rows="10" placeholder="enter ingredients">
                    {{ $dish->ingredients }}
                </textarea>
                @error('ingredients')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Dish price</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') ?? $dish->price }}">
                @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="visible">Dish visibility</label>
                <select class="form-control @error('price') is-invalid @enderror" id="visible" name="visible">
                    <option value="1" {{ $dish->visible == 1 ? 'selected' : '' }}>Visible</option>
                    <option value="0" {{ $dish->visible == 0 ? 'selected' : '' }}>Not visible</option>
                </select>
                @error('visible')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
@endsection
