<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::orderBy('sort_order')->get();
        return view('admin.branches.index', compact('branches'));
    }

    public function create()
    {
        return view('admin.branches.form', ['branch' => new Branch()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name_km'     => ['required', 'string', 'max:200'],
            'name_en'     => ['required', 'string', 'max:200'],
            'type'        => ['required', 'in:hq,branch'],
            'address_km'  => ['nullable', 'string', 'max:300'],
            'address_en'  => ['nullable', 'string', 'max:300'],
            'city' => ['nullable', 'string', 'max:100'],
            'city_km' => ['nullable', 'string', 'max:100'],
            'province_km' => ['nullable', 'string', 'max:100'],
            'province_en' => ['nullable', 'string', 'max:100'],
            'phone'       => ['nullable', 'string', 'max:50'],
            'email'       => ['nullable', 'email', 'max:150'],
            'lat'         => ['nullable', 'numeric'],
            'lng'         => ['nullable', 'numeric'],
            'sort_order'  => ['nullable', 'integer'],
            'is_active'   => ['nullable', 'boolean'],
            'uptime'   => ['required', 'string'],
            'country'   => ['required', 'string'],
            'country_km'   => ['required', 'string'],
            'avg_letency'   => ['required', 'string'],
        ]);
        $data['status'] = ($request->is_active == 1 ? "Available" : "Unavailable");
        $data['is_active'] = $request->boolean('is_active');
        Branch::create($data);
        return redirect()->route('admin.branches.index')->with('success', 'Branch created.');
    }

    public function edit(Branch $branch)
    {
        return view('admin.branches.form', compact('branch'));
    }

    public function update(Request $request, Branch $branch)
    {
        $data = $request->validate([
            'name_km'     => ['required', 'string', 'max:200'],
            'name_en'     => ['required', 'string', 'max:200'],
            'type'        => ['required', 'in:hq,branch'],
            'address_km'  => ['nullable', 'string', 'max:300'],
            'address_en'  => ['nullable', 'string', 'max:300'],
            'city_km' => ['nullable', 'string', 'max:100'],
            'city_en' => ['nullable', 'string', 'max:100'],
            'province_km' => ['nullable', 'string', 'max:100'],
            'province_en' => ['nullable', 'string', 'max:100'],
            'phone'       => ['nullable', 'string', 'max:50'],
            'email'       => ['nullable', 'email', 'max:150'],
            'lat'         => ['nullable', 'numeric'],
            'lng'         => ['nullable', 'numeric'],
            'sort_order'  => ['nullable', 'integer'],
            'is_active'   => ['nullable', 'boolean'],
            'uptime'   => ['required', 'string'],
            'country'   => ['required', 'string'],
            'country_km'   => ['required', 'string'],
            'avg_letency'   => ['required', 'string'],
        ]);
        $data['status'] = ($request->is_active == 1 ? "Available" : "Unavailable");
        $data['is_active'] = $request->boolean('is_active');
        $branch->update($data);
        return redirect()->route('admin.branches.index')->with('success', 'Branch updated.');
    }

    public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect()->route('admin.branches.index')->with('success', 'Branch deleted.');
    }
}
