@extends('admin.layouts.app')
@section('title', 'Application — ' . $app->full_name)

@section('content')
<div class="max-w-3xl">
    <a href="{{ route('admin.career-applications.index') }}"
       class="inline-flex items-center gap-2 text-sm text-slate-400 hover:text-slate-200 mb-6 transition">
        <i class="fa-solid fa-arrow-left text-xs"></i> Back to Applications
    </a>

    <div class="space-y-5">
        {{-- Header card --}}
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 flex flex-col sm:flex-row sm:items-start gap-5">
            <div class="flex-1 space-y-1">
                <h2 class="text-xl font-bold text-slate-100">{{ $app->full_name }}</h2>
                <p class="text-sm text-slate-400">{{ $app->email }}</p>
                @if($app->phone)
                    <p class="text-sm text-slate-400"><i class="fa-solid fa-phone text-xs mr-1"></i>{{ $app->phone }}</p>
                @endif
                <p class="text-xs text-slate-600 pt-1">Submitted {{ $app->created_at->format('d M Y, H:i') }}</p>
            </div>
            <div class="text-right space-y-2">
                @if($app->career)
                    <p class="text-sm font-semibold text-brand-green">{{ $app->career->title }}</p>
                @elseif($app->position)
                    <p class="text-sm text-slate-300 italic">{{ $app->position }}</p>
                @endif
                @php
                    $statusStyles = [
                        'new'         => 'bg-sky-400/10 text-sky-400 border-sky-400/30',
                        'reviewing'   => 'bg-yellow-400/10 text-yellow-400 border-yellow-400/30',
                        'shortlisted' => 'bg-violet-400/10 text-violet-400 border-violet-400/30',
                        'hired'       => 'bg-green-400/10 text-green-400 border-green-400/30',
                        'rejected'    => 'bg-red-400/10 text-red-400 border-red-400/30',
                    ];
                    $sc = $statusStyles[$app->status] ?? 'bg-slate-700 text-slate-300 border-slate-600';
                @endphp
                <span class="px-3 py-1 text-xs font-semibold rounded-full border {{ $sc }}">{{ ucfirst($app->status) }}</span>
            </div>
        </div>

        {{-- CV Download --}}
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-brand-green/10 flex items-center justify-center text-brand-green">
                <i class="fa-solid fa-file-pdf text-xl"></i>
            </div>
            <div class="flex-1">
                <p class="font-medium text-slate-200">Curriculum Vitae</p>
                <p class="text-xs text-slate-500">{{ basename($app->cv_path) }}</p>
            </div>
            <a href="{{ Storage::url($app->cv_path) }}" target="_blank"
               class="px-4 py-2 bg-brand-green hover:bg-[#7ab534] text-white text-sm font-semibold rounded-lg transition flex items-center gap-2">
                <i class="fa-solid fa-download text-xs"></i> Download
            </a>
        </div>

        {{-- Cover letter --}}
        @if($app->cover_letter)
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5">
            <h3 class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-3">Cover Letter</h3>
            <p class="text-slate-300 text-sm leading-relaxed whitespace-pre-wrap">{{ $app->cover_letter }}</p>
        </div>
        @endif

        {{-- Update status --}}
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5">
            <h3 class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-4">Update Status</h3>
            <form method="POST" action="{{ route('admin.career-applications.status', $app) }}" class="space-y-4">
                @csrf @method('PATCH')
                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-medium text-slate-400 mb-1.5">Status</label>
                        <select name="status" class="admin-input">
                            @foreach(['new' => 'New', 'reviewing' => 'Reviewing', 'shortlisted' => 'Shortlisted', 'rejected' => 'Rejected', 'hired' => 'Hired'] as $val => $lbl)
                                <option value="{{ $val }}" {{ $app->status === $val ? 'selected' : '' }}>{{ $lbl }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Admin Notes</label>
                    <textarea name="admin_notes" rows="3" class="admin-input resize-none" placeholder="Internal notes…">{{ $app->admin_notes }}</textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                            class="px-5 py-2.5 bg-brand-green hover:bg-[#7ab534] text-white text-sm font-semibold rounded-lg transition">
                        Save Status
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
