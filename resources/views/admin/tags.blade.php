<x-app-layout>

    <div class="bg-gray-50">
        <div class="container py-4">
            <x-nav-internal />
        </div>

        <div class="container py-8 lg:py-12">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Tags</h1>
                    <p class="mt-2 text-sm text-gray-700">A list of all tags.</p>
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

            <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg"
                            x-data="{ selectAll: false }">
                            <!-- Selected row actions, only show when rows are selected. -->
                            <div x-show="selectAll"
                                class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">
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
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <!-- Selected: "bg-gray-50" -->

                                    @foreach ($tags as $tag)
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
                                                {{ $tag->name }}</td>
                                            <td
                                                class="whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                <a href="{{ route('tags.edit', $tag->id) }}"
                                                    class="text-blue-600 hover:text-indigo-900 mr-2">Edit<span
                                                        class="sr-only">, {{ $tag->name }}</span></a>
                                                <form action="{{ route('tags.destroy', $tag->id) }}" method="post"
                                                    onsubmit="return ConfirmDelete();">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="text-red-800 hover:text-indigo-900">Delete<span
                                                            class="sr-only">, {{ $tag->name }}</span></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script>
        function ConfirmDelete()
        {
            const x = confirm("Are you sure you want to delete?");

            return x ? true : false;
        }
    </script>
</x-app-layout>
