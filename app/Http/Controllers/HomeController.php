<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index()
    {
        return view("home");
    }
    public function about()
    {
        return view("about");
    }
    public function projects()
    {
        $projects = Project::with(['images', 'technologies'])->get();
        $technologies = Technology::withCount(['projects'])->has('projects')->get();

        return view("projects", compact('projects', 'technologies'));
    }
    public function contact()
    {
        return view("contact");
    }

    public function reactMynaturDashboard()
    {
        return Redirect::to('/mynatur/dashboard');
    }
}
