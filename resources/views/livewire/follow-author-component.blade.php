@if($isFollowing)
    <div wire:key="unfollow">
        <flux:button size="sm" wire:click="save" class="rounded-full ml-4">
            Unfollow
        </flux:button>
    </div>
@else
    <div wire:key="follow">
        <flux:button variant="primary" size="sm" wire:click="save" style="border-radios: 100%;">
            Follow
        </flux:button>
    </div>
@endif
