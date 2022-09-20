<x-app-layout>

    <x-settings>
        <x-slot:submenu>
            @if (Auth::check())

            <!-- There can be company logo here or somewhere -->

            <x-navs.side :items='[
                [
                  "name" => "Company profile",
                  "target" => route("company.dashboard")
                ],
                [
                  "name" => "Edit profile",
                  "target" => route("company.edit")
                ]
              ]' />

            @endif
        </x-slot>

        @if (Auth::check())
            <x-page-heading title="My profile" cta="Edit Company profile" :target="route('company.edit')" />
        @endif

        
        <!-- Profile section -->
        <div class="flex items-center my-8">
            <div class="mr-4">
                <div class="rounded-lg bg-gray-500 w-20 h-20 lg:w-32 lg:h-32 bg-center bg-cover" style="background-image: url({{ $company->logo }})"></div>
            </div>
            <div class="flex-1">
                <p class="text-gray-500 text-sm max-w-lg">{{ $company->description }}</p>
                <!-- Company tags -->
                <div class="mt-1">
                    @foreach($company->tags as $tag)
                        <span class="inline-block mr-2 tracking-wide text-indigo-500 text-xs font-medium title-font py-0.5 px-1.5 border border-indigo-500 uppercase">{{ $tag->name }}</span>
                    @endforeach
                </div>
            </div>
        </div>

        <x-section-data label="Company website" :content="$company->website" />

        <x-section-data label="Location" :content="$company->location->name" />
        
        <div>Industries</div>
        <div class="mt-1">
            @foreach($company->industries  as $industry)
            <span class="inline-block mr-2 tracking-wide text-indigo-500 text-xs font-medium title-font py-0.5 px-1.5 border border-indigo-500 uppercase">{{ $industry->name }}</span>
            @endforeach
        </div>

        <div class="mt-8">
            <x-page-heading title="Available positions" />
            
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
                                    @foreach ($company->listings as $listing)
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
                                                <a href="#"
                                                    class="text-indigo-600 hover:text-indigo-900">Edit<span
                                                        class="sr-only">, {{ $listing->title }}</span></a>
                                                <a href="#" class="text-red-800 hover:text-indigo-900">Delete<span
                                                        class="sr-only">, {{ $listing->title }}</span></a>
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


</x-settings>
</x-app-layout>
