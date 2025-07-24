<div>
    <!-- Hero Section -->
    <section class="bg-zinc-100 dark:bg-zinc-900 pt-10 pb-8 border-b border-zinc-200 dark:border-zinc-700">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-2xl font-bold mb-4 text-zinc-900 dark:text-white">Browse Authors</h1>

            <flux:text size="lg" class="text-zinc-600 dark:text-zinc-300 mb-8">
                Discover your favorite authors from everywhere.
            </flux:text>

            <div class="max-w-xl mx-auto mb-8">
                <flux:input type="text" placeholder="Search Authors..." icon="magnifying-glass" size="lg"
                    class="w-full" autocomplete="off" wire:model.live.debounce.300ms="search" />
            </div>
        </div>
    </section>

    <!-- Authors Grid -->
    <section class="py-8 bg-white dark:bg-zinc-900">
        <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse($authors as $author)
                <div
                    class="flex flex-col items-center bg-zinc-50 dark:bg-zinc-800 p-6 rounded-2xl border border-zinc-200 dark:border-zinc-700 shadow-sm hover:shadow-md transition">
                    @if ($author->avatar)
                        <img src="{{ asset('storage/' . $author->avatar) }}" alt="{{ $author->name }}"
                            class="mb-4 w-[50px] h-[50px] object-cover rounded-xl ring-2 ring-blue-500" />
                    @else
                        <flux:avatar :name='$author->name'/>
                    @endif


                    <flux:text size="xl" class="font-bold text-zinc-900 dark:text-white mb-2">
                        {{ $author->name }}
                    </flux:text>

                    <flux:text size="sm" class="text-zinc-500 dark:text-zinc-400 mb-4 text-center">
                        {{ $author->bio }}
                    </flux:text>

                    <div class="w-[100px] mt-2 flex justify-between">
                        <flux:button wire:click="toggleFollow({{ $author->id }})" class="rounded-full ml-4"
                            variant="primary" size="sm">
                            {{ in_array($author->id, $followings) ? 'Unfollow' : 'Follow' }}
                        </flux:button>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-zinc-500 dark:text-zinc-400">
                    <flux:text size="xl">There are no authors</flux:text>
                </div>
            @endforelse

        </div>

        <div class="mt-6">
            {{ $authors->links() }}
        </div>
    </section>
</div>
