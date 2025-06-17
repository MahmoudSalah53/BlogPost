<x-public.layouts :title="__('Posts')">
    <div class="flex min-h-screen">
        <livewire:sidebar-posts />

        <div class="flex-1 flex flex-col">
            <main class="flex-1">
                <livewire:posts-list />
            </main>


</x-public.layouts>