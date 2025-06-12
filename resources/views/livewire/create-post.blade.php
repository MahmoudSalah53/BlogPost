<div>
    <div class="max-w-4xl mx-auto py-10">
        @if (session()->has('success'))
        <div class="p-4 mb-4 text-green-700 bg-green-100 rounded">
            {{ session('success') }}
        </div>
        @endif

        <form wire:submit.prevent="save" class="grid gap-6">

            {{-- Title --}}
            <div>
                <flux:label for="title">Title</flux:label>
                <flux:input id="title" wire:model.defer="title" type="text" placeholder="Post title" />
                @error('title') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
            </div>

            {{-- Slug --}}
            <div>
                <flux:label for="slug">Slug</flux:label>
                <div class="flex gap-2">
                    <flux:input id="slug" wire:model.defer="slug" type="text" placeholder="Slug" />
                    <flux:button type="button" wire:click="generateSlug" variant="outline">Generate</flux:button>
                </div>
                @error('slug') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
            </div>

            {{-- Content --}}
            <div>
                <flux:label for="content">Content</flux:label>
                <flux:textarea id="content" wire:model.defer="content" rows="6" placeholder="Write your content..." />
                @error('content') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
            </div>

            {{-- Featured Image --}}
            <div>
                <flux:label for="featured_image">Featured Image</flux:label>
                <input type="file" id="featured_image" wire:model="featured_image"
                    class="border border-gray-300 rounded-lg p-2 w-full dark:bg-zinc-800 dark:border-zinc-700">
                @error('featured_image') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

                @if ($featured_image)
                <div class="mt-3">
                    <img src="{{ $featured_image->temporaryUrl() }}" class="rounded-lg w-64">
                </div>
                @endif
            </div>

            {{-- Categories --}}
            <div class="grid gap-2">
                <flux:label for="categories">Categories</flux:label>
                <flux:select id="categories" wire:model="categories" wire:change="changeCategory($event.target.value)">
                    <option value="0" selected>-- Select Category --</option>
                    @foreach ($allCategories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </flux:select>
                @error('categories')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            {{-- Tags --}}
            <div class="grid gap-2">
                <flux:label for="tags">Tags</flux:label>
                <flux:select id="tags" wire:model="tags" wire:change="changeTag($event.target.value)">
                    <option value="0" selected>-- Select Tag --</option>
                    @foreach ($allTags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </flux:select>
                @error('tags')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            @push('scripts')
            <script>
                document.addEventListener('livewire:initialized', () => {
                    Livewire.on('resetSelects', () => {
                        document.getElementById('categories').value = '0';
                        document.getElementById('tags').value = '0';
                    });
                });
            </script>
            @endpush

            {{-- Submit --}}
            <div class="flex justify-end">
                <flux:button type="submit">Save Post</flux:button>
            </div>

        </form>

    </div>

</div>