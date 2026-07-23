@extends('admin.layouts.app')
@section('title', 'Service Request #' . $request->id)

@section('content')
<div class="max-w-2xl">
    <a href="{{ route('admin.service-requests.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-400 hover:text-slate-200 mb-6 transition">
        <i class="fa-solid fa-arrow-left text-xs"></i> Back to Requests
    </a>

    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 space-y-6">

        {{-- Header --}}
        <div class="flex items-start justify-between gap-4">
            <div>
                <h2 class="text-lg font-bold text-slate-100">{{ $request->full_name }}</h2>
                <p class="text-sm text-slate-400">{{ $request->phone }} · Submitted {{ $request->created_at->format('d M Y, H:i') }}</p>
            </div>
            @php
                $colors = [
                    'new'         => 'bg-brand-orange/15 text-brand-orange',
                    'contacted'   => 'bg-sky-500/15 text-sky-400',
                    'in_progress' => 'bg-yellow-500/15 text-yellow-400',
                    'completed'   => 'bg-green-500/15 text-green-400',
                    'cancelled'   => 'bg-slate-700 text-slate-400',
                ];
            @endphp
            <span class="flex-shrink-0 px-3 py-1 rounded-full text-xs font-semibold {{ $colors[$request->status] ?? '' }}">
                {{ ucfirst(str_replace('_',' ',$request->status)) }}
            </span>
        </div>

        <hr class="border-slate-800">

        {{-- Details --}}
        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <p class="text-xs text-slate-500 mb-1">Service Type</p>
                <p class="text-sm text-slate-200 font-medium">{{ $request->service_type }}</p>
            </div>
            <div>
                <p class="text-xs text-slate-500 mb-1">Location</p>
                <p class="text-sm text-slate-200">{{ $request->location ?: '—' }}</p>
            </div>
        </div>

        @if($request->message)
            <div>
                <p class="text-xs text-slate-500 mb-2">Message</p>
                <div class="bg-slate-800 rounded-xl p-4 text-sm text-slate-300 leading-relaxed">
                    {{ $request->message }}
                </div>
            </div>
        @endif

        <div class="text-xs text-slate-600">IP: {{ $request->ip_address }}</div>

        <hr class="border-slate-800">

        {{-- Update Status --}}
        <div>
            <p class="text-sm font-medium text-slate-300 mb-3">Update Status</p>
            <div class="flex flex-wrap gap-3">
                <form method="POST" action="{{ route('admin.service-requests.status', $request) }}" class="flex gap-3">
                    @csrf @method('PATCH')
                    <select name="status"
                            class="bg-slate-800 border border-slate-700 text-slate-100 rounded-lg px-4 py-2 text-sm
                                   focus:outline-none focus:border-brand-green transition">
                        @foreach(['new','contacted','in_progress','completed','cancelled'] as $s)
                            <option value="{{ $s }}" {{ $request->status === $s ? 'selected' : '' }}>
                                {{ ucfirst(str_replace('_',' ',$s)) }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="px-4 py-2 bg-brand-green hover:bg-[#7ab534] text-white text-sm font-semibold rounded-lg transition">
                        Update
                    </button>
                </form>
                <form method="POST" action="{{ route('admin.service-requests.destroy', $request) }}"
                      onsubmit="return confirm('Delete this request permanently?')">
                    @csrf @method('DELETE')
                    <button class="px-4 py-2 bg-red-500/10 hover:bg-red-500/20 text-red-400 text-sm rounded-lg transition">
                        Delete
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
