@extends('layouts.app')
@section('title', 'ក្រុមហ៊ុន​យើង​ខ្ញុំ — TELNET CO., LTD.')
@php
$selectedJob=0;


@endphp
@section('content')
<section class="relative bg-[#8fc74a] text-white py-8 px-4 sm:px-6 lg:px-8 overflow-hidden">
    <div class="max-w-5xl mx-auto relative z-10">
        <div class="text-center mb-2">
            <h1 class="text-2xl sm:text-4xl p-4 font-bold drop-shadow-sm">
                {{ __('app.career.slogan') }}
            </h1>
        </div>
        <div class="bg-white/95 backdrop-blur-md p-4 sm:p-5 rounded-2xl shadow-xl border border-slate-100">
            <form
                action="#"
                method="#"
                class="grid grid-cols-1 md:grid-cols-10 gap-4 items-end">
                @csrf

                <!-- Branch Select -->
                <div class="md:col-span-4 flex flex-col gap-1.5 relative">
                    <label for="branch_filter" class="text-base text-slate-700 font-semibold tracking-wide">
                        {{ __('app.career.branch') }}
                    </label>
                    <select
                        name="branch_filter"
                        id="branch_filter"
                        class="select2 w-full text-slate-800 bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#8fc74a] focus:border-transparent focus:outline-none transition-all">
                        <option value="">
                            {{ __('app.career.branch_filter') }}
                        </option>
                        {!! $branches !!}
                    </select>
                </div>

                <!-- Position Select -->
                <div class="md:col-span-4 flex flex-col gap-1.5 relative">
                    <label for="post_filter" class="text-base text-slate-700 font-semibold tracking-wide">
                        {{ __('app.career.posts') }}
                    </label>
                    <select
                        name="post_filter"
                        id="post_filter"
                        class="select2 w-full text-slate-800 bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#8fc74a] focus:border-transparent focus:outline-none transition-all">
                        <option value="">
                            {{ __('app.career.posts_filter') }}
                        </option>
                        {!! $positions !!}
                    </select>
                </div>

                <!-- Action Buttons -->
                <div class="md:col-span-2 flex items-center gap-2 relative">
                    <!-- Search Button -->
                    <button
                        type="submit"
                        class="flex-1 inline-flex items-center justify-center gap-1.5
                               bg-[#8fc74a] hover:bg-[#7eb53c]
                               text-white font-medium
                               py-1 px-2
                               rounded-md
                               shadow-md shadow-[#8fc74a]/20 hover:shadow-lg
                               transition-all duration-200
                               active:scale-95
                               text-sm cursor-pointer">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-4 h-4 shrink-0"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2.5">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <span class="uppercase tracking-wider">
                            {{ __('app.career.search') }}
                        </span>
                    </button>

                    <!-- Reset Button -->
                    <a
                        href=""
                        class="inline-flex items-center justify-center gap-1.5
                               bg-slate-100 hover:bg-slate-200
                               text-slate-600 font-medium
                               py-1 px-2
                               rounded-md
                               transition-all duration-200
                               active:scale-95
                               text-sm cursor-pointer
                               border border-slate-200"
                        title="{{ __('app.career.reset') }}">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-4 h-4 shrink-0"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        <span class="hidden sm:inline uppercase tracking-wider">
                            {{ __('app.career.reset') }}
                        </span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>
<main class="flex-1 max-w-8xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">

        <!-- Left Sidebar Filters (3 Cols on Desktop) -->
        <aside class="lg:col-span-2 space-y-6">
            <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm space-y-6">
                <div class="flex items-center justify-between border-b border-slate-100 pb-2">
                    <h2 class="font-bold text-slate-900 text-base">{{ __('app.career.other_filter') }}</h2>
                    <a href="{{ url()->current() }}" class="text-xs font-semibold text-[#8fc74a] hover:underline">{{ __('app.career.reset_all') }}</a>
                </div>

                <!-- Job Type Filter -->
                <div class="space-y-2 !mt-2">
                    <!-- Job Type Accordion Panel -->
                    <details class="group border border-slate-200 rounded-xl bg-white overflow-hidden shadow-xs transition-all duration-200" open>
                        <summary class="flex items-center justify-between py-1 px-4 cursor-pointer select-none list-none bg-slate-50/50 hover:bg-slate-50 transition-colors">
                            <h3 class="text-xs font-bold text-slate-600 uppercase tracking-wider">
                                {{ __('app.career.job_type') }}
                            </h3>
                            <!-- Rotating Chevron Icon -->
                            <svg class="w-4 h-4 text-slate-400 transition-transform duration-200 group-open:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </summary>

                        <div class="p-4 pt-2 space-y-2.5 border-t border-slate-100">
                            @if(isset($jobType))
                            @foreach($jobType as $empType)
                            <label class="flex items-center space-x-2 text-sm text-slate-700 cursor-pointer hover:text-slate-900">
                                <input
                                    name="emptype[]"
                                    value="{{ $empType['id'] }}"
                                    type="checkbox"
                                    id="emptype_{{ $empType['id'] }}"
                                    class="rounded text-[#8fc74a] focus:ring-[#8fc74a]/20 border-slate-300"
                                    {{ in_array($empType['id'], $selectedEmpTypes ?? []) ? 'checked' : '' }}>
                                <span class="text-xs font-medium">{{ $empType['name'] }}</span>
                                <span class="ml-auto text-[11px] text-slate-400 font-semibold"></span>
                            </label>
                            @endforeach
                            @endif
                        </div>
                    </details>

                    <!-- Shift Accordion Panel -->
                    <details class="group border border-slate-200 rounded-xl bg-white overflow-hidden shadow-xs transition-all duration-200" open>
                        <summary class="flex items-center justify-between px-4 py-1 cursor-pointer select-none list-none bg-slate-50/50 hover:bg-slate-50 transition-colors">
                            <h3 class="text-xs font-bold text-slate-600 uppercase tracking-wider">
                                {{ __('app.career.shift_type') }}
                            </h3>
                            <!-- Rotating Chevron Icon -->
                            <svg class="w-4 h-4 text-slate-400 transition-transform duration-200 group-open:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </summary>

                        <div class="p-4 pt-2 space-y-2.5 border-t border-slate-100">
                            @if(isset($shiftType))
                            @foreach($shiftType as $shift)
                            <label class="flex items-center space-x-2 text-sm text-slate-700 cursor-pointer hover:text-slate-900">
                                <input name="b[]"
                                    value="{{$shift['id']}}"
                                    type="checkbox"
                                    id="shift_{{$shift['id']}}"
                                    class="rounded text-[#8fc74a] focus:ring-[#8fc74a]/20 border-slate-300"
                                    {{ in_array($shift['id'], $selectedShifts ?? []) ? 'checked' : '' }}>
                                <span class="text-xs font-medium">{{ $shift['name'] }}</span>
                            </label>
                            @endforeach
                            @endif
                        </div>
                    </details>
                </div>

            </div>
        </aside>

        <!-- Main Content Area (9 Cols on Desktop) -->
        <section class="lg:col-span-10 space-y-4 min-w-0 bg-white p-2 h-[65vh] overflow-y-auto border border-slate-200/80 rounded-2xl shadow-sm">
            <!-- Results Header -->
            <div class="sticky top-0 z-10 bg-white flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-4 sm:px-6 rounded-2xl border border-slate-200 shadow-sm">
                <div>
                    <h2 class="text-base font-bold text-slate-900">{{__('app.career.result') }}</h2>
                    <p class="text-xs text-slate-500 mt-0.5">Showing {{ count([]) }} of Total </p>
                </div>
                <div class="flex items-center space-x-2 self-start sm:self-auto">
                    <span class="text-xs text-slate-400 font-medium whitespace-nowrap">Sort by:</span>
                    <select class="bg-slate-50 border border-slate-200 text-xs font-semibold text-slate-700 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#8fc74a]/20 focus:border-[#8fc74a] outline-none transition cursor-pointer">
                        <option>Most Relevant</option>
                        <option>Newest First</option>
                        <option>Highest Salary</option>
                    </select>
                </div>
            </div>

            <!-- Job List & Detail Split View Window -->
            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-start relative">

                <!-- Job Cards List (Dynamic Grid) -->
                <div class="{{ $selectedJob ? 'md:col-span-5' : 'md:col-span-12' }} h-[max-content] overflow-y-auto pr-1 space-y-3">
                    <div class="{{ $selectedJob ? 'flex flex-col space-y-3' : 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-3 space-y-0' }}">
                        @if(count([])>0)
                        @foreach([] as $re)
                        @php
                        $isSelected = ($selectedJob && $selectedJob->uuid == $re->uuid) ? true : false;
                        @endphp
                        <!-- Card Item -->
                        <div class="{{ $isSelected ? 'border-2 border-[#8fc74a] bg-emerald-50/10' : 'border border-slate-200/80' }} flex flex-col rounded-xl overflow-hidden shadow-sm  bg-white hover:shadow transition group">
                            <!-- 1. Top Image Banner -->
                            <div class="w-full h-32 sm:h-64 overflow-hidden bg-slate-100 relative">
                                <a href="">
                                    <img
                                        src="{{ asset('storage/'.$re->poster_path) ?? asset('images/default-job-banner.jpg') }}"
                                        alt="{{ $re->position?->name ?? 'Job Image' }}"
                                        class="w-full h-full  object-contain group-hover:scale-105 transition duration-300" />
                                </a>
                            </div>
                            <a
                                href=""
                                class="p-4 relative flex flex-col justify-between flex-1 cursor-pointer border-t border-gray-200 ">

                                <div>
                                    <div class="flex items-start justify-between gap-3">
                                        <div class="flex items-start space-x-3 min-w-0">
                                            <div class="w-10 h-10 rounded-xl bg-green-600 text-white font-bold flex items-center justify-center text-xs shrink-0 shadow-sm">
                                                {{$re->position?->name ? strtoupper(substr($re->position->name, 0, 2)) : 'N/A'}}
                                            </div>
                                            <div class="min-w-0">
                                                <h3 class="font-bold text-slate-900 text-sm leading-tight group-hover:text-[#8fc74a] transition truncate">
                                                    {{$re->position?->name ?? 'N/A'}}
                                                </h3>
                                                <p class="text-xs text-slate-500 mt-1 truncate">
                                                    <span class=" w-1.5 h-1.5 rounded-full bg-slate-300 mr-1"></span>
                                                </p>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="mt-4 flex items-center gap-1.5 flex-wrap">
                                        <span class="px-2 py-0.5 bg-slate-100 text-slate-600 text-[11px] font-semibold rounded-md border border-slate-300">
                                            {{($re->employeeTypes?->name ?? 'N/A').":" . $re->shifts->shift_name}}
                                        </span>
                                        <span class="px-2 py-0.5 bg-emerald-50 text-emerald-700 text-[11px] border border-emerald-300 font-semibold rounded-md">${{$re->slr_min ?? '0'}} - ${{$re->slr_max ?? '0'}}</span>
                                        <span class="px-2 py-0.5 text-[11px] font-semibold rounded-md {{$re->status == 'Open' ? 'bg-emerald-100 text-emerald-700 border border-emerald-300' : ($re->status == 'Closed' ? 'bg-rose-100 text-rose-700 border border-rose-300' : 'bg-orange-100 text-orange-700 border border-orange-300')}}">
                                            {{$re->status}}
                                        </span>
                                    </div>
                                </div>

                                <p class="mt-3 text-[11px] font-medium text-slate-400">
                                    {{ $re->open_date ? \Carbon\Carbon::parse($re->created_at)->diffForHumans() : '' }}
                                </p>
                            </a>
                        </div>
                        @endforeach
                        @else
                        <div class="md:col-span-2 flex flex-col items-center justify-center text-center p-8 rounded-xl border border-2 border-slate-300 border-dashed bg-white bg-slate-50/50 w-full mx-auto">
                            <!-- Soft Glowing Icon Pin -->
                            <div class="p-3 bg-rose-50 dark:bg-rose-950/40 rounded-full text-rose-500 mb-3">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0zm-9 3.75h.008v.008H12v-.008z" />
                                </svg>
                            </div>
                            <h3 class="text-base font-medium text-slate-900 ">{{__('app.career.not_found') }}</h3>
                            <p class="mt-1 text-xs text-slate-500  max-w-xs">
                                {{__('app.career.not_found_desc') }}
                            </p>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Selected Job Details View Panel (Shown only when job_id is selected) -->
                @if($selectedJob)
                <div class="md:col-span-7 bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm h-[max-content] min-h-[500px] overflow-y-auto relative">

                    <!-- Close Panel Button (Removes job_id from URL) -->
                    <a
                        href=""
                        class="absolute top-4 right-4 p-1.5 text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-lg transition"
                        title="Close detail view">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </a>

                    <!-- Detail Content -->
                    <div class="space-y-6 pt-2">
                        <!-- Detail Header -->
                        <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-4 border-b border-slate-100 pb-5">
                            <div class="space-y-1.5 pr-6">
                                <h2 class="text-xl font-bold text-slate-900 tracking-tight">{{ $selectedJob->position ? $selectedJob->position->name : 'Untitled Position' }}</h2>
                                <p class="text-xs  text-slate-500 flex items-center gap-1">
                                    <span>{{__('app.recruit.location')}} : </span>
                                    <span>{{ $selectedJob->branches ? $selectedJob->branches->name : 'N/A' }}</span>
                                </p>
                                <div class="flex items-center gap-2 pt-2">
                                    <span class="px-2.5 py-1 bg-slate-100 text-slate-700 border border-slate-300 font-medium text-xs rounded-lg">{{ $selectedJob->employeeTypes ? $selectedJob->employeeTypes->name : 'Full-time' }}</span>
                                    <span class="px-2.5 py-1 bg-emerald-50 text-emerald-700 font-semibold border border-emerald-300 text-xs rounded-lg">${{ $selectedJob->slr_min ?? '0' }} - ${{ $selectedJob->slr_max ?? '0' }}</span>
                                    <span class="px-2.5 py-1 bg-emerald-50 text-emerald-700 text-xs font-semibold rounded-md {{$selectedJob->status == 'Open' ? 'bg-emerald-100 text-emerald-700 border border-emerald-300' : ($selectedJob->status == 'Closed' ? 'bg-rose-100 text-rose-700 border border-rose-300' : 'bg-orange-100 text-orange-700 border border-orange-300')}}">
                                        {{$selectedJob->status}}
                                    </span>
                                </div>
                                <span class="text-xs text-slate-500 ">
                                    {{ $selectedJob->open_date ? \Carbon\Carbon::parse($selectedJob->created_at)->diffForHumans() : '' }}
                                </span>
                            </div>

                        </div>
                        <!-- Role Description -->
                        <div class="space-y-4 text-xs text-slate-600 leading-relaxed">
                            <div>
                                <h5 class="font-bold text-slate-800  mb-2.5 uppercase">{{__('app.recruit.red')}}</h5>
                                {!! nl2br(e($selectedJob->edu ?? 'No description provided.')) !!}
                            </div>
                        </div>
                        <!-- Requirements Pills -->
                        <div>
                            <h5 class="font-bold text-slate-800  mb-2.5 uppercase">{{__('app.recruit.rqs')}}</h5>
                            <div class="flex flex-wrap gap-1.5">
                                @php
                                $skills = $selectedJob->skills ?? ['Laravel', 'Tailwind CSS', 'React / Vue', 'MySQL'];
                                @endphp
                                @foreach($skills as $skill)
                                <span class="px-2.5 py-1 bg-slate-100 text-slate-700 font-medium text-xs rounded-lg">{{ $skill }}</span>
                                @endforeach
                            </div>
                        </div>

                        <div class="space-y-4 text-xs text-slate-600 leading-relaxed">
                            <div>
                                <h5 class="font-bold text-slate-800  mb-2.5 uppercase">{{__('app.recruit.rqe')}}</h5>
                                {!! nl2br(e($selectedJob->exp ?? 'No description provided.')) !!}
                            </div>
                        </div>
                        <button
                            onclick=""
                            type="button"
                            class="w-full sm:w-auto px-5 py-2.5 bg-[#8fc74a] hover:bg-[#F79633] text-white font-bold text-xs rounded-xl shadow-sm hover:shadow transition active:scale-[0.98] shrink-0">
                            Apply Now
                        </button>
                    </div>

                </div>
                @endif
            </div>
        </section>
    </div>
</main>
</form>
@endsection