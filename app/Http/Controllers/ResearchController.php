<?php

namespace App\Http\Controllers;

use App\Models\Research;
use Illuminate\Http\Request;

class ResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $works = Research::query()
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('backend.research.index', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.research.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'abstract' => 'nullable|string',
            'keywords' => 'nullable|string',
            'role' => 'nullable|string|max:255',
            'status' => 'required|in:Ongoing,Completed,Accepted,Published',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'link' => 'nullable|url|max:255',
        ]);

        Research::create($data);

        return redirect()->route('research.index')->with('success', 'Research created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Research $research)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Research $research)
    {
        return view('backend.research.edit', compact('research'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Research $research)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'abstract' => 'nullable|string',
            'keywords' => 'nullable|string',
            'role' => 'nullable|string|max:255',
            'status' => 'required|in:Ongoing,Completed,Accepted,Published',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'link' => 'nullable|url|max:255',
        ]);

        $research->update($data);

        return redirect()->route('research.index')->with('success', 'Research updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Research $research)
    {
        $research->delete();

        return redirect()->route('research.index')->with('success', 'Research deleted successfully.');
    }
}
