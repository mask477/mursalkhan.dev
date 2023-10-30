<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\Technology;
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
        return redirect()->route("dashboard");
    }

    public function create()
    {
        $technologies = Technology::all();

        return view("dashboard.project.create", [
            "technologies" => $technologies
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $this->validate(request(), [
            'name' => ['required', 'unique:projects,name'],
            'type' => ['required', 'in:Web,Mobile,Desktop'],
            'description' => ['required'],
            'about' => ['required'],
            'url' => ['nullable', 'url:https'],
            'technologies' => ['required', "min:1"],
            'technologies.*' => ['exists:technologies,id'],
        ]);

        $project = Project::create([
            'name' => request('name'),
            'type' => request('type'),
            'description' => request('description'),
            'about' => request('about'),
            'url' => request('url'),
        ]);

        $project->technologies()->attach(request("technologies"));


        $public_directory_path = "uploads/" . $project->name;
        if (!file_exists(public_path($public_directory_path))) {
            $path = public_path($public_directory_path);
            File::makeDirectory($path, $mode = 0777, true, true);
        }

        return redirect()->route('project.show', $project->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::with('technologies')->findOrFail($id);

        return view('dashboard.project.show', [
            'project' => $project
        ]);
    }

    /**
     * Upload logo image for the project.
     */
    public function uploadLogo(string $id)
    {
        $project = Project::findOrFail($id);

        $this->validate(request(), [
            'logo' => ['required', FileValidator::types(['png', 'webp'])->max(1024)],
        ]);

        $public_directory_path = "uploads/" . $project->name;
        if (!file_exists(public_path($public_directory_path))) {
            $path = public_path($public_directory_path);
            File::makeDirectory($path, $mode = 0777, true, true);
        }

        $filename = "logo." . request()->logo->extension();
        request()->logo->move(public_path($public_directory_path), $filename);

        $project->logo = asset($public_directory_path . '/' . $filename);
        $project->save();

        return redirect()->route('project.show', $project->id);
    }

    /**
     * Upload banner image for the project.
     */
    public function uploadBanner(string $id)
    {
        $project = Project::with('technologies', 'images')->findOrFail($id);

        $this->validate(request(), [
            'banner' => ['required', FileValidator::types(['png', 'webp'])->max(1024)],
            // 'logo' => FileValidator::types(['png', 'webp'])->max(1024),
        ]);

        $public_directory_path = "uploads/" . $project->name;
        if (!file_exists(public_path($public_directory_path))) {
            $path = public_path($public_directory_path);
            File::makeDirectory($path, $mode = 0777, true, true);
        }

        $filename = "banner." . request()->banner->extension();
        request()->banner->move(public_path($public_directory_path), $filename);

        $project->banner = asset($public_directory_path . '/' . $filename);
        $project->save();

        return redirect()->route('project.show', $project->id);
    }

    /**
     * Upload image for the project.
     */
    public function uploadImage(string $id)
    {
        $project = Project::with('images')->findOrFail($id);

        $this->validate(request(), [
            'image' => ['required', FileValidator::types(['png', 'webp'])->max(1024)],
        ]);

        $public_directory_path = "uploads/" . $project->name;
        if (!file_exists(public_path($public_directory_path))) {
            $path = public_path($public_directory_path);
            File::makeDirectory($path, $mode = 0777, true, true);
        }

        $filename = time() . '.' . request()->image->extension();
        request()->image->move(public_path($public_directory_path), $filename);

        $project_image = ProjectImage::create([
            'url' => asset($public_directory_path . '/' . $filename),
            'project_id' => $project->id,
        ]);

        return redirect()->route('project.show', $project->id);
    }

    /**
     * Delete image for the project.
     */
    public function removeImage(string $id)
    {
        $project = Project::with('images')->findOrFail($id);

        $this->validate(request(), [
            'image' => ['required', 'exists:project_images,id'],
        ]);

        $project_image = ProjectImage::findOrFail(request()->image);

        $filename = explode("/", $project_image->url);
        $filename = $filename[count($filename) - 1];

        $public_directory_path = "uploads/" . $project->name;
        $file_path = $public_directory_path . '/' . $filename;

        if (file_exists(public_path($file_path))) {
            File::delete($file_path);
        }

        $project_image->delete();

        return redirect()->route('project.show', $project->id);
    }

    /**
     * Edit specific resource.
     */
    public function edit(string $id)
    {
        $project = Project::with('technologies')->findOrFail($id);
        $technologies = Technology::all();

        return view("dashboard.project.edit", [
            "project" => $project,
            "technologies" => $technologies
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id)
    {
        $project = Project::with('technologies')->findOrFail($id);

        $this->validate(request(), [
            'name' => ['required', 'unique:projects,name,' . $id],
            'type' => ['required', 'in:Web,Mobile,Desktop'],
            'description' => ['required'],
            'about' => ['required'],
            'url' => ['nullable', 'url:https'],
            'technologies' => ['required', "min:1"],
            'technologies.*' => ['exists:technologies,id'],
        ]);

        $project->name = request('name');
        $project->type = request('type');
        $project->description = request('description');
        $project->about = request('about');
        $project->url = request('url');

        $project->technologies()->detach($project->technologies->pluck('id')->toArray());
        $project->technologies()->attach(request("technologies"));

        $project->save();

        return redirect()->route('project.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);


        $public_directory_path = "uploads/" . $project->name;

        if (file_exists(public_path($public_directory_path))) {
            File::delete($public_directory_path);
        }

        // $project->delete();


        return redirect()->route('dashboard');
    }
}
