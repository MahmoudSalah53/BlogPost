<div>
    <!-- Hero Section -->
    <section class="bg-zinc-100 dark:bg-zinc-800 py-12">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <flux:text as="h1" size="5xl" class="font-bold mb-4 text-zinc-900 dark:text-white">
                Browse Categories
            </flux:text>

            <flux:text size="lg" class="text-zinc-600 dark:text-zinc-300 mb-8">
                Explore all available categories to find posts you love
            </flux:text>

            <div class="max-w-xl mx-auto mb-8">
                <flux:input
                    type="text"
                    placeholder="Search categories..."
                    icon="magnifying-glass"
                    size="lg"
                    class="w-full"
                    wire:model.live="search" />
            </div>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($categories as $category)
            <div class="bg-white dark:bg-zinc-700 rounded-xl shadow-sm p-6 text-center">
                <flux:text as="h3" size="xl" class="font-semibold text-zinc-800 dark:text-white mb-2">
                    {{ $category->name }}
                </flux:text>
                <flux:badge>
                    37
                </flux:badge>
            </div>
            @empty
            <div class="col-span-full text-center text-zinc-500 dark:text-zinc-400">
                <flux:text size="xl">No categories available</flux:text>
            </div>
            @endforelse
        </div>

        <div class="mt-6">
            {{ $categories->links() }}
        </div>
    </div>
</div>
