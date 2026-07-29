<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::withCount('applications')->orderBy('sort_order')->orderByDesc('created_at')->paginate(20);
        return view('admin.careers.index', compact('careers'));
    }

    public function create()
    {
        return view('admin.careers.form', ['career' => new Career()]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['is_active'] = $request->boolean('is_active');
        Career::create($data);
        return redirect()->route('admin.careers.index')->with('success', 'Job posting created.');
    }

    public function edit(Career $career)
    {
        return view('admin.careers.form', compact('career'));
    }

    public function update(Request $request, Career $career)
    {
        $data = $this->validated($request);
        $data['is_active'] = $request->boolean('is_active');
        $career->update($data);
        return redirect()->route('admin.careers.index')->with('success', 'Job posting updated.');
    }

    public function destroy(Career $career)
    {
        $career->delete();
        return redirect()->route('admin.careers.index')->with('success', 'Job posting deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title'           => ['required', 'string', 'max:255'],
            'title_km'        => ['required', 'string', 'max:255'],
            'department'      => ['nullable', 'string', 'max:150'],
            'department_km'   => ['nullable', 'string', 'max:150'],
            'location'        => ['nullable', 'string', 'max:150'],
            'location_km'     => ['nullable', 'string', 'max:150'],
            'type'            => ['required', 'in:full-time,part-time,contract,internship'],
            'description'     => ['nullable', 'string'],
            'description_km'  => ['nullable', 'string'],
            'requirements'    => ['nullable', 'string'],
            'requirements_km' => ['nullable', 'string'],
            'deadline'        => ['nullable', 'date'],
            'is_active'       => ['nullable', 'boolean'],
            'sort_order'      => ['nullable', 'integer'],
        ]);
    }
}
