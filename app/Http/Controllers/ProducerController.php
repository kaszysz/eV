<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProducerRequest;
use App\Models\Category;
use App\Models\Producer;
use App\Services\DestroyService;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ProducerController extends Controller
{

    public function index()
    {
        return Inertia::render('Producers/Index', [
            'producers' => Producer::withTrashed()->paginate(20)
        ]);
    }

    public function create()
    {
        return Inertia::render('Producers/Create', [
            'categories' => Category::select('id', 'parent_id', 'name')->withTrashed()->get(),
            'producers' => Producer::select('id', 'name')->withTrashed()->get()
        ]);
    }

    public function store(ProducerRequest $request)
    {
        $producer = Producer::create($request->validated());
        $producer->categories()->sync($request->category_ids);
        return redirect()->back();
    }

    public function show(Producer $producer)
    {
        return Inertia::render('Producers/Show', [
            'producer' => $producer
        ]);
    }

    public function edit($id)
    {
        return Redirect::route('producers.show', $id);
    }

    public function update(ProducerRequest $request, Producer $producer)
    {
        $producer->update($request->validated());
        return redirect::route('producers.show', $producer->id);
    }

    public function destroy(Producer $producer, DestroyService $destroy)
    {
        $destroy->DestroyOrRestore($producer);
        return redirect()->back();
    }
}
