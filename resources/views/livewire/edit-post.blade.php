<div class="max-w-7xl mx-auto p-6" xmlns:flux="http://www.w3.org/1999/xlink">
    <!-- Header -->
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-3xl font-bold mb-1 text-foreground">Edit Post</h1>
        <flux:button>
            <a wire:navigate href="{{ route('author.posts.index') }}"
               class="flex items-center gap-1 text-sm text-muted-foreground hover:text-primary transition">
                <flux:icon.arrow-left class="size-2.5"/>
                Back to Home
            </a>
        </flux:button>
    </div>
    @if ($errors->any())
        <div class="text-red-500">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form wire:submit.prevent="save">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Left Side -->
            <div class="w-full lg:w-2/3 space-y-4">
                <div class="space-y-1">
                    <flux:field>
                        <flux:label>Post Title</flux:label>
                        <flux:input wire:model.live="title"/>
                        <flux:text class="text-sm">Slug: {{ $slug ? $slug: '' }}</flux:text>
                        <flux:error name="title"/>
                    </flux:field>
                </div>

                <div class="space-y-1">
                    <flux:field>
                        <flux:textarea wire:model="content" rows="12" label="Post Content">

                        </flux:textarea>
                    </flux:field>
                </div>
                <div class="flex  mt-6">
                    <flux:button type="submit">Save</flux:button>
                </div>
            </div>

            <!-- Right Side -->
            <div class="w-full lg:w-1/3 space-y-6 dark:bg-[#3C3C3C] px-6 py-6 rounded-md">
                <!-- Publish Settings -->
                <div class="card">
                    <div class="card-header">
                        <h2 class="font-bold text-2xl mb-2">Publish Settings</h2>
                    </div>
                    <div class=" space-y-4">
                        <flux:separator/>
                        {{-- Choose category --}}
                        <div class="space-y-1">
                            <flux:checkbox.group wire:model="categories" label="Choose Category">
                                <div class="flex gap-4 *:gap-x-2 flex-wrap">
                                    @foreach($allCategories as $category)
                                        <flux:checkbox label="{{ $category->name }}" value="{{ $category->id }}"
                                                       wire:key="{{ $category->id }}"/>
                                    @endforeach
                                </div>
                            </flux:checkbox.group>
                        </div>
                    </div>
                </div>
                <flux:separator/>

                <!-- Featured Image -->
                <div class="card">
                    <flux:fieldset>
                        <flux:label> Featured Image</flux:label>
                        @if($currentImage)
                            <div class="relative mt-1">
                                <input type="hidden" name="currentImg" value="{{ $currentImage }}"/>
                                <img src="{{ asset('storage/' . $currentImage) }}"
                                     class="rounded-lg border shadow w-full object-cover h-48"/>
                                <button type="button" wire:click="rvCurrentImg"
                                        class="absolute top-1 right-1 bg-red-500 hover:bg-red-600 text-white rounded-full p-1">
                                    <flux:icon.x-mark name="x" class="w-4 h-4"/>
                                </button>
                            </div>
                        @elseif($uploadedImage)
                            <div class="relative mt-1">
                                <img src="{{ $uploadedImage->temporaryUrl() }}"
                                     class="rounded-lg border shadow w-full object-cover h-48"/>
                                <button type="button" wire:click="rvUploadedImg"
                                        class="absolute top-1 right-1 bg-red-500 hover:bg-red-600 text-white rounded-full p-1">
                                    <flux:icon.x-mark name="x" class="w-4 h-4"/>
                                </button>
                            </div>
                        @else
                            <div
                                x-data="{ uploading: false, progress: 0 }"
                                x-on:livewire-upload-start="uploading = true"
                                x-on:livewire-upload-finish="uploading = false"
                                x-on:livewire-upload-cancel="uploading = false"
                                x-on:livewire-upload-error="uploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress"
                            >
                                <div>
                                    <label
                                        class="cursor-pointer border-2 border-dashed rounded-lg p-4 text-center text-muted-foreground hover:border-primary block">
                                        <div>
                                            <flux:icon.arrow-up-tray class="mx-auto w-8 h-8"/>
                                            <p class="mt-2 text-sm">Click to upload</p>
                                        </div>
                                        <input wire:model="featured_image" type="file" class="hidden">
                                    </label>
                                    <flux:error name="featured_image"/>
                                </div>
                                <!-- Progress Bar -->
                                <template x-if="progress">
                                    <div class="w-full mt-2">
                                        <div
                                            class="w-full bg-gray-200 dark:bg-green-100 rounded-full h-4 overflow-hidden">
                                            <div
                                                class="bg-green-500 h-full transition-all duration-500"
                                                :style="'width: ' + progress + '%'">
                                            </div>
                                        </div>

                                        <div class="text-center text-sm text-gray-700 dark:text-gray-300 mt-1">
                                            <span x-text="progress + '%'"></span>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        @endif
                        <flux:error name="uploadedImage"/>
                    </flux:fieldset>
                </div>
                <flux:separator/>
                <!-- Tags -->
                <div class="card">
                    <flux:checkbox.group wire:model="tags" label="Tags">
                        <div class="flex gap-4 *:gap-x-2 flex-wrap">
                            @foreach($allTags as $tag)
                                <flux:checkbox label="{{ $tag->name }}"
                                               value="{{ $tag->id }}"
                                               wire:key="{{ $tag->id }}"/>
                            @endforeach
                        </div>
                    </flux:checkbox.group>
                </div>
            </div>
        </div>
    </form>
</div>
