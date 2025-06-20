<div class="flex items-center">
    <button class="cursor-pointer" wire:click="save">
        @if($isLiked)
            <flux:icon.hand-thumb-up variant="solid" class="text-zinc-900 dark:text-white" />
        @else
            <flux:icon.hand-thumb-up class="text-zinc-900 dark:text-white" />
        @endif
    </button>
</div>
