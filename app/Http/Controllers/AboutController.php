<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = About::all();
        return view('backend.about.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string'
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $data['image'] = 'images/' . $imageName;
        $data['title'] = $request->title ?? '';
        $data['description'] = $request->description ?? '';

        About::create($data);

        return redirect()->route('about.index')->with('success', 'About created successfully.');


    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('backend.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        $data = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string'
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = 'images/' . $imageName;
        }

        $data['title'] = $request->title ?? $about->title;
        $data['description'] = $request->description ?? $about->description;

        $about->update($data);

        return redirect()->route('about.index')->with('success', 'About updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        // Delete image file if it exists
        if ($about->image && file_exists(public_path($about->image))) {
            @unlink(public_path($about->image));
        }
        $about->delete();
        return redirect()->route('about.index')->with('success', 'About deleted successfully.');
    }
}
