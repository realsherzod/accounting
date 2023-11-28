<?php

namespace App\Http\Controllers;

use App\Models\Cost_category;
use Illuminate\Http\Request;

class CostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $costs = Cost_category::all();
        return view('admin.Worker.index', compact('costs'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cost_category $cost_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cost_category $cost_category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cost_category $cost_category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cost_category $cost_category)
    {
        //
    }
}
