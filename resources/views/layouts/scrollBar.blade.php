<section class="w-full pb-12 text-white relative">
    @php
    $partner=[
    [
    "id"=>1,
    "name"=>"BINGOOOO ICE CREAM & TEA",
    "industry_types"=>"Food & Beverage",
    "images"=>asset('storage/home/partner/BINGOOOO ICE CREAM & TEA.png'),
    ],
    [
    "id"=>2,
    "name"=>"Crystal Bright",
    "industry_types"=>"Electronics & Technology",
    "images"=>asset('storage/home/partner/Crystal Bright.jpg'),
    ],
    [
    "id"=>3,
    "name"=>"Embot Clinic",
    "industry_types"=>"Healthcare",
    "images"=>asset('storage/home/partner/Embot.jpg'),
    ],
    [
    "id"=>4,
    "name"=>"EZEPROMO",
    "industry_types"=>"Fashion & Apparel",
    "images"=>asset('storage/home/partner/EZEPROMO.png'),
    ],
    [
    "id"=>5,
    "name"=>"Hi Park",
    "industry_types"=>"Hospitality & Resort",
    "images"=>asset('storage/home/partner/Hi Park.png'),
    ],
    [
    "id"=>6,
    "name"=>"INSPIRCO",
    "industry_types"=>"Automotive",
    "images"=>asset('storage/home/partner/INSPIRCO.jpg'),
    ],
    [
    "id"=>7,
    "name"=>"JT",
    "industry_types"=>"Electronics & Technology",
    "images"=>asset('storage/home/partner/JT.png'),
    ],
    [
    "id"=>8,
    "name"=>"JZY",
    "industry_types"=>"Finacail & Commercial",
    "images"=>asset('storage/home/partner/JZY.jpg'),
    ],
    [
    "id"=>9,
    "name"=>"MZD",
    "industry_types"=>"Automotive",
    "images"=>asset('storage/home/partner/MZD.jpg'),
    ],
    [
    "id"=>10,
    "name"=>"Neak Reach Printing House",
    "industry_types"=>"Electronics & Technology",
    "images"=>asset('storage/home/partner/Neakreach.jpg'),
    ],
    [
    "id"=>12,
    "name"=>"TAI SENG",
    "industry_types"=>"Fashion & Apparel",
    "images"=>asset('storage/home/partner/TAI SENG.png'),
    ],
    [
    "id"=>13,
    "name"=>"TKSD",
    "industry_types"=>"Fashion & Apparel",
    "images"=>asset('storage/home/partner/TKSD.jpg'),
    ],
    [
    "id"=>14,
    "name"=>"THEARUN COMPUTER TECHNOLOGY",
    "industry_types"=>"Electronics & Technology",
    "images"=>asset('storage/home/partner/TRC.png'),
    ],
    [
    "id"=>15,
    "name"=>"Union commercial bank plc",
    "industry_types"=>"Finacail & Commercial",
    "images"=>asset('storage/home/partner/Union commercial bank plc.png'),
    ],
    [
    "id"=>16,
    "name"=>"Unknow",
    "industry_types"=>"Electronics & Technology",
    "images"=>asset('storage/home/partner/Unknow.png'),
    ],
    [
    "id"=>17,
    "name"=>"Zodo",
    "industry_types"=>"Fashion & Apparel",
    "images"=>asset('storage/home/partner/Zodo.png'),
    ],
    ];

    @endphp
    <!-- Subtle Background Glows -->
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-[#8FC74A]/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-[#F79633]/10 rounded-full blur-3xl pointer-events-none"></div>

    <!-- Section Title -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 mb-8 text-center sm:text-left">
        <!-- <h3 class="text-xs text-center font-semibold tracking-widest uppercase text-[#F79633]">{{__('app.partner.slogan')}}</h3> -->
        <h2 class="text-2xl text-center sm:text-4xl font-bold text-[#8FC74A] mt-1">{{__('app.partner.title')}}</h2>
    </div>

    <!-- Full Viewport Width Outer Container (Infinite Width) -->
    <div class="relative z-10 w-full  overflow-hidden [mask-image:_linear-gradient(to_right,transparent_0,_black_64px,_black_calc(100%-64px),transparent_100%)]">

        <!-- Animated Flex Belt (Seamless Infinite Scroll) -->
        <div class="animate-marquee gap-6">

            <!-- FIRST SET OF ITEMS -->
            <div class="flex gap-6 items-start partner-track">
                @foreach($partner as $p)
                <a href="#collab-{{$p['id']}}" class="flex-none w-80 p-2 rounded-2xl bg-white backdrop-blur-md border border-gray-200 hover:border-[#8FC74A]/60 hover:scale-95 transition-all duration-300 group shadow-lg">
                    <div class="flex items-start gap-4">
                        <div class="w-24 h-24 rounded-xl  flex items-center justify-center overflow-hidden border border-gray-200 group-hover:scale-95 transition duration-300">
                            <img src="{{$p['images']}}" alt="{{$p['images']}}" class="w-22 h-22 object-contain" />
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-[#8FC74A]  uppercase transition-colors">{{$p['name']}}</h4>
                            <!-- <p class="text-xs text-[#F79633]">{{$p['industry_types']}}</p> -->
                        </div>
                    </div>
                </a>
                @endforeach
            </div>

        </div>
    </div>
</section>