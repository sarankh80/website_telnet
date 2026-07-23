@extends('layouts.app')

@section('content')

<section class="py-16 section-bg-primary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-section-title
            label="ទំនាក់ទំនង | Contact"
            title="ទំនាក់ទំនងមកកាន់ TELNET"
            subtitle="ក្រុមការងាររបស់យើងត្រៀមខ្លួនជួយអ្នក ២៤/៧"
        />

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Info -->
            <div class="space-y-6">
                <div class="glass-card p-6 rounded-2xl">
                    <h3 class="text-lg font-bold text-adaptive-main mb-4">
                        <i class="fa-solid fa-location-dot text-brand-green mr-2"></i>
                        ការិយាល័យកណ្តាល
                    </h3>
                    <div class="space-y-3 text-sm text-adaptive-muted">
                        <p><i class="fa-solid fa-location-dot text-brand-orange w-5"></i> រាជធានីភ្នំពេញ, ព្រះរាជាណាចក្រកម្ពុជា</p>
                        <p><i class="fa-solid fa-phone text-brand-green w-5"></i> 012 675 775</p>
                        <p><i class="fa-solid fa-headset text-brand-orange w-5"></i> NOC 24/7: 097 513 5135</p>
                        <p><i class="fa-solid fa-envelope text-brand-green w-5"></i> nethsokunthearak@telnet.com.kh</p>
                        <p><i class="fa-solid fa-envelope text-brand-orange w-5"></i> noc@telnet.com.kh</p>
                    </div>
                </div>

                <div class="glass-card p-6 rounded-2xl">
                    <h3 class="text-lg font-bold text-adaptive-main mb-4">
                        <i class="fa-solid fa-headset text-brand-orange mr-2"></i>
                        NOC Support
                    </h3>
                    <p class="text-sm text-adaptive-muted">
                        ក្រុម NOC របស់ TELNET CO., LTD ផ្តល់ការគាំទ្របច្ចេកទេស ២៤ ម៉ោង ៧ ថ្ងៃក្នុងមួយសប្តាហ៍ ៣៦៥ ថ្ងៃក្នុងមួយឆ្នាំ។
                    </p>
                    <div class="mt-4 flex gap-3">
                        <a href="tel:0975135135" class="flex-1 text-center bg-brand-green text-white font-bold py-3 rounded-xl text-sm transition hover:bg-brand-green-hover">
                            <i class="fa-solid fa-phone mr-1"></i> 097 513 5135
                        </a>
                        <a href="mailto:noc@telnet.com.kh" class="flex-1 text-center border border-brand-green text-brand-green font-bold py-3 rounded-xl text-sm transition hover:bg-brand-green/10">
                            <i class="fa-solid fa-envelope mr-1"></i> Email NOC
                        </a>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="glass-card p-6 rounded-2xl">
                <h3 class="text-lg font-bold text-adaptive-main mb-4">
                    <i class="fa-solid fa-paper-plane text-brand-green mr-2"></i>
                    ផ្ញើសារមកយើង
                </h3>

                @if(session('success'))
                    <div class="mb-4 p-3 bg-brand-green/20 text-brand-green rounded-xl text-sm font-bold">
                        <i class="fa-solid fa-circle-check mr-1"></i> {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-4 text-sm">
                    @csrf
                    <div>
                        <label class="block text-adaptive-main mb-1 font-medium">ឈ្មោះពេញ *</label>
                        <input type="text" name="name" required value="{{ old('name') }}"
                               class="w-full bg-slate-100 dark:bg-slate-900 border @error('name') border-red-500 @else border-gray-300 dark:border-gray-700 @enderror rounded-lg px-3.5 py-2.5 text-adaptive-main focus:outline-none focus:border-brand-green transition">
                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-adaptive-main mb-1 font-medium">អ៊ីមែល</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                   class="w-full bg-slate-100 dark:bg-slate-900 border border-gray-300 dark:border-gray-700 rounded-lg px-3.5 py-2.5 text-adaptive-main focus:outline-none focus:border-brand-green transition">
                        </div>
                        <div>
                            <label class="block text-adaptive-main mb-1 font-medium">លេខទូរស័ព្ទ</label>
                            <input type="tel" name="phone" value="{{ old('phone') }}"
                                   class="w-full bg-slate-100 dark:bg-slate-900 border border-gray-300 dark:border-gray-700 rounded-lg px-3.5 py-2.5 text-adaptive-main focus:outline-none focus:border-brand-green transition">
                        </div>
                    </div>
                    <div>
                        <label class="block text-adaptive-main mb-1 font-medium">ប្រធានបទ</label>
                        <input type="text" name="subject" value="{{ old('subject') }}"
                               class="w-full bg-slate-100 dark:bg-slate-900 border border-gray-300 dark:border-gray-700 rounded-lg px-3.5 py-2.5 text-adaptive-main focus:outline-none focus:border-brand-green transition">
                    </div>
                    <div>
                        <label class="block text-adaptive-main mb-1 font-medium">សារ *</label>
                        <textarea name="message" rows="4" required
                                  class="w-full bg-slate-100 dark:bg-slate-900 border @error('message') border-red-500 @else border-gray-300 dark:border-gray-700 @enderror rounded-lg px-3.5 py-2.5 text-adaptive-main focus:outline-none focus:border-brand-green transition">{{ old('message') }}</textarea>
                        @error('message') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <button type="submit"
                            class="w-full bg-gradient-to-r from-brand-green to-brand-orange hover:from-brand-green-hover hover:to-brand-orange-hover text-white font-bold py-3 rounded-xl text-sm transition shadow-md">
                        <i class="fa-solid fa-paper-plane mr-2"></i> ផ្ញើសារ
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
