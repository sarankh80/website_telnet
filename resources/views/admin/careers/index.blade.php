@extends('admin.layouts.app')
@section('title', 'Careers')

@section('content')
<div class="flex items-center justify-between mb-6">
    <p class="text-sm text-slate-400">{{ $careers->total() }} job postings</p>
    <a href="{{ route('admin.careers.create') }}"
       class="px-4 py-2 bg-brand-green hover:bg-[#7ab534] text-white text-sm font-semibold rounded-lg transition flex items-center gap-2">
        <i class="fa-solid fa-plus"></i> Add Job
    </a>
</div>

<div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden">
    <div class="overflow-x-auto">
    <table class="w-full text-sm min-w-[640px]">
        <thead>
            <tr class="border-b border-slate-800 text-xs text-slate-400 uppercase tracking-wider">
                <th class="px-5 py-3.5 text-left w-8">#</th>
                <th class="px-5 py-3.5 text-left">Position</th>
                <th class="px-5 py-3.5 text-left hidden md:table-cell">Type</th>
                <th class="px-5 py-3.5 text-left hidden lg:table-cell">Deadline</th>
                <th class="px-5 py-3.5 text-center hidden sm:table-cell">Apps</th>
                <th class="px-5 py-3.5 text-center">Active</th>
                <th class="px-5 py-3.5 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-800">
            @forelse($careers as $career)
                <tr class="hover:bg-slate-800/40 transition">
                    <td class="px-5 py-4 text-slate-500">{{ $loop->iteration }}</td>
                    <td class="px-5 py-4">
                        <p class="font-medium text-slate-200">{{ $career->title }}</p>
                        <p class="text-xs text-slate-500">{{ $career->title_km }}</p>
                        @if($career->department)
                            <p class="text-xs text-slate-600 mt-0.5">{{ $career->department }}</p>
                        @endif
                    </td>
                    <td class="px-5 py-4 hidden md:table-cell">
                        @php
                            $typeColor = match($career->type) {
                                'full-time'  => 'bg-brand-green/10 text-brand-green',
                                'part-time'  => 'bg-sky-400/10 text-sky-400',
                                'contract'   => 'bg-yellow-400/10 text-yellow-400',
                                'internship' => 'bg-violet-400/10 text-violet-400',
                                default      => 'bg-slate-700 text-slate-300',
                            };
                        @endphp
                        <span class="px-2 py-0.5 text-[10px] font-semibold rounded-full {{ $typeColor }}">
                            {{ $career->type_label }}
                        </span>
                        @if($career->location)
                            <p class="text-xs text-slate-500 mt-1"><i class="fa-solid fa-location-dot text-[10px] mr-1"></i>{{ $career->location }}</p>
                        @endif
                    </td>
                    <td class="px-5 py-4 hidden lg:table-cell text-sm">
                        @if($career->deadline)
                            @php $expired = $career->deadline->isPast(); @endphp
                            <span class="{{ $expired ? 'text-red-400' : 'text-slate-300' }}">
                                {{ $career->deadline->format('d M Y') }}
                            </span>
                            @if($expired)
                                <span class="ml-1 text-[10px] text-red-400">(expired)</span>
                            @endif
                        @else
                            <span class="text-slate-600">Open</span>
                        @endif
                    </td>
                    <td class="px-5 py-4 text-center hidden sm:table-cell">
                        @if($career->applications_count > 0)
                            <a href="{{ route('admin.career-applications.index', ['career_id' => $career->id]) }}"
                               class="text-brand-green font-semibold hover:underline">
                                {{ $career->applications_count }}
                            </a>
                        @else
                            <span class="text-slate-600">0</span>
                        @endif
                    </td>
                    <td class="px-5 py-4 text-center">
                        @if($career->is_active)
                            <span class="text-green-400"><i class="fa-solid fa-circle-check"></i></span>
                        @else
                            <span class="text-slate-600"><i class="fa-solid fa-circle-xmark"></i></span>
                        @endif
                    </td>
                    <td class="px-5 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.careers.edit', $career) }}"
                               class="px-3 py-1.5 text-xs bg-slate-700 hover:bg-slate-600 text-slate-200 rounded-lg transition">Edit</a>
                            <form method="POST" action="{{ route('admin.careers.destroy', $career) }}"
                                  onsubmit="return confirm('Delete this job posting?')">
                                @csrf @method('DELETE')
                                <button class="px-3 py-1.5 text-xs bg-red-500/10 hover:bg-red-500/20 text-red-400 rounded-lg transition">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-5 py-12 text-center text-slate-500">
                        <i class="fa-solid fa-briefcase text-3xl mb-3 block text-slate-700"></i>
                        No job postings yet.
                        <a href="{{ route('admin.careers.create') }}" class="text-brand-green hover:underline ml-1">Add one</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
    @if($careers->hasPages())
        <div class="px-5 py-4 border-t border-slate-800">{{ $careers->links() }}</div>
    @endif
</div>
@endsection
