<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $task = Task::all();

        return view('task', [
            'taskList' => $task
        ]);
    }

    public function openTask()
    {
        $openTask = Task::where('status', 'open')->get();

        return view('tasks.open-task', [
            'openTask' => $openTask
        ]);
    }

    public function inprogressTask()
    {
        $inprogressTask = Task::where('status', 'inprogress')->get();

        return view('tasks.inprogress-task', [
            'inprogressTask' => $inprogressTask
        ]);
    }

    public function canceledTask()
    {
        $canceledTask = Task::where('status', 'canceled')->get();

        return view('tasks.canceled-task', [
            'canceledTask' => $canceledTask
        ]);
    }

    public function doneTask()
    {
        $doneTask = Task::where('status', 'done')->get();

        return view('tasks.done-task', [
            'doneTask' => $doneTask
        ]);
    }
}
