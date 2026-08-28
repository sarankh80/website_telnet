<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceType;
use App\Models\Slugs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class ServiceTypeController extends Controller
{
    public function index()
    {
        $title = __('app.internet.servicetype.title');
        $canAdd = [
            "url" => route('admin.service-types.create'),
            "title" => __('app.controls.action.add') . " " . __('app.internet.servicetype.title'),
        ];
        $search = true;
        $serviceTypes = ServiceType::with('slug')->withCount('services')->orderBy('id')->get();
        return view('admin.service-types.index', compact('serviceTypes', 'canAdd', 'title', 'search'));
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
            'image'        => ['required', 'image', 'max:2048'],
            'icon'        => ['required', 'image', 'max:2048'],
            'desc'    => ['nullable', 'string'],
            'desc_km' => ['nullable', 'string'],
            'slug_id' => ['required', 'exists:slugs,id'],
        ]);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('home/services', 'public');
        }
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
            'image'   => ['nullable', 'image', 'max:102400'],
            'icon'    => ['nullable', 'image', 'max:2048'],
            'desc'    => ['nullable', 'string'],
            'desc_km' => ['nullable', 'string'],
            'slug_id' => ['required', 'exists:slugs,id'],
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            if (!$image->isValid()) {
                return back()->withErrors([
                    'image' => $image->getErrorMessage(),
                ]);
            }

            if ($serviceType->image) {
                Storage::disk('public')->delete($serviceType->image);
            }

            $data['image'] = $image->store('home/services', 'public');
        }

        $serviceType->update($data);

        return redirect()
            ->route('admin.service-types.index')
            ->with('success', 'Service type updated.');
    }

    public function destroy(ServiceType $serviceType)
    {
        $serviceType->delete();
        return redirect()->route('admin.service-types.index')->with('success', 'Service type deleted.');
    }
    public function data(Request $request)
    {
        $inventories = ServiceType::select([
            "id",
            'name',
            'name_km',
            'image',
            'desc',
            'desc_km',
            'slug_id'
        ])->with(['slug', 'services'])->orderBy('id', 'desc');
        return DataTables::of($inventories)
            ->addColumn('actions', function ($inventory) {

                $buttons = '<div class="space-x-1 text-center">';
                $buttons .= '<a href="' . route('admin.service-types.edit', $inventory->id) .  '" class="hover:bg-[#777] hover:text-white border shadow rounded border-[#777] text-[#000] bg-gray-100 leading-2 px-2 py-1 my-[1px]">' . __('app.controls.action.edit') . '</a>';
                $buttons .= '<form action="' . route('admin.service-types.destroy', $inventory->id) . '" method="POST" class="inline-block">
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
                return ($inventory->desc);
            })
            ->editColumn('slugs', function ($inventory) {
                return ("<a href='' class='font-bold underline text-black hover:text-black'>" . $inventory->slug->name . "</a>");
            })
            ->editColumn('image', function ($r) {
                if (!$r->image) {
                    return '<span class="text-xs text-gray-400 italic">No image</span>';
                }
                $url = asset('storage/' . $r->image);
                return '
                        <div class="flex items-center justify-center">
                            <div class="h-36 w-36 flex-shrink-0 overflow-hidden rounded-lg border border-gray-200 bg-gray-50 p-1 shadow-sm">
                                <img class="h-full w-full object-contain rounded" src="' . $url . '" alt="Image">
                            </div>
                        </div>';
            })
            ->rawColumns(['actions', 'desc', 'slugs', 'image'])
            ->make(true);
    }
}
