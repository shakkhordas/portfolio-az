<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\SkillType;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::query()
            ->orderBy('name', 'asc')
            ->get();
        
        return view('backend.skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skillTypes = SkillType::all();
        return view('backend.skills.create', compact('skillTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'skill_type_id' => 'required|exists:skill_types,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Skill::create($data);

        return redirect()->route('skills.index')->with('success', 'Skill created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        $skillTypes = SkillType::all();
        return view('backend.skills.edit', compact('skill', 'skillTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        $data = $request->validate([
            'skill_type_id' => 'required|exists:skill_types,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $skill->update($data);

        return redirect()->route('skills.index')->with('success', 'Skill updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()->route('skills.index')->with('success', 'Skill deleted successfully.');
    }
}
