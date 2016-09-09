<?php

namespace Monbord\Http\Controllers;

use Monbord\Repositories\TaskRepository;
use Monbord\Task;
use Illuminate\Http\Request;

use Monbord\Http\Requests;

class TaskController extends Controller
{
    protected  $tasks;
    /**
     * TaskController constructor.
     */
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');
        $this->tasks = $tasks;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){

        return view('task.index',['tasks' => $this->tasks->forUser($request->user())]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request){
        $this->validate($request, [
            'name' =>'required|max:255',
        ]);
        $request->user()->tasks()->create([
            'name' => $request->name,
            'progress' => 0,
            'comment' => '',
            'priority' => 4,
            'status' => false

        ]);
        return redirect('/tasks');
    }

    public function destroy(Request $request, Task $task){
        $this->authorize('destroy', $task);
        $task->delete();
        return redirect('/tasks');
    }

    public function viewTask(Request $request,  Task $task){
       return view('task.view', ['task' => $task]);
    }

    public function updateTask(Request $request, Task $task){
        $this->validate($request, [
            'name' =>'required|max:255',
            'progress' =>'required|digits_between:1,2'
        ]);
        $task->name = $request->name;
        $task->priority = $request->priority;
        $task->progress = $request->progress;
        $task->comment = $request->comment;
        $task->status = false;
        if($task->progress == 99){
            $task->status = true;
        }
        $task->save();
        return redirect('/tasks');
    }
}
