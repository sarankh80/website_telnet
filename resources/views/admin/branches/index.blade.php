@extends('admin.layouts.app')
@section('title', __('admin.branches.title'))

@section('content')
<div class="flex items-center justify-between mb-6">
    <div></div>
    <a href="{{ route('admin.branches.create') }}"
       class="px-4 py-2 bg-brand-green hover:bg-[#7ab534] text-white text-sm font-semibold rounded-lg transition flex items-center gap-2">
        <i class="fa-solid fa-plus"></i> {{ __('admin.branches.add') }}
    </a>
</div>

<div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden">
    <table class="w-full text-sm admin-datatable" style="min-width:580px">
        <thead>
            <tr class="border-b border-slate-800 text-xs text-slate-400 uppercase tracking-wider">
                <th class="px-5 py-3.5 text-left">{{ __('admin.branches.branch') }}</th>
                <th class="px-5 py-3.5 text-left hidden md:table-cell">{{ __('admin.branches.province') }}</th>
                <th class="px-5 py-3.5 text-left hidden lg:table-cell">{{ __('admin.field.phone') }}</th>
                <th class="px-5 py-3.5 text-center">{{ __('admin.field.type') }}</th>
                <th class="px-5 py-3.5 text-center">{{ __('admin.field.is_active') }}</th>
                <th class="px-5 py-3.5 text-right">{{ __('admin.field.actions') }}</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-800">
            @forelse($branches as $branch)
                <tr class="hover:bg-slate-800/40 transition">
                    <td class="px-5 py-4">
                        <p class="font-medium text-slate-200">{{ $branch->name_en }}</p>
                        <p class="text-xs text-slate-500">{{ $branch->name_km }}</p>
                    </td>
                    <td class="px-5 py-4 hidden md:table-cell text-slate-400">{{ $branch->province_en }}</td>
                    <td class="px-5 py-4 hidden lg:table-cell text-slate-400">{{ $branch->phone }}</td>
                    <td class="px-5 py-4 text-center">
                        <span class="px-2 py-0.5 text-xs rounded-full
                            {{ $branch->type === 'hq' ? 'bg-brand-orange/15 text-brand-orange' : 'bg-slate-700 text-slate-300' }}">
                            {{ strtoupper($branch->type) }}
                        </span>
                    </td>
                    <td class="px-5 py-4 text-center">
                        @if($branch->is_active)
                            <span class="text-green-400"><i class="fa-solid fa-circle-check"></i></span>
                        @else
                            <span class="text-slate-600"><i class="fa-solid fa-circle-xmark"></i></span>
                        @endif
                    </td>
                    <td class="px-5 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.branches.edit', $branch) }}"
                               class="px-3 py-1.5 text-xs bg-slate-700 hover:bg-slate-600 text-slate-200 rounded-lg transition">
                                {{ __('admin.btn.edit') }}
                            </a>
                            <form method="POST" action="{{ route('admin.branches.destroy', $branch) }}"
                                  onsubmit="return confirm('{{ __('admin.btn.delete') }}?')">
                                @csrf @method('DELETE')
                                <button class="px-3 py-1.5 text-xs bg-red-500/10 hover:bg-red-500/20 text-red-400 rounded-lg transition">
                                    {{ __('admin.btn.delete') }}
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="px-5 py-10 text-center text-slate-500">{{ __('admin.branches.no_branches') }}</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
