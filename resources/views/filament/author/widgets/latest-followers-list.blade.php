<x-filament-widgets::widget>
    <x-filament::section>
       <div>
        @forelse ($latestFollowers as $follower)
            <div>{{ $follower->name }}</div>
        @empty
            <div>There is No Followers!</div>
        @endforelse
       </div>
    </x-filament::section>
</x-filament-widgets::widget>
