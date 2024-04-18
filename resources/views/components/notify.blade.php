<div x-data="{ show: false, message: 'Salvo', variant: 'success' }" x-cloak x-on:notify-user.window="message=$event.detail; setTimeout(() => show = true, 500); setTimeout(() => show = false, 4200)" @if(session()->has('notify-user')) x-init="$nextTick(() => $dispatch('notify-user', '{{ session()->get('notify-user') }}'))" @endif aria-live="assertive" class="fixed inset-0 z-20 flex items-end px-4 py-6 pointer-events-none sm:p-6 sm:items-start">
    <div class="flex flex-col items-center w-full text-center">
        <div x-show="show" x-transition:enter="transform ease-out duration-400 transition" x-transition:enter-start="-translate-y-5 opacity-0" x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="w-full max-w-sm overflow-hidden pointer-events-auto">
            <div class="flex justify-center">
                <span x-text="message" class="px-8 py-3 text-xl font-medium text-white bg-gray-800 rounded-full bg-opacity-90"></span>
            </div>
        </div>
    </div>
</div>
