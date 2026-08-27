<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') — TELNET Admin</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="{{asset('js/filament/jquery-3.6.3.min.js')}}"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script> -->
    <!-- <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> -->
    <link href="{{asset('css/filament/dataTables.min.css')}}" rel="stylesheet">
    <script src="{{asset('js/filament/datatable/jquery.dataTables.min.js')}}"></script>
    <link href="{{asset('css/filament/font/kontumruy.css')}}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{asset('storage/favicon.ico')}}">
    <script defer src="{{asset('js/filament/select2.min.js')}}"></script>
    <link href="{{asset('css/filament/select2.min.css')}}" rel="stylesheet">
    <script src="{{asset('js/filament/additional/datatable/datatable.load.js')}}"></script>
    {{-- Apply saved theme before paint to avoid flash --}}
    <script>
        (function() {
            var t = localStorage.getItem('admin-theme') || 'light';
            document.documentElement.classList.toggle('admin-light', t === 'light');
        })();
        $(function() {
            $('.select2').select2();
        });
    </script>
    @if(App::getLocale() == 'km')
    <style>
        [x-cloak] {
            display: none !important;
        }

        p,
        span,
        button,
        label,
        legend,
        th,
        table,
        thead,
        div,
        input {
            font-family: Kantumruy Pro !important;
            font-weight: normal !important;
            font-size: 16px !important;
        }

        legend {
            font-size: 16px !important;
            font-weight: bold !important;
            color: #333 !important;
        }
    </style>
    @else
    <style>

        p,
        span,
        button,
        label,
        legend,
        th,
        table,

        thead,
        div,
        input {
            font-family: Verdana, Geneva, Tahoma, sans-serif !important;
            font-weight: normal !important;
        }
    </style>

    @endif
</head>

