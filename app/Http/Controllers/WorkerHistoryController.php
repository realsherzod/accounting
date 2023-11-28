<?php

namespace App\Http\Controllers;

use App\Models\Income_category;
use App\Models\Worker;
use App\Models\WorkerHistory;
use Illuminate\Http\Request;

class WorkerHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incomes = Income_category::all();
        $workers = Worker::all();
        return view('admin.Worker.index', compact('workers','incomes'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'summa' => 'required|numeric',
            'comment' => 'required',
            'worker_id' => 'required|numeric',
            'type' => 'required',
        ]);

        $requestData = $request->all();
        WorkerHistory::create($requestData);
        $worker = Worker::find($requestData['worker_id']);

        if ($requestData['type'] == 'Доход') {
            $worker->update([
                'salary' => $worker->salary + $requestData['summa']
            ]);
        } elseif ($requestData['type'] == 'Расход') {
            if ($worker->salary - $requestData['summa'] < 0) {
                return redirect()->route('workers.index')->with('error', 'Deduction exceeds current salary.');
            }

            $worker->update([
                'salary' => $worker->salary - $requestData['summa']
            ]);
        }
        $incomes = Income_category::all();
        return redirect()->route('workers.index' , compact('incomes'))->with('success', 'Transaction completed successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(WorkerHistory $workerHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkerHistory $workerHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WorkerHistory $workerHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkerHistory $workerHistory)
    {
        //
    }
}
