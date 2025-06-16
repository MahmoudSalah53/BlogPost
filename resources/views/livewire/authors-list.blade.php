<div>
    <!-- Hero Section -->
    <section class="bg-zinc-100 dark:bg-zinc-900 py-12">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <flux:text as="h1" size="5xl" class="font-bold mb-4 text-zinc-900 dark:text-white">
                Browse Authors
            </flux:text>

            <flux:text size="lg" class="text-zinc-600 dark:text-zinc-300 mb-8">
                Discover the beautiful works of your favorite authors.
            </flux:text>

            <div class="max-w-xl mx-auto mb-8">
                <flux:input
                    type="text"
                    placeholder="Search Authors..."
                    icon="magnifying-glass"
                    size="lg"
                    class="w-full"
                    autocomplete="off"
                    wire:model.live="search" />
            </div>
        </div>
    </section>

    <!-- Authors Grid -->
    <section class="py-8 bg-white dark:bg-zinc-900">
        <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse($authors as $author)
            <div class="flex flex-col items-center bg-zinc-50 dark:bg-zinc-800 p-6 rounded-2xl border border-zinc-200 dark:border-zinc-700 shadow-sm hover:shadow-md transition">
                <img
                    src="{{ $author->avatar ? asset('storage/'.$author->avatar) : 'https://www.gravatar.com/avatar/?d=mp'}}"
                    alt="John Doe"
                    class="mb-4 w-[50px] h-[50px] object-cover rounded-xl ring-2 ring-blue-500" />
                <flux:text size="xl" class="font-bold text-zinc-900 dark:text-white mb-2">
                    {{ $author->name }}
                </flux:text>
                <flux:text size="sm" class="text-zinc-500 dark:text-zinc-400 mb-4 text-center">
                    {{ $author->bio }}
                </flux:text>
                <flux:text size="xs" class="text-zinc-400 dark:text-zinc-500">
                    {{ $author->created_at }}
                </flux:text>
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