@props(['headline', 'description'])

<div class="bg-white">

    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $headline }}</h1>
        @if($description)<p class="mt-4 max-w-xl text-sm text-gray-700">{{ $description }}</p>@endif
      </div>

    <!-- Filters -->
    <section aria-labelledby="filter-heading">
        <h2 id="filter-heading" class="sr-only">Filters</h2>

        <div class="relative z-10 bg-white pb-4 mt-8">
            <div class=" mx-auto flex items-center justify-between">
                <div class="relative inline-block text-left" x-data="{ isFilterOpen: false }">
                    <div>
                        <button @click="isFilterOpen = ! isFilterOpen" @click.outside="isFilterOpen = false"
                            type="button"
                            class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
                            id="menu-button" aria-expanded="false" aria-haspopup="true">
                            Sort
                            <!-- Heroicon name: solid/chevron-down -->
                            <svg class="flex-shrink-0 -mr-1 ml-1 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>

                    <div x-show="isFilterOpen" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="origin-top-left absolute left-0 mt-2 w-40 rounded-md shadow-2xl bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                        role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                        <div class="py-1" role="none">
                            <!--
                Active: "bg-gray-100", Not Active: ""

                Selected: "font-medium text-gray-900", Not Selected: "text-gray-500"
              -->
                            <a href="#" class="font-medium text-gray-900 block px-4 py-2 text-sm" role="menuitem"
                                tabindex="-1" id="menu-item-0"> Most Popular </a>

                            <a href="#" class="text-gray-500 block px-4 py-2 text-sm" role="menuitem"
                                tabindex="-1" id="menu-item-1"> Highest Salary </a>

                            <a href="#" class="text-gray-500 block px-4 py-2 text-sm" role="menuitem"
                                tabindex="-1" id="menu-item-2"> Newest </a>
                        </div>
                    </div>
                </div>

                <!-- Mobile filter dialog toggle, controls the 'mobileFiltersOpen' state. -->
                <button type="button"
                    class="inline-block text-sm font-medium text-gray-700 hover:text-gray-900 sm:hidden">Filters</button>

                <div class="hidden sm:block">
                    <div class="flow-root">
                        <div class="-mx-4 flex items-center divide-x divide-gray-200" x-data="{ isLocationOpen: false }">
                            <div class="px-4 relative inline-block text-left">
                                <button @click="isLocationOpen = ! isLocationOpen"
                                    @click.outside="isLocationOpen = false" type="button"
                                    class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
                                    aria-expanded="false">
                                    <span>Location</span>

                                    <span
                                        class="ml-1.5 rounded py-0.5 px-1.5 bg-gray-200 text-xs font-semibold text-gray-700 tabular-nums">1</span>
                                    <!-- Heroicon name: solid/chevron-down -->
                                    <svg class="flex-shrink-0 -mr-1 ml-1 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>

                                <div x-show="isLocationOpen" x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    class="origin-top-right absolute right-0 mt-2 bg-white rounded-md shadow-2xl p-4 ring-1 ring-black ring-opacity-5 focus:outline-none">
                                    <form class="space-y-4">
                                        <div class="flex items-center">
                                            <input id="filter-category-0" name="category[]" value="new-arrivals"
                                                type="checkbox"
                                                class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-category-0"
                                                class="ml-3 pr-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                Dubai </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-category-1" name="category[]" value="tees"
                                                type="checkbox"
                                                class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-category-1"
                                                class="ml-3 pr-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                Abu Dhabi </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-category-2" name="category[]" value="objects"
                                                type="checkbox" checked
                                                class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-category-2"
                                                class="ml-3 pr-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                Guam </label>
                                        </div>
                                    </form>
                                </div>
                            </div>


                            <div class="px-4 relative inline-block text-left" x-data="{ isIndustryOpen: false }">
                                <button @click="isIndustryOpen = ! isIndustryOpen"
                                    @click.outside="isIndustryOpen = false" type="button"
                                    class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
                                    aria-expanded="false">
                                    <span>Industry</span>
                                    <!-- Heroicon name: solid/chevron-down -->
                                    <svg class="flex-shrink-0 -mr-1 ml-1 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>

                                <div x-show="isIndustryOpen" x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    class="origin-top-right absolute right-0 mt-2 bg-white rounded-md shadow-2xl p-4 ring-1 ring-black ring-opacity-5 focus:outline-none">
                                    <form class="space-y-4">
                                        <div class="flex items-center">
                                            <input id="filter-sizes-0" name="sizes[]" value="s" type="checkbox"
                                                class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-sizes-0"
                                                class="ml-3 pr-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                Hospitality </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-sizes-1" name="sizes[]" value="m" type="checkbox"
                                                class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-sizes-1"
                                                class="ml-3 pr-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                Veterinary </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-sizes-2" name="sizes[]" value="l" type="checkbox"
                                                class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-sizes-2"
                                                class="ml-3 pr-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                Automobile </label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
