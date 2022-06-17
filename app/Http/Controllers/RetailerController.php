<?php

namespace App\Http\Controllers;

use App\Http\Requests\RetailerRequest;
use App\Models\Retailer;
use App\Services\DestroyService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class RetailerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Retailers/Index', [
            'retailers' => Retailer::withTrashed()->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Retailers/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RetailerRequest $request)
    {
        $Retailer = Retailer::create($request->validated());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Retailer $Retailer)
    {
        return Inertia::render('Retailers/Show', [
            'retailer' => $Retailer
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
        return Redirect::route('retailers.show', $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RetailerRequest $request, Retailer $Retailer)
    {
        $Retailer->update($request->validated());
        return redirect::route('retailers.show', $Retailer->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Retailer $retailer, DestroyService $destroy)
    {
        $destroy->DestroyOrRestore($retailer);
        return redirect()->back();
    }
}
