@extends('admin.layouts.app')
@section('title', 'Message from ' . $message->name)

@section('content')
<div class="max-w-2xl">
    <a href="{{ route('admin.contact-messages.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-400 hover:text-slate-200 mb-6 transition">
        <i class="fa-solid fa-arrow-left text-xs"></i> Back to Messages
    </a>

    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 space-y-6">

        {{-- Header --}}
        <div class="flex items-start justify-between gap-4">
            <div>
                <h2 class="text-lg font-bold text-slate-100">{{ $message->name }}</h2>
                <p class="text-sm text-slate-400">
                    <a href="mailto:{{ $message->email }}" class="hover:text-brand-green transition">{{ $message->email }}</a>
                    @if($message->phone) · {{ $message->phone }} @endif
                </p>
            </div>
            <span class="flex-shrink-0 px-3 py-1 rounded-full text-xs font-semibold bg-green-500/15 text-green-400">
                <i class="fa-solid fa-check mr-1"></i>Read
            </span>
        </div>

        <hr class="border-slate-800">

        <div>
            <p class="text-xs text-slate-500 mb-1">Subject</p>
            <p class="text-base font-semibold text-slate-200">{{ $message->subject }}</p>
        </div>

        <div>
            <p class="text-xs text-slate-500 mb-2">Message</p>
            <div class="bg-slate-800 rounded-xl p-4 text-sm text-slate-300 leading-relaxed whitespace-pre-wrap">{{ $message->message }}</div>
        </div>

        <p class="text-xs text-slate-600">Received {{ $message->created_at->format('d M Y, H:i') }}</p>

        <hr class="border-slate-800">

        <div class="flex gap-3">
            <a href="mailto:{{ $message->email }}"
               class="px-5 py-2.5 bg-brand-green hover:bg-[#7ab534] text-white text-sm font-semibold rounded-lg transition flex items-center gap-2">
                <i class="fa-solid fa-reply"></i> Reply via Email
            </a>
            <form method="POST" action="{{ route('admin.contact-messages.destroy', $message) }}"
                  onsubmit="return confirm('Delete this message?')">
                @csrf @method('DELETE')
                <button class="px-5 py-2.5 bg-red-500/10 hover:bg-red-500/20 text-red-400 text-sm rounded-lg transition">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
