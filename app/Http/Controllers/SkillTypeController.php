<?php

namespace App\Http\Controllers;

use App\Models\SkillType;
use Illuminate\Http\Request;

class SkillTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skillTypes = SkillType::query()
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('backend.skill_types.index', compact('skillTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.skill_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        SkillType::create($data);

        return redirect()->route('skill-types.index')->with('success', 'Skill type created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SkillType $skillType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SkillType $skillType)
    {
        return view('backend.skill_types.edit', compact('skillType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SkillType $skillType)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        $skillType->update($data);

        return redirect()->route('skill-types.index')->with('success', 'Skill type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SkillType $skillType)
    {
        $skillType->delete();

        return redirect()->route('skill-types.index')->with('success', 'Skill type deleted successfully.');
    }
}
