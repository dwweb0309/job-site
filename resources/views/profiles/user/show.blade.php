<x-app-layout>

    <x-settings>
        <x-slot:submenu>
            @if (Auth::check())
            <x-navs.side :items='[
                [
                  "name" => "My profile",
                  "target" => route("user.show")
                ],
                [
                  "name" => "Edit profile",
                  "target" => route("user.edit")
                ]
              ]' />

            @endif

            
        </x-slot>
        
        @if (Auth::check())

            <x-page-heading title="My profile" cta="Edit profile" :target="route('user.edit')" />

        @endif


        @if (Auth::check())
        <div class="mb-12 border-b border-gray-200 pb-2 lg:pb-4">
            <x-section-heading title="Account information" description="Make sure to have valid contact information so that we can send you relevant job opportunities." />
        
            <x-section-data label="Email" :content="$user->email" />
        
                @isset($user->profile->whatsapp)
            <x-section-data label="WhatsApp" :content="$user->profile->whatsapp" />
                @endisset

        </div>
        @endif


        <div class="mb-12 border-b border-gray-200 pb-2 lg:pb-4">
        
            @if (Auth::check())
                 <x-section-heading title="Profile information" description="This information is visible to employers so keep it up to date!" />
            @endif
        <!-- Profile section -->
        <div class="flex items-center mb-8">
            <div class="mr-4">
                <div class="rounded-lg bg-gray-500 w-20 h-20 lg:w-32 lg:h-32 bg-center bg-cover" style="background-image: url({{ $user->profile->photo_url }})"></div>
            </div>
            <div class="flex-1">
                <p class="font-medium text-xl">{{ $user->name }}</p>
                <p class="text-gray-500 text-sm max-w-lg">{{ $user->profile->description }}</p>
                <!-- User tags -->
                <div class="mt-1">
                    @foreach($user->profile->tags as $tag)
                        <span class="inline-block mr-2 tracking-wide text-indigo-500 text-xs font-medium title-font py-0.5 px-1.5 border border-indigo-500 uppercase">{{ $tag->name }}</span>
                    @endforeach
                </div>
            </div>
        </div>

        <x-section-data label="LinkedIn Profile" :content="$user->profile->linkedin_url" />

        <x-section-data label="Nationality" :content="$user->profile->nationality->name" />
        
        <x-section-data label="Location" :content="$user->profile->location->name" />

        <x-section-data label="Preferred job location" :content="$user->profile->nationality->name" />

        <x-section-data label="Expected annual salary" :content="$user->profile->expected_salary . ' PHP'" />

        <x-section-data label="Gender" :content="$user->profile->gender" />

        <x-section-data label="Date of birth" :content="$user->profile->dob" />

        </div>

</x-settings>
</x-app-layout>
