<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\TaskStoreRequest;
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
        return Inertia::render('Tasks/Create', [
            'voivodeships' => Voivodeship::all(),
            'retailers' => Retailer::all(),
            'users' => User::all(),
            'shops' => Shop::all()
        ]);
    }

    public function store(TaskStoreRequest $request)
    {
        $task = Task::create($request->validated());
        if ($request->get('recivers') == 'retailers') {
            $task->retailers()->sync($request->reciversArray);
        }
        if ($request->get('recivers') == 'shops') {
            $task->shops()->sync($request->reciversArray);
        }
        if ($request->get('recivers') == 'users') {
            $task->users()->sync($request->reciversArray);
        }
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
