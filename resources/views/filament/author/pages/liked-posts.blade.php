<x-filament-panels::page>
    @vite(['resources/css/liked-posts.css'])

    <div class="posts-grid">
        @forelse($this->likedPosts as $post)
            <article class="post-card">
                @if($post->featured_image)
                    <div class="post-image">
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($post->featured_image) }}"
                            alt="{{ $post->title }}">
                    </div>
                @endif

                <div class="post-content">
                    <div class="post-header">
                        <span class="post-date">
                            {{ $post->created_at->format('M d, Y') }}
                        </span>
                    </div>

                    <h3 class="post-title">
                        {{ Str::limit($post->title, 30) }}
                    </h3>

                    <p class="post-excerpt">
                        {{ Str::limit(strip_tags($post->content), 120) }}
                    </p>

                    <div class="post-meta">
                        <div class="author-info">
                            <img src="{{ $post->author->avatar ? \Illuminate\Support\Facades\Storage::url($post->author->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($post->author->name) }}"
                                alt="{{ $post->author->name }}" class="author-avatar">
                            <span class="author-name">
                                {{ $post->author->name }}
                            </span>
                        </div>
                    </div>

                    @if($post->categories->count() > 0)
                        <div class="post-categories">
                            @foreach($post->categories->take(3) as $category)
                                <span class="category-tag">
                                    {{ $category->name }}
                                </span>
                            @endforeach
                        </div>
                    @endif

                    <div class="post-actions">
                        <div class="action-buttons">
                            <button wire:click="toggleLike({{ $post->id }})" wire:loading.attr="disabled"
                                wire:target="toggleLike({{ $post->id }})"
                                class="action-btn {{ auth()->user()->likedPosts()->where('post_id', $post->id)->exists() ? 'liked' : '' }}">

                                <svg wire:loading wire:target="toggleLike({{ $post->id }})" class="loading-spinner"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>

                                <svg wire:loading.remove wire:target="toggleLike({{ $post->id }})"
                                    fill="{{ auth()->user()->likedPosts()->where('post_id', $post->id)->exists() ? 'currentColor' : 'none' }}"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                    </path>
                                </svg>
                                <span>{{ $post->likedByUsers()->count() }}</span>
                            </button>

                            <button wire:click="toggleSave({{ $post->id }})" wire:loading.attr="disabled"
                                wire:target="toggleSave({{ $post->id }})"
                                class="action-btn {{ auth()->user()->savedPosts()->where('post_id', $post->id)->exists() ? 'saved' : '' }}">

                                <svg wire:loading wire:target="toggleSave({{ $post->id }})" class="loading-spinner"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>

                                <svg wire:loading.remove wire:target="toggleSave({{ $post->id }})"
                                    fill="{{ auth()->user()->savedPosts()->where('post_id', $post->id)->exists() ? 'currentColor' : 'none' }}"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                                </svg>
                            </button>
                        </div>

                        <a href="/blog/{{ $post->slug }}" target="_blank" class="read-more-btn">
                            Read More
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </article>
        @empty
            <div class="empty-state">
                <div class="empty-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                        </path>
                    </svg>
                </div>
                <h3 class="empty-title">No Liked Posts</h3>
                <p class="empty-description">You haven't liked any posts yet. Start exploring and like posts you enjoy!</p>
            </div>
        @endforelse
    </div>

    <div class="pagination-wrapper">
        {{ $this->likedPosts->links() }}
    </div>
</x-filament-panels::page>