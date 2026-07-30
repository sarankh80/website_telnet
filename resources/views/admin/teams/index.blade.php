@extends('admin.layouts.app')
@section('title', __('admin.teams.title'))

@section('content')
<div class="flex items-center justify-between mb-6">
    <p class="text-sm text-slate-400">{{ $members->total() }} {{ __('admin.teams.title') }}</p>
    <a href="{{ route('admin.teams.create') }}"
       class="px-4 py-2 bg-brand-green hover:bg-[#7ab534] text-white text-sm font-semibold rounded-lg transition flex items-center gap-2">
        <i class="fa-solid fa-plus"></i> {{ __('admin.teams.add') }}
    </a>
</div>

<div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden">
    <div class="overflow-x-auto">
    <table class="w-full text-sm min-w-[560px]">
        <thead>
            <tr class="border-b border-slate-800 text-xs text-slate-400 uppercase tracking-wider">
                <th class="px-5 py-3.5 text-left">{{ __('admin.teams.member') }}</th>
                <th class="px-5 py-3.5 text-left hidden md:table-cell">{{ __('admin.teams.position') }}</th>
                <th class="px-5 py-3.5 text-center">{{ __('admin.teams.is_ceo') }}</th>
                <th class="px-5 py-3.5 text-center">{{ __('admin.field.is_active') }}</th>
                <th class="px-5 py-3.5 text-center">{{ __('admin.field.order') }}</th>
                <th class="px-5 py-3.5 text-right">{{ __('admin.field.actions') }}</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-800">
            @forelse($members as $member)
                <tr class="hover:bg-slate-800/40 transition">
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-3">
                            @if($member->photo)
                                <img src="{{ Storage::url($member->photo) }}" alt="{{ $member->name_en }}"
                                     class="w-9 h-9 rounded-full object-cover flex-shrink-0">
                            @else
                                <div class="w-9 h-9 rounded-full bg-slate-700 flex items-center justify-center flex-shrink-0">
                                    <i class="fa-solid fa-user text-slate-500 text-xs"></i>
                                </div>
                            @endif
                            <div>
                                <p class="font-medium text-slate-200">{{ $member->name_en }}</p>
                                <p class="text-xs text-slate-500">{{ $member->name_km }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-4 hidden md:table-cell text-slate-400">{{ $member->position_en }}</td>
                    <td class="px-5 py-4 text-center">
                        @if($member->is_ceo)
                            <span class="px-2 py-0.5 text-[10px] font-bold bg-brand-orange/15 text-brand-orange rounded-full">{{ __('admin.teams.is_ceo') }}</span>
                        @else
                            <span class="text-slate-600">—</span>
                        @endif
                    </td>
                    <td class="px-5 py-4 text-center">
                        @if($member->is_active)
                            <span class="text-green-400"><i class="fa-solid fa-circle-check"></i></span>
                        @else
                            <span class="text-slate-600"><i class="fa-solid fa-circle-xmark"></i></span>
                        @endif
                    </td>
                    <td class="px-5 py-4 text-center text-slate-400">{{ $member->sort_order }}</td>
                    <td class="px-5 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.teams.edit', $member) }}"
                               class="px-3 py-1.5 text-xs bg-slate-700 hover:bg-slate-600 text-slate-200 rounded-lg transition">
                                {{ __('admin.btn.edit') }}
                            </a>
                            <form method="POST" action="{{ route('admin.teams.destroy', $member) }}"
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
                <tr><td colspan="6" class="px-5 py-10 text-center text-slate-500">{{ __('admin.teams.no_members') }}</td></tr>
            @endforelse
        </tbody>
    </table>
    </div>{{-- /overflow-x-auto --}}
    @if($members->hasPages())
        <div class="px-5 py-4 border-t border-slate-800">{{ $members->links() }}</div>
    @endif
</div>
@endsection
