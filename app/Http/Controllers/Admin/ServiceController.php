<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceType;
use App\Models\Slugs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('slug', 'type')->orderBy('sort_order')->paginate(15);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $slugs        = Slugs::orderBy('name')->get();
        $serviceTypes = ServiceType::with('slug')->orderBy('slug_id')->orderBy('name')->get();
        return view('admin.services.form', ['service' => new Service(), 'slugs' => $slugs, 'serviceTypes' => $serviceTypes]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name_km'        => ['required', 'string', 'max:200'],
            'name_en'        => ['required', 'string', 'max:200'],
            'description_km' => ['nullable', 'string'],
            'description_en' => ['nullable', 'string'],
            'icon'           => ['required', 'string', 'max:100'],
            'badge_km'       => ['nullable', 'string', 'max:100'],
            'badge_en'       => ['nullable', 'string', 'max:100'],
            'color'          => ['required', 'in:green,orange'],
            'sort_order'     => ['nullable', 'integer'],
            'is_active'      => ['nullable', 'boolean'],
            'image'        => ['nullable', 'image', 'max:2048'],
            'slug_id'      => ['nullable', 'exists:slugs,id'],
            'service_type' => ['nullable', 'exists:service_types,id'],
        ]);
        $data['is_active'] = $request->boolean('is_active');
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        }
        Service::create($data);
        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        $slugs        = Slugs::orderBy('name')->get();
        $serviceTypes = ServiceType::with('slug')->orderBy('slug_id')->orderBy('name')->get();
        return view('admin.services.form', compact('service', 'slugs', 'serviceTypes'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'name_km'        => ['required', 'string', 'max:200'],
            'name_en'        => ['required', 'string', 'max:200'],
            'description_km' => ['nullable', 'string'],
            'description_en' => ['nullable', 'string'],
            'icon'           => ['required', 'string', 'max:100'],
            'badge_km'       => ['nullable', 'string', 'max:100'],
            'badge_en'       => ['nullable', 'string', 'max:100'],
            'color'          => ['required', 'in:green,orange'],
            'sort_order'     => ['nullable', 'integer'],
            'is_active'      => ['nullable', 'boolean'],
            'image'          => ['nullable', 'image', 'max:2048'],
            'slug_id'        => ['nullable', 'exists:slugs,id'],
            'service_type'   => ['nullable', 'exists:service_types,id'],
        ]);
        $data['is_active'] = $request->boolean('is_active');
        if ($request->hasFile('image')) {
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $data['image'] = $request->file('image')->store('services', 'public');
        }
        $service->update($data);
        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted.');
    }
}
