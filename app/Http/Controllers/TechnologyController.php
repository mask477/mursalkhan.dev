<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect("dashboard");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => ["required", "unique:technologies,name"],
            "description" => ["required"]
        ]);

        $technoloogy = Technology::create([
            "name" => $request->name,
            "description" => $request->description
        ]);

        return redirect("dashboard");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $technology = Technology::findOrFail($id);

        $this->validate($request, [
            "name" => ["required", "unique:technologies,name", "numeric"],
            "description" => ["required", "numeric"]
        ]);

        $technology->name = $request->input('name');
        $technology->description = $request->input('description');

        return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $technology = Technology::findOrFail($id);

        $technology->delete();

        return redirect("dashboard");
    }
}
