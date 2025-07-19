<div 
    x-data="{ 
        isFollowing: @entangle('isFollowing'),
        authorId: {{ $author->id }}
    }"
    x-on:follow-status-changed.window="
        if ($event.detail.authorId === authorId) {
            isFollowing = $event.detail.isFollowing;
        }
    "
    class="inline-block"
>
    <!-- Follow / Unfollow Button -->
    <button 
        wire:click="save"
        wire:loading.remove
        x-text="isFollowing ? 'Unfollow' : 'Follow'"
        class="px-4 py-1 text-sm font-semibold rounded-full transition-all duration-200 ease-in-out
               focus:outline-none focus:ring-2 focus:ring-offset-2
               bg-blue-600 text-white hover:bg-blue-700
               dark:bg-blue-500 dark:hover:bg-blue-600"
    ></button>

    <!-- Loading Spinner -->
    <button 
        disabled
        wire:loading
        wire:target="save"
        class="px-4 py-1 text-sm font-semibold rounded-full bg-gray-300 dark:bg-gray-600 text-gray-700 dark:text-white flex items-center justify-center"
    >
        <svg class="w-4 h-4 animate-spin text-gray-600 dark:text-white" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
        </svg>
    </button>
</div>