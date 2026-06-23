<x-layouts.main>
    <x-slot:title>
        Welcome to StoryHub
        </x-slot>

        <div class="text-center">
            @include('frontend.landing.menu.hero')
            @include('frontend.landing.menu.trending-section')
            @include('frontend.landing.menu.category-section')
            @include('frontend.landing.menu.latest-section')
        </div>
</x-layouts.main>