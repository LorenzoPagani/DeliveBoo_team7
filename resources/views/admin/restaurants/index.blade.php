@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1>Your Restaurant</h1>
            </div>
            <div class="col-12 col-lg-6">
                @foreach ($restaurants as $restaurant)
                    <div class="card mt-2">
                        <div class="card-header text-center">
                            <h3>
                                {{ $restaurant->name }}
                            </h3>
                        </div>
                        <div class="card-body d-flex flex-column align-items-center">
                            <img src='{{asset("/storage/app/public/uploads".$restaurant->restaurant_picture)}}' alt="photo">
                            
                            <div class="card-header rounded">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">{{ $restaurant->address }}</li>
                                    <li class="list-group-item">{{ $restaurant->description }}</li>
                                    <li class="list-group-item"> Categories: @if ($restaurant->types->isNotEmpty())
                                            @foreach ($restaurant->types as $type)
                                                {{ $type->name }}
                                            @endforeach
                                        @else
                                            none
                                        @endif
                                    </li>
                                    <li class="list-group-item">VAT: {{ $restaurant->vat }}</li>

                                    <li class="list-group-item text-center"><a class="btn btn-primary"
                                            href="{{ route('admin.restaurants.edit', $restaurant->id) }}">Edit</a>
                                        <a class="btn btn-primary" href="{{ route('admin.dishes.index') }}">View dishes</a>
                                        {{-- capiamo se aggiungere dettagli o eliminare la show --}}
                                        {{--  <a class="btn btn-primary"
                                            href="{{ route('admin.restaurants.show', $restaurant->id) }}"
                                            class="btn btn-primary">Dettagli</a> --}}
                                        {{-- Decidiamo se togliere la possibilità di cancellare il ristorante --}}
                                        {{-- <form style="display:inline-block" method="POST"
                                                action="{{ route('admin.restaurants.destroy', $restaurant->id) }}">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="form-control btn btn-danger">Cancella</a>
                                            </form> --}}
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
