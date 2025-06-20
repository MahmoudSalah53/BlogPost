<div class="flex items-center">
    <button class="cursor-pointer" wire:click="save">
        @if($isSaved)
            <flux:icon.bookmark variant="solid" class="text-amber-600 dark:text-amber-400" />
        @else
            <flux:icon.bookmark class="text-amber-600 dark:text-amber-400" />
        @endif
    </button>
</div>
