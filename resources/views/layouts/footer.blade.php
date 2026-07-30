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
$phone_main = Setting::get('phone_main', '012 675 775');
$phone_noc = Setting::get('phone_noc', '097 513 5135');
$email_main = Setting::get('email_main', 'info@telnet.com.kh');
$website = Setting::get('website', 'www.telnet.com.kh');
$fb_url = Setting::get('facebook_url','');
$tg_url = Setting::get('telegram_url','');
$yt_url = Setting::get('youtube_url', '');
$li_url = Setting::get('linkedin_url','');
$latlong="11.54732899907136,104.9089653152003";
@endphp
<section class="w-full py-12 text-white relative">

    <!-- Subtle Background Glows -->
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-[#8FC74A]/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-[#F79633]/10 rounded-full blur-3xl pointer-events-none"></div>

    <!-- Section Title -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 mb-8 text-center sm:text-left">
        <h3 class="text-xs text-center font-semibold tracking-widest uppercase text-[#F79633]">Strategic Partners</h3>
        <h2 class="text-2xl text-center sm:text-3xl font-bold text-[#8FC74A] mt-1">Corporate Subscribers</h2>
    </div>

    <!-- Full Viewport Width Outer Container (Infinite Width) -->
    <div class="relative z-10 w-full  overflow-hidden [mask-image:_linear-gradient(to_right,transparent_0,_black_64px,_black_calc(100%-64px),transparent_100%)]">

        <!-- Animated Flex Belt (Seamless Infinite Scroll) -->
        <div class="animate-marquee gap-6">

            <!-- FIRST SET OF ITEMS -->
            <div class="flex gap-6 items-center partner-track">
                <!-- Item 1 -->
                <a href="#collab-1" class="flex-none w-64 p-4 rounded-2xl bg-white backdrop-blur-md border border-gray-200 hover:border-[#8FC74A]/60 hover:bg-[#8FC74A] transition-all duration-300 group shadow-lg">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl  flex items-center justify-center overflow-hidden border border-gray-200 group-hover:scale-105 transition duration-300">
                            <img src="{{asset('storage/partner/TRC.png')}}" alt="Avatar" class="w-full h-full object-cover" />
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-[#8FC74A] group-hover:text-white transition-colors">Nexus Tech</h4>
                            <p class="text-xs text-[#F79633]">Infrastructure Partner</p>
                        </div>
                    </div>
                </a>

                <!-- Item 2 -->
                <a href="#collab-2" class="flex-none w-64 p-4 rounded-2xl bg-white backdrop-blur-md border border-gray-200 hover:border-[#8FC74A]/60 hover:bg-[#8FC74A] transition-all duration-300 group shadow-lg">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl  flex items-center justify-center overflow-hidden border border-gray-200 group-hover:scale-105 transition duration-300">
                            <img src="{{asset('storage/partner/Hi Park.png')}}" alt="Avatar" class="w-full h-full object-cover" />
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-[#8FC74A] group-hover:text-white transition-colors">Global Fiber</h4>
                            <p class="text-xs text-[#F79633]">Connectivity Systems</p>
                        </div>
                    </div>
                </a>

                <!-- Item 3 -->
                <a href="#collab-3" class="flex-none w-64 p-4 rounded-2xl bg-white backdrop-blur-md border border-gray-200 hover:border-[#8FC74A]/60 hover:bg-[#8FC74A] transition-all duration-300 group shadow-lg">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl  flex items-center justify-center overflow-hidden border border-gray-200 group-hover:scale-105 transition duration-300">
                            <img src="{{asset('storage/partner/TAI SENG.png')}}" alt="Avatar" class="w-full h-full object-cover" />
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-[#8FC74A] group-hover:text-white transition-colors">Aura Cloud</h4>
                            <p class="text-xs text-[#F79633]">Datacenter Solutions</p>
                        </div>
                    </div>
                </a>

                <!-- Item 4 -->
                <a href="#collab-4" class="flex-none w-64 p-4 rounded-2xl bg-white backdrop-blur-md border border-gray-200 hover:border-[#8FC74A]/60 hover:bg-[#8FC74A] transition-all duration-300 group shadow-lg">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl  flex items-center justify-center overflow-hidden border border-gray-200 group-hover:scale-105 transition duration-300">
                            <img src="{{asset('storage/partner/EZEPROMO.png')}}" alt="Avatar" class="w-full h-full object-cover" />
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-[#8FC74A] group-hover:text-white transition-colors">Vortex Labs</h4>
                            <p class="text-xs text-[#F79633]">Security & RBAC</p>
                        </div>
                    </div>
                </a>
                <!-- Item 1 -->
                <a href="#collab-1" class="flex-none w-64 p-4 rounded-2xl bg-white backdrop-blur-md border border-gray-200 hover:border-[#8FC74A]/60 hover:bg-[#8FC74A] transition-all duration-300 group shadow-lg">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl  flex items-center justify-center overflow-hidden border border-gray-200 group-hover:scale-105 transition duration-300">
                            <img src="{{asset('storage/partner/UCB.png')}}" alt="Avatar" class="w-full h-full object-cover" />
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-[#8FC74A] group-hover:text-white transition-colors">Nexus Tech</h4>
                            <p class="text-xs text-[#F79633]">Infrastructure Partner</p>
                        </div>
                    </div>
                </a>

                <!-- Item 2 -->
                <a href="#collab-2" class="flex-none w-64 p-4 rounded-2xl bg-white backdrop-blur-md border border-gray-200 hover:border-[#8FC74A]/60 hover:bg-[#8FC74A] transition-all duration-300 group shadow-lg">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl  flex items-center justify-center overflow-hidden border border-gray-200 group-hover:scale-105 transition duration-300">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&auto=format&fit=crop&q=80" alt="Avatar" class="w-full h-full object-cover" />
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-[#8FC74A] group-hover:text-white transition-colors">Global Fiber</h4>
                            <p class="text-xs text-[#F79633]">Connectivity Systems</p>
                        </div>
                    </div>
                </a>

                <!-- Item 3 -->
                <a href="#collab-3" class="flex-none w-64 p-4 rounded-2xl bg-white backdrop-blur-md border border-gray-200 hover:border-[#8FC74A]/60 hover:bg-[#8FC74A] transition-all duration-300 group shadow-lg">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl  flex items-center justify-center overflow-hidden border border-gray-200 group-hover:scale-105 transition duration-300">
                            <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?w=150&auto=format&fit=crop&q=80" alt="Avatar" class="w-full h-full object-cover" />
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-[#8FC74A] group-hover:text-white transition-colors">Aura Cloud</h4>
                            <p class="text-xs text-[#F79633]">Datacenter Solutions</p>
                        </div>
                    </div>
                </a>

                <!-- Item 4 -->
                <a href="#collab-4" class="flex-none w-64 p-4 rounded-2xl bg-white backdrop-blur-md border border-gray-200 hover:border-[#8FC74A]/60 hover:bg-[#8FC74A] transition-all duration-300 group shadow-lg">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl  flex items-center justify-center overflow-hidden border border-gray-200 group-hover:scale-105 transition duration-300">
                            <img src="https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?w=150&auto=format&fit=crop&q=80" alt="Avatar" class="w-full h-full object-cover" />
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-white group-hover:text-white transition-colors">Vortex Labs</h4>
                            <p class="text-xs text-[#F79633]">Security & RBAC</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="flex gap-6 items-center marquee-box">
                <!-- Item 1 -->
                <a href="#collab-1" class="flex-none w-64 p-4 rounded-2xl bg-white backdrop-blur-md border border-gray-200 hover:border-[#8FC74A]/60 hover:bg-[#8FC74A] transition-all duration-300 group shadow-lg">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl  flex items-center justify-center overflow-hidden border border-gray-200 group-hover:scale-105 transition duration-300">
                            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80" alt="Avatar" class="w-full h-full object-cover" />
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-[#8FC74A] group-hover:text-white transition-colors">Nexus Tech</h4>
                            <p class="text-xs text-[#F79633]">Infrastructure Partner</p>
                        </div>
                    </div>
                </a>

                <!-- Item 2 -->
                <a href="#collab-2" class="flex-none w-64 p-4 rounded-2xl bg-white backdrop-blur-md border border-gray-200 hover:border-[#8FC74A]/60 hover:bg-[#8FC74A] transition-all duration-300 group shadow-lg">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl  flex items-center justify-center overflow-hidden border border-gray-200 group-hover:scale-105 transition duration-300">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&auto=format&fit=crop&q=80" alt="Avatar" class="w-full h-full object-cover" />
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-[#8FC74A] group-hover:text-white transition-colors">Global Fiber</h4>
                            <p class="text-xs text-[#F79633]">Connectivity Systems</p>
                        </div>
                    </div>
                </a>

                <!-- Item 3 -->
                <a href="#collab-3" class="flex-none w-64 p-4 rounded-2xl bg-white backdrop-blur-md border border-gray-200 hover:border-[#8FC74A]/60 hover:bg-[#8FC74A] transition-all duration-300 group shadow-lg">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl  flex items-center justify-center overflow-hidden border border-gray-200 group-hover:scale-105 transition duration-300">
                            <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?w=150&auto=format&fit=crop&q=80" alt="Avatar" class="w-full h-full object-cover" />
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-[#8FC74A] group-hover:text-white transition-colors">Aura Cloud</h4>
                            <p class="text-xs text-[#F79633]">Datacenter Solutions</p>
                        </div>
                    </div>
                </a>

                <!-- Item 4 -->
                <a href="#collab-4" class="flex-none w-64 p-4 rounded-2xl bg-white backdrop-blur-md border border-gray-200 hover:border-[#8FC74A]/60 hover:bg-[#8FC74A] transition-all duration-300 group shadow-lg">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl  flex items-center justify-center overflow-hidden border border-gray-200 group-hover:scale-105 transition duration-300">
                            <img src="https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?w=150&auto=format&fit=crop&q=80" alt="Avatar" class="w-full h-full object-cover" />
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-[#8FC74A] group-hover:text-white transition-colors">Vortex Labs</h4>
                            <p class="text-xs text-[#F79633]">Security & RBAC</p>
                        </div>
                    </div>
                </a>
                <!-- Item 1 -->
                <a href="#collab-1" class="flex-none w-64 p-4 rounded-2xl bg-white backdrop-blur-md border border-gray-200 hover:border-[#8FC74A]/60 hover:bg-[#8FC74A] transition-all duration-300 group shadow-lg">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl  flex items-center justify-center overflow-hidden border border-gray-200 group-hover:scale-105 transition duration-300">
                            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80" alt="Avatar" class="w-full h-full object-cover" />
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-[#8FC74A] group-hover:text-white transition-colors">Nexus Tech</h4>
                            <p class="text-xs text-[#F79633]">Infrastructure Partner</p>
                        </div>
                    </div>
                </a>

                <!-- Item 2 -->
                <a href="#collab-2" class="flex-none w-64 p-4 rounded-2xl bg-white backdrop-blur-md border border-gray-200 hover:border-[#8FC74A]/60 hover:bg-[#8FC74A] transition-all duration-300 group shadow-lg">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl  flex items-center justify-center overflow-hidden border border-gray-200 group-hover:scale-105 transition duration-300">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&auto=format&fit=crop&q=80" alt="Avatar" class="w-full h-full object-cover" />
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-[#8FC74A] group-hover:text-white transition-colors">Global Fiber</h4>
                            <p class="text-xs text-[#F79633]">Connectivity Systems</p>
                        </div>
                    </div>
                </a>

                <!-- Item 3 -->
                <a href="#collab-3" class="flex-none w-64 p-4 rounded-2xl bg-white backdrop-blur-md border border-gray-200 hover:border-[#8FC74A]/60 hover:bg-[#8FC74A] transition-all duration-300 group shadow-lg">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl  flex items-center justify-center overflow-hidden border border-gray-200 group-hover:scale-105 transition duration-300">
                            <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?w=150&auto=format&fit=crop&q=80" alt="Avatar" class="w-full h-full object-cover" />
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-[#8FC74A] group-hover:text-white transition-colors">Aura Cloud</h4>
                            <p class="text-xs text-[#F79633]">Datacenter Solutions</p>
                        </div>
                    </div>
                </a>

                <!-- Item 4 -->
                <a href="#collab-4" class="flex-none w-64 p-4 rounded-2xl bg-white backdrop-blur-md border border-gray-200 hover:border-[#8FC74A]/60 hover:bg-[#8FC74A] transition-all duration-300 group shadow-lg">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl  flex items-center justify-center overflow-hidden border border-gray-200 group-hover:scale-105 transition duration-300">
                            <img src="https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?w=150&auto=format&fit=crop&q=80" alt="Avatar" class="w-full h-full object-cover" />
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-white group-hover:text-white transition-colors">Vortex Labs</h4>
                            <p class="text-xs text-[#F79633]">Security & RBAC</p>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>

<!-- Standard Keyframe snippet (Put in your main <style> tag or CSS file) -->
<footer class="gradient-brand  py-12 text-white text-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">

            {{-- Brand + Tagline --}}

            {{-- Quick Links --}}
            <div class="space-y-2">
                <h4 class="text-sm font-bold text-white mb-3">{{ __('app.footer.quick_links') }}</h4>
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
                <h4 class="text-sm font-bold text-white mb-3">{{ __('app.footer.contact') }}</h4>
                <p><i class="fa-solid fa-phone text-white mr-1.5"></i>
                    <a href="tel:{{ preg_replace('/\s+/','',$phone_main) }}" class="hover:text-white transition">{{ $phone_main }}</a>
                </p>
                <p><i class="fa-solid fa-headset text-white mr-1.5"></i>
                    NOC 24/7: <a href="tel:{{ preg_replace('/\s+/','',$phone_noc) }}" class="hover:text-white transition">{{ $phone_noc }}</a></p>
                <p><i class="fa-solid fa-envelope text-white mr-1.5"></i>
                    <a href="mailto:{{ $email_main }}" class="hover:text-white transition text-white">{{ $email_main }}</a>
                </p>
                <p><i class="fa-solid fa-globe text-white mr-1.5"></i> {{ $website }}</p>
            </div>

            {{-- Address --}}
            <div class="space-y-2">
                <h4 class="text-sm font-bold text-white mb-3">{{ __('app.footer.address') }}</h4>
                <p class="font-bold">{{ __('app.footer.address_text') }}</p>
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