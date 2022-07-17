<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Retailer;
use App\Models\Shop;
use App\Models\Task;
use App\Models\User;
use App\Models\Voivodeship;
use App\Services\DestroyService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class TaskController extends Controller
{
    public function index()
    {
        return Inertia::render('Tasks/Index', [
            'tasks' => Task::withTrashed()->paginate(20)
        ]);
    }

    public function create()
    {
        return Inertia::render('Tasks/Create');
    }

    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->validated());
        return redirect()->back();
    }

    public function show(Task $task)
    {
        return Inertia::render('Tasks/Show', [
            'voivodeships' => DB::table('voivodeships')->select('id', 'name')->get(),
            'Task' => $task
        ]);
    }

    public function edit($id)
    {
        return Redirect::route('Tasks.show', $id);
    }

    public function update(UpdateTaskRequest $request, Task $Task)
    {
        $Task->update($request->validated());
        return redirect::route('Tasks.show', $Task->id);
    }

    public function destroy(Task $Task, DestroyService $destroy)
    {
        $destroy->DestroyOrRestore($Task);
        return redirect()->back();
    }

    public function getRetailers()
    {
        return response()->json([
            'retailers' => Retailer::all()
        ]);
    }

    public function getUsers()
    {
        return response()->json([
            'retailers' => User::all()
        ]);
    }

    public function getShops()
    {
        return response()->json([
            'retailers' => Shop::all()
        ]);
    }
}
