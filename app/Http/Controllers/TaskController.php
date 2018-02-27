<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    public function index($lang)
    {
        $lang = ($lang == 'vn') ? 'vn' : 'en';
        Session::put('lang', $lang);
        App::setLocale($lang);
        $tasks = Task::orderBy('created_at', 'asc')->get();

        return view('tasks', compact('lang', 'tasks'));
    }
    public  function store(TaskRequest $taskRequest)
    {
        $task = new Task;
        $task->name = $taskRequest->task;
        
        if ($task->save()) {
            return redirect()->route('lang', ['lang' => Session::get('lang')]);
        } else {
            return back()->with(['msgErr' => trans('message.add_fails')]);
        }
    }
    public function destroy(Task $task)
    {
        if ($task->delete()) {
            return redirect()->route('lang', ['lang' => Session::get('lang')]);
        } else {
            return back()->with(['msgErr' => trans('message.delete_fails')]);
        }
    }
}
