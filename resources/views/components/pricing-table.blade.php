@props([
    'hasMonthly' => true,
    'hasAnnual' => false,
    'anualDiscount' => 20,
    'defaultPrice' => 'monthly'
])
<div x-data="{'show': '{{ $defaultPrice }}'}" x-cloak>
    @if($hasMonthly && $hasAnnual)
    <div class="flex justify-center">
        <div class="relative self-center mb-8 bg-gray-200 rounded-lg p-0.5 flex sm:mt-8">
            <button @click="show='monthly'" :class="show==='monthly' ? 'bg-white text-primary-600 font-bold shadow-sm border border-gray-200' : 'text-gray-700 font-medium border-transparent'" type="button" class="relative w-1/2 rounded-md py-2 text-sm whitespace-nowrap focus:outline-none focus:ring-2 focus:ring-primary-500 focus:z-10 sm:w-auto sm:px-8">Mensal</button>
            <button @click="show='annually'" :class="show==='annually' ? 'bg-white text-primary-600 font-bold shadow-sm border border-gray-200' : 'text-gray-700 font-medium border-transparent'" type="button" class="ml-0.5 relative w-1/2 rounded-md py-2 text-sm whitespace-nowrap focus:outline-none focus:ring-2 focus:ring-primary-500 focus:z-10 sm:w-auto sm:px-8">Anual ({{ $anualDiscount }}% OFF)</button>
          </div>
    </div>
    @endif
    <div class="space-y-4 sm:space-y-0 sm:grid sm:grid-cols-2 sm:gap-6 lg:max-w-4xl lg:mx-auto xl:max-w-none xl:mx-0 xl:grid-cols-4">
        {{ $slot }}
    </div>
</div>
