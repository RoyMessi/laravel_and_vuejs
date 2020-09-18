<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Http\Resources\TaskResourceCollection;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(): TaskResourceCollection{
        $completedTasksCount = Task::where('is_completed','1')->count();
        return new TaskResourceCollection(Task::paginate(),$completedTasksCount);
    }

    public function show(Task $task): TaskResource{
        return new TaskResource($task);
    }

    public function store(Request $request):TaskResource{
        $request->validate([
            'text'=>'required'
        ]);
        $task = Task::create([
            'text'=>$request->input('text'),
            'is_completed'=>false
        ]);
        return new TaskResource($task);
        // $task = Task::create($request->all());
    }

    public function update(Task $task, Request $request):TaskResource{
        // $request->validate([
        //     'text'=>'required'
        // ]);
        $task->update($request->all());
        return new TaskResource($task);
    }

    public function destroy(Task $task):TaskResource{
        $task->delete();
        return new TaskResource($task);
        // return response()->json();
    }
}
