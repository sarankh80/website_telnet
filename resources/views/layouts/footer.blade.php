@php
    use App\Models\Setting;
    $f_tagline_km  = Setting::get('tagline_km',  'អ្នកផ្តល់សេវាអ៉ីនធឺណិត (ISP) ល្បឿនលឿន គួរឱ្យទុកចិត្ត ទូទាំងកម្ពុជា');
    $f_tagline_en  = Setting::get('tagline_en',  'High-speed, reliable ISP across Cambodia.');
    $f_ceo_name_km = Setting::get('ceo_name_km', 'លោក ណេត សុគន្ធធារ៉ក់');
    $f_ceo_name_en = Setting::get('ceo_name_en', 'Mr. Neth Sokunthearak');
    $f_ceo_ttl_km  = Setting::get('ceo_title_km','អគ្គនាយក (CEO)');
    $f_ceo_ttl_en  = Setting::get('ceo_title_en','Chief Executive Officer');
    $f_ceo_tg      = Setting::get('ceo_telegram','@ceo_thearak');
    $f_copy_km     = Setting::get('copyright_km','© ២០២៦ TELNET CO., LTD. រក្សាសិទ្ធិគ្រប់យ៉ាង');
    $f_copy_en     = Setting::get('copyright_en','© 2026 TELNET CO., LTD. All Rights Reserved.');
    $phone_main    = Setting::get('phone_main',  '012 675 775');
    $phone_noc     = Setting::get('phone_noc',   '097 513 5135');
    $email_main    = Setting::get('email_main',  'info@telnet.com.kh');
    $website       = Setting::get('website',     'www.telnet.com.kh');
    $fb_url        = Setting::get('facebook_url','');
    $tg_url        = Setting::get('telegram_url','');
    $yt_url        = Setting::get('youtube_url', '');
    $li_url        = Setting::get('linkedin_url','');
@endphp

