<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\User;
use App\Models\Type;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $restaurant_types = Type::all();
        return view('auth.register', compact("restaurant_types"));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'restaurant_name' => ['required', 'string', 'max:255'],
            'restaurant_address' => ['required', 'string', 'max:255'],
            'vat' => ['required', 'string', 'min:11', 'max:11', "unique:App\Models\Restaurant,vat"],
            'restaurant_picture' => ["nullable", File::image()->min("1kb")->max("2mb")],
            'restaurant_description' => ['string'],
            'tags' => ['required']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        $ristorante = new Restaurant();
        $ristorante->user_id = $user->id;
        $ristorante->name = $request->restaurant_name;
        $ristorante->address = $request->restaurant_address;
        $ristorante->vat = $request->vat;

        if ($request["restaurant_picture"] != null) {
            $percorso = Storage::disk("public")->put('/uploads', $request['restaurant_picture']);
            $ristorante->picture = $percorso;
        } else {
            $ristorante->picture = "";
        }
        $ristorante->description = $request->restaurant_description;
        $ristorante->save();

        $ristorante->types()->sync($request->tags);

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
