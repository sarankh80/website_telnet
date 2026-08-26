<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tariffs;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TariffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $canAdd = [
            "url" => route('admin.tariffs.create'),
            "title" => __('app.controls.action.add') . " " . __('app.internet.tariff.title'),
        ];
        $slugs = Tariffs::all();
        $search = true;
        return view('admin.tariffs.index', compact('slugs', 'search', 'canAdd'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function data(Request $request)
    {
        $inventories = Tariffs::select([
            "id",
            "services_id",
            "name_en",
            "name_kh",
            "description_en",
            "description_kh",
            "price",
            "term",
            "image",
            "created_at",
            "updated_at"
        ])->with(['services'])->orderBy('id', 'desc');
        return DataTables::of($inventories)
            ->addColumn('actions', function ($inventory) {
                // $editable = $this->isAccessible("edit Inventory Product Detail", "translate.admin_relatedOrg_edit", "admin.inventory.product-detail.edit", $inventory->id);
                // $deleteable = $this->isAccessible("delete Inventory Product Detail", "translate.admin_relatedOrg_delete", "admin.inventory.product-detail.destroy", $inventory->id);
                // $printable = $this->isPrintable(
                //     "print Inventory Product Detail",
                //     "translate.document_controll_print",
                //     "printQRProduct",
                //     $inventory->id,
                //     "App\Models\Admin\Inventory\ProductDetail"
                // );
                // $csrf = csrf_token();

                $buttons = '<div class="space-x-1 text-center">';
                $buttons .= '<a href="" class="hover:bg-[#777] hover:text-white border shadow rounded border-[#777] text-[#000] bg-gray-100 leading-2 px-2 py-[2px] my-[1px]">' . __('app.controls.action.edit') . '</a>';
                $buttons .= '<a href="" class="hover:bg-[#777] hover:text-white border shadow rounded border-[#777] text-[#000] bg-gray-100 leading-2 px-2 py-[2px] my-[1px]">' . __('app.controls.action.remove') . '</a>';
                $buttons .= '</div>';

                return $buttons;
            })
            ->editColumn('description_en', function ($inventory) {
                return ($inventory->description_en);
            })
            ->editColumn('serviceName', function ($inventory) {
                return ('<a href="#" class="text-black text-[12px] underline hover:text-black font-bold">' . e($inventory->services->name_en) . '</a>');
            })
            // ->editColumn('product', function ($inventory) {
            //     return '<a href="#" class="text-black text-[12px] underline hover:text-black font-bold">' . e($inventory->product->name) . '</a>';
            // })
            // ->editColumn('branch', function ($inventory) {
            //     return e($inventory->branches->name);
            // })
            // ->editColumn('qr', function ($inventory) {
            //     return e($inventory->branches->name);
            // })
            // ->editColumn('created_at', function ($user) {
            //     return $user->created_at ? $user->created_at->format('Y-m-d H:i:s') : '';
            // })
            // ->addIndexColumn()
            ->rawColumns(['actions', 'description_en', 'serviceName'])
            ->make(true);
    }
}
