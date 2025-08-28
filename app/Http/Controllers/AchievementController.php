<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $achievements = Achievement::query()
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('backend.achievements.index', compact('achievements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.achievements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'year' => 'nullable|integer',
        ]);

        Achievement::create($data);

        return redirect()->route('achievements.index')->with('success', 'Achievement created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Achievement $achievement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Achievement $achievement)
    {
        return view('backend.achievements.edit', compact('achievement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Achievement $achievement)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'year' => 'nullable|integer',
        ]);

        $achievement->update($data);

        return redirect()->route('achievements.index')->with('success', 'Achievement updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Achievement $achievement)
    {
        $achievement->delete();

        return redirect()->route('achievements.index')->with('success', 'Achievement deleted successfully!');
    }
}
