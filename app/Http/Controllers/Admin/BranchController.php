<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::orderBy('sort_order')->get();
        $search=true;
        return view('admin.branches.index', compact('branches', 'search'));

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
    public function data(Request $request)
    {
        $inventories = Branch::select([
            'id',
            'name_km',
            'name_en',
            'type',
            'address_km',
            'address_en',
            'phone',
            'email',
            'province_km',
            'province_en',
            'city',
            'city_km',
            'country',
            'country_km',
            'lat',
            'lng',
            'is_active',
            'avg_letency',
            "uptime",
            'sort_order',
        ])->orderBy('id', 'desc');
        return DataTables::of($inventories)
            ->addColumn('actions', function ($inventory) {

                $buttons = '<div class="space-x-1 text-center">';
                $buttons .= '<a href="' . route('admin.branches.edit', $inventory->id) .  '" class="hover:bg-[#777] hover:text-white border shadow rounded border-[#777] text-[#000] bg-gray-100 leading-2 px-2 py-1 my-[1px]">' . __('app.controls.action.edit') . '</a>';
                $buttons .= '<form action="' . route('admin.branches.destroy', $inventory->id) . '" method="POST" class="inline-block">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                <button type="submit" class="hover:bg-[#777] hover:text-white border shadow rounded border-[#777] text-[#000] bg-gray-100 leading-2 px-2 py-2 my-[1px]">
                                    ' . __('app.controls.action.remove') . '
                                </button>
                            </form>';
                $buttons .= '</div>';

                return $buttons;
            })
            // ->editColumn('desc', function ($inventory) {
            //     return ($inventory->description_en);
            // })
            // ->editColumn('status', function ($inventory) {
            //     return ($inventory->is_active ? "Active" : "Inactive");
            // })
            // ->editColumn('type', function ($inventory) {
            //     return ("<a href='' class='font-bold underline text-black hover:text-black'>" . $inventory->type->name . "</a>");
            // })
            // ->editColumn('image', function ($r) {
            //     if (!$r->image) {
            //         return '<span class="text-xs text-gray-400 italic">No image</span>';
            //     }
            //     $url = asset('storage/' . $r->image);
            //     return '
            //             <div class="flex items-center justify-center">
            //                 <div class="h-30 w-30 flex-shrink-0 overflow-hidden rounded-lg border border-gray-200 bg-gray-50 p-1 shadow-sm">
            //                     <img class="h-full w-full object-contain rounded" src="' . $url . '" alt="Image">
            //                 </div>
            //             </div>';
            // })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
