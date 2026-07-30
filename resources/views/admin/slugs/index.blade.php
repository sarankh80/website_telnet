@extends('admin.layouts.app')
@section('title', __('admin.slugs.title'))

@section('content')
<div class="flex items-center justify-between mb-6">
    <p class="text-sm text-slate-400">{{ $slugs->total() }} {{ __('admin.slugs.title') }}</p>
    <a href="{{ route('admin.slugs.create') }}"
       class="px-4 py-2 bg-brand-green hover:bg-[#7ab534] text-white text-sm font-semibold rounded-lg transition flex items-center gap-2">
        <i class="fa-solid fa-plus"></i> {{ __('admin.slugs.add') }}
    </a>
</div>

<div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden">
    <div class="overflow-x-auto">
    <table class="w-full text-sm min-w-[600px]">
        <thead>
            <tr class="border-b border-slate-800 text-xs text-slate-400 uppercase tracking-wider">
                <th class="px-5 py-3.5 text-left w-8">#</th>
                <th class="px-5 py-3.5 text-left">{{ __('admin.slugs.category') }}</th>
                <th class="px-5 py-3.5 text-center">{{ __('admin.slugs.types') }}</th>
                <th class="px-5 py-3.5 text-center">{{ __('admin.slugs.services') }}</th>
                <th class="px-5 py-3.5 text-right">{{ __('admin.field.actions') }}</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-800">
            @forelse($slugs as $slug)
                <tr class="hover:bg-slate-800/40 transition">
                    <td class="px-5 py-4 text-slate-500">{{ $loop->iteration }}</td>
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-3">
                            @if($slug->image)
                                <img src="{{ Storage::url($slug->image) }}" alt=""
                                     class="w-9 h-9 rounded-lg object-cover flex-shrink-0 border border-slate-700">
                            @else
                                <div class="w-9 h-9 rounded-lg bg-slate-800 flex items-center justify-center flex-shrink-0">
                                    <i class="fa-solid fa-layer-group text-slate-500 text-sm"></i>
                                </div>
                            @endif
                            <div>
                                <p class="font-medium text-slate-200">{{ $slug->name }}</p>
                                <p class="text-xs text-slate-500">{{ $slug->name_km }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-4 text-center text-slate-400">{{ $slug->service_types_count }}</td>
                    <td class="px-5 py-4 text-center text-slate-400">{{ $slug->services_count }}</td>
                    <td class="px-5 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.slugs.edit', $slug) }}"
                               class="px-3 py-1.5 text-xs bg-slate-700 hover:bg-slate-600 text-slate-200 rounded-lg transition">{{ __('admin.btn.edit') }}</a>
                            <form method="POST" action="{{ route('admin.slugs.destroy', $slug) }}"
                                  onsubmit="return confirm('{{ __('admin.btn.delete') }}?')">
                                @csrf @method('DELETE')
                                <button class="px-3 py-1.5 text-xs bg-red-500/10 hover:bg-red-500/20 text-red-400 rounded-lg transition">{{ __('admin.btn.delete') }}</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="px-5 py-10 text-center text-slate-500">{{ __('admin.slugs.no_categories') }}</td></tr>
            @endforelse
        </tbody>
    </table>
    </div>
    @if($slugs->hasPages())
        <div class="px-5 py-4 border-t border-slate-800">{{ $slugs->links() }}</div>
    @endif
</div>
@endsection
