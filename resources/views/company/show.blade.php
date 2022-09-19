<x-app-layout>

    <x-settings>
        <x-slot:submenu>
            @if (Auth::check())

            <!-- There can be company logo here or somewhere -->

            <x-navs.side :items='[
                [
                  "name" => "Company profile",
                  "target" => route("company.show")
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

        <!-- TODO: change to actual industry -->
        <x-section-data label="Industry" content="Hospitality" />

        <div class="mt-8">
            <x-page-heading title="Available positions" />
            
            <!-- TODO: table of company's active job positions -->
        </div>


</x-settings>
</x-app-layout>
