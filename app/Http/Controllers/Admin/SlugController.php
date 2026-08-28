<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slugs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class SlugController extends Controller
{
    public function index()
    {
        $slugs = Slugs::orderBy('id')->get();
        $search = true;
        $title = __('app.internet.slugs.title');
        $canAdd = [
            "url" => route('admin.slugs.create'),
            "title" => __('app.controls.action.add') . " " . __('app.internet.slugs.title'),
        ];
        return view('admin.slugs.index', compact('slugs', 'search', 'canAdd', 'title'));
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
            $data['image'] = $request->file('image')->store('home/SlugsService/', 'public');
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
        ]);
        if ($request->hasFile('image')) {
            if ($slug->image) Storage::disk('public')->delete($slug->image);
            $data['image'] = $request->file('image')->store('home/SlugsService/', 'public');
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
    public function data(Request $request)
    {
        $inventories = Slugs::select([
            'id',
            'name',
            'name_km',
            'image',
            'desc',
            'desc_km'
        ])->with(['serviceTypes'])->orderBy('id', 'desc');
        return DataTables::of($inventories)
            ->addColumn('actions', function ($inventory) {

                $buttons = '<div class="space-x-1 text-center">';
                $buttons .= '<a href="' . route('admin.slugs.edit', $inventory->id) .  '" class="hover:bg-[#777] hover:text-white border shadow rounded border-[#777] text-[#000] bg-gray-100 leading-2 px-2 py-1 my-[1px]">' . __('app.controls.action.edit') . '</a>';
                $buttons .= '<form action="' . route('admin.slugs.destroy', $inventory->id) . '" method="POST" class="inline-block">
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
            ->rawColumns(['actions', 'desc', 'image'])
            ->make(true);
    }
}
