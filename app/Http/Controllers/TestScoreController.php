<?php

namespace App\Http\Controllers;

use App\Models\TestScore;
use Illuminate\Http\Request;

class TestScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testScores = TestScore::query()
            ->orderBy('test_taken', 'desc')
            ->get();
        return view('backend.test_scores.index', compact('testScores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.test_scores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'score' => 'required|string',
            'test_taken' => 'nullable|date',
        ]);

        TestScore::create($data);

        return redirect()->route('test-scores.index')->with('success', 'Test score created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TestScore $testScore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TestScore $testScore)
    {
        return view('backend.test_scores.edit', compact('testScore'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TestScore $testScore)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'score' => 'required|string',
            'test_taken' => 'nullable|date',
        ]);

        $testScore->update($data);

        return redirect()->route('test-scores.index')->with('success', 'Test score updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TestScore $testScore)
    {
        $testScore->delete();
        return redirect()->route('test-scores.index')->with('success', 'Test score deleted successfully.');
    }
}
