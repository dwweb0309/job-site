@props(['title', 'description' => '', 'search_url' => '#', 'searchBox' => true, 'add_url' => null])
<div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">{{ $title }}</h1>
        <p class="mt-2 text-sm text-gray-700">{{ $description }}</p>
    </div>
    <div class="sm:ml-4 sm:flex-none">
        <label for="search" class="sr-only">Search</label>
        <div class="relative mt-1 rounded-md shadow-sm">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3"
                aria-hidden="true">
                <svg class="mr-3 h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                        clip-rule="evenodd" />
                </svg>
            </div>

            <form action="{{ $search_url }}" method="post" class="flex">
            @csrf
                <input type="text" name="q" id="search" value="{{ app('request')->input('q') }}"
                    class="block w-full rounded-md border-gray-300 py-2 pl-9 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    placeholder="Search">
                <input type="submit" hidden>
            </form>
        </div>
    </div>
    <div class="mt-4 sm:mt-0 sm:ml-4 sm:flex-none">
        @if($add_url)
        <a class="inline-flex items-center justify-center rounded-md
            border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium
            text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
            href="{{ $add_url }}">Add</a>
        @else
        <button type="button"
            class="inline-flex items-center justify-center rounded-md
                border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium
                text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                @click="isCreating = true">Add</button>
        @endif
    </div>

</div>
