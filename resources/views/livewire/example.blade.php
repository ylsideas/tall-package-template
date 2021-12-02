<div wire:poll.500ms class="p-12">
    <button wire:click="toggleColor" type="button" class="bg-{{ $color }}-600 hover:bg-{{ $color }}-700 focus:ring-{{ $color }}-500 inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white  focus:outline-none focus:ring-2 focus:ring-offset-2">
        {{ __('Do your best work here') }}
    </button>
</div>
