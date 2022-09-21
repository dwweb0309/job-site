<x-app-layout>

    <div class="min-h-full bg-gray-100">

        <main class="py-10 xl:py-16">
            <!-- Breadcrumbs -->
            <div class="container lg:max-w-7xl px-4 sm:px-6 lg:px-8 mx-auto mb-8">

                <!-- This example requires Tailwind CSS v2.0+ -->
                <nav class="flex" aria-label="Breadcrumb">
                    <ol role="list" class="flex items-center space-x-4">
                        <li>
                            <div>
                                <a href="#" class="text-gray-400 hover:text-gray-500">
                                    <!-- Heroicon name: solid/home -->
                                    <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                    </svg>
                                    <span class="sr-only">Home</span>
                                </a>
                            </div>
                        </li>

                        <li>
                            <div class="flex items-center">
                                <!-- Heroicon name: solid/chevron-right -->
                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <a href="#"
                                    class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">{{ $listing->company->location->name }}</a>
                            </div>
                        </li>

                        <li>
                            <div class="flex items-center">
                                <!-- Heroicon name: solid/chevron-right -->
                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"
                                    aria-current="page">Veterinary</a>
                            </div>
                        </li>
                    </ol>
                </nav>




            </div>
            <!-- Page header -->
            <div
                class="max-w-3xl mx-auto px-4 sm:px-6 md:flex md:items-center md:justify-between md:space-x-5 lg:max-w-7xl lg:px-8">
                <div class="flex items-center space-x-5">
                    <div class="flex-shrink-0">
                        <div class="relative">
                            <img class="h-16 w-16 rounded-full" src="{{ $listing->company->logo }}"
                                alt="{{ $listing->company->name }} logo">
                            <span class="absolute inset-0 shadow-inner rounded-full" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">{{ $listing->title }}</h1>
                        <p class="text-sm font-medium text-gray-500">Created {{ $listing->created_at->diffForHumans() }}
                        </p>
                    </div>
                </div>
                <div
                    class="mt-6 flex flex-col-reverse justify-stretch space-y-4 space-y-reverse sm:flex-row-reverse sm:justify-end sm:space-x-reverse sm:space-y-0 sm:space-x-3 md:mt-0 md:flex-row md:space-x-3">
                    <a href="{{ route('listings.edit', $listing->slug) }}"
                        class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500">Edit</a>
                </div>
            </div>

            <div
                class="mt-8 max-w-3xl mx-auto grid grid-cols-1 gap-6 sm:px-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
                <div class="space-y-6 lg:col-start-1 lg:col-span-2">
                    <!-- Description list-->
                    <section aria-labelledby="applicant-information-title">
                        <div class="bg-white shadow sm:rounded-lg">
                            <div class="px-4 py-5 sm:px-6">
                                <h2 id="applicant-information-title"
                                    class="text-lg leading-6 font-medium text-gray-900">Job Information</h2>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500">Details about the job posting.</p>
                            </div>
                            <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                                <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Job location</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $listing->company->location->name }}</dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Salary range</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ number_format($listing->salary_min) }}
                                            - {{ number_format($listing->salary_max) }} {{ $listing->currency_code }}
                                        </dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Work arrangement</dt>
                                        <dd class="mt-1 text-sm text-gray-900"><span
                                                class="mr-4">{{ $listing->remote_allowed ? '✅' : '❌' }}
                                                remote</span><span
                                                class="mr-4">{{ $listing->hybrid_allowed ? '✅' : '❌' }}
                                                hybrid</span><span
                                                class="mr-4">{{ $listing->inperson_allowed ? '✅' : '❌' }} in
                                                office</span></dd>
                                    </div>
                                </dl>
                            </div>
                            <div class="px-4 py-2 sm:px-6 prose">
                                {!! $listing->content !!}
                            </div>
                        </div>
                    </section>

                </div>

                <section aria-labelledby="timeline-title" class="lg:col-start-3 lg:col-span-1">
                    <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
                        <h2 id="timeline-title" class="text-lg leading-6 font-medium text-gray-900 mb-4">About
                            {{ $listing->company->name }}</h2>
                        <dl class="grid grid-cols-1 gap-x-4 gap-y-4 sm:grid-cols-2">
                            <div class="sm:col-span-2">
                                <dt class="text-sm font-medium text-gray-500">Website</dt>
                                <dd class="mt-1 text-sm text-blue-700"><a
                                        href="{{ $listing->company->website }}">{{ $listing->company->website }}</a>
                                </dd>
                            </div>
                            <div class="sm:col-span-2">
                                <dt class="text-sm font-medium text-gray-500">Company location</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $listing->company->location->name }}</dd>
                            </div>
                            <div class="sm:col-span-2">
                                <dt class="text-sm font-medium text-gray-500">About</dt>
                                <dd class="mt-1 text-sm text-gray-700">{{ $listing->company->description }}</dd>
                            </div>
                            <div class="sm:col-span-2">
                                <dt class="text-sm font-medium text-gray-500">Tags</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    @foreach ($listing->company->tags as $tag)
                                        <span
                                            class="inline-block mr-2 tracking-wide text-indigo-500 text-xs font-medium title-font py-0.5 px-1.5 border border-indigo-500 uppercase">{{ $tag->name }}</span>
                                    @endforeach
                                </dd>
                            </div>
                        </dl>
                        <!-- Activity Feed -->
                        <div class="mt-6 flow-root">

                        </div>
                        <div class="mt-6 flex flex-col justify-stretch">
                            <a type="button" href="{{ route('listings.apply', $listing->slug) }}"
                                class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Apply</a>
                        </div>


                    </div>

                    <!-- TODO: list other active positions from the same company by their categories -->
                    <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6 mt-4">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Active job posts at
                            {{ $listing->company->name }}</h3>
                        <ul class="space-y-4">
                        <li class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                            <div>
                                <a href="#" class="font-medium text-gray-900">
                                    <p class="text-sm text-gray-500">Engineering</p>
                                </a>
                            </div>
                            <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                2
                            </div>
                        </li>
                        <li class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                            <div>
                                <a href="#" class="font-medium text-gray-900">
                                    <p class="text-sm text-gray-500">Customer service</p>
                                </a>
                            </div>
                            <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                7
                            </div>
                        </li>
                    </ul>
                    </div>

                </section>
            </div>
        </main>
    </div>

</x-app-layout>
