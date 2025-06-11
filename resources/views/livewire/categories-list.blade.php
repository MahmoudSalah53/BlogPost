<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($categories as $category)
            <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-sm p-6 text-center">
                <flux:text as="h3" size="xl" class="font-semibold text-zinc-800 dark:text-white mb-2">
                    {{ $category->name }}
                </flux:text>
                <flux:badge color="blue">
                    37
                </flux:badge>
            </div>
        @empty
            <div class="col-span-full text-center text-zinc-500 dark:text-zinc-400">
                <flux:text size="xl">No categories available</flux:text>
            </div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $categories->links() }}
    </div>
</div>

</div>