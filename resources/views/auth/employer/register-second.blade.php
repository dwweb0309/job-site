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
                            <span class="text-sm font-medium">Company details</span>
                        </div>
                    </li>

                    <li class="md:flex-1">
                        <!-- Upcoming Step -->
                        <div
                            class="group pl-4 py-2 flex flex-col border-l-4 border-gray-200 hover:border-gray-300 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4">
                            <span class="text-sm text-gray-500 font-medium group-hover:text-gray-700">Step 3</span>
                            <span class="text-sm font-medium">Post a job</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register.employer.second') }}" enctype=multipart/form-data
            class="space-y-6">
            @csrf

            <!-- Contact information -->
            <div class="-mt-8">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Company details</h3>
                <p class="mt-1 text-sm text-gray-500">Company information will be displayed next to your job posts. You can change it later.</p>
            </div>

            <!-- Company Name -->
            <div>
                <x-label for="name" :value="__('Company Name')" />

                <x-input id="name" class="block mt-1 w-full" type="tel" name="name" :value="old('name')" />
            </div>

            <!-- Logo -->
            <div>
                <x-label for="logo" :value="__('Logo')" />

                <input id="logo" type="file" class="block mt-1 w-full" name="logo">
            </div>
            
            <!-- whatsapp url -->
            <div>
                <x-label for="website" :value="__('Website')" />

                <div class="mt-1 flex rounded-md shadow-sm">
                    <span
                        class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">https://</span>
                    <x-input id="website" autocomplete=""
                        class="block w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        type="text" name="website" :value="old('website')" />
                </div>
            </div>

            <!-- Location -->
            <div>
                <x-label for="location_id" :value="__('Location')" />

                <x-select id="location" class="block mt-1 w-full" :items="$locations" item_value="id" item_text="name"
                    name="location_id" :value="old('location_id')" autofocus />
            </div>

            <!-- Industry -->
            <div>
                <x-label for="industry" :value="__('Industry')" />

                <x-select id="industry" class="block mt-1 w-full" :items="$industries" item_value="id" item_text="name"
                    name="industry" :value="old('industry')" autofocus />
            </div>

            <!-- Description -->
            <div>
                <x-label for="description" :value="__('About your company')" />

                <x-textarea id="description" class="block mt-1 w-full" name="description" :value="old('description')" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Create job ➡️') }}
                </x-button>
            </div>

        </form>
    </x-auth-card>
</x-guest-layout>
