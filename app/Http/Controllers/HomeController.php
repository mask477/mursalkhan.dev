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
        $technologies = Technology::with('projects')->get();

        return view("home", compact('technologies'));
    }

    public function reactMynaturDashboard()
    {
        return Redirect::to('/mynatur/dashboard');
    }
}
