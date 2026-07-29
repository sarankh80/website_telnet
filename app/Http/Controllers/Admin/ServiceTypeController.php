<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceType;
use App\Models\Slugs;
use Illuminate\Http\Request;

class ServiceTypeController extends Controller
{
    public function index()
    {
        $serviceTypes = ServiceType::with('slug')->withCount('services')->orderBy('slug_id')->orderBy('id')->paginate(20);
        return view('admin.service-types.index', compact('serviceTypes'));
    }

    public function create()
    {
        $slugs = Slugs::orderBy('name')->get();
        return view('admin.service-types.form', ['serviceType' => new ServiceType(), 'slugs' => $slugs]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'    => ['required', 'string', 'max:200'],
            'name_km' => ['required', 'string', 'max:200'],
            'desc'    => ['nullable', 'string'],
            'desc_km' => ['nullable', 'string'],
            'slug_id' => ['required', 'exists:slugs,id'],
        ]);
        ServiceType::create($data);
        return redirect()->route('admin.service-types.index')->with('success', 'Service type created.');
    }

    public function edit(ServiceType $serviceType)
    {
        $slugs = Slugs::orderBy('name')->get();
        return view('admin.service-types.form', compact('serviceType', 'slugs'));
    }

    public function update(Request $request, ServiceType $serviceType)
    {
        $data = $request->validate([
            'name'    => ['required', 'string', 'max:200'],
            'name_km' => ['required', 'string', 'max:200'],
            'desc'    => ['nullable', 'string'],
            'desc_km' => ['nullable', 'string'],
            'slug_id' => ['required', 'exists:slugs,id'],
        ]);
        $serviceType->update($data);
        return redirect()->route('admin.service-types.index')->with('success', 'Service type updated.');
    }

    public function destroy(ServiceType $serviceType)
    {
        $serviceType->delete();
        return redirect()->route('admin.service-types.index')->with('success', 'Service type deleted.');
    }
}
