<?php

namespace App\Http\Controllers;

use App\Models\Academic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AcademicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $academics = Academic::query()
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('backend.academics.index', compact('academics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $response = Http::withoutVerifying()->get('https://countriesnow.space/api/v0.1/countries');
        $countries = $response->json()['data'] ?? [];
        return view('backend.academics.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'institution' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'link' => 'nullable|url|max:255',
            'degree' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'major' => 'nullable|string|max:255',
            'syllabus' => 'nullable|string|max:255',
            'gpa' => 'nullable|numeric|min:0',
            'scale' => 'nullable|numeric|min:0',
            'session' => 'required|string|max:255',
            'current' => 'required|boolean',
            'graduation_date' => 'nullable|date',
            'accolades' => 'nullable|string',
        ]);

        Academic::create($data);

        return redirect()->route('academics.index')->with('success', 'Academic history created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Academic $academic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Academic $academic)
    {
        $response = Http::withoutVerifying()->get('https://countriesnow.space/api/v0.1/countries');
        $countries = $response->json()['data'] ?? [];
        return view('backend.academics.edit', compact('academic', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Academic $academic)
    {
        $data = $request->validate([
            'institution' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'link' => 'nullable|url|max:255',
            'degree' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'major' => 'nullable|string|max:255',
            'syllabus' => 'nullable|string|max:255',
            'gpa' => 'nullable|numeric|min:0',
            'scale' => 'nullable|numeric|min:0',
            'session' => 'required|string|max:255',
            'current' => 'required|boolean',
            'graduation_date' => 'nullable|date',
            'accolades' => 'nullable|string',
        ]);

        $academic->update($data);

        return redirect()->route('academics.index')->with('success', 'Academic history updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Academic $academic)
    {
        $academic->delete();

        return redirect()->route('academics.index')->with('success', 'Academic history deleted successfully.');
    }
}
