@props(['title', 'description' => false, 'cta' => false, 'target' => '#', 'searchBox' => false])


<div class="md:flex md:items-center md:justify-between">
    <div class="min-w-0 flex-1">
        <h1 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">
            {{ $title }}</h1>
        @if ($description)
            <p class="mt-2 text-sm text-gray-700">{{ $description }}</p>
        @endif
        {{ $slot }}
    </div>
    <div class="mt-4 flex md:mt-0 md:ml-4 items-center">
        @if ($searchBox)
            <div class="mr-3">
                <x-search />
            </div>
        @endif

        @if ($cta)
            <a href="{{ $target }}">
                <x-button>{{ $cta }}</x-button>
            </a>
        @endif
    </div>
</div>
