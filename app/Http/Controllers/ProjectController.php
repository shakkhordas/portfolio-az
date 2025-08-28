<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Experience;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::query()
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('backend.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $experiences = Experience::all();
        return view('backend.projects.create', compact('experiences'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'role' => 'nullable|string',
            'technologies' => 'nullable|string',
            'type' => 'required|in:Personal,Professional',
            'experience_id' => 'nullable|exists:experiences,id',
            'link' => 'nullable|url|max:255',
        ]);

        Project::create($data);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $experiences = Experience::all();
        return view('backend.projects.edit', compact('project', 'experiences'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'role' => 'nullable|string',
            'technologies' => 'nullable|string',
            'type' => 'required|in:Personal,Professional',
            'experience_id' => 'nullable|exists:experiences,id',
            'link' => 'nullable|url|max:255',
        ]);

        $project->update($data);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}
