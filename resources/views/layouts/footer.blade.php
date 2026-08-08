@php
use App\Models\Setting;
$f_tagline_km = Setting::get('tagline_km', 'អ្នកផ្តល់សេវាអ៉ីនធឺណិត (ISP) ល្បឿនលឿន គួរឱ្យទុកចិត្ត ទូទាំងកម្ពុជា');
$f_tagline_en = Setting::get('tagline_en', 'High-speed, reliable ISP across Cambodia.');
$f_ceo_name_km = Setting::get('ceo_name_km', 'លោក ណេត សុគន្ធធារ៉ក់');
$f_ceo_name_en = Setting::get('ceo_name_en', 'Mr. Neth Sokunthearak');
$f_ceo_ttl_km = Setting::get('ceo_title_km','អគ្គនាយក (CEO)');
$f_ceo_ttl_en = Setting::get('ceo_title_en','Chief Executive Officer');
$f_ceo_tg = Setting::get('ceo_telegram','@ceo_thearak');
$f_copy_km = Setting::get('copyright_km','© ២០២៦ TELNET CO., LTD. រក្សាសិទ្ធិគ្រប់យ៉ាង');
$f_copy_en = Setting::get('copyright_en','© 2026 TELNET CO., LTD. All Rights Reserved.');
$phone_main = "097 513 5135";
$phone_noc = "0975135135";
$email_main = Setting::get('email_main', 'info@telnet.com.kh');
$website = Setting::get('website', 'www.telnet.com.kh');
$fb_url = Setting::get('facebook_url','');
$tg_url = Setting::get('telegram_url','');
$yt_url = Setting::get('youtube_url', '');
$li_url = Setting::get('linkedin_url','');
$latlong="11.54732899907136,104.9089653152003";
@endphp

<!-- Standard Keyframe snippet (Put in your main <style> tag or CSS file) -->
<footer class="gradient-brand  py-12 text-white text-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">

            {{-- Brand + Tagline --}}

            {{-- Quick Links --}}
            <div class="space-y-2">
                <h3 class="text-md font-bold text-white mb-3">{{ __('app.footer.quick_links') }}</h3>
                @foreach([

                ['href'=>route('home'), 'label'=> __('app.footer.home')],
                ['href'=>route('services'), 'label'=> __('app.footer.services')],
                ['href'=>route('services'), 'label'=> __('app.footer.business')],
                ['href'=>route('contact'), 'label'=> __('app.footer.support')],
                ['href'=>route('about'), 'label'=> __('app.footer.about')],
                ['href'=>route('career'), 'label'=> __('app.footer.careers')],
                ['href'=>route('portal'), 'label'=> __('app.footer.portal')],
                ] as $link)
                <p><a href="{{ $link['href'] }}" class="hover:text-brand-green transition">{{ $link['label'] }}</a></p>
                @endforeach
            </div>

            {{-- Contact --}}
            <div class="space-y-2">
                <h4 class="text-md font-bold text-white mb-3">{{ __('app.footer.contact') }}</h4>
                <!-- <p><i class="fa-solid fa-phone text-white mr-1.5"></i>
                    <a href="tel:{{ preg_replace('/\s+/','',$phone_main) }}" class="hover:text-white transition">{{ $phone_main }}</a>
                </p> -->
                <p><i class="fa-solid fa-headset text-white mr-1.5"></i>
                    NOC 24/7: <a href="tel:{{ preg_replace('/\s+/','',$phone_noc) }}" class="hover:text-white transition">{{ $phone_noc }}</a></p>
                <p><i class="fa-solid fa-envelope text-white mr-1.5"></i>
                    <a href="mailto:{{ $email_main }}" class="hover:text-white transition text-white">{{ $email_main }}</a>
                </p>
                <!-- <p><i class="fa-solid fa-globe text-white mr-1.5"></i> {{ $website }}</p> -->
            </div>

            {{-- Address --}}
            <div class="space-y-2">
                <h4 class="text-md font-bold text-white mb-3">{{ __('app.footer.address') }}</h4>
                <p>{{ __('app.footer.address_text') }}</p>
            </div>
            <div style="width:100%;height:100%;">
                <iframe
                    src="https://maps.google.com/maps?q={{$latlong}}&output=embed"
                    style="width:100%;height:100%;border:0;"
                    loading="lazy"
                    allowfullscreen>
                </iframe>
            </div>
        </div>

        <div class="border-t border-white-800 pt-6 text-center text-white-500">
            <p>{{ __('app.footer.copyright') }}</p>
        </div>
    </div>
</footer>