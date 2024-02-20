@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>Create a new restaurant</h1>
        <form action="{{ route('admin.restaurants.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Restaurant name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter restaurant name">
            </div>
            <div class="form-group">
                <label for="address">Restaurant address</label>
                <input type="text" class="form-control" id="address" name="address"
                    placeholder="Enter restaurant address">
            </div>
            <div class="form-group">
                <label for="description">Restaurant description</label>
                <input type="text" class="form-control" id="description" name="description"
                    placeholder="Enter restaurant description">
            </div>
            <div class="form-group">
                <label for="vat_number">Restaurant VAT number</label>
                <input type="text" class="form-control" id="vat_number" name="vat_number"
                    placeholder="Enter restaurant VAT number">
            </div>
            <div class="form-group">
                <label for="category_id">Restaurant categories</label>
                <select class="form-control" id="category_id" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection