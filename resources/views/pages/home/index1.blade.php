<!-- Right Section (70% on Desktop -> 7 cols out of 10) -->
<div class="md:col-span-6 text-center md:text-left">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        <div id="card-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-x-12 gap-y-12">
            @foreach($servicesSlugs as $slug)
            <div class="product-card flex items-start space-x-4 p-2 rounded-2xl ">
                <div>
                    <div class="flex items-center space-x-1 mb-2">
                        <div class="flex-shrink-0">
                            <img src="{{ Storage::url($slug->image) }}" alt="IP Transit Icon" class="w-10 h-10 object-contain" />
                        </div>
                        <h3 class="text-xl tracking-wide text-[#8fc74a] font-bold bg-brand-green/20 px-2.5 py-1/2 rounded-full">{{$currentLocale==="en"?$slug->name:$slug->name_km}} </h3>
                    </div>
                    <div class="text-[#444] text-justify text-sm  mb-1 line-clamp-7 max-w-prose">
                        {!! $currentLocale==="en"?$slug->desc:$slug->desc_km !!}
                    </div>
                    <a href="#" class="text-[#F79633] underline hover:font-bold text-sm transition-colors">{{__('app.hero.readmore')}} &gt;&gt;</a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-12 flex items-center justify-center space-x-2">
            <button id="prev-btn" class="px-4 py-1 rounded-lg bg-gray-500 text-white font-medium hover:bg-gray-700 disabled:opacity-40 disabled:cursor-not-allowed transition-all">
                &laquo; Previous
            </button>
            <div id="pagination-numbers" class="flex items-center space-x-2"></div>

            <button id="next-btn" class="px-4 py-1 rounded-lg bg-gray-500 text-white font-medium hover:bg-gray-700 disabled:opacity-40 disabled:cursor-not-allowed transition-all">
                Next &raquo;
            </button>
        </div>

    </div>
</div>