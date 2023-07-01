<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Contracts\View\View;

class TaskController extends Controller
{
    public function index():View
    {
        return view('taskManager', [
            'tasks' => Task::query()
                ->get()]);
    }

    public function store(Request $request)
    {
        Task::query()->create([
            'title'=>$request->title,
            'description'=>$request->description
        ]);
        return to_route('manager.index');
    }

    public function update(Task $task)
    {
        $task->update([
            'title' => request()->title,
            'description' => request()->description,
        ]);

        return to_route('manager.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return to_route('manager.index');
    }
}
