<x-app-layout>

    <x-settings>
        <x-slot:submenu>
            @if (Auth::check())
            <x-navs.side :items='[
                [
                  "name" => "My profile",
                  "target" => route("user.show", $user->id)
                ],
                [
                  "name" => "Edit profile",
                  "target" => route("user.edit", $user->id)
                ]
              ]' />
            @endif
            </x-slot>


            <x-page-heading title="Edit my profile" />

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-200 text-red-800">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('user.update', $user->id) }}" id="payment_form" method="post"
                enctype="multipart/form-data" class="space-y-4">
                @method('PUT')
                @csrf

                <div class="">
                    <x-label for="name" value="Name" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name') ?? $user->name"
                        required />
                </div>

                <!-- Location -->
                <div>
                    <x-label for="location_id" :value="__('Location')" />

                    <x-select id="location_id" class="block mt-1 w-full" :items="$locations" item_value="id" item_text="name"
                        name="location_id" :selected="old('location_id') ?? $user->profile->location_id" autofocus />
                </div>

                <!-- Linkedin url -->
                <div>
                    <x-label for="linkedin_url" :value="__('Linkedin URL')" />

                    <div class="mt-1 flex rounded-md shadow-sm">
                        <span
                            class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">https://</span>
                        <x-input id="linkedin_url" autocomplete="" pattern=".*linkedin.com.*"
                            placeholder="www.linkedin.com/in/"
                            class="block w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            type="url" name="linkedin_url" :value="old('linkedin_url') ?? $user->profile->linkedin_url" />
                    </div>


                </div>

                <div class="">
                    <x-label for="tags" value="Tags (separate by comma)" />
                    <x-input id="tags" class="block mt-1 w-full" type="text" name="tags" :value="old('tags') ?? $user->profile->tags->implode('name', ', ')" />
                </div>

                <!-- whatsapp url -->
                <div>
                    <x-label for="whatsapp" :value="__('Whatsapp number')" />

                    <x-input id="whatsapp" class="block mt-1 w-full" type="tel" name="whatsapp"
                        :value="old('whatsapp') ?? $user->profile->whatsapp" />
                </div>

                <!-- Date of Birth -->
                <div>
                    <x-label for="dob" :value="__('Date of Birth')" />

                    <input type="date" id="start" name="dob"
                        class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-2 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                        min="1960-01-01" max="2004-12-31" value="{{ $user->profile->dob }}">
                </div>

                <!-- Gender -->
                <div>
                    <x-label for="gender" :value="__('Gender')" />

                    <x-select id="gender" class="block mt-1 w-full" :items="['I prefer not to say', 'Female', 'Male', 'Non-binary', 'Transgender']" name="gender" :selected="old('gender') ?? $user->profile->gender"
                        autofocus />
                </div>

                <!-- Currency Code -->
                <div>
                    <x-label for="currency_code" :value="__('Expected annual salary')" />
                    <div class="relative w-full">
                        <div class="">
                            <x-input type="number" id="expected_salary" name="expected_salary"
                                placeholder="Salary per year" class="w-full" :value="old('expected_salary') ?? $user->profile->expected_salary" />

                        </div>
                        <x-select id="currency_code"
                            class="absolute inset-y-0 right-1 mb-1 flex items-center w-24 border-none"
                            :items="$currency_codes" item_value="name" item_text="name" name="currency_code"
                            :value="old('currency_code')" autofocus />
                    </div>

                    <div class="mt-4">
                        <x-label for="description" value="Description" />
                        <textarea id="description" rows="8"
                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                            name="description">{{ old('description') ?? $user->profile->description }}</textarea>
                    </div>

                    <div class="mt-4">
                        <x-button type="submit" id="form_submit">Update</x-button>
                    </div>
            </form>


    </x-settings>
</x-app-layout>
