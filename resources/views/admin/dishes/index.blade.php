@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>All Dishes</h1>
            <div class="col-12">

                <a class="btn btn-info" href="{{ route('admin.dishes.create') }}">add new dish</a>
            </div>
            <div class="col-12 col-lg-6">
                @foreach ($dishes as $dish)
                    <div class="card mt-2">
                        <div class="card-header text-center">
                            <h3>
                                {{ $dish->name }}
                            </h3>
                        </div>
                        <div class="card-body d-flex flex-column align-items-center">
                            <img class="w-50 mb-2" src="{{ $dish->picture }}" alt="photo">
                            <div class="card-header rounded">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">{{ $dish->price }}</li>
                                    <li class="list-group-item">{{ $dish->description }}</li>


                                    <li class="list-group-item"><a class="btn btn-primary"
                                            href="{{ route('admin.dishes.edit', $dish->id) }}">Modifica</a>
                                        <a class="btn btn-primary" href="{{ route('admin.dishes.show', $dish->id) }}"
                                            class="btn btn-primary">Dettagli</a>
                                        <form style="display:inline-block" method="POST"
                                            action="{{ route('admin.dishes.destroy', $dish->id) }}">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="form-control btn btn-danger">Cancella</a>
                                        </form>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <style lang="scss">
            body {
                background-color: #c5d7dd;
            }

            .card {
                background-image: url(https://img.freepik.com/free-photo/handrawn-barbecue-elements_125540-588.jpg?size=626&ext=jpg&ga=GA1.1.1700460183.1708646400&semt=ais);
                margin-bottom: 2rem;

                .card-header {
                    box-shadow: 0px 3px 2px 0px rgb(0 0 0 / 30%), 0 2px 4px -1px rgb(7 7 7 / 69%);

                }

                .card-header,
                .list-group-item {
                    background-color: #FF960C;
                    color: white;
                }

                .list-group {
                    border-radius: 10px;

                }

                .card-body {

                    img {
                        border-radius: 50%;
                    }
                }

            }
        </style>
    @endsection
