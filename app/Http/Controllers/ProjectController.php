<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File as FileValidator;

use File;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('technologies')->get();

        return response()->json($projects);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $validation = Validator::make(request()->all(), [
            'name' => ['required', 'unique:projects,name'],
            'type' => ['required', 'in:Web,Mobile,Desktop'],
            'description' => ['required'],
            'about' => ['required'],
            'logo' => FileValidator::types(['png', 'webp'])->max(1024),
            'banner' => ['required', FileValidator::types(['png', 'webp'])->max(1024)],
            'url' => ['required', 'url:https'],
            'technologies' => ['required', "min:1"],
            'technologies.*' => ['exists:technologies,id'],
            'images' => ['required', "min:1"],
            'images.*' => [FileValidator::types(['png', 'webp'])->max(1024)],
        ]);

        if ($validation->fails()) {
            return response()->json($validation->messages(), 400);
        }

        $project = Project::create([
            'name' => request('name'),
            'type' => request('type'),
            'description' => request('description'),
            'about' => request('about'),
        ]);

        $public_directory_path = "uploads/" . $project->name;
        $project->technologies()->attach(request("technologies"));
        if (!file_exists(public_path($public_directory_path))) {
            $path = public_path($public_directory_path);
            File::makeDirectory($path, $mode = 0777, true, true);
        }

        if (request()->has('banner')) {
            $filename = "banner." . request()->banner->extension();
            request()->banner->move(public_path($public_directory_path), $filename);
        }

        if (request()->has('logo')) {
            $filename = "logo." . request()->logo->extension();
            request()->logo->move(public_path($public_directory_path), $filename);
        }

        return response()->json($project);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::findOrFail($id);

        return response()->json($project);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return response()->json($project);
    }
}
