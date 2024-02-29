<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $projects = Project::with('technologies')->get();
        $technologies = Technology::withCount('projects')->get();

        return view('dashboard.index', [
            "projects" => $projects,
            "technologies" => $technologies
        ]);
    }
}
