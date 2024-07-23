<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('_admins.tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('_admins.tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'assigned_to' => 'required|exists:users,id',
            'due_date' => 'nullable|date',
            'status' => 'required|in:to-do,in-progress,done',
            'priority' => 'required|in:low,medium,high',
        ]);

        Task::create($validated);

        return redirect()->route('_admins.tasks.index');
    }

    public function show(Task $task)
    {
        return view('_admins.tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('_admins.tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'project_id' => 'sometimes|required|exists:projects,id',
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'assigned_to' => 'sometimes|required|exists:users,id',
            'due_date' => 'nullable|date',
            'status' => 'sometimes|required|in:to-do,in-progress,done',
            'priority' => 'sometimes|required|in:low,medium,high',
        ]);

        $task->update($validated);

        return redirect()->route('_admins.tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('_admins.tasks.index');
    }
}
