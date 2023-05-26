<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Task;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        $data = Task::select('id', 'due_date')->get()->groupBy(function ($data) {
            return Carbon::parse($data->due_date)->format('m');
        });

        $months = [];
        $monthCount = [];
        foreach ($data as $month => $values) {
            $months[] = $month;
            $monthCount[] = count($values);
        }
        // Carbon::today($year,$month,$date);

        $client = new Client(); //GuzzleHttp\Client
        // $url = "https://documenter.getpostman.com/view/841292/Tz5p7yHS#534da562-3335-4a1f-bca2-d7ee2266f457";
        $url = 'https://api.myquran.com/v1/sholat/jadwal/1301/2023/05/26';


        $response = $client->request('GET', $url);
        $responseBody = $response->getBody()->getContents();
        $waktuSholat = json_decode($responseBody);
        // dd($waktuSholat);

        $task = Task::all();
        $openTask = Task::where('status', 'open')->get();
        $progressTask = Task::where('status', 'progress')->get();
        $canceledTask = Task::where('status', 'cancel')->get();
        $doneTask = Task::where('status', 'done')->get();

        return view('dashboard', compact('waktuSholat'), [
            'data' => $data,
            'months' => $months,
            'monthCount' => $monthCount,
            'taskList' => $task,
            'openTask' => $openTask,
            'progressTask' => $progressTask,
            'cancelTask' => $canceledTask,
            'doneTask' => $doneTask

        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'task' => 'required|max:255',
            'due_date' => 'required',
        ]);

        $task = Task::create($request->all());

        if ($task) {
            Session::flash('status', 'success');
            Session::flash('message', 'Add Task Success!!!');
        }

        return redirect('/');
    }
}
