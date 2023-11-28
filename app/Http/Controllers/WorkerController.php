<?php

namespace App\Http\Controllers;

use App\Models\Cost_category;
use App\Models\Income_category;
use App\Models\Worker;
use App\Models\WorkerHistory;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workers = Worker::all();
        $incomes = Income_category::all();
        $costs = Cost_category::all();
        return view('admin.Worker.index', compact('workers','incomes','costs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Worker.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'position' => 'required',
            'comment' => 'required',
            'twitter' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'linkedin' => 'required',
            'image' => 'required',
            ]);
            if ($request->hasFile('image')){
                $path = $request->file('image')->store("uploads", 'public'); 
            }
            $requestData = $request->all();   
            $requestData['image'] = $path;
            Worker::create($requestData);
    
            return redirect()->route('workers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Worker $worker)
    {
        $workerhistories = WorkerHistory::where('worker_id', $worker->id)->get();
        return view('admin.Worker.show', compact('worker', 'workerhistories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Worker $worker)
    {
        return view('admin.Worker.edit', compact('worker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Worker $worker)
    {
        $this->validate($request, [
            'name' => 'required',
            'position' => 'required',
            'comment' => 'required',
            'twitter' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'linkedin' => 'required',
        ]);
    
        $path = $worker->image; 
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store("uploads", 'public');
        }else{
            $worker->image;
        }
        $worker->update([
            'name' => $request->input('name'),
            'position' => $request->input('position'),
            'comment' => $request->input('comment'),
            'twitter' => $request->input('twitter'),
            'facebook' => $request->input('facebook'),
            'instagram' => $request->input('instagram'),
            'linkedin' => $request->input('linkedin'),
            'image' => $path,
        ]);
        return redirect()->route('workers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
            $worker = Worker::find($id);
            $worker->delete();
            return redirect()->route('workers.index');
        
    }
}
