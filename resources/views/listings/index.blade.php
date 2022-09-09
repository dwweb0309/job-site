<x-app-layout>
    <x-hero></x-hero>
    <section class="container max-w-7xl px-5 py-12 mx-auto">
        <div class="mb-12">
            <div class="flex-justify-center">
                @foreach ($tags as $tag)
                    <a href="{{ route('listings.index', ['tag' => $tag->slug]) }}"
                        class="inline-block ml-2 tracking-wide text-xs font-medium title-font py-0.5 px-1.5 border border-indigo-500 uppercase {{ $tag->slug === request()->get('tag') ? 'bg-indigo-500 text-white' : 'bg-white text-indigo-500' }}">{{ $tag->name }}</a>
                @endforeach
            </div>
        </div>
        <x-filter headline="All jobs ({{ $listings->count() }})" description=""></x-filter>
        <div class="">
            @if(Session::has('listing-created'))
            <div id="success-message">{{ Session::get('listing-created') }}</div>
            @endif

            <ul class="divide-y divide-gray-100">
                @foreach ($listings as $listing)
                    <li class="">
                        <div class="group relative py-6 sm:rounded-2xl">
                            <div
                                class="absolute -inset-x-4 -inset-y-px {{ $listing->is_highlighted ? 'bg-yellow-100 opacity-100 group-hover:bg-yellow-300' : 'bg-gray-100 opacity-0' }} group-hover:opacity-100 sm:-inset-x-6 sm:rounded-2xl lg:-inset-x-8">
                            </div>
                            <div class="relative flex items-center">
                                <div class="relative h-[3.125rem] w-[3.125rem] sm:h-[3.75rem] sm:w-[3.75rem] flex-none">
                                    <img class="absolute inset-0 h-full w-full rounded-full object-cover"
                                        src="{{ $listing->company->logo }}"
                                        alt="">
                                    <div class="absolute inset-0 rounded-full ring-1 ring-inset ring-black/[0.08]">
                                    </div>
                                </div>
                                <dl
                                    class="ml-4 flex flex-auto flex-wrap gap-y-1 gap-x-2 overflow-hidden sm:ml-6 sm:grid sm:grid-cols-[auto_1fr_auto_auto] sm:items-center">
                                    <div class="col-span-2 mr-2.5 flex-none sm:mr-0">
                                        <dt class="sr-only">Company</dt>
                                        <dd class="text-xs font-semibold leading-6 text-gray-900">{{ $listing->company->name }}</dd>
                                    </div>
                                    <div class="col-start-3 row-start-2 -ml-2.5 flex-auto sm:ml-0 sm:pl-6">
                                        <dt class="sr-only">Tags</dt>
                                        <dd class="md:flex-grow mr-8 flex items-center justify-start">
                                            @foreach ($listing->tags as $tag)
                                                <span
                                                    class="inline-block ml-2 tracking-wide text-xs font-medium title-font py-0.5 px-1.5 border border-indigo-500 uppercase {{ $tag->slug === request()->get('tag') ? 'bg-indigo-500 text-white' : 'bg-white text-indigo-500' }}">
                                                    {{ $tag->name }}
                                                </span>
                                            @endforeach
                                            </dd>
                                    </div>
                                    
                                    <div class="col-span-2 col-start-1 w-full flex-none">
                                        <dt class="sr-only">Title</dt>
                                        <dd class="text-[0.9375rem] font-semibold leading-6 text-gray-900"><a
                                                href="{{ route('listings.show', $listing->slug) }}"><span
                                                    class="absolute -inset-x-4 inset-y-[calc(-1*(theme(spacing.6)+1px))] sm:-inset-x-6 sm:rounded-2xl lg:-inset-x-8"></span>{{ $listing->title }}</a></dd>
                                    </div>
                                    <div class="mr-2.5 flex-none">
                                        <dt class="sr-only">Location</dt>
                                        <dd class="flex items-center text-xs leading-6 text-gray-600"><svg
                                            viewBox="0 0 2 2" aria-hidden="true"
                                            class="mr-2 h-0.5 w-0.5 flex-none fill-gray-400 sm:hidden">
                                            <circle cx="1" cy="1" r="1"></circle>
                                        </svg>{{ $listing->company->location->name }}</dd>
                                    </div>
                                    <div class="col-start-4 row-start-2 ml-auto flex-none sm:pl-6">
                                        <dt class="sr-only">Posted</dt>
                                        <dd class="text-xs leading-6 text-gray-400">{{ $listing->created_at->diffForHumans() }}</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </li>
                    @if ($loop->index % 6 == 0 && $loop->index > 1)
                    <li>
                        <x-email-signup></x-email-signup>
                    </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </section>
</x-app-layout>
