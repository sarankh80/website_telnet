<!-- Service Request Modal -->
<div id="serviceModal" class="fixed inset-0 bg-black/80 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
    <div class="glass-card w-full max-w-lg rounded-2xl border border-gray-700 p-6 relative">
        <button onclick="closeModal('serviceModal')" class="absolute top-4 right-4 text-gray-400 hover:text-white text-xl transition">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <h3 class="text-xl font-bold text-adaptive-main mb-1">
            <i class="fa-solid fa-file-signature text-brand-green mr-2"></i>
            {{ __('app.modal.title') }}
        </h3>
        <p class="text-xs text-adaptive-muted mb-6">{{ __('app.modal.desc') }}</p>

        <form id="serviceRequestForm" action="{{ route('service.request') }}" method="POST" onsubmit="handleFormSubmit(event)" class="space-y-4 text-xs">
            @csrf
            <div>
                <label class="block text-adaptive-main mb-1 font-medium">{{ __('app.modal.name') }}</label>
                <input type="text" name="full_name" required
                       placeholder="{{ app()->getLocale() === 'km' ? 'ឧទាហរណ៍៖ សុខ ជា' : 'e.g. John Doe' }}"
                       class="w-full bg-slate-100 dark:bg-slate-900 border border-gray-300 dark:border-gray-700 rounded-lg px-3.5 py-2.5 text-adaptive-main focus:outline-none focus:border-brand-green transition">
            </div>

            <div>
                <label class="block text-adaptive-main mb-1 font-medium">{{ __('app.modal.phone') }}</label>
                <input type="tel" name="phone" required placeholder="012 xxx xxx"
                       class="w-full bg-slate-100 dark:bg-slate-900 border border-gray-300 dark:border-gray-700 rounded-lg px-3.5 py-2.5 text-adaptive-main focus:outline-none focus:border-brand-green transition">
            </div>

            <div>
                <label class="block text-adaptive-main mb-1 font-medium">{{ __('app.modal.service_type') }}</label>
                <select name="service_type"
                        class="w-full bg-slate-100 dark:bg-slate-900 border border-gray-300 dark:border-gray-700 rounded-lg px-3.5 py-2.5 text-adaptive-main focus:outline-none focus:border-brand-green transition">
                    @foreach(['residential','business','enterprise','idc','ict'] as $svc)
                    <option>{{ __('app.service_types.'.$svc) }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-adaptive-main mb-1 font-medium">{{ __('app.modal.location') }}</label>
                <input type="text" name="location" required
                       placeholder="{{ app()->getLocale() === 'km' ? 'ឧទាហរណ៍៖ ភ្នំពេញ, បាត់ដំបង...' : 'e.g. Phnom Penh, Battambang...' }}"
                       class="w-full bg-slate-100 dark:bg-slate-900 border border-gray-300 dark:border-gray-700 rounded-lg px-3.5 py-2.5 text-adaptive-main focus:outline-none focus:border-brand-green transition">
            </div>

            <div>
                <label class="block text-adaptive-main mb-1 font-medium">{{ __('app.modal.message') }}</label>
                <textarea rows="3" name="message"
                          placeholder="{{ app()->getLocale() === 'km' ? 'បញ្ជាក់ពីតម្រូវការបន្ថែម...' : 'Specify additional details...' }}"
                          class="w-full bg-slate-100 dark:bg-slate-900 border border-gray-300 dark:border-gray-700 rounded-lg px-3.5 py-2.5 text-adaptive-main focus:outline-none focus:border-brand-green transition"></textarea>
            </div>

            <div id="formNotification" class="hidden p-3 bg-brand-green/20 text-brand-green rounded-lg text-xs font-bold">
                <i class="fa-solid fa-circle-check mr-1"></i>
                {{ __('app.modal.success') }}
            </div>

            <button type="submit"
                    class="w-full gradient-brand hover:from-brand-green-hover hover:to-brand-orange-hover text-white font-bold py-3 rounded-lg text-sm transition shadow-md">
                {{ __('app.modal.submit') }}
            </button>
        </form>
    </div>
</div>
