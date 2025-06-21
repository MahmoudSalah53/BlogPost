<div>
    <button wire:click="delete"
        onclick="return confirm('Are you sure you want to delete this comment?')"
        class="text-red-500 hover:text-red-600 transition"
        title="Delete comment">
        <flux:icon.trash class="w-5 h-5" />
    </button>
</div>