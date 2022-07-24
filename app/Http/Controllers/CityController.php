<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityStoreRequest;
use App\Http\Requests\CityUpdateRequest;
use App\Models\City;
use App\Services\DestroyService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CityController extends Controller
{
    public function index()
    {
        return Inertia::render('Cities/Index', [
            'cities' => City::withTrashed()->paginate(20)
        ]);
    }

    public function create()
    {
        return Inertia::render('Cities/Create', [
            'voivodeships' => DB::table('voivodeships')->select('id', 'name')->get()
        ]);
    }

    public function store(CityStoreRequest $request)
    {
        $city = City::create($request->validated());
        return redirect()->back();
    }

    public function show(City $city)
    {
        return Inertia::render('Cities/Show', [
            'voivodeships' => DB::table('voivodeships')->select('id', 'name')->get(),
            'city' => $city
        ]);
    }

    public function edit($id)
    {
        return Redirect::route('cities.show', $id);
    }

    public function update(CityUpdateRequest $request, City $city)
    {
        $city->update($request->validated());
        return redirect::route('cities.show', $city->id);
    }

    public function destroy(City $city, DestroyService $destroy)
    {
        $destroy->DestroyOrRestore($city);
        return redirect()->back();
    }


    public function getCitiesVoivodeship($id){
        $cities = DB::table('cities')->select('id', 'name')->where('voivodeship_id', $id)->get();
        return response()->json($cities);
    }
}
