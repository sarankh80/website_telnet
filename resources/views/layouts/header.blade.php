<header class="sticky top-0 z-50 glass-header transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex justify-between items-center h-20">

            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center space-x-3 flex-shrink-0 group">
                <img src="{{asset('storage/logo.png')}}"
                    alt="TELNET CO., LTD Logo"
                    class="h-10 w-auto transition-transform duration-300 group-hover:scale-105"
                    onerror="this.style.display='none'; this.nextElementSibling.style.display='block'">
                <svg style="display:none" class="h-10 w-auto transition-transform duration-300 group-hover:scale-105" viewBox="0 0 380 90" fill="none">
                    <circle cx="45" cy="45" r="42" fill="#8DC63F" />
                    <path d="M 12 70 C 15 38 42 16 80 14 C 70 17 56 28 46 50 C 36 68 20 76 12 70 Z" fill="#F58220" />
                    <path d="M 22 78 C 25 48 52 26 88 22 C 77 26 63 38 53 60 C 43 78 28 82 22 78 Z" fill="#F58220" />
                    <text x="100" y="62" font-family="'Inter', sans-serif" font-weight="900" font-size="52" fill="#8DC63F">TEL</text>
                    <text x="215" y="62" font-family="'Inter', sans-serif" font-weight="900" font-size="52" fill="#F58220">NET</text>
                </svg>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center space-x-1 xl:space-x-1 text-xs xl:text-sm font-semibold text-adaptive-muted whitespace-nowrap">
                @php
                $navLinks = [
                ['route' => 'home', 'label' => __('app.nav.home'), ],
                ['route' => 'services', 'label' => __('app.nav.internet_service'),],
                ['route' => 'business', 'label' => __('app.nav.business'), ],
                ['route' => 'support', 'label' => __('app.nav.support'), ],
                ['route' => 'about', 'label' => __('app.nav.about'), ],
                ['route' => 'career', 'label' => __('app.nav.careers'), ],
                ['route' => 'admin.login', 'label' => __('app.nav.portal'),],
                ];
                @endphp
                @foreach($navLinks as $link)
                @php $active = request()->routeIs($link['route']); @endphp
                <a href="{{ route($link['route']) }}"
                    class="nav-link-pill text-slate-500 px-3 py-2 rounded-lg hover:text-brand-green hover:bg-brand-green/5 transition flex items-center gap-1.5 {{ $active ? 'text-brand-green active' : '' }}">
                    <span class="text-[1rem]">{{ $link['label'] }}</span>
                </a>
                @endforeach
            </nav>

            <!-- Desktop Actions: Language + Theme -->
            @php $currentLocale = app()->getLocale(); @endphp
            <div class="hidden sm:flex items-center space-x-2.5 flex-shrink-0 ">
                <div class=" px-2.5 py-1.5  text-xs font-bold text-adaptive-main flex items-center gap-2 \">
                    <a href="{{ route('locale.switch', $currentLocale === 'km' ? 'en' : 'km') }}"
                        class="flex items-center gap-2 cursor-pointer group"
                        title="Switch Language / ប្តូរភាសា">

                        {{-- Globe Icon --}}
                        <svg class="w-6 h-6 text-slate-500 group-hover:text-brand-green transition-colors duration-200 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg>

                        {{-- Flag Emoji --}}
                        <!-- <span class="text-sm leading-none">{{ $currentLocale === 'km' ? '🇰🇭' : '🇺🇸' }}</span> -->

                        {{-- Language Pills --}}
                        <!-- <div class="flex items-center gap-1">
                            <span class="px-1.5 py-0.5 rounded text-[10px] font-bold transition {{ $currentLocale === 'km' ? 'bg-brand-green text-white font-extrabold shadow-sm' : 'text-adaptive-muted' }}">
                                ខ្មែរ
                            </span>
                            <span class="text-adaptive-muted text-[10px]">/</span>
                            <span class="px-1.5 py-0.5 rounded text-[10px] font-bold transition {{ $currentLocale === 'en' ? 'bg-brand-orange text-white font-extrabold shadow-sm' : 'text-adaptive-muted' }}">
                                EN
                            </span>
                        </div> -->

                        <!-- {{-- Switch/Refresh Indicator Icon --}}
                        <svg class="w-3 h-3 text-adaptive-muted opacity-60 group-hover:opacity-100 group-hover:rotate-180 transition-all duration-300 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                        </svg> -->
                    </a>
                </div>
            </div>

            <!-- Mobile Header Tools -->
            <div class="lg:hidden flex items-center space-x-2">
                <a href="{{ route('locale.switch', $currentLocale === 'km' ? 'en' : 'km') }}"
                    class="lang-switch-btn px-2.5 py-1.5 rounded-lg text-adaptive-main text-xs font-bold flex items-center gap-1.5">
                    <span>{{ $currentLocale === 'km' ? 'KH' : 'US' }}</span>
                    <span class="text-[11px] font-extrabold {{ $currentLocale === 'km' ? 'text-brand-green' : 'text-brand-orange' }}">{{ strtoupper($currentLocale) }}</span>
                </a>
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
        ['href' => route('home'), 'label' => __('app.nav.home'), 'icon' => 'fa-house', 'color' => 'text-brand-green'],
        ['href' => route('services'), 'label' => __('app.nav.internet_service'), 'icon' => 'fa-bolt', 'color' => 'text-brand-orange'],
        ['href' => route('business'), 'label' => __('app.nav.business'), 'icon' => 'fa-briefcase', 'color' => 'text-brand-green'],
        ['href' => route('kpi'), 'label' => __('app.nav.kpi'), 'icon' => 'fa-chart-line', 'color' => 'text-brand-green'],
        ['href' => route('about'), 'label' => __('app.nav.about'), 'icon' => 'fa-building', 'color' => 'text-brand-green'],
        ['href' => route('support'), 'label' => __('app.nav.team'), 'icon' => 'fa-users', 'color' => 'text-brand-green'],
        ['href' => route('portal'), 'label' => __('app.nav.portal'), 'icon' => 'fa-headset', 'color' => 'text-brand-orange'],
        ];
        @endphp
        @foreach($mobileLinks as $link)
        <a href="{{ $link['href'] }}" onclick="closeMobileMenu()"
            class="flex items-center gap-2.5 text-adaptive-muted hover:text-brand-green hover:bg-brand-green/10 p-2.5 rounded-xl transition font-medium">
            <i class="fa-solid {{ $link['icon'] }} {{ $link['color'] }} w-5"></i>
            <span>{{ $link['label'] }}</span>
        </a>
        @endforeach

        <div class="pt-3 border-t border-gray-700/80 flex flex-col gap-2.5">
            <a href="tel:0975135135"
                class="text-center text-xs text-brand-orange py-3 rounded-xl font-bold border border-brand-orange/30 flex items-center justify-center gap-2">
                <i class="fa-solid fa-headset"></i> NOC Support: 097 513 5135 (24/7)
            </a>
            <button onclick="closeMobileMenu(); openModal('serviceModal');"
                class="w-full text-xs gradient-brand text-white py-3 rounded-xl font-bold shadow-md">
                {{ __('app.nav.request_btn') }}
            </button>
        </div>
    </div>
</header>