<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComponentRequest;
use App\Models\Category;
use App\Models\Component;
use App\Models\Producer;
use App\Services\DestroyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ComponentController extends Controller
{
    public function index()
    {
        return Inertia::render('Components/Index', [
            'components' => Component::withTrashed()->paginate(20)
        ]);
    }

    public function create()
    {
        return Inertia::render('Components/Create', [
            "categories" => Category::whereRelation('parent', 'name', 'Components')->get(),
            'producers' => Producer::orderBy('name')->get(),
            'components' => Component::select('id', 'name')->without('category')->get()
        ]);
    }

    public function store(ComponentRequest $request)
    {
        $component = Component::create($request->validated());
        return redirect()->back();
    }

    public function show(Component $component)
    {
        return Inertia::render('Components/Show', [
            'categories' => Category::withTrashed()->get(),
            'component' => $component
        ]);
    }

    public function edit($id)
    {
        return Redirect::route('components.show', $id);
    }

    public function update(ComponentRequest $request, Component $component)
    {
        $component->update($request->validated());
        return redirect::route('components.show', $component->id);
    }

    public function destroy(Component $component, DestroyService $destroy)
    {
        $destroy->DestroyOrRestore($component);
        return redirect()->back();
    }

    public function getComponentsList($name){
        return response()->json(Component::where('name', 'like', '%'. $name . '%')->get());
    }
}
