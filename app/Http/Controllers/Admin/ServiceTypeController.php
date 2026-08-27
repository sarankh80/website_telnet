<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceType;
use App\Models\Slugs;
use Illuminate\Http\Request;
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
        $search=true;
        $serviceTypes = ServiceType::with('slug')->withCount('services')->orderBy('id')->get();
        return view('admin.service-types.index', compact('serviceTypes','canAdd','title', 'search'));
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
    public function data(Request $request)
    {
        $inventories = ServiceType::select([
            "id",
            'name',
            'name_km',
            'desc',
            'desc_km',
            'slug_id'
        ])->with(['slug','services'])->orderBy('id', 'desc');
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
                return ("<a href='' class='font-bold underline text-black hover:text-black'>".$inventory->slug->name."</a>");
            })

            ->rawColumns(['actions', 'desc', 'slugs'])
            ->make(true);
    }
}
