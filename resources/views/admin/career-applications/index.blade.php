@extends('admin.layouts.app')
@section('title', __('admin.applications.title'))

@section('content')
<form method="GET" class="flex gap-3 mb-6">
    <select name="career_id" class="admin-input w-auto text-sm" onchange="this.form.submit()">
        <option value="">{{ __('admin.applications.all_positions') }}</option>
        @foreach($careers as $c)
            <option value="{{ $c->id }}" {{ request('career_id') == $c->id ? 'selected' : '' }}>{{ $c->title }}</option>
        @endforeach
    </select>
    <select name="status" class="admin-input w-auto text-sm" onchange="this.form.submit()">
        <option value="">{{ __('admin.applications.all_status') }}</option>
        @foreach(['new', 'reviewing', 'shortlisted', 'rejected', 'hired'] as $val)
            <option value="{{ $val }}" {{ request('status') === $val ? 'selected' : '' }}>
                {{ __('admin.applications.status.' . $val) }}
            </option>
        @endforeach
    </select>
</form>

<div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden">
    <div class="overflow-x-auto">
    <table class="w-full text-sm min-w-[640px]">
        <thead>
            <tr class="border-b border-slate-800 text-xs text-slate-400 uppercase tracking-wider">
                <th class="px-5 py-3.5 text-left w-8">#</th>
                <th class="px-5 py-3.5 text-left">{{ __('admin.careers.applicant') }}</th>
                <th class="px-5 py-3.5 text-left hidden md:table-cell">{{ __('admin.careers.position') }}</th>
                <th class="px-5 py-3.5 text-left hidden lg:table-cell">{{ __('admin.field.created_at') }}</th>
                <th class="px-5 py-3.5 text-center">{{ __('admin.field.status') }}</th>
                <th class="px-5 py-3.5 text-right">{{ __('admin.field.actions') }}</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-800">
            @forelse($applications as $app)
                @php
                    $statusStyles = [
                        'new'         => 'bg-sky-400/10 text-sky-400',
                        'reviewing'   => 'bg-yellow-400/10 text-yellow-400',
                        'shortlisted' => 'bg-violet-400/10 text-violet-400',
                        'hired'       => 'bg-green-400/10 text-green-400',
                        'rejected'    => 'bg-red-400/10 text-red-400',
                    ];
                    $sc = $statusStyles[$app->status] ?? 'bg-slate-700 text-slate-300';
                @endphp
                <tr class="hover:bg-slate-800/40 transition">
                    <td class="px-5 py-4 text-slate-500">{{ $loop->iteration }}</td>
                    <td class="px-5 py-4">
                        <p class="font-medium text-slate-200">{{ $app->full_name }}</p>
                        <p class="text-xs text-slate-500">{{ $app->email }}</p>
                        @if($app->phone)
                            <p class="text-xs text-slate-600">{{ $app->phone }}</p>
                        @endif
                    </td>
                    <td class="px-5 py-4 hidden md:table-cell">
                        @if($app->career)
                            <span class="text-slate-300">{{ $app->career->title }}</span>
                        @elseif($app->position)
                            <span class="text-slate-400 italic">{{ $app->position }}</span>
                        @else
                            <span class="text-slate-600">General</span>
                        @endif
                    </td>
                    <td class="px-5 py-4 hidden lg:table-cell text-xs text-slate-500">
                        {{ $app->created_at->format('d M Y') }}
                    </td>
                    <td class="px-5 py-4 text-center">
                        <span class="px-2 py-0.5 text-[10px] font-semibold rounded-full {{ $sc }}">
                            {{ __('admin.applications.status.' . $app->status) }}
                        </span>
                    </td>
                    <td class="px-5 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.career-applications.show', $app) }}"
                               class="px-3 py-1.5 text-xs bg-slate-700 hover:bg-slate-600 text-slate-200 rounded-lg transition">{{ __('admin.btn.view') }}</a>
                            <form method="POST" action="{{ route('admin.career-applications.destroy', $app) }}"
                                  onsubmit="return confirm('Delete this application?')">
                                @csrf @method('DELETE')
                                <button class="px-3 py-1.5 text-xs bg-red-500/10 hover:bg-red-500/20 text-red-400 rounded-lg transition">{{ __('admin.btn.delete') }}</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-5 py-12 text-center text-slate-500">
                        <i class="fa-solid fa-file-lines text-3xl mb-3 block text-slate-700"></i>
                        {{ __('admin.applications.no_apps') }}
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
    @if($applications->hasPages())
        <div class="px-5 py-4 border-t border-slate-800">{{ $applications->links() }}</div>
    @endif
</div>
@endsection
