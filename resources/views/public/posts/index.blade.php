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
                <livewire:posts-list />
            </main>


</x-public.layouts>