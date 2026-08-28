<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceType;
use App\Models\Slugs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
class ServiceController extends Controller
{
    public function index()
    {
        $title = __('app.internet.service.title');
        $canAdd = [
            "url" => route('admin.services.create'),
            "title" => __('app.controls.action.add') . " " . __('app.internet.service.title'),
        ];
        $search = true;
        $services = Service::with('type')->orderBy('sort_order',"desc")->get();
        return view('admin.services.index', compact('services','canAdd','title','search'));
    }

    public function create()
    {
        $serviceTypes = ServiceType::with('slug')->orderBy('slug_id')->orderBy('name')->get();
        return view('admin.services.form', ['service' => new Service(), 'serviceTypes' => $serviceTypes]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name_km'        => ['required', 'string', 'max:200'],
            'name_en'        => ['required', 'string', 'max:200'],
            'description_km' => ['nullable', 'string'],
            'description_en' => ['nullable', 'string'],
            'sort_order'     => ['nullable', 'integer'],
            'is_active'      => ['nullable', 'boolean'],
            'image'        => ['required', 'image', 'max:2048'],
            'icon'        => ['required', 'image', 'max:2048'],
            'service_type' => ['required', 'exists:service_types,id'],
        ]);
        $data['is_active'] = $request->boolean('is_active');
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('home/services', 'public');
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
            'sort_order'     => ['nullable', 'integer'],
            'is_active'      => ['nullable', 'boolean'],
            'service_type' => ['required', 'exists:service_types,id'],
        ]);
        $data['is_active'] = $request->boolean('is_active');
        if ($request->hasFile('image')) {
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $data['image'] = $request->file('image')->store('home/services', 'public');
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
    public function data(Request $request)
    {
        $inventories = Service::select([
            "id",
            "name_km",
            "name_en",
            "description_km",
            "description_en",
            "image",
            "icon",
            "is_active",
            "sort_order",
            "created_at",
            "updated_at",
            "service_type"
        ])->with(['type', 'tariff'])->orderBy('id', 'desc');
        return DataTables::of($inventories)
            ->addColumn('actions', function ($inventory) {

                $buttons = '<div class="space-x-1 text-center">';
                $buttons .= '<a href="' . route('admin.services.edit', $inventory->id) .  '" class="hover:bg-[#777] hover:text-white border shadow rounded border-[#777] text-[#000] bg-gray-100 leading-2 px-2 py-1 my-[1px]">' . __('app.controls.action.edit') . '</a>';
                $buttons .= '<form action="' . route('admin.services.destroy', $inventory->id) . '" method="POST" class="inline-block">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                <button type="submit" class="hover:bg-[#777] hover:text-white border shadow rounded border-[#777] text-[#000] bg-gray-100 leading-2 px-2 py-2 my-[1px]">
                                    ' . __('app.controls.action.remove') . '
                                </button>
                            </form>';
                $buttons .= '</div>';

                return $buttons;
            })
            ->editColumn('desc', function ($inventory) {
                return ($inventory->description_en);
            })
            ->editColumn('status', function ($inventory) {
                return ($inventory->is_active?"Active":"Inactive");
            })
            ->editColumn('type', function ($inventory) {
                return ("<a href='' class='font-bold underline text-black hover:text-black'>" . $inventory->type->name . "</a>");
            })
            ->editColumn('image', function ($r) {
                if (!$r->image) {
                    return '<span class="text-xs text-gray-400 italic">No image</span>';
                }
                $url = asset('storage/' . $r->image);
                return '
                        <div class="flex items-center justify-center">
                            <div class="h-30 w-30 flex-shrink-0 overflow-hidden rounded-lg border border-gray-200 bg-gray-50 p-1 shadow-sm">
                                <img class="h-full w-full object-contain rounded" src="' . $url . '" alt="Image">
                            </div>
                        </div>';
            })
            ->rawColumns(['actions', 'desc', 'type', 'status','image'])
            ->make(true);
    }
}
