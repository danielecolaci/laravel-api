<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd(Project::all());
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
         //dd($request->all());

        $validated = $request->validated();

        if ($request->has('image')) {
            $image_path = Storage::put('uploads', $validated['image']);
            //dd($validated, $image_path);
            $validated['image'] = $image_path;
        }
        
        $project = Project::create($validated);
        if ($request->has('technologies')) {
            $project->technologies()->attach($validated['technologies']);
        }

        return redirect()->route('admin.projects.index')->with('message', "Project created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $validated = $request->validated();

        if ($request->has('image')) {

            if ($project->image) {
                Storage::delete($project->image);
            }

            $image_path = Storage::put('uploads', $validated['image']);
            //dd($validated, $image_path);
            $validated['image'] = $image_path;
        }

        $project->update($validated);
        if ($request->has('technologies')) {
            $project->technologies()->sync($validated['technologies']);
        }
        return redirect()->route('admin.projects.edit', $project)->with('message', "$project->title updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::delete($project->image);
        }
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', "$project->title deleted successfully");
    }
}
