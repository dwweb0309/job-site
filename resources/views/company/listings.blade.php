<x-app-layout>

    <x-settings>

        <x-slot:submenu>
            <div class="space-y-1" aria-label="Sidebar">
                <!-- Current: "bg-gray-100 text-gray-900", Default: "text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
                <a href="#"
                    class="bg-gray-100 text-gray-900 flex items-center px-3 py-2 text-sm font-medium rounded-md"
                    aria-current="page">
                    <span class="truncate">Profile</span>
                </a>

                <a href="#"
                    class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 flex items-center px-3 py-2 text-sm font-medium rounded-md">
                    <span class="truncate">My jobs</span>
                </a>

            </div>
        </x-slot>
        @if(Session::has('message'))
        <x-notifications.success :title="Session::get('message')" description="Your listing is no longer visible."/>
        @endif

        <x-page-heading title="My listings ({{ $listings->count() }})" cta="Post job" :target="route('listings.create')" />

        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                        Title</th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Tags</th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Salary range</th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Candidates
                                    </th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">Edit and delete</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach ($listings as $listing)
                                    <tr>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            <a href="#">
                                                <div class="font-medium text-gray-900 flex items-center">
                                                    @if ($listing->is_active)
                                                        <span
                                                            class="h-4 w-4 mr-1 bg-green-100 rounded-full flex items-center justify-center"
                                                            aria-hidden="true">
                                                            <span class="h-2 w-2 bg-green-400 rounded-full"></span>
                                                        </span>
                                                    @else
                                                        <span
                                                            class="h-4 w-4 mr-1 bg-red-100 rounded-full flex items-center justify-center"
                                                            aria-hidden="true">
                                                            <span class="h-2 w-2 bg-red-400 rounded-full"></span>
                                                        </span>
                                                    @endif
                                                    {{ $listing->title }}
                                                </div>
                                                <div class="text-xs text-gray-500">
                                                    {{ $listing->created_at->format('M d, Y') }}
                                                </div>
                                            </a>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            @foreach ($listing->tags as $tag)
                                                <span
                                                    class="inline-flex rounded-full bg-gray-100 px-2 text-xs font-semibold leading-5 text-gray-600 mr-1">{{ $tag->name }}</span>
                                            @endforeach
                                        </td>

                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $listing->salary_min }} - {{ $listing->salary_max }}
                                            {{ $listing->currency_code }}
                                        </td>

                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><a
                                                href="#" class="underline">
                                                7
                                            </a>
                                        </td>
                                        <td
                                            class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                            <a href="{{ route('listings.edit', $listing->slug) }}"
                                                class="text-indigo-600 hover:text-indigo-900">Edit<span
                                                    class="sr-only">, {{ $listing->title }}</span></a>
                                            <form action="{{ route('listings.destroy', $listing->slug) }}" method="post"
                                                onsubmit="return ConfirmDelete();">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="text-red-800 hover:text-indigo-900">Delete<span
                                                        class="sr-only">, {{ $listing->title }}</span></button>
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

    </x-settings>

    <script>
        function ConfirmDelete()
        {
            const x = confirm("Are you sure you want to delete the posting?");

            return x ? true : false;
        }
    </script>
</x-app-layout>
