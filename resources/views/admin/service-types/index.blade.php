@extends('admin.layouts.app')

@section('content')

<!-- Main Wrapper -->
<div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden shadow-xl">
    <!-- Responsive Scroll Wrapper -->
    <div class="w-full overflow-x-auto p-4">
        <table class="w-full min-w-[700px] text-sm text-slate-300 " id="servicestype-table" ref-data="{{route('admin.service-types.data')}}">
            <thead>
                <tr class="bg-slate-800/50 border-b border-slate-800 text-xs text-slate-400 tracking-wider">
                    <th class="px-5 py-3.5 text-left font-semibold w-[10%]">{{__('app.internet.servicetype.id')}}</th>
                    <th class="px-5 py-3.5 text-left font-semibold whitespace-nowrap w-[15%]">{{__('app.internet.servicetype.name')}}</th>
                    <th class="px-5 py-3.5 text-left font-semibold whitespace-nowrap w-[20%]">{{__('app.internet.servicetype.slugs')}}</th>
                    <th class="px-5 py-3.5 text-left font-semibold whitespace-nowrap w-[15%]">{{__('app.internet.servicetype.image')}}</th>
                    <th class="px-5 py-3.5 text-left font-semibold hidden md:table-cell w-[30%]">{{__('app.internet.servicetype.desc_en')}}</th>
                    <th class="px-5 py-3.5 text-right font-semibold whitespace-nowrap w-[10%]">{{ __('admin.field.actions') }}</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<script>
    $(function() {
        let columns = [{
                data: "id",
                name: "id"
            },
            {
                data: "name",
                name: "name"
            },

            {
                data: "slugs",
                name: "slugs"
            },
            {
                data: "image",
                name: "image"
            },
            {
                data: "desc",
                name: "desc"
            },
            {
                data: "actions",
                name: "actions",
                orderable: false,
                searchable: false
            }
        ];
        var optionSelected = {};

        function customStyle(nRow, aData, iDataIndex) {
            // $("td:eq(5)", nRow).attr("style", "text-align:right;");

            // if (aData.status == "Available") {
            //     $("td:eq(7)", nRow).attr(
            //         "style", "text-align:center;"
            //     );
            // } else if (aData.status == "In Used") {
            //     $("td:eq(7)", nRow).attr(
            //         "style", "text-align:center;background-color:#8fc74a;color: #fff;font-weight: bold;"
            //     );
            // } else if (aData.status == "Broken") {
            //     $("td:eq(7)", nRow).attr(
            //         "style", "text-align:center;background-color:red;color: #fff;font-weight: bold;"
            //     );
            // } else if (aData.status == "Sending") {
            //     $("td:eq(7)", nRow).attr(
            //         "style", "text-align:center;background-color:blue;color: #fff;font-weight: bold;"
            //     );
            // }
        }
        initDataTable('servicestype-table', columns, ".search", ".reset", customStyle, optionSelected);
    });
</script>
@endsection