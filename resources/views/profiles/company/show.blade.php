<x-app-layout>

    <x-settings>
        <x-slot:submenu>
            @if (Auth::check())

            <!-- There can be company logo here or somewhere -->

            <div class="space-y-1" aria-label="Sidebar">
                <!-- Current: "bg-gray-100 text-gray-900", Default: "text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
                <a href="#" class="bg-gray-100 text-gray-900 flex items-center px-3 py-2 text-sm font-medium rounded-md" aria-current="page">
                <span class="truncate">Profile</span>
                </a>
            
                <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 flex items-center px-3 py-2 text-sm font-medium rounded-md">
                <span class="truncate">My applications</span>
                </a>
            
            </div>

            @endif
        </x-slot>

        <h2>{{ $user->company->name }}</h2>

        @if (Auth::check())

            <x-page-heading title="My profile" cta="Edit Company profile" :target="route('user.edit', $user->id)" />

        @endif


        @if (Auth::check())
        <div class="mb-12 border-b border-gray-200 pb-2 lg:pb-4">
            <x-section-heading title="Account information" description="Make sure to have valid contact information so that we can send you relevant job opportunities." />
        
            <x-section-data label="Company Name" :content="$user->company->name" />
        </div>
        @endif


        <div class="mb-12 border-b border-gray-200 pb-2 lg:pb-4">
        
            @if (Auth::check())
                 <x-section-heading title="Profile information" description="This information is visible to employers so keep it up to date!" />
            @endif
        <!-- Profile section -->
        <div class="flex items-center mb-8">
            <div class="mr-4">
                <div class="rounded-lg bg-gray-500 w-20 h-20 lg:w-32 lg:h-32 bg-center bg-cover" style="background-image: url({{ $user->company->logo }})"></div>
            </div>
            <div class="flex-1">
                <p class="font-medium text-xl">{{ $user->name }}</p>
                <p class="text-gray-500 text-sm max-w-lg">{{ $user->company->description }}</p>
                <!-- User tags -->
                <div class="mt-1">
                    @foreach($user->company->tags as $tag)
                        <span class="inline-block mr-2 tracking-wide text-indigo-500 text-xs font-medium title-font py-0.5 px-1.5 border border-indigo-500 uppercase">{{ $tag->name }}</span>
                    @endforeach
                </div>
            </div>
        </div>

        <x-section-data label="Company website" :content="$user->company->website" />

        <x-section-data label="Location" :content="$user->company->location->name" />

        <x-section-data label="Credits" :content="$user->company->credits" />

    </div>

</x-settings>
</x-app-layout>
