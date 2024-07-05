<?php

namespace App\Http\Controllers;

use App\Models\Priorities;
use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::orderBy('priority_id')->paginate(30);
        $priorities = Priorities::all();
        return view('tasks.index', [
            'tasks' => $tasks,
            'priorities' => $priorities
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $priorities = Priorities::all();
        return view('tasks.create', compact('priorities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Task::create($request->all());
        return redirect()->route('tasks.index')
            ->with(['success' => 'Task added successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $priorities = Priorities::all();
        return view('tasks.edit', compact('task','priorities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
        return redirect()->route('tasks.show', $task->id)
            ->with(['success' => 'Task updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')
            ->with(['success' => 'Task successfully deleted!']);
    }
}
