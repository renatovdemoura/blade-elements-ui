@props(['title', 'description' => null, 'icon' => null, 'buttonAction', 'buttonText', 'secondaryButtonAction', 'secondaryButtonText', 'inline' => false])

<div class="flex flex-col h-full">
    <div class="flex-1 h-0 overflow-y-auto" id="formScroll">
        <header class="{{ $inline ? 'p-4 pb-0 ' : 'p-4 _bg-gradient-to-tr _from-blurple bg-black _to-blurplemax text-white ' }} dark:from-gray-800 dark:to-gray-800 sm:px-6">
            <div class="flex items-center justify-between space-x-3">
                <h2 class="flex items-center text-lg font-medium leading-7">
                    @if($icon)
                    <x-icon :name="$icon" class="inline w-6 h-6 mr-4" />
                    @endif
                    <span class="max-w-sm truncate">{{ $title }}</span>
                </h2>
                @unless($inline)
                <div class="flex items-center h-7">
                    <button wire:click="$emit('closeModal')" aria-label="Close panel" class="transition duration-150 ease-in-out opacity-50 focus:outline-none hover:opacity-75">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                @endunless
            </div>
            @if($description)
            <p class="text-sm {{ $inline ? 'text-gray-500 max-w-xl' : 'text-white opacity-80 max-w-lg mt-1' }}">{{ $description }}</p>
            @endif
        </header>
        <form {{ $attributes->merge(['class' => 'p-6 space-y-5']) }}>
            {{ $slot }}
        </form>
    </div>
    @if(isset($buttonAction) || isset($secondaryButtonAction))
    <div class="flex items-center justify-between flex-shrink-0 p-5 space-x-2 border-t">
        @unless($inline)
        <x-ui::button color="secondary" wire:click="$emit('closeModal')">
            Cancelar
        </x-ui::button>
        @else
        <div></div>
        @endunless

        <div class="space-x-2 items-center flex">
            @isset($secondaryButtonAction, $secondaryButtonText)
            <x-ui::button loadingFeedback color="secondary" wire:click="{{ $secondaryButtonAction }}">
                {{ $secondaryButtonText }}
            </x-ui::button>
            @endisset
            @isset($buttonAction)
            <x-ui::button loadingFeedback wire:click="{{ $buttonAction }}">
                {{ $buttonText }}
            </x-ui::button>
            @endisset
        </div>
    </div>
    @endif
</div>
