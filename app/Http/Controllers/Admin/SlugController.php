<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slugs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlugController extends Controller
{
    public function index()
    {
        $slugs = Slugs::withCount('serviceTypes', 'services')->orderBy('id')->get();
        return view('admin.slugs.index', compact('slugs'));
    }

    public function create()
    {
        return view('admin.slugs.form', ['slug' => new Slugs()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'    => ['required', 'string', 'max:200'],
            'name_km' => ['required', 'string', 'max:200'],
            'desc'    => ['nullable', 'string'],
            'desc_km' => ['nullable', 'string'],
            'image'   => ['nullable', 'image', 'max:2048'],
        ]);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('slugs', 'public');
        } else {
            $data['image'] = '';
        }
        Slugs::create($data);
        return redirect()->route('admin.slugs.index')->with('success', 'Slug category created.');
    }

    public function edit(Slugs $slug)
    {
        return view('admin.slugs.form', compact('slug'));
    }

    public function update(Request $request, Slugs $slug)
    {
        $data = $request->validate([
            'name'    => ['required', 'string', 'max:200'],
            'name_km' => ['required', 'string', 'max:200'],
            'desc'    => ['nullable', 'string'],
            'desc_km' => ['nullable', 'string'],
            'image'   => ['nullable', 'image', 'max:2048'],
        ]);
        if ($request->hasFile('image')) {
            if ($slug->image) Storage::disk('public')->delete($slug->image);
            $data['image'] = $request->file('image')->store('slugs', 'public');
        }
        $slug->update($data);
        return redirect()->route('admin.slugs.index')->with('success', 'Slug category updated.');
    }

    public function destroy(Slugs $slug)
    {
        if ($slug->image) Storage::disk('public')->delete($slug->image);
        $slug->delete();
        return redirect()->route('admin.slugs.index')->with('success', 'Slug category deleted.');
    }
}
