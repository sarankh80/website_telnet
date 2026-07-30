@extends('admin.layouts.app')
@section('title', __('admin.corporate.title'))

@section('content')
<div class="flex items-center justify-between mb-6">
    <p class="text-sm text-slate-400">{{ $subscribers->total() }} {{ __('admin.corporate.title') }}</p>
    <a href="{{ route('admin.corporate-subscribers.create') }}"
       class="px-4 py-2 bg-brand-green hover:bg-[#7ab534] text-white text-sm font-semibold rounded-lg transition flex items-center gap-2">
        <i class="fa-solid fa-plus"></i> {{ __('admin.corporate.add') }}
    </a>
</div>

<div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden">
    <div class="overflow-x-auto">
    <table class="w-full text-sm min-w-[640px]">
        <thead>
            <tr class="border-b border-slate-800 text-xs text-slate-400 uppercase tracking-wider">
                <th class="px-5 py-3.5 text-left w-8">#</th>
                <th class="px-5 py-3.5 text-left">{{ __('admin.corporate.company_en') }}</th>
                <th class="px-5 py-3.5 text-left hidden md:table-cell">{{ __('admin.corporate.industry_en') }}</th>
                <th class="px-5 py-3.5 text-left hidden lg:table-cell">{{ __('admin.corporate.contact_person') }}</th>
                <th class="px-5 py-3.5 text-center">{{ __('admin.field.is_active') }}</th>
                <th class="px-5 py-3.5 text-center hidden sm:table-cell">{{ __('admin.field.order') }}</th>
                <th class="px-5 py-3.5 text-right">{{ __('admin.field.actions') }}</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-800">
            @forelse($subscribers as $sub)
                <tr class="hover:bg-slate-800/40 transition">
                    <td class="px-5 py-4 text-slate-500">{{ $loop->iteration }}</td>

                    <td class="px-5 py-4">
                        <div class="flex items-center gap-3">
                            @if($sub->logo)
                                <img src="{{ Storage::url($sub->logo) }}" alt=""
                                     class="w-10 h-10 rounded-lg object-contain bg-white/5 border border-slate-700 p-0.5 flex-shrink-0">
                            @else
                                <div class="w-10 h-10 rounded-lg bg-slate-800 flex items-center justify-center flex-shrink-0">
                                    <i class="fa-solid fa-building text-slate-500"></i>
                                </div>
                            @endif
                            <div>
                                <p class="font-medium text-slate-200">{{ $sub->company_name }}</p>
                                <p class="text-xs text-slate-500">{{ $sub->company_name_km }}</p>
                                @if($sub->website)
                                    <a href="{{ $sub->website }}" target="_blank"
                                       class="text-[10px] text-brand-green hover:underline">
                                        {{ parse_url($sub->website, PHP_URL_HOST) }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </td>

                    <td class="px-5 py-4 hidden md:table-cell">
                        @if($sub->industry)
                            <p class="text-slate-300">{{ $sub->industry }}</p>
                            <p class="text-xs text-slate-500">{{ $sub->industry_km }}</p>
                        @else
                            <span class="text-slate-600">—</span>
                        @endif
                    </td>

                    <td class="px-5 py-4 hidden lg:table-cell text-sm">
                        @if($sub->contact_person)
                            <p class="text-slate-300">{{ $sub->contact_person }}</p>
                        @endif
                        @if($sub->contact_email)
                            <p class="text-xs text-slate-500">{{ $sub->contact_email }}</p>
                        @endif
                        @if($sub->contact_phone)
                            <p class="text-xs text-slate-500">{{ $sub->contact_phone }}</p>
                        @endif
                        @if(!$sub->contact_person && !$sub->contact_email && !$sub->contact_phone)
                            <span class="text-slate-600">—</span>
                        @endif
                    </td>

                    <td class="px-5 py-4 text-center">
                        @if($sub->is_active)
                            <span class="text-green-400"><i class="fa-solid fa-circle-check"></i></span>
                        @else
                            <span class="text-slate-600"><i class="fa-solid fa-circle-xmark"></i></span>
                        @endif
                    </td>

                    <td class="px-5 py-4 text-center text-slate-400 hidden sm:table-cell">{{ $sub->sort_order }}</td>

                    <td class="px-5 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.corporate-subscribers.edit', $sub) }}"
                               class="px-3 py-1.5 text-xs bg-slate-700 hover:bg-slate-600 text-slate-200 rounded-lg transition">
                                {{ __('admin.btn.edit') }}
                            </a>
                            <form method="POST" action="{{ route('admin.corporate-subscribers.destroy', $sub) }}"
                                  onsubmit="return confirm('Delete {{ addslashes($sub->company_name) }}?')">
                                @csrf @method('DELETE')
                                <button class="px-3 py-1.5 text-xs bg-red-500/10 hover:bg-red-500/20 text-red-400 rounded-lg transition">
                                    {{ __('admin.btn.delete') }}
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-5 py-12 text-center text-slate-500">
                        <i class="fa-solid fa-building text-3xl mb-3 block text-slate-700"></i>
                        {{ __('admin.corporate.no_subs') }}
                        <a href="{{ route('admin.corporate-subscribers.create') }}" class="text-brand-green hover:underline ml-1">{{ __('admin.btn.add') }}</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
    @if($subscribers->hasPages())
        <div class="px-5 py-4 border-t border-slate-800">{{ $subscribers->links() }}</div>
    @endif
</div>
@endsection
