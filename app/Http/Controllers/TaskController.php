<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Closure;
use Illuminate\Contracts\View\View;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        return view('taskManager', [
            'tasks' => Task::query()
                        ->get(),]);
    }
    public function store()
    {
        Task::query()->create([
            'title'=>request()->title,
            'description'=>request()->description
        ]);
        return to_route('manager.index');
    }
    public function update(Task $task)
    {
        $task->update([
            'title'=>request()->title,
            'description'=>request()->description
        ]);
       return to_route('manager.index');
    }
    public function destroy(Task $task)
    {
        $task->delete();

        return to_route('manager.index');
    }

}
