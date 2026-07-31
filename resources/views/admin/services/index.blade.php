@extends('admin.layouts.app')
@section('title', __('admin.services.title'))

@section('content')
<div class="flex items-center justify-between mb-6">
    <div></div>
    <a href="{{ route('admin.services.create') }}"
       class="px-4 py-2 bg-brand-green hover:bg-[#7ab534] text-white text-sm font-semibold rounded-lg transition flex items-center gap-2">
        <i class="fa-solid fa-plus"></i> {{ __('admin.services.add') }}
    </a>
</div>

<div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden">
    <table class="w-full text-sm admin-datatable" style="min-width:600px">
        <thead>
            <tr class="border-b border-slate-800 text-xs text-slate-400 uppercase tracking-wider">
                <th class="px-5 py-3.5 text-left w-8">#</th>
                <th class="px-5 py-3.5 text-left">{{ __('admin.services.title') }}</th>
                <th class="px-5 py-3.5 text-left hidden md:table-cell">{{ __('admin.services.badge') }}</th>
                <th class="px-5 py-3.5 text-left hidden lg:table-cell">{{ __('admin.services.slug_type') }}</th>
                <th class="px-5 py-3.5 text-center">{{ __('admin.field.is_active') }}</th>
                <th class="px-5 py-3.5 text-center">{{ __('admin.field.order') }}</th>
                <th class="px-5 py-3.5 text-right">{{ __('admin.field.actions') }}</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-800">
            @forelse($services as $service)
                <tr class="hover:bg-slate-800/40 transition">
                    <td class="px-5 py-4 text-slate-500">{{ $loop->iteration }}</td>
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-3">
                            @if($service->image)
                                <img src="{{ Storage::url($service->image) }}" alt=""
                                     class="w-9 h-9 rounded-lg object-cover flex-shrink-0 border border-slate-700">
                            @else
                                <div class="w-9 h-9 rounded-lg bg-slate-800 flex items-center justify-center text-brand-green flex-shrink-0">
                                    <i class="fa-solid {{ $service->icon }} text-sm"></i>
                                </div>
                            @endif
                            <div>
                                <p class="font-medium text-slate-200">{{ $service->name_en }}</p>
                                <p class="text-xs text-slate-500">{{ $service->name_km }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-4 hidden md:table-cell">
                        <span class="px-2 py-0.5 text-xs rounded-full bg-brand-green/15 text-brand-green">{{ $service->badge_en }}</span>
                    </td>
                    <td class="px-5 py-4 hidden lg:table-cell">
                        <div class="flex flex-col gap-1">
                            @if($service->slug)
                                <span class="px-2 py-0.5 text-[10px] rounded-full bg-sky-400/10 text-sky-400 w-fit">{{ $service->slug->name }}</span>
                            @endif
                            @if($service->type)
                                <span class="px-2 py-0.5 text-[10px] rounded-full bg-violet-400/10 text-violet-400 w-fit">{{ $service->type->name }}</span>
                            @endif
                            @if(!$service->slug && !$service->type)
                                <span class="text-slate-600 text-xs">—</span>
                            @endif
                        </div>
                    </td>
                    <td class="px-5 py-4 text-center">
                        @if($service->is_active)
                            <span class="text-green-400"><i class="fa-solid fa-circle-check"></i></span>
                        @else
                            <span class="text-slate-600"><i class="fa-solid fa-circle-xmark"></i></span>
                        @endif
                    </td>
                    <td class="px-5 py-4 text-center text-slate-400">{{ $service->sort_order }}</td>
                    <td class="px-5 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.services.edit', $service) }}"
                               class="px-3 py-1.5 text-xs bg-slate-700 hover:bg-slate-600 text-slate-200 rounded-lg transition">
                                {{ __('admin.btn.edit') }}
                            </a>
                            <form method="POST" action="{{ route('admin.services.destroy', $service) }}"
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
                <tr><td colspan="7" class="px-5 py-10 text-center text-slate-500">{{ __('admin.services.no_services') }}</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
