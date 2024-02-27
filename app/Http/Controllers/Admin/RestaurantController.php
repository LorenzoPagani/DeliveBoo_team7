<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $restaurants = Restaurant::where('user_id', $userId)->get();
        return view('admin.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.restaurants.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantRequest $request)
    {
        $new_Restaurant = new Restaurant;
        $new_Restaurant->user_id = Auth::id();
        $new_Restaurant->fill($request->all());

        if ($request->hasFile('restaurant_picture')) {
            $restaurant_picture = $request->file('restaurant_picture');
            $fileName = $restaurant_picture->getClientOriginalName();
            $restaurant_picture->storeAs('uploads', $fileName); // You can customize the path as needed
            // You can also save file details to the database or perform any other action
            $formData['file_path'] = $fileName; // Assuming you want to save the file path to the database
        }


        $new_Restaurant->save();
        if ($request->types) {
            $new_Restaurant->types()->attach($request->types);
        }


        return redirect()->route('admin.restaurants.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        return view('admin.restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        $types = Type::all();
        return view('admin.restaurants.edit', compact('restaurant', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        $validated_data = $request->validated();
        if (array_key_exists('types', $validated_data)) {
            $restaurant->types()->sync($validated_data['types']);
        }
        $restaurant->update($validated_data);



        return redirect()->route('admin.restaurants.show', $restaurant->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect()->route('admin.restaurants.index');
    }
}
