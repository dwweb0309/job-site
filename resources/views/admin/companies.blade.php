<x-app-layout>

    <div class="bg-gray-50">
        <div class="container py-4">
            <x-nav-internal />
        </div>
        <!-- Companies header -->
        <div class="container py-8 lg:py-12">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Companies ({{ $companies->count() }})</h1>
                    <p class="mt-2 text-sm text-gray-700">A list of all the companies in your account including their
                        name, title, email and role.</p>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    <button type="button"
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add
                        company</button>
                </div>
            </div>

            <!-- Filters -->
            <div class="mt-8 flex border-t border-gray-200 pt-2 justify-start">
                <div id="desktop-menu-2" class="relative inline-block text-left mr-12" x-data="{ isOpen: false }">
                    <div>
                        <button @click="isOpen = ! isOpen" type="button"
                            class="group inline-flex items-center justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
                            aria-expanded="false">
                            <span>Location</span>
                            <!-- Heroicon name: mini/chevron-down -->
                            <svg class="-mr-1 ml-1 h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    <div x-show="isOpen"
                        class="absolute right-0 z-10 mt-2 origin-top-right rounded-md bg-white p-4 shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none">
                        <form class="space-y-4">
                            @foreach($locations as $location)
                            <div class="flex items-center">
                                <input id="location_{{ $location->id }}" name="color[]" value="white" type="checkbox"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="location_{{ $location->id }}"
                                    class="ml-3 whitespace-nowrap pr-6 text-sm font-medium text-gray-900">{{ $location->name }}</label>
                            </div>
                            @endforeach
                        </form>
                    </div>
                </div>
                <div id="desktop-menu-3" class="relative inline-block text-left mr-12" x-data="{ isOpen: false }">
                    <div>
                        <button @click="isOpen = ! isOpen" type="button"
                            class="group inline-flex items-center justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
                            aria-expanded="false">
                            <span>Tags</span>
                            <!-- Heroicon name: mini/chevron-down -->
                            <svg class="-mr-1 ml-1 h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    <div x-show="isOpen"
                        class="absolute right-0 z-10 mt-2 origin-top-right rounded-md bg-white p-4 shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none">
                        <form class="space-y-4">
                            @foreach($tags as $tag)
                            <div class="flex items-center">
                                <input id="tag_{{ $tag->id }}" name="color[]" value="white" type="checkbox"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="tag_{{ $tag->id }}"
                                    class="ml-3 whitespace-nowrap pr-6 text-sm font-medium text-gray-900">{{ $tag->name }}</label>
                            </div>
                            @endforeach
                        </form>
                    </div>
                </div>
                <div id="desktop-menu-4" class="relative inline-block text-left mr-12" x-data="{ isOpen: false }">
                    <div>
                        <button @click="isOpen = ! isOpen" type="button"
                            class="group inline-flex items-center justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
                            aria-expanded="false">
                            <span>Industries</span>
                            <!-- Heroicon name: mini/chevron-down -->
                            <svg class="-mr-1 ml-1 h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    <div x-show="isOpen"
                        class="absolute right-0 z-10 mt-2 origin-top-right rounded-md bg-white p-4 shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none">
                        <form class="space-y-4">
                            @foreach($industries as $industry)
                            <div class="flex items-center">
                                <input id="industry_{{ $industry->id }}" name="color[]" value="white" type="checkbox"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="industry_{{ $industry->id }}"
                                    class="ml-3 whitespace-nowrap pr-6 text-sm font-medium text-gray-900">{{ $industry->name }}</label>
                            </div>
                            @endforeach
                        </form>
                    </div>
                </div>

            </div>

            <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                            Name</th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Location
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Tags</th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Industries</th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Listings
                                        </th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Edit and delete</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach ($companies as $company)
                                        <tr>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">
                                                <div class="flex items-center">
                                                    <div class="h-10 w-10 flex-shrink-0">
                                                        <img class="w-10 h-10" src="{{ $company->logo }}"
                                                            alt="">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="font-medium text-gray-900">{{ $company->name }}
                                                        </div>
                                                        <div class="text-gray-500">
                                                            {{ $company->user->email }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                <div class="text-gray-900">{{ $company->location->name }}</div>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                @foreach ($company->tags as $tag)
                                                    <span
                                                        class="inline-flex rounded-full bg-gray-100 px-2 text-xs font-semibold leading-5 text-gray-600 mr-1">{{ $tag->name }}</span>
                                                @endforeach
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                @foreach ($company->industries as $industry)
                                                    <span
                                                        class="inline-flex rounded-full bg-gray-50 px-2 text-xs font-semibold leading-5 text-gray-600 mr-1">{{ $industry->name }}</span>
                                                @endforeach
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><a
                                                    href="#" class="underline">
                                                    {{ $company->listings->count() }}
                                                </a></td>
                                            <td
                                                class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                <a href="#"
                                                    class="text-indigo-600 hover:text-indigo-900">Edit<span
                                                        class="sr-only">, {{ $company->name }}</span></a>
                                                <a href="#"
                                                    class="text-red-800 hover:text-indigo-900">Delete<span
                                                        class="sr-only">, {{ $company->name }}</span></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{ $companies->links() }}
            <!-- <nav class="flex items-center justify-between px-4 sm:px-0">
                <div class="-mt-px flex w-0 flex-1">
                    <a href="#"
                        class="inline-flex items-center border-t-2 border-transparent pt-4 pr-1 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                        <svg class="mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M18 10a.75.75 0 01-.75.75H4.66l2.1 1.95a.75.75 0 11-1.02 1.1l-3.5-3.25a.75.75 0 010-1.1l3.5-3.25a.75.75 0 111.02 1.1l-2.1 1.95h12.59A.75.75 0 0118 10z"
                                clip-rule="evenodd" />
                        </svg>
                        Previous
                    </a>
                </div>
                
                <div class="hidden md:-mt-px md:flex">
                    <a href="#"
                        class="inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">1</a>
                    <a href="#"
                        class="inline-flex items-center border-t-2 border-indigo-500 px-4 pt-4 text-sm font-medium text-indigo-600"
                        aria-current="page">2</a>
                    <a href="#"
                        class="inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">3</a>
                    <span
                        class="inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-sm font-medium text-gray-500">...</span>
                    <a href="#"
                        class="inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">8</a>
                    <a href="#"
                        class="inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">9</a>
                    <a href="#"
                        class="inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">10</a>
                </div>
                <div class="-mt-px flex w-0 flex-1 justify-end">
                    <a href="#"
                        class="inline-flex items-center border-t-2 border-transparent pt-4 pl-1 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                        Next
                        <svg class="ml-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M2 10a.75.75 0 01.75-.75h12.59l-2.1-1.95a.75.75 0 111.02-1.1l3.5 3.25a.75.75 0 010 1.1l-3.5 3.25a.75.75 0 11-1.02-1.1l2.1-1.95H2.75A.75.75 0 012 10z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </nav> -->

        </div>

    </div>

</x-app-layout>
