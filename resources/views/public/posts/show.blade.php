<x-public.layouts>
    <div class="max-w-3xl mx-auto px-4 py-10 space-y-8">

        {{-- title --}}
        <h1 class="text-4xl font-bold leading-tight">
            {{ $post->title }}
        </h1>

        {{-- post meta data --}}
        <div class="flex items-center justify-between text-sm text-gray-500 dark:text-gray-400">
            <div class="flex items-center space-x-4">
                @if($post->author->avatar)
                <img src="{{ asset('storage/' . $post->author->avatar) }}"
                    alt="{{ $post->author->name }}"
                    class="w-12 h-12 rounded-md ring-2 ring-blue-500 dark:ring-blue-500 object-cover border border-zinc-300 dark:border-zinc-600 shadow-sm">
                @else
                <div class="w-11 h-11 rounded-full bg-zinc-300 dark:bg-zinc-700 text-zinc-900 dark:text-white flex items-center justify-center font-semibold text-sm shadow">
                    {{ strtoupper(substr($post->author->name, 0, 1)) }}
                </div>
                @endif
                <h5 class="text-[20px] font-bold text-zinc-800 dark:text-white">{{ $post->author->name }}</h5>
                @if(auth()->id() !== $post->author->id)
                <livewire:follow-author-component :author="$post->author" />
                @endif
            </div>
            <div class="flex items-center space-x-4">
                <livewire:save-post-component :post="$post" />
                <livewire:liked-post-component :post="$post" />
            </div>
        </div>
        {{-- Featured image --}}
        @if($post->featured_image)
        <img src="{{ asset('storage/'. $post->featured_image) }}" alt="{{ $post->title }}" class="rounded-2xl w-full max-h-[500px] object-cover shadow">
        @endif
        {{-- Tags --}}
        @if($post->tags->count())
        <div class="flex flex-wrap gap-2 mt-4">
            @php
            $colors = ['blue', 'green', 'red', 'yellow', 'purple', 'pink', 'indigo'];
            @endphp

            @foreach($post->tags as $tag)
            @php
            $index = crc32($tag->name) % count($colors);
            $color = $colors[$index];
            @endphp
            <flux:badge color="{{ $color }}" variant="subtle" size="lg">
                {{ $tag->name }}
            </flux:badge>
            @endforeach
        </div>
        @endif


        {{-- post content --}}
        <article class="prose dark:prose-invert max-w-none text-lg">
            {{ $post->content }}
        </article>
        {{-- comments section --}}
        <livewire:add-comment-component :post-id="$post->id" />
    </div>



</x-public.layouts>