<body class="h-full bg-slate-950 text-slate-100 font-sans antialiased">

    <div class="flex h-screen overflow-hidden" x-data="{ sidebarOpen: false }">

        <aside id="admin-sidebar"
            class="w-64 flex-shrink-0 bg-slate-900 border-r border-slate-800 flex flex-col overflow-y-auto transition-transform duration-300 z-40
              fixed inset-y-0 left-0 lg:static lg:translate-x-0"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">

            {{-- Brand --}}
            <div class="flex items-center gap-3 px-5 py-5 border-b border-slate-800">
                <img src="{{asset('storage/logo.png')}}" alt="Logo">
            </div>

            {{-- Nav --}}
            <nav class="flex-1 px-3 py-4 space-y-6 text-sm">
                @php
                $navGroups = [
                [
                'title' => null, // Main Dashboard
                'items' => [
                ['route' => 'admin.dashboard', 'icon' => 'fa-gauge', 'label' => __('admin.nav.dashboard')],
                ]
                ],
                [
                'title' => __('admin.nav.catalogs.service') ?? 'Content Management',
                'items' => [
                ['route' => 'admin.slugs.index', 'icon' => 'fa-layer-group', 'label' => __('admin.nav.service_slug')],
                ['route' => 'admin.service-types.index', 'icon' => 'fa-tags', 'label' => __('admin.nav.service_types')],
                ['route' => 'admin.services.index', 'icon' => 'fa-bolt', 'label' => __('admin.nav.services')],
                ['route' => 'admin.tariffs.index', 'icon' => 'fa-wifi', 'label' => __('app.internet.tariff.title')],
                ['route' => 'admin.branches.index', 'icon' => 'fa-map-pin', 'label' => __('admin.nav.branches')],
                ['route' => 'admin.teams.index', 'icon' => 'fa-users', 'label' => __('admin.nav.team')],
                ]
                ],
                [
                'title' => __('admin.nav.catalogs.biz') ?? 'Inquiries & Leads',
                'items' => [
                ['route' => 'admin.corporate-subscribers.index', 'icon' => 'fa-building-user', 'label' => __('admin.nav.corporate_subscribers')],
                ['route' => 'admin.service-requests.index', 'icon' => 'fa-inbox', 'label' => __('admin.nav.service_requests'), 'badge' => \App\Models\ServiceRequest::where('status', 'new')->count()],
                ['route' => 'admin.contact-messages.index', 'icon' => 'fa-envelope', 'label' => __('admin.nav.messages'), 'badge' => \App\Models\ContactMessage::where('is_read', false)->count()],
                ]
                ],

                [
                'title' => __('admin.nav.catalogs.support') ?? 'Careers & HR',
                'items' => [
                ['route' => 'admin.careers.index', 'icon' => 'fa-briefcase', 'label' => __('admin.nav.contact')],
                ]
                ],
                [
                'title' => __('admin.nav.catalogs.career') ?? 'Careers & HR',
                'items' => [
                ['route' => 'admin.careers.index', 'icon' => 'fa-briefcase', 'label' => __('admin.nav.careers')],
                ['route' => 'admin.career-applications.index', 'icon' => 'fa-file-lines', 'label' => __('admin.nav.cv_applications'), 'badge' => \App\Models\CareerApplication::where('status', 'new')->count()],
                ]
                ],

                [
                'title' => __('admin.nav.catalogs.system') ?? 'System & Access',
                'items' => [
                ['route' => 'admin.settings.index', 'icon' => 'fa-gear', 'label' => __('admin.nav.settings')],
                ['route' => 'admin.users.index', 'icon' => 'fa-user-shield', 'label' => __('admin.nav.users')],
                ['route' => 'admin.roles.index', 'icon' => 'fa-key', 'label' => __('admin.nav.roles')],
                ['route' => 'admin.permissions.index', 'icon' => 'fa-shield-halved', 'label' => __('admin.nav.permissions')],
                ['route' => 'admin.activity-logs.index', 'icon' => 'fa-clock-rotate-left', 'label' => __('admin.nav.activity_logs')],
                ]
                ],
                ];
                @endphp

                @foreach($navGroups as $group)
                <div class="space-y-1">
                    {{-- Group Title --}}
                    @if(!empty($group['title']))
                    <div class="px-3 text-[11px] font-semibold text-slate-500 uppercase tracking-wider mb-2">
                        {{ $group['title'] }}
                    </div>
                    @endif

                    {{-- Group Items --}}
                    @foreach($group['items'] as $item)
                    @php $active = request()->routeIs(rtrim($item['route'], '.index') . '*'); @endphp
                    <a href="{{ route($item['route']) }}" @click="sidebarOpen = false"
                        class="flex items-center gap-3 px-3 py-2 rounded-lg transition-all {{ $active ? 'bg-brand-green/15 text-brand-green font-semibold' : 'text-slate-400 hover:text-slate-100 hover:bg-slate-800' }}">
                        <i class="fa-solid {{ $item['icon'] }} w-4 text-center {{ $active ? 'text-brand-green' : '' }}"></i>
                        <span class="flex-1">{{ $item['label'] }}</span>
                        @if(!empty($item['badge']) && $item['badge'] > 0)
                        <span class="px-1.5 py-0.5 text-[10px] font-bold bg-brand-orange text-white rounded-full">{{ $item['badge'] }}</span>
                        @endif
                    </a>
                    @endforeach
                </div>
                @endforeach
            </nav>

            {{-- Footer --}}
            <div class="px-4 py-4 border-t border-slate-800 text-xs text-slate-500">
                <p class="font-medium text-slate-300">{{ auth()->user()->name }}</p>
                <p>{{ auth()->user()->email }}</p>
                <form method="POST" action="{{ route('admin.logout') }}" class="mt-2">
                    @csrf
                    <button type="submit" class="flex items-center gap-1.5 text-red-400 hover:text-red-300 transition text-xs">
                        <i class="fa-solid fa-right-from-bracket"></i> {{ __('admin.logout') }}
                    </button>
                </form>
            </div>
        </aside>

        {{-- ── Main ── --}}
        <main id="main-content" class="flex-1 flex flex-col overflow-hidden bg-slate-950 transition-all duration-300 w-full">

            {{-- Top bar / page header (old-layout style: title + subtitle + canAdd button) --}}
            <header class="h-16 flex items-center justify-between gap-4 px-4 lg:px-8 bg-slate-900/80 border-b border-slate-800 backdrop-blur sticky top-0 z-10 flex-shrink-0">
                <div class="flex items-center gap-3 min-w-0">
                    {{-- Mobile hamburger --}}
                    <button class="lg:hidden text-slate-400 hover:text-slate-100 transition p-1 -ml-1" @click.stop="sidebarOpen = !sidebarOpen">
                        <i class="fa-solid fa-bars text-lg"></i>
                    </button>
                    @if(isset($title))
                    <h1 class="text-xl sm:text-2xl font-semibold truncate">
                        {{$title}}
                    </h1>
                    @endif
                </div>

                <div class="flex items-center gap-3 flex-shrink-0">
                    {{-- Language switcher --}}
                    <div class="hidden sm:flex rounded-lg overflow-hidden border border-slate-700 text-xs">
                        <a href="{{ route('locale.switch', 'en') }}"
                            class="px-3 py-1.5 font-semibold transition
                              {{ app()->getLocale() === 'en' ? 'bg-brand-green text-white' : 'text-slate-400 hover:text-slate-100 hover:bg-slate-700' }}">
                            EN
                        </a>
                        <a href="{{ route('locale.switch', 'km') }}"
                            class="px-3 py-1.5 font-semibold transition border-l border-slate-700
                              {{ app()->getLocale() === 'km' ? 'bg-brand-green text-white' : 'text-slate-400 hover:text-slate-100 hover:bg-slate-700' }}">
                            ខ្មែរ
                        </a>
                    </div>

                    {{-- Theme toggle --}}
                    <button id="admin-theme-toggle" type="button" title="Toggle light / dark"
                        class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-medium
                               text-slate-400 hover:text-slate-100 bg-slate-800 hover:bg-slate-700
                               border border-slate-700 transition">
                        <i id="theme-icon" class="fa-solid fa-moon text-sm"></i>
                        <span id="theme-label" class="hidden sm:inline">Dark</span>
                    </button>

                    {{-- Notification bell --}}
                    <button class="p-2 text-slate-400 hover:text-brand-green transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                    </button>

                    <a href="{{ route('home') }}" target="_blank"
                        class="hidden sm:flex text-xs text-slate-400 hover:text-brand-green transition items-center gap-1.5">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        <span>{{ __('admin.view_site') }}</span>
                    </a>

                    @if(isset($canAdd) && $canAdd)
                    <div class="h-8 w-px bg-slate-700"></div>
                    <button onclick="window.location.href=`{{ $canAdd['url'] ?? $routeForAdd ?? '#' }}`"
                        class="px-4 py-2 bg-brand-green hover:bg-brand-green/90 text-white text-sm font-medium rounded-lg transition-all shadow-md"><i class="fa-solid fa-plus"></i> {{ $canAdd['title'] }}
                    </button>
                    @endif
                </div>
            </header>

            {{-- Mobile overlay --}}
            <div class="lg:hidden fixed inset-0 bg-black/60 z-30" x-show="sidebarOpen" @click="sidebarOpen = false" style="display:none"></div>

            {{-- Scrollable content area --}}
            <div class="flex-1 overflow-y-auto">
                <div class="p-3 sm:px-4 sm:py-4 w-full mx-auto">

                    {{-- Flash Notifications --}}
                    @if(session('success'))
                    <div class="mb-5 flex items-center gap-2 px-4 py-3 bg-green-500/15 border border-green-500/30 text-green-400 rounded-xl text-sm">
                        <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="mb-5 flex items-center gap-2 px-4 py-3 bg-red-500/15 border border-red-500/30 text-red-400 rounded-xl text-sm">
                        <i class="fa-solid fa-circle-xmark"></i> {{ session('error') }}
                    </div>
                    @endif

                    @includeIf('admin.layouts.brucher')
                    @if(isset($search) && $search)
                    @include('admin.layouts.search')
                    @endif
                    {{-- Page content --}}
                    <div class="pb-10 p-4">
                        @yield('content')
                    </div>

                </div>
            </div>
        </main>
    </div>

    @stack('scripts')
    <script>
        window.adminTranslate = async function(el, tab) {
            var toLang = tab === 'en' ? 'km' : 'en';
            var fromEl = el.querySelector('[data-lang="' + tab + '"] .quill-editor');
            var toEl = el.querySelector('[data-lang="' + toLang + '"] .quill-editor');
            if (!fromEl || !toEl) return null;

            var fromQ = window._quillMap[fromEl.id];
            var toQ = window._quillMap[toEl.id];
            if (!fromQ || !toQ) return null;

            var html = fromQ.root.innerHTML;
            if (!html || html === '<p><br></p>' || html === '<p></p>') return null;

            var csrf = document.querySelector('meta[name="csrf-token"]')?.content ?? '';
            var resp = await fetch('{{ route("admin.translate") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrf
                },
                body: JSON.stringify({
                    html: html,
                    from: tab,
                    to: toLang
                })
            }).catch(function() {
                return null;
            });

            if (!resp || !resp.ok) return null;

            var data = await resp.json().catch(function() {
                return null;
            });
            if (data && data.translation) {
                toQ.clipboard.dangerouslyPasteHTML(data.translation);
                return toLang;
            }
            return null;
        };
    </script>
    <script>
        (function() {

            var btn = document.getElementById('admin-theme-toggle');
            var icon = document.getElementById('theme-icon');
            var label = document.getElementById('theme-label');
            var html = document.documentElement;

            function applyTheme(t) {
                var isLight = (t === 'light');
                html.classList.toggle('admin-light', isLight);
                if (icon) {
                    icon.className = 'fa-solid ' + (isLight ? 'fa-sun' : 'fa-moon') + ' text-sm';
                }
                if (label) {
                    label.textContent = isLight ? 'Light' : 'Dark';
                }
                if (btn) {
                    btn.style.color = isLight ? '#f58220' : '';
                }
                localStorage.setItem('admin-theme', t);
            }

            // Sync button state on load
            applyTheme(localStorage.getItem('admin-theme') || 'light');

            if (btn) {
                btn.addEventListener('click', function() {
                    var current = html.classList.contains('admin-light') ? 'light' : 'dark';
                    applyTheme(current === 'light' ? 'dark' : 'light');
                });
            }
        })();
    </script>
</body>

</html>