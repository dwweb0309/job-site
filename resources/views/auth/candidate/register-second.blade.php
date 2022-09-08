<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <x-application-logo class="w-auto h-12 mx-auto" />
            <!-- Application steps. TODO: turn it into component. -->
            <nav aria-label="Progress" class="mt-8 max-w-md mx-auto hidden sm:block">
                <ol role="list" class="space-y-4 md:flex md:space-y-0 md:space-x-8">
                    <li class="md:flex-1">
                        <!-- Completed Step -->
                        <div
                            class="group pl-4 py-2 flex flex-col border-l-4 border-indigo-600 hover:border-indigo-800 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4">
                            <span class="text-sm text-indigo-600 font-medium group-hover:text-indigo-800">Step 1</span>
                            <span class="text-sm font-medium">Create account</span>
                        </div>
                    </li>

                    <li class="md:flex-1">
                        <!-- Current Step -->
                        <div class="pl-4 py-2 flex flex-col border-l-4 border-indigo-600 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4"
                            aria-current="step">
                            <span class="text-sm text-indigo-600 font-medium">Step 2</span>
                            <span class="text-sm font-medium">Tell about yourself</span>
                        </div>
                    </li>

                    <li class="md:flex-1">
                        <!-- Upcoming Step -->
                        <div
                            class="group pl-4 py-2 flex flex-col border-l-4 border-gray-200 hover:border-gray-300 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4">
                            <span class="text-sm text-gray-500 font-medium group-hover:text-gray-700">Step 3</span>
                            <span class="text-sm font-medium">Submit application</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register.candidate.second') }}" enctype=multipart/form-data
            class="space-y-8">
            @csrf
            <!-- Contact information -->
            <div class="-mt-8">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>
                <p class="mt-1 text-sm text-gray-500">This information will be shared with employers and used to match
                    you with job opportunities.</p>
            </div>
            <!-- Location -->
            <div>
                <x-label for="location_id" :value="__('Nationality')" />

                <x-select id="location_id" class="block mt-1 w-full" :items="$locations" item_value="id" item_text="name"
                    name="location_id" :value="old('location_id')" autofocus />
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
                        type="url" name="linkedin_url" :value="old('linkedin_url')" />
                </div>


            </div>


            <!-- whatsapp url -->
            <div>
                <x-label for="whatsapp" :value="__('Whatsapp number')" />

                <x-input id="whatsapp" class="block mt-1 w-full" type="tel" name="whatsapp" :value="old('whatsapp')" />
            </div>

            <!-- Photo url -->
            <div>
                <x-label for="photo_url" :value="__('Profile photo')" />

                <input id="photo_url" type="file" class="block mt-1 w-full" name="photo_url">
            </div>

            <!-- Date of Birth -->
            <div>
                <x-label for="dob" :value="__('Date of Birth')" />

                <input type="date" id="start" name="dob"
                    class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-2 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                    min="1960-01-01" max="2004-12-31">
            </div>

            <!-- Gender -->
            <div>
                <x-label for="gender" :value="__('Gender')" />

                <x-select id="gender" class="block mt-1 w-full" :items="['I prefer not to say', 'Female', 'Male', 'Non-binary', 'Transgender']" name="gender" :value="old('gender')"
                    autofocus />
            </div>

            <!-- Currency Code -->
            <div>
                <x-label for="currency_code" :value="__('Expected annual salary')" />
                <div class="relative w-full">
                <div class="">
                    <x-input type="number" id="expected_salary" name="expected_salary" placeholder="Salary per year" class="w-full" />
                    
                </div>
                <x-select id="currency_code" class="absolute inset-y-0 right-1 mb-1 flex items-center w-24 border-none" :items="$currency_codes" item_value="name"
                    item_text="name" name="currency_code" :value="old('currency_code')" autofocus />
            </div>
            </div>

        

            <!-- Description -->
            <div>
                <x-label for="description" :value="__('Tell about yourself briefly')" />

                <x-textarea id="description" class="block mt-1 w-full" name="description" :value="old('description')" />
            </div>


            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Complete registration') }}
                </x-button>
            </div>

        </form>
    </x-auth-card>
</x-guest-layout>
