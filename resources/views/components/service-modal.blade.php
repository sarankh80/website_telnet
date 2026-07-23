<!-- Service Request Modal -->
<div id="serviceModal" class="fixed inset-0 bg-black/80 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
    <div class="glass-card w-full max-w-lg rounded-2xl border border-gray-700 p-6 relative">
        <button onclick="closeModal('serviceModal')" class="absolute top-4 right-4 text-gray-400 hover:text-white text-xl transition">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <h3 class="text-xl font-bold text-adaptive-main mb-1">
            <i class="fa-solid fa-file-signature text-brand-green mr-2"></i>
            <span data-km="{{ __('app.modal.title') }}" data-en="Request Internet Connection">{{ __('app.modal.title') }}</span>
        </h3>
        <p class="text-xs text-adaptive-muted mb-6"
           data-km="{{ __('app.modal.desc') }}" data-en="Please fill out the form below, our team will contact you shortly">
            {{ __('app.modal.desc') }}
        </p>

        <form id="serviceRequestForm" action="{{ route('service.request') }}" method="POST" onsubmit="handleFormSubmit(event)" class="space-y-4 text-xs">
            @csrf
            <div>
                <label class="block text-adaptive-main mb-1 font-medium"
                       data-km="{{ __('app.modal.name') }}" data-en="Full Name *">{{ __('app.modal.name') }}</label>
                <input type="text" name="full_name" required
                       data-km-ph="ឧទាហរណ៍៖ សុខ ជា" data-en-ph="e.g. John Doe"
                       placeholder="ឧទាហរណ៍៖ សុខ ជា"
                       class="w-full bg-slate-100 dark:bg-slate-900 border border-gray-300 dark:border-gray-700 rounded-lg px-3.5 py-2.5 text-adaptive-main focus:outline-none focus:border-brand-green transition">
            </div>

            <div>
                <label class="block text-adaptive-main mb-1 font-medium"
                       data-km="{{ __('app.modal.phone') }}" data-en="Phone Number *">{{ __('app.modal.phone') }}</label>
                <input type="tel" name="phone" required
                       data-km-ph="012 xxx xxx" data-en-ph="012 xxx xxx"
                       placeholder="012 xxx xxx"
                       class="w-full bg-slate-100 dark:bg-slate-900 border border-gray-300 dark:border-gray-700 rounded-lg px-3.5 py-2.5 text-adaptive-main focus:outline-none focus:border-brand-green transition">
            </div>

            <div>
                <label class="block text-adaptive-main mb-1 font-medium"
                       data-km="{{ __('app.modal.service_type') }}" data-en="Service Type *">{{ __('app.modal.service_type') }}</label>
                <select name="service_type"
                        class="w-full bg-slate-100 dark:bg-slate-900 border border-gray-300 dark:border-gray-700 rounded-lg px-3.5 py-2.5 text-adaptive-main focus:outline-none focus:border-brand-green transition">
                    <option data-km="អ៉ីនធឺណិតលំនៅដ្ឋាន (FTTH)" data-en="Residential Internet (FTTH)">អ៉ីនធឺណិតលំនៅដ្ឋាន (FTTH)</option>
                    <option data-km="អ៉ីនធឺណិតអាជីវកម្ម (FTTB / FTTO)" data-en="Business Internet (FTTB / FTTO)">អ៉ីនធឺណិតអាជីវកម្ម (FTTB / FTTO)</option>
                    <option data-km="អ៉ីនធឺណិតសហគ្រាស (FTTX Dedicated)" data-en="Enterprise Dedicated (FTTX)">អ៉ីនធឺណិតសហគ្រាស (FTTX Dedicated)</option>
                    <option data-km="សេវា IDC / មណ្ឌលទិន្នន័យ" data-en="IDC / Data Center Services">សេវា IDC / មណ្ឌលទិន្នន័យ</option>
                    <option data-km="ដំណោះស្រាយ ICT & Network Project" data-en="ICT Solutions & Network Project">ដំណោះស្រាយ ICT & Network Project</option>
                </select>
            </div>

            <div>
                <label class="block text-adaptive-main mb-1 font-medium"
                       data-km="{{ __('app.modal.location') }}" data-en="Location / Province *">{{ __('app.modal.location') }}</label>
                <input type="text" name="location" required
                       data-km-ph="ឧទាហរណ៍៖ ភ្នំពេញ, បាត់ដំបង, ស្វាយរៀង..." data-en-ph="e.g. Phnom Penh, Battambang..."
                       placeholder="ឧទាហរណ៍៖ ភ្នំពេញ, បាត់ដំបង, ស្វាយរៀង..."
                       class="w-full bg-slate-100 dark:bg-slate-900 border border-gray-300 dark:border-gray-700 rounded-lg px-3.5 py-2.5 text-adaptive-main focus:outline-none focus:border-brand-green transition">
            </div>

            <div>
                <label class="block text-adaptive-main mb-1 font-medium"
                       data-km="{{ __('app.modal.message') }}" data-en="Additional Message / Note">{{ __('app.modal.message') }}</label>
                <textarea rows="3" name="message"
                          data-km-ph="បញ្ជាក់ពីតម្រូវការបន្ថែម..." data-en-ph="Specify additional details..."
                          placeholder="បញ្ជាក់ពីតម្រូវការបន្ថែម..."
                          class="w-full bg-slate-100 dark:bg-slate-900 border border-gray-300 dark:border-gray-700 rounded-lg px-3.5 py-2.5 text-adaptive-main focus:outline-none focus:border-brand-green transition"></textarea>
            </div>

            <div id="formNotification" class="hidden p-3 bg-brand-green/20 text-brand-green rounded-lg text-xs font-bold">
                <i class="fa-solid fa-circle-check mr-1"></i>
                <span data-km="{{ __('app.modal.success') }}" data-en="Your request has been submitted successfully! The TELNET team will contact you shortly.">
                    {{ __('app.modal.success') }}
                </span>
            </div>

            <button type="submit"
                    class="w-full bg-gradient-to-r from-brand-green to-brand-orange hover:from-brand-green-hover hover:to-brand-orange-hover text-white font-bold py-3 rounded-lg text-sm transition shadow-md"
                    data-km="{{ __('app.modal.submit') }}" data-en="Submit Request">
                {{ __('app.modal.submit') }}
            </button>
        </form>
    </div>
</div>
