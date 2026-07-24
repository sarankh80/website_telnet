<header class="sticky top-0 z-50 glass-header transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex justify-between items-center h-20">

            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center space-x-3 flex-shrink-0 group">
                <img src="http://103.115.172.243:8009/images/logo_home.png"
                     alt="TELNET CO., LTD Logo"
                     class="h-10 w-auto transition-transform duration-300 group-hover:scale-105"
                     onerror="this.style.display='none'; this.nextElementSibling.style.display='block'">
                <svg style="display:none" class="h-10 w-auto transition-transform duration-300 group-hover:scale-105" viewBox="0 0 380 90" fill="none">
                    <circle cx="45" cy="45" r="42" fill="#8DC63F"/>
                    <path d="M 12 70 C 15 38 42 16 80 14 C 70 17 56 28 46 50 C 36 68 20 76 12 70 Z" fill="#F58220"/>
                    <path d="M 22 78 C 25 48 52 26 88 22 C 77 26 63 38 53 60 C 43 78 28 82 22 78 Z" fill="#F58220"/>
                    <text x="100" y="62" font-family="'Inter', sans-serif" font-weight="900" font-size="52" fill="#8DC63F">TEL</text>
                    <text x="215" y="62" font-family="'Inter', sans-serif" font-weight="900" font-size="52" fill="#F58220">NET</text>
                </svg>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center space-x-1 xl:space-x-1 text-xs xl:text-sm font-semibold text-adaptive-muted whitespace-nowrap">
                @php
                    $navLinks = [
                        ['route' => 'about',    'km' => 'ក្រុមហ៊ុន​យើង​ខ្ញុំ',        'en' => 'About Us',                    'icon' => 'fa-building',    'color' => 'text-brand-green'],
                        ['route' => 'services', 'km' => 'សេវាកម្មស្នូល',              'en' => 'Core Products & Services', 'icon' => 'fa-bolt',        'color' => 'text-brand-orange'],
                        ['route' => 'coverage', 'km' => 'អ៊ីនធឺណិតតភ្ជាប់',          'en' => 'Network Connectivity',        'icon' => 'fa-globe',       'color' => 'text-brand-green'],
                        ['route' => 'kpi',      'km' => 'ស្តង់ដារប្រតិបត្តិការ',      'en' => 'Standard Operation',          'icon' => 'fa-chart-line',  'color' => 'text-brand-green'],
                        ['route' => 'team',     'km' => 'ក្រុមការងារ',                'en' => 'Contact Us',                  'icon' => 'fa-users',       'color' => 'text-brand-green'],
                        ['route' => 'portal',   'km' => 'ចូលប្រើប្រាស់',                     'en' => 'Portal',                      'icon' => 'fa-headset',     'color' => 'text-brand-orange'],
                    ];
                @endphp
                @foreach($navLinks as $link)
                    @php $active = request()->routeIs($link['route']); @endphp
                    <a href="{{ route($link['route']) }}"
                       class="nav-link-pill px-2 py-2 rounded-lg hover:text-brand-green hover:bg-brand-green/5 transition flex items-center gap-1.5 {{ $active ? 'text-brand-green active' : '' }}"
                       data-km="{{ $link['km'] }}" data-en="{{ $link['en'] }}">
                        <i class="fa-solid {{ $link['icon'] }} {{ $link['color'] }} text-xs opacity-70"></i>
                        <span data-km="{{ $link['km'] }}" data-en="{{ $link['en'] }}">{{ $link['km'] }}</span>
                    </a>
                @endforeach
            </nav>

            <!-- Desktop Actions: Language + Theme (combined button only, no CTA) -->
            <div class="hidden sm:flex items-center space-x-2.5 flex-shrink-0 whitespace-nowrap">
                <button id="lang-toggle" onclick="toggleLanguage()"
                        class="lang-switch-btn px-2 py-2 rounded-xl text-xs font-bold text-adaptive-main flex items-center gap-2 group cursor-pointer shadow-lg"
                        title="Switch Language / ប្តូរភាសា">
                    <span id="lang-flag" class="text-sm">🇰🇭</span>
                    <div class="flex items-center gap-1">
                        <span id="lang-km-badge" class="px-1.5 py-0.5 rounded text-[10px] bg-brand-green text-white font-extrabold shadow-sm transition">ខ្មែរ</span>
                        <span class="text-adaptive-muted text-[10px]">/</span>
                        <span id="lang-en-badge" class="px-1.5 py-0.5 rounded text-[10px] text-adaptive-muted font-bold transition">EN</span>
                    </div>
                    <span onclick="event.stopPropagation(); toggleTheme()"
                          class="dark:bg-slate-800/80 text-amber-500 dark:text-amber-300 hover:bg-amber-500/10 dark:hover:bg-slate-700 transition-all duration-300 flex items-center justify-center"
                          title="ប្តូរ Dark / Light Mode">
                        <i id="theme-toggle-dark-icon" class="fa-solid fa-moon text-base hidden"></i>
                        <i id="theme-toggle-light-icon" class="fa-solid fa-sun text-base"></i>
                    </span>
                </button>
            </div>

            <!-- Mobile Header Tools -->
            <div class="lg:hidden flex items-center space-x-2">
                <button onclick="toggleLanguage()"
                        class="lang-switch-btn px-2.5 py-1.5 rounded-lg text-adaptive-main text-xs font-bold flex items-center gap-1.5">
                    <span id="mobile-lang-flag">🇰🇭</span>
                    <span id="mobile-lang-label" class="text-[11px] font-extrabold text-brand-green">KM</span>
                </button>
                <button onclick="toggleTheme()" class="p-2 rounded-lg text-amber-400 dark:text-amber-300 bg-slate-800/50">
                    <i id="mobile-theme-icon" class="fa-solid fa-sun text-lg"></i>
                </button>
                <button id="mobile-menu-btn" class="text-adaptive-main p-2 rounded-lg hover:bg-slate-800/40 transition">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Dropdown -->
    <div id="mobile-menu" class="hidden lg:hidden section-bg-secondary border-b border-gray-700/80 px-4 pt-4 pb-6 space-y-2 text-sm transition-all duration-300 shadow-xl">
        @php
            $mobileLinks = [
                ['href' => route('about'),    'km' => 'ក្រុមហ៊ុន​យើង​ខ្ញុំ',    'en' => 'About Us',                    'icon' => 'fa-building',   'color' => 'text-brand-green'],
                ['href' => route('services'), 'km' => 'សេវាកម្ម',        'en' => 'Core Products & Services',   'icon' => 'fa-bolt',       'color' => 'text-brand-orange'],
                ['href' => route('coverage'), 'km' => 'ការគ្របដណ្តប់',    'en' => 'Coverage',                   'icon' => 'fa-globe',      'color' => 'text-brand-green'],
                ['href' => route('kpi'),      'km' => 'ស្តង់ដារប្រតិបត្តិការ',  'en' => 'Standard Operation',         'icon' => 'fa-chart-line', 'color' => 'text-brand-green'],
                ['href' => route('team'),     'km' => 'ក្រុមការងារ',      'en' => 'Contact Us',                 'icon' => 'fa-users',      'color' => 'text-brand-green'],
                ['href' => route('portal'),   'km' => 'ចូលប្រើប្រាស់',    'en' => 'Portal',                     'icon' => 'fa-headset',    'color' => 'text-brand-orange'],
            ];
        @endphp
        @foreach($mobileLinks as $link)
        <a href="{{ $link['href'] }}" onclick="closeMobileMenu()"
           class="flex items-center gap-2.5 text-adaptive-muted hover:text-brand-green hover:bg-brand-green/10 p-2.5 rounded-xl transition font-medium"
           data-km="{{ $link['km'] }}" data-en="{{ $link['en'] }}">
            <i class="fa-solid {{ $link['icon'] }} {{ $link['color'] }} w-5"></i>
            <span data-km="{{ $link['km'] }}" data-en="{{ $link['en'] }}">{{ $link['km'] }}</span>
        </a>
        @endforeach

        <div class="pt-3 border-t border-gray-700/80 flex flex-col gap-2.5">
            <a href="tel:0975135135"
               class="text-center text-xs text-brand-orange py-3 rounded-xl font-bold border border-brand-orange/30 flex items-center justify-center gap-2">
                <i class="fa-solid fa-headset"></i> NOC Support: 097 513 5135 (24/7)
            </a>
            <button onclick="closeMobileMenu(); openModal('serviceModal');"
                    class="w-full text-xs gradient-brand text-white py-3 rounded-xl font-bold shadow-md"
                    data-km="ស្នើសុំភ្ជាប់សេវាអ៊ីនធឺណិត" data-en="Request Service">
                ស្នើសុំភ្ជាប់សេវាអ៊ីនធឺណិត
            </button>
        </div>
    </div>
</header>
