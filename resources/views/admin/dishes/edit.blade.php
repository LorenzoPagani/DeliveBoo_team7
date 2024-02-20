@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>Edit dish</h1>
        <form action="{{ route('admin.dishes.update', $dish->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Dish name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $dish->name }}">
            </div>
            <div class="form-group">
                <label for="description">Dish description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $dish->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Dish price</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ $dish->price }}">
            </div>
            <div class="form-group">
                <label for="visible">Dish visibility</label>
                <select class="form-control" id="visible" name="visible">
                    <option value="1" {{ $dish->visible == 1 ? 'selected' : '' }}>Visible</option>
                    <option value="0" {{ $dish->visible == 0 ? 'selected' : '' }}>Not visible</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
@endsection
