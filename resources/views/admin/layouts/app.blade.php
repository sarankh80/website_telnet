<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') — TELNET Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- Apply saved theme before paint to avoid flash --}}
    <script>
        (function(){
            var t = localStorage.getItem('admin-theme') || 'dark';
            document.documentElement.classList.toggle('admin-light', t === 'light');
        })();
    </script>
</head>
<body class="h-full bg-slate-950 text-slate-100 font-sans antialiased" style="font-family:'Inter',sans-serif; background-image:none !important;">

<div class="flex h-screen overflow-hidden" x-data="{ sidebarOpen: false }">

    {{-- ── Sidebar ── --}}
    <aside id="admin-sidebar"
           class="w-64 flex-shrink-0 bg-slate-900 border-r border-slate-800 flex flex-col overflow-y-auto transition-transform duration-300 z-40
                  fixed inset-y-0 left-0 lg:static lg:translate-x-0"
           :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">
        {{-- Brand --}}
        <div class="flex items-center gap-3 px-5 py-5 border-b border-slate-800">
            <svg class="h-8 w-auto" viewBox="0 0 380 90" fill="none">
                <circle cx="45" cy="45" r="42" fill="#8DC63F"/>
                <path d="M 12 70 C 15 38 42 16 80 14 C 70 17 56 28 46 50 C 36 68 20 76 12 70 Z" fill="#F58220"/>
                <path d="M 22 78 C 25 48 52 26 88 22 C 77 26 63 38 53 60 C 43 78 28 82 22 78 Z" fill="#F58220"/>
                <text x="100" y="62" font-family="Inter" font-weight="900" font-size="52" fill="#8DC63F">TEL</text>
                <text x="215" y="62" font-family="Inter" font-weight="900" font-size="52" fill="#F58220">NET</text>
            </svg>
            <div>
                <p class="text-[11px] text-slate-400 leading-none mt-0.5">Admin Panel</p>
            </div>
        </div>

        {{-- Nav --}}
        <nav class="flex-1 px-3 py-4 space-y-0.5 text-sm">
            @php
                $navItems = [
                    ['route' => 'admin.dashboard',              'icon' => 'fa-gauge',              'label' => 'Dashboard'],
                    ['route' => 'admin.slugs.index',            'icon' => 'fa-layer-group',        'label' => 'Slug Categories'],
                    ['route' => 'admin.service-types.index',    'icon' => 'fa-tags',               'label' => 'Service Types'],
                    ['route' => 'admin.services.index',                'icon' => 'fa-bolt',               'label' => 'Services'],
                    ['route' => 'admin.corporate-subscribers.index',   'icon' => 'fa-building-user',      'label' => 'Corporate Subscribers'],
                    ['route' => 'admin.careers.index',                 'icon' => 'fa-briefcase',          'label' => 'Careers'],
                    ['route' => 'admin.career-applications.index',     'icon' => 'fa-file-lines',         'label' => 'CV Applications',       'badge' => \App\Models\CareerApplication::where('status','new')->count()],
                    ['route' => 'admin.branches.index',                'icon' => 'fa-map-pin',            'label' => 'Branches'],
                    ['route' => 'admin.teams.index',            'icon' => 'fa-users',              'label' => 'Team'],
                    ['route' => 'admin.service-requests.index', 'icon' => 'fa-inbox',              'label' => 'Service Requests',  'badge' => \App\Models\ServiceRequest::where("status","new")->count()],
                    ['route' => 'admin.contact-messages.index', 'icon' => 'fa-envelope',           'label' => 'Messages',          'badge' => \App\Models\ContactMessage::where("is_read",false)->count()],
                    ['route' => 'admin.settings.index',         'icon' => 'fa-gear',               'label' => 'Settings'],
                    ['route' => 'admin.users.index',            'icon' => 'fa-user-shield',        'label' => 'Users'],
                    ['route' => 'admin.roles.index',            'icon' => 'fa-key',                'label' => 'Roles'],
                    ['route' => 'admin.permissions.index',      'icon' => 'fa-shield-halved',      'label' => 'Permissions'],
                    ['route' => 'admin.activity-logs.index',    'icon' => 'fa-clock-rotate-left',  'label' => 'Activity Logs'],
                ];
            @endphp

            @foreach($navItems as $item)
                @php $active = request()->routeIs(rtrim($item['route'], '.index') . '*'); @endphp
                <a href="{{ route($item['route']) }}" @click="sidebarOpen = false"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-all {{ $active ? 'bg-brand-green/15 text-brand-green font-semibold' : 'text-slate-400 hover:text-slate-100 hover:bg-slate-800' }}">
                    <i class="fa-solid {{ $item['icon'] }} w-4 text-center {{ $active ? 'text-brand-green' : '' }}"></i>
                    <span class="flex-1">{{ $item['label'] }}</span>
                    @if(!empty($item['badge']) && $item['badge'] > 0)
                        <span class="px-1.5 py-0.5 text-[10px] font-bold bg-brand-orange text-white rounded-full">{{ $item['badge'] }}</span>
                    @endif
                </a>
            @endforeach
        </nav>

        {{-- Footer --}}
        <div class="px-4 py-4 border-t border-slate-800 text-xs text-slate-500">
            <p class="font-medium text-slate-300">{{ auth()->user()->name }}</p>
            <p>{{ auth()->user()->email }}</p>
            <form method="POST" action="{{ route('admin.logout') }}" class="mt-2">
                @csrf
                <button type="submit" class="flex items-center gap-1.5 text-red-400 hover:text-red-300 transition text-xs">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    {{-- ── Main ── --}}
    <div class="flex-1 flex flex-col overflow-hidden">

        {{-- Top bar --}}
        <header class="flex items-center gap-4 px-4 lg:px-6 py-4 bg-slate-900/80 border-b border-slate-800 backdrop-blur flex-shrink-0">
            {{-- Mobile hamburger --}}
            <button class="lg:hidden text-slate-400 hover:text-slate-100 transition p-1 -ml-1" @click.stop="sidebarOpen = !sidebarOpen">
                <i class="fa-solid fa-bars text-lg"></i>
            </button>
            <h1 class="text-base font-bold text-slate-100 flex-1">@yield('title', 'Dashboard')</h1>
            {{-- Theme toggle --}}
            <button id="admin-theme-toggle" type="button" title="Toggle light / dark"
                    class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-medium
                           text-slate-400 hover:text-slate-100 bg-slate-800 hover:bg-slate-700
                           border border-slate-700 transition flex-shrink-0">
                <i id="theme-icon" class="fa-solid fa-moon text-sm"></i>
                <span id="theme-label" class="hidden sm:inline">Dark</span>
            </button>

            <a href="{{ route('home') }}" target="_blank"
               class="text-xs text-slate-400 hover:text-brand-green transition flex items-center gap-1.5 flex-shrink-0">
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                <span class="hidden sm:inline">View Site</span>
            </a>
        </header>
        {{-- Mobile overlay --}}
        <div class="lg:hidden fixed inset-0 bg-black/60 z-30" x-show="sidebarOpen" @click="sidebarOpen = false" style="display:none"></div>

        {{-- Content --}}
        <main class="flex-1 overflow-y-auto p-3 sm:p-5 lg:p-6">

            {{-- Flash --}}
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

            @yield('content')
        </main>
    </div>
</div>

@stack('scripts')
<script>
(function () {
    var btn   = document.getElementById('admin-theme-toggle');
    var icon  = document.getElementById('theme-icon');
    var label = document.getElementById('theme-label');
    var html  = document.documentElement;

    function applyTheme(t) {
        var isLight = (t === 'light');
        html.classList.toggle('admin-light', isLight);
        if (icon)  { icon.className  = 'fa-solid ' + (isLight ? 'fa-sun' : 'fa-moon') + ' text-sm'; }
        if (label) { label.textContent = isLight ? 'Light' : 'Dark'; }
        if (btn) {
            btn.style.color = isLight ? '#f58220' : '';
        }
        localStorage.setItem('admin-theme', t);
    }

    // Sync button state on load
    applyTheme(localStorage.getItem('admin-theme') || 'dark');

    if (btn) {
        btn.addEventListener('click', function () {
            var current = html.classList.contains('admin-light') ? 'light' : 'dark';
            applyTheme(current === 'light' ? 'dark' : 'light');
        });
    }
})();
</script>
</body>
</html>
