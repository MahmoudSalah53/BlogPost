<div>
    <flux:icon name="trash" class="hover:text-red-500 cursor-pointer" x-data
        x-on:click="if (confirm('Are you sure you want to remove this Save ?')) { $wire.removeSavedPost() }" />
</div>