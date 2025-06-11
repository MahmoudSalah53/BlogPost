<x-public.layouts :title="__('Posts')">
    <div class="flex min-h-screen">
        <flux:sidebar sticky stashable
            class="bg-zinc-50 dark:bg-zinc-900 border-r rtl:border-r-0 rtl:border-l border-zinc-200 dark:border-zinc-700 w-64">

            <div class="px-4 py-4 space-y-8">

                <div>
                    <flux:text as="h3" size="lg" class="font-bold text-zinc-800 dark:text-white mb-3">
                        Categories
                    </flux:text>
                    <flux:navlist variant="ghost" class="space-y-1">
                        <flux:navlist.item icon="list-bullet" current>All</flux:navlist.item>
                        <flux:navlist.item icon="server">Backend</flux:navlist.item>
                        <flux:navlist.item icon="paint-brush">Frontend</flux:navlist.item>
                        <flux:navlist.item icon="server">Database</flux:navlist.item>
                    </flux:navlist>
                </div>

                <div>
                    <flux:text as="h3" size="lg" class="font-bold text-zinc-800 dark:text-white mb-3">
                        Tags
                    </flux:text>
                    <div class="flex flex-wrap gap-2">
                        <flux:badge color="blue" clickable>#Laravel</flux:badge>
                        <flux:badge color="emerald" clickable>#PHP</flux:badge>
                        <flux:badge color="purple" clickable>#Vue</flux:badge>
                        <flux:badge color="sky" clickable>#Tailwind</flux:badge>
                        <flux:badge color="amber" clickable>#React</flux:badge>
                        <flux:badge color="rose" clickable>#MySQL</flux:badge>
                    </div>
                </div>

                <div>
                    <flux:text as="h3" size="lg" class="font-bold text-zinc-800 dark:text-white mb-3">
                        Date
                    </flux:text>
                    <flux:navlist variant="ghost" class="space-y-1">
                        <flux:navlist.item icon="clock">Last 24 Hours</flux:navlist.item>
                        <flux:navlist.item icon="calendar-days">This Week</flux:navlist.item>
                        <flux:navlist.item icon="calendar">This Month</flux:navlist.item>
                        <flux:navlist.item icon="calendar">This Year</flux:navlist.item>
                    </flux:navlist>
                </div>

                <div class="pt-2">
                    <flux:button variant="outline" icon="arrow-path">
                        Reset All Filters
                    </flux:button>
                </div>

            </div>
        </flux:sidebar>

        <div class="flex-1 flex flex-col">
            <main class="flex-1">
                <!-- Hero Section -->
                <section class="bg-zinc-100 dark:bg-zinc-800 py-12">
                    <div class="max-w-4xl mx-auto px-4 text-center">
                        <flux:text as="h1" size="5xl" class="font-bold mb-4 text-zinc-900 dark:text-white">
                            Community Posts
                        </flux:text>

                        <flux:text size="lg" class="text-zinc-600 dark:text-zinc-300 mb-8">
                            Discover what our community is sharing. Engage with developers worldwide.
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

                <!-- Posts Feed -->
                <section class="py-8 bg-white dark:bg-zinc-900">
                    <div class="max-w-2xl mx-auto px-4 space-y-6">

                        <livewire:posts-list />
                    </div>
                </section>

            </main>


</x-public.layouts>