<x-app-layout>

    <x-settings>
        <x-slot:submenu>
            @if (Auth::check())
                <x-navs.side :items="[
                    [
                        'name' => 'Company profile',
                        'target' => route('company.dashboard'),
                    ],
                    [
                        'name' => 'Edit profile',
                        'target' => route('company.edit'),
                    ],
                ]" />
            @endif
        </x-slot>
        
        <form action="{{ route('company.update') }}" id="payment_form" method="post" enctype="multipart/form-data"
            class="space-y-4">
            @method('PUT')
            @csrf

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-200 text-red-800">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                
            <div class="mb-4 mx-2">
                <x-label for="name" value="Company Name" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                    :value="old('name') ?? $company->name" required />
            </div>

            <!-- Website link -->
            <div class="mb-4 mx-2">
                <x-label for="website" value="Website Link" />

                <div class="mt-1 flex rounded-md shadow-sm">
                    <x-input id="website" type="text" class="block mt-1 w-full" name="website"
                        :value="old('website') ?? $company->website" />
                </div>
            </div>

            <div class="mb-4 mx-2">
                <x-label for="tags" value="Tags (separate by comma)" />
                <x-input id="tags" class="block mt-1 w-full" type="text" name="tags"
                    :value="old('tags') ?? $company->tags->implode('name', ', ')" />
            </div>

            <div class="mb-4 mx-2">
                <x-label for="description" value="Company description" />
                <textarea id="description" rows="8"
                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                    name="description">{{ old('description') ?? $company->description }}</textarea>
            </div>

            <!-- Location -->
            <div>
                <x-label for="location_id" :value="__('Location')" />

                <x-select id="location" class="block mt-1 w-full" :items="$locations" item_value="id"
                    item_text="name" name="location_id" :selected="old('location_id') ?? $company->location_id" autofocus />
            </div>

            <!-- Logo -->
            <div>
                <x-label for="logo" :value="__('Logo')" />

                <input id="logo" type="file" class="block mt-1 w-full" name="logo">
            </div>

            <!-- Industry -->
            <div>
                <x-label for="industry" :value="__('Industry')" />

                <x-select id="industry" class="block mt-1 w-full" :items="$industries" item_value="id"
                    item_text="name" name="industry" :selected="old('industry')" autofocus />
            </div>

            <div class="mb-2 mx-2">
                <button type="submit" id="form_submit"
                    class="block w-full items-center bg-indigo-500 text-white border-0 py-2 focus:outline-none hover:bg-indigo-600 rounded text-base mt-4 md:mt-0">Update</button>
            </div>
        </form>
    </x-settings>
</x-app-layout>
