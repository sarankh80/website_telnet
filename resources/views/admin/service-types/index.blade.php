@extends('admin.layouts.app')
@section('title', __('admin.service_types.title'))

@section('content')
<div class="flex items-center justify-between mb-6">
    <p class="text-sm text-slate-400">{{ $serviceTypes->total() }} {{ __('admin.service_types.title') }}</p>
    <a href="{{ route('admin.service-types.create') }}"
       class="px-4 py-2 bg-brand-green hover:bg-[#7ab534] text-white text-sm font-semibold rounded-lg transition flex items-center gap-2">
        <i class="fa-solid fa-plus"></i> {{ __('admin.service_types.add') }}
    </a>
</div>

<div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden">
    <div class="overflow-x-auto">
    <table class="w-full text-sm min-w-[560px]">
        <thead>
            <tr class="border-b border-slate-800 text-xs text-slate-400 uppercase tracking-wider">
                <th class="px-5 py-3.5 text-left w-8">#</th>
                <th class="px-5 py-3.5 text-left">{{ __('admin.field.type') }}</th>
                <th class="px-5 py-3.5 text-left hidden md:table-cell">{{ __('admin.service_types.category') }}</th>
                <th class="px-5 py-3.5 text-center">{{ __('admin.field.services') }}</th>
                <th class="px-5 py-3.5 text-right">{{ __('admin.field.actions') }}</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-800">
            @forelse($serviceTypes as $type)
                <tr class="hover:bg-slate-800/40 transition">
                    <td class="px-5 py-4 text-slate-500">{{ $loop->iteration }}</td>
                    <td class="px-5 py-4">
                        <p class="font-medium text-slate-200">{{ $type->name }}</p>
                        <p class="text-xs text-slate-500">{{ $type->name_km }}</p>
                    </td>
                    <td class="px-5 py-4 hidden md:table-cell">
                        @if($type->slug)
                            <span class="px-2 py-0.5 text-xs rounded-full bg-sky-400/10 text-sky-400">
                                {{ $type->slug->name }}
                            </span>
                        @else
                            <span class="text-slate-600">—</span>
                        @endif
                    </td>
                    <td class="px-5 py-4 text-center text-slate-400">{{ $type->services_count }}</td>
                    <td class="px-5 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.service-types.edit', $type) }}"
                               class="px-3 py-1.5 text-xs bg-slate-700 hover:bg-slate-600 text-slate-200 rounded-lg transition">{{ __('admin.btn.edit') }}</a>
                            <form method="POST" action="{{ route('admin.service-types.destroy', $type) }}"
                                  onsubmit="return confirm('{{ __('admin.btn.delete') }}?')">
                                @csrf @method('DELETE')
                                <button class="px-3 py-1.5 text-xs bg-red-500/10 hover:bg-red-500/20 text-red-400 rounded-lg transition">{{ __('admin.btn.delete') }}</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="px-5 py-10 text-center text-slate-500">{{ __('admin.service_types.no_types') }}</td></tr>
            @endforelse
        </tbody>
    </table>
    </div>
    @if($serviceTypes->hasPages())
        <div class="px-5 py-4 border-t border-slate-800">{{ $serviceTypes->links() }}</div>
    @endif
</div>
@endsection
