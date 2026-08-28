<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Tariffs;
use Illuminate\Foundation\Http\Middleware\TransformsRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TariffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = __('app.internet.tariff.title');
        $sub_title = __('app.internet.tariff.title') . " " . __('app.controls.action.search');
        $canAdd = [
            "url" => route('admin.tariffs.create'),
            "title" => __('app.controls.action.add') . " " . __('app.internet.tariff.title'),
        ];
        $slugs = Tariffs::all();
        $search = true;
        return view('admin.tariffs.index', compact('slugs', 'search', 'canAdd', 'title', 'sub_title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = __('app.controls.action.add')  . " " . __('app.internet.tariff.title');
        $tariffs = new Tariffs();
        $redirectRoute = route("admin.tariffs.index");
        $services = $this->repository->getSelectOption(Service::class, "id", "name_en");
        return view('admin.tariffs.form', compact('tariffs', 'title', 'services', 'redirectRoute'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name_kh'        => ['required', 'string', 'max:200'],
            'name_en'        => ['required', 'string', 'max:200'],
            'description_kh' => ['nullable', 'string'],
            'description_en' => ['nullable', 'string'],
            'sort'     => ['nullable', 'integer'],
            'price'     => ['required', 'integer'],
            'local_band'     => ['required', 'integer'],
            'global_band'     => ['required', 'integer'],
            'term'     => ['required', 'integer'],
            'status'      => ['nullable', 'boolean'],
            'services_id' => ['required', 'exists:services,id'],
        ]);
        Tariffs::create($data);
        return redirect()->route('admin.tariffs.index')->with('success', 'Tariffs Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $redirectRoute = route('admin.tariffs.index');
        $tariffs = Tariffs::findOrFail($id);
        $services = $this->repository->getSelectOption(Service::class, "id", "name_en", $tariffs->services_id);
        return view('admin.tariffs.form', compact('services', 'tariffs', 'redirectRoute'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tariffs = Tariffs::findOrFail($id);
        $data = $request->validate([
            'name_kh'        => ['required', 'string', 'max:200'],
            'name_en'        => ['required', 'string', 'max:200'],
            'description_kh' => ['nullable', 'string'],
            'description_en' => ['nullable', 'string'],
            'sort'     => ['nullable', 'integer'],
            'price'     => ['required', 'integer'],
            'local_band'     => ['required', 'integer'],
            'global_band'     => ['required', 'integer'],
            'term'     => ['required', 'integer'],
            'status'      => ['nullable', 'boolean'],
            'services_id' => ['required', 'exists:services,id'],
        ]);
        $tariffs->update($data);
        return redirect()->route('admin.tariffs.index')->with('success', 'Tariffs Created');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tariffs = Tariffs::findOrFail($id);
        $tariffs->delete();
        return redirect()->route('admin.tariffs.index')->with('success', 'Tariffs Deleted');
    }
    public function data(Request $request)
    {
        $inventories = Tariffs::select([
            "id",
            "services_id",
            "name_en",
            "name_kh",
            "local_band",
            "global_band",
            "description_en",
            "description_kh",
            "price",
            "term",
            "sort",
            "status",
            "created_at",
            "updated_at"
        ])->with(['services'])->orderBy('id', 'desc');
        return DataTables::of($inventories)
            ->addColumn('actions', function ($inventory) {

                $buttons = '<div class="space-x-1 text-center">';
                $buttons .= '<a href="' . route('admin.tariffs.edit', $inventory->id) .  '" class="hover:bg-[#777] hover:text-white border shadow rounded border-[#777] text-[#000] bg-gray-100 leading-2 px-2 py-1 my-[1px]">' . __('app.controls.action.edit') . '</a>';
                $buttons .= '<form action="' . route('admin.tariffs.destroy', $inventory->id) . '" method="POST" class="inline-block">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                <button type="submit" class="hover:bg-[#777] hover:text-white border shadow rounded border-[#777] text-[#000] bg-gray-100 leading-2 px-2 py-2 my-[1px]">
                                    ' . __('app.controls.action.remove') . '
                                </button>
                            </form>';
                $buttons .= '</div>';

                return $buttons;
            })
            ->editColumn('description_en', function ($inventory) {
                return ($inventory->description_en);
            })
            ->editColumn('serviceName', function ($inventory) {
                return ('<a href="#" class="text-black text-[12px] underline hover:text-black font-bold">' . e($inventory->services->name_en) . '</a>');
            })
            ->editColumn('price', function ($inventory) {
                return '$' . e(($inventory->price) >= 1 ? number_format($inventory->price, 2) : "XX");
            })
            ->editColumn('term', function ($inventory) {
                return e("Every ".$inventory->term ." ". (($inventory->term) >= 2 ? "Monthes" : "Month"));
            })
            ->editColumn('bandwidth', function ($inventory) {
                return "
                        <span class=''>Local Speed : " . ($inventory->local_band??0) . " Mbps</span><br>
                        <span class=''>Global Speed : " . ($inventory->global_band??0) . " Mbps</span><br>
                ";
            })
            // ->editColumn('qr', function ($inventory) {
            //     return e($inventory->branches->name);
            // })
            // ->editColumn('created_at', function ($user) {
            //     return $user->created_at ? $user->created_at->format('Y-m-d H:i:s') : '';
            // })
            // ->addIndexColumn()
            ->rawColumns(['actions', 'description_en', 'serviceName', 'price', 'bandwidth'])
            ->make(true);
    }
}
