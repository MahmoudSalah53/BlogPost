<flux:button
    wire:click="save"
    class="rounded-full ml-4"
    variant="primary"
    size="sm"
>
    {{ $isFollowing ? 'Unfollow' : 'Follow' }}
</flux:button>
