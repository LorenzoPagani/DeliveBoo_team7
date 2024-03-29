@extends('layouts.app')

@section('content')
<script>
    function check_password_match(){
        password = document.getElementById("password").value;
        password_conf = document.getElementById("password-confirm").value;
        if (password != password_conf) {
            return false; 
        }
        else{
            return true;
        }
    }
    function display_error(){
        result = check_password_match()
        if (result == false){
            document.getElementById("password-confirm").classList.add("is-invalid");
            document.getElementById("confirm-error").classList.add("invalid-feedback")
            document.getElementById("confirm-error").innerHTML = '<span><strong>Password confirm does not match</strong></span>';
        }
        else{
            document.getElementById("confirm-error").innerHTML = "";
            document.getElementById("confirm-error").classList.remove("invalid-feedback")
            document.getElementById("password-confirm").classList.remove("is-invalid");
        }
    }
    function send_data(){
        result = check_password_match()
        if (result == true){
            document.getElementById("form-register").submit();
        }
        else{
            display_error();
            document.getElementById("password-confirm").focus();
        }
    }
</script>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registrati') }}</div>

                    <div class="card-body">
                        <form id="form-register" method="POST" action="{{ route('register') }}" enctype="multipart/form-data" onsubmit="event.preventDefault(); send_data()">
                            @csrf
                            @if ($errors->any())
                    	        <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="mb-4 row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome*') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo E-Mail*') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password*') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password" oninput="display_error()">
                                    <div id="confirm-error"></div>
                                </div>
                            </div>


                            <div class="mb-4 row">
                                <label for="restaurant_name" class="col-md-4 col-form-label text-md-right">Nome del Ristorante*</label>

                                <div class="col-md-6">
                                    <input id="restaurant_name" type="text" class="form-control" name="restaurant_name"
                                        value="{{ old('restaurant_name') }}" required>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="restaurant_address" class="col-md-4 col-form-label text-md-right">Indirizzo del Ristorante*</label>

                                <div class="col-md-6">
                                    <input id="restaurant_address" type="text" class="form-control"
                                        name="restaurant_address" value="{{ old('restaurant_address') }}" required>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="vat" class="col-md-4 col-form-label text-md-right">P.IVA*</label>

                                <div class="col-md-6">
                                    <input id="vat" type="text" class="form-control" name="vat"
                                        value="{{ old('vat') }}" required>
                                </div>
                            </div>


                            <div class="mb-4 row">
                                <label for="restaurant_picture" class="col-md-4 col-form-label text-md-right">Immagine</label>

                                <div class="col-md-6">
                                    <input type="file"
                                        class="form-control @error('restaurant_picture') is-invalid @enderror"
                                        id="restaurant_picture" name="restaurant_picture" placeholder="Enter picture "
                                        value="{{ old('restaurant_picture') }}">
                                    <div id="prev_box" class=" d-none">
                                        <img class=" pic-preview" id="thumb" src="#" alt="your image" />
                                        <div id="erase_prev" class="btn btn-danger">Rimuovi immagine</div>
                                    </div>
                                    @error('restaurant_picture')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="restaurant_description"
                                    class="col-md-4 col-form-label text-md-right">Descrizione</label>

                                <div class="col-md-6">
                                    <textarea id="restaurant_description" type="text" class="form-control" name="restaurant_description"
                                        value="{{ old('restaurant_description') }}" required></textarea>
                                </div>

                                <div class="mb-4 row">
                                    <label for="restaurant_tags"
                                        class="col-md-4 col-form-label text-md-right">Categorie</label>

                                <div class="col-md-6">
                                    @foreach ($restaurant_types as $item)
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="tags[]"
                                                value="{{ $item->id }}" id="{{ $item->id }}" >
                                                <label class="form-check-label" for="{{ $item->id }}" required>
                                                    {{ $item->name }}
                                                </label>
                                            </div>
                                    @endforeach
                                            
                                    @error('restaurant_tags')
                                        <div class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>




                                <div class="mb-4 row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary" id="register-button">
                                            {{ __('Registrati') }}
                                        </button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        /* aggiunta preview foto nei form */
        restaurant_picture.onchange = evt => {
            const [file] = restaurant_picture.files
            if (file) {
                prev_box.classList.remove('d-none')
                thumb.src = URL.createObjectURL(file)
            }
        }
        erase_prev.onclick = evt => {
            restaurant_picture.value = ''
            prev_box.classList.add('d-none')
        }
    </script>
@endsection
