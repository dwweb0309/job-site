<x-app-layout>

    <div class="bg-gray-50">


        <div class="container py-8 lg:py-12">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Users</h1>
                    <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including their name,
                        title, email and role.</p>
                </div>
                <div class="sm:ml-4 sm:flex-none">
                  <label for="search" class="sr-only">Search</label>
                  <div class="relative mt-1 rounded-md shadow-sm">
                      <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3" aria-hidden="true">
                          <!-- Heroicon name: mini/magnifying-glass -->
                          <svg class="mr-3 h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                              fill="currentColor" aria-hidden="true">
                              <path fill-rule="evenodd"
                                  d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                  clip-rule="evenodd" />
                          </svg>
                      </div>
                      <input type="text" name="search" id="search"
                          class="block w-full rounded-md border-gray-300 py-2 pl-9 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                          placeholder="Search">
                  </div>
              </div>
                <div class="mt-4 sm:mt-0 sm:ml-4 sm:flex-none">
                    <button type="button"
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add
                        user</button>
                </div>
            </div>

            <!-- Filters -->
            <div class="mt-8 flex border-t border-gray-200 pt-2 justify-start">
                <div id="desktop-menu-2" class="relative inline-block text-left mr-12" x-data="{ isOpen: false }">
                    <div>
                        <button @click="isOpen = ! isOpen" type="button"
                            class="group inline-flex items-center justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
                            aria-expanded="false">
                            <span>Nationality</span>
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
                            <span>Salary</span>
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
                            <div class="flex items-center">
                                <label for="salary_min"
                                    class="ml-3 whitespace-nowrap pr-6 text-sm font-medium text-gray-900">Salary Min</label>
                                <input id="salary_min" name="salary_min" type="number"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            </div>

                            <div class="flex items-center">
                                <label for="salary_max"
                                    class="ml-3 whitespace-nowrap pr-6 text-sm font-medium text-gray-900">Salary Max</label>
                                <input id="salary_max" name="salary_max" value="black" type="number"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            </div>
                        </form>
                    </div>
                </div>
                <div id="desktop-menu-4" class="relative inline-block text-left" x-data="{ isOpen: false }">
                    <div>
                        <button @click="isOpen = ! isOpen" type="button"
                            class="group inline-flex items-center justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
                            aria-expanded="false">
                            <span>Age</span>
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
                            <div class="flex items-center">
                                <label for="age_min"
                                    class="ml-3 whitespace-nowrap pr-6 text-sm font-medium text-gray-900">Age Min</label>
                                <input id="age_min" name="age_min" type="number"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            </div>

                            <div class="flex items-center">
                                <label for="age_max"
                                    class="ml-3 whitespace-nowrap pr-6 text-sm font-medium text-gray-900">Age Max</label>
                                <input id="age_max" name="age_max" value="black" type="number"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            </div>
                        </form>
                    </div>
                </div>

            </div>


            <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg"
                            x-data="{ selectAll: false }">
                            <!-- Selected row actions, only show when rows are selected. -->
                            <div x-show="selectAll"
                                class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">
                                <button type="button"
                                    class="inline-flex items-center rounded border border-gray-300 bg-white px-2.5 py-1.5 text-xs font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-30">Email
                                    all</button>
                                <button type="button"
                                    class="inline-flex items-center rounded border border-gray-300 bg-white px-2.5 py-1.5 text-xs font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-30">Delete
                                    all</button>
                            </div>

                            <table class="min-w-full table-fixed divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="relative w-12 px-6 sm:w-16 sm:px-8">
                                            <input type="checkbox" value="true" x-model="selectAll"
                                                class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                                        </th>
                                        <th scope="col"
                                            class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                                            Name</th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Tags</th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Location
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Nationality</th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Whatsapp
                                        </th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <!-- Selected: "bg-gray-50" -->

                                    @foreach ($users as $user)
                                        <tr x-data="{ isSelected: false }" :class="isSelected ? 'bg-gray-50' : ''">
                                            <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                                                <!-- Selected row marker, only show when row is selected. -->
                                                <div x-show="isSelected"
                                                    class="absolute inset-y-0 left-0 w-0.5 bg-indigo-600"></div>

                                                <input type="checkbox" x-model="isSelected" value="true"
                                                    class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                                            </td>
                                            <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
                                            <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium "
                                                :class="isSelected ? 'text-indigo-600' : 'text-gray-900'">
                                                {{ $user->name }}<br><span
                                                    class="text-xs text-gray-500">{{ $user->role->name }}</span></td>
                                            <td class="flex flex-wrap max-w-sm px-3 py-4 text-sm text-gray-500">
                                                @if($user->profile)
                                                    @foreach($user->profile->tags as $tag)
                                                    <span
                                                        class="inline-flex items-center rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-800 mr-2 mb-2">{{ $tag->name }}</span>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $user->profile ? $user->profile->location->name : '' }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $user->profile ? $user->profile->nationality->name : '' }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ $user->email }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ $user->profile ? $user->profile->whatsapp : '' }}
                                            </td>
                                            <td
                                                class="whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                <a href="#"
                                                    class="text-blue-600 hover:text-indigo-900 mr-2">Edit<span
                                                        class="sr-only">, {{ $user->name }}</span></a>
                                                <a href="#"
                                                    class="text-red-800 hover:text-indigo-900">Delete<span
                                                        class="sr-only">, {{ $user->name }}</span></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{ $users->links() }}
        </div>


    </div>

</x-app-layout>
