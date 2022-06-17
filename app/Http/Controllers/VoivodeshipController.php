<?php

namespace App\Http\Controllers;

use App\Http\Requests\VoivodeshipRequest;
use App\Models\Voivodeship;
use App\Services\DestroyService;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class VoivodeshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Voivodeships/Index', [
            'voivodeships' => Voivodeship::withTrashed()->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Voivodeships/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VoivodeshipRequest $request)
    {
        $Voivodeship = Voivodeship::create($request->validated());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Voivodeship $voivodeship)
    {
        return Inertia::render('Voivodeships/Show', [
            'voivodeship' => $voivodeship
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Redirect::route('voivodeships.show', $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VoivodeshipRequest $request, Voivodeship $voivodeship)
    {
        $voivodeship->update($request->validated());
        return redirect::route('categories.show', $voivodeship->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voivodeship $voivodeship, DestroyService $destroy)
    {
        $destroy->DestroyOrRestore($voivodeship);
        return redirect()->back();
    }
}