<footer class="bg-slate-900 border-t border-gray-800 py-12 text-gray-400 text-xs">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">

            {{-- Brand + Tagline --}}
            <div class="space-y-3">
                <svg class="h-8 w-auto" viewBox="0 0 380 90" fill="none">
                    <circle cx="45" cy="45" r="42" fill="#8DC63F"/>
                    <path d="M 12 70 C 15 38 42 16 80 14 C 70 17 56 28 46 50 C 36 68 20 76 12 70 Z" fill="#F58220"/>
                    <path d="M 22 78 C 25 48 52 26 88 22 C 77 26 63 38 53 60 C 43 78 28 82 22 78 Z" fill="#F58220"/>
                    <text x="100" y="62" font-family="'Inter', sans-serif" font-weight="900" font-size="52" fill="#8DC63F">TEL</text>
                    <text x="215" y="62" font-family="'Inter', sans-serif" font-weight="900" font-size="52" fill="#F58220">NET</text>
                </svg>
                <p class="text-gray-400 leading-relaxed"
                   data-km="{{ $f_tagline_km }}" data-en="{{ $f_tagline_en }}">{{ $f_tagline_km }}</p>
                {{-- Social links --}}
                @if($fb_url || $tg_url || $yt_url || $li_url)
                <div class="flex items-center gap-3 pt-1">
                    @if($fb_url)
                    <a href="{{ $fb_url }}" target="_blank" rel="noopener"
                       class="w-8 h-8 rounded-lg bg-slate-800 hover:bg-brand-green/20 hover:text-brand-green flex items-center justify-center transition">
                        <i class="fa-brands fa-facebook-f text-sm"></i>
                    </a>
                    @endif
                    @if($tg_url)
                    <a href="{{ $tg_url }}" target="_blank" rel="noopener"
                       class="w-8 h-8 rounded-lg bg-slate-800 hover:bg-brand-green/20 hover:text-brand-green flex items-center justify-center transition">
                        <i class="fa-brands fa-telegram text-sm"></i>
                    </a>
                    @endif
                    @if($yt_url)
                    <a href="{{ $yt_url }}" target="_blank" rel="noopener"
                       class="w-8 h-8 rounded-lg bg-slate-800 hover:bg-red-500/20 hover:text-red-400 flex items-center justify-center transition">
                        <i class="fa-brands fa-youtube text-sm"></i>
                    </a>
                    @endif
                    @if($li_url)
                    <a href="{{ $li_url }}" target="_blank" rel="noopener"
                       class="w-8 h-8 rounded-lg bg-slate-800 hover:bg-sky-500/20 hover:text-sky-400 flex items-center justify-center transition">
                        <i class="fa-brands fa-linkedin-in text-sm"></i>
                    </a>
                    @endif
                </div>
                @endif
            </div>

            {{-- Quick Links --}}
            <div class="space-y-2">
                <h4 class="text-sm font-bold text-white mb-3"
                    data-km="តំណភ្ជាប់រហ័ស" data-en="Quick Links">តំណភ្ជាប់រហ័ស</h4>
                @foreach([
                    ['href'=>route('about'),    'km'=>'ក្រុមហ៊ុន​យើង​ខ្ញុំ',   'en'=>'About Us'],
                    ['href'=>route('services'), 'km'=>'សេវាកម្មស្នូល',         'en'=>'Services'],
                    ['href'=>route('coverage'), 'km'=>'ការគ្របដណ្តប់',          'en'=>'Coverage'],
                    ['href'=>route('kpi'),      'km'=>'ស្តង់ដារប្រតិបត្តិការ', 'en'=>'Standard Operation'],
                    ['href'=>route('team'),     'km'=>'ក្រុមការងារ',             'en'=>'Our Team'],
                    ['href'=>route('contact'),  'km'=>'ទំនាក់ទំនង',             'en'=>'Contact'],
                ] as $link)
                <p><a href="{{ $link['href'] }}"
                      class="hover:text-brand-green transition"
                      data-km="{{ $link['km'] }}" data-en="{{ $link['en'] }}">{{ $link['km'] }}</a></p>
                @endforeach
            </div>

            {{-- Contact --}}
            <div class="space-y-2">
                <h4 class="text-sm font-bold text-white mb-3"
                    data-km="ទំនាក់ទំនង" data-en="Office Contact">ទំនាក់ទំនង</h4>
                <p><i class="fa-solid fa-phone text-brand-green mr-1.5"></i>
                    <a href="tel:{{ preg_replace('/\s+/','',$phone_main) }}" class="hover:text-brand-green transition">{{ $phone_main }}</a></p>
                <p><i class="fa-solid fa-headset text-brand-orange mr-1.5"></i>
                    NOC 24/7: <a href="tel:{{ preg_replace('/\s+/','',$phone_noc) }}" class="hover:text-brand-orange transition">{{ $phone_noc }}</a></p>
                <p><i class="fa-solid fa-envelope text-brand-green mr-1.5"></i>
                    <a href="mailto:{{ $email_main }}" class="hover:text-brand-green transition">{{ $email_main }}</a></p>
                <p><i class="fa-solid fa-globe text-brand-orange mr-1.5"></i> {{ $website }}</p>
            </div>

            {{-- Leadership --}}
            <div class="space-y-2">
                <h4 class="text-sm font-bold text-white mb-3"
                    data-km="ថ្នាក់ដឹកនាំ" data-en="Leadership">ថ្នាក់ដឹកនាំ</h4>
                <p class="text-gray-300 font-bold"
                   data-km="{{ $f_ceo_name_km }}" data-en="{{ $f_ceo_name_en }}">{{ $f_ceo_name_km }}</p>
                <p class="text-gray-400"
                   data-km="{{ $f_ceo_ttl_km }}" data-en="{{ $f_ceo_ttl_en }}">{{ $f_ceo_ttl_km }}</p>
                @if($f_ceo_tg)
                <p class="text-gray-400 mt-2">
                    <i class="fa-brands fa-telegram text-brand-orange mr-1"></i>
                    <a href="https://t.me/{{ ltrim($f_ceo_tg,'@') }}" target="_blank" rel="noopener"
                       class="hover:text-brand-orange transition">{{ $f_ceo_tg }}</a>
                </p>
                @endif
            </div>
        </div>

        <div class="border-t border-gray-800 pt-6 text-center text-gray-500">
            <p data-km="{{ $f_copy_km }}" data-en="{{ $f_copy_en }}">{{ $f_copy_km }}</p>
        </div>
    </div>
</footer>
