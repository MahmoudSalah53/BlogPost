<x-public.layouts :title="__('Categories')">

    <!-- Hero Section -->
    <section class="bg-zinc-100 dark:bg-zinc-800 py-12">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <flux:text as="h1" size="5xl" class="font-bold mb-4 text-zinc-900 dark:text-white">
                Browse Categories
            </flux:text>

            <flux:text size="lg" class="text-zinc-600 dark:text-zinc-300 mb-8">
                Explore all available categories to find posts you love
            </flux:text>

            <div class="max-w-xl mx-auto">
                <flux:input
                    type="text"
                    placeholder="Search posts..."
                    icon="magnifying-glass"
                    size="lg"
                    class="w-full" />
            </div>
        </div>
    </section>

    <livewire:categories-list />


</x-public.layouts>