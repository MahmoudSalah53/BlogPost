<div class="flex items-center">
    <button class="cursor-pointer" wire:click="save">
        @if($isSaved)
            <flux:icon.bookmark variant="solid" class="text-zinc-900 dark:text-white" />
        @else
            <flux:icon.bookmark class="text-zinc-900 dark:text-white" />
        @endif
    </button>
</div>
