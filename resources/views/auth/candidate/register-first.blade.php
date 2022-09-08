<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
                <x-application-logo class="w-auto h-12 mx-auto" />
            <h1 class="mt-6 text-center text-3xl tracking-tight font-bold text-gray-900">Create an account to apply for the job</h1>
    <p class="mt-2 text-center text-sm text-gray-600 max-w-lg">
      The application process only takes 5 minutes. Create an account and fill out basic details about yourself. If you have already signed up before, simply log in and you're ready to go.
    </p>


<!-- Application steps. TODO: turn it into component. -->
<nav aria-label="Progress" class="mt-8 max-w-md mx-auto hidden sm:block">
    <ol role="list" class="space-y-4 md:flex md:space-y-0 md:space-x-8">
      <li class="md:flex-1">
        <!-- Completed Step -->
        <div class="pl-4 py-2 flex flex-col border-l-4 border-indigo-600 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4" aria-current="step">
          <span class="text-sm text-indigo-600 font-medium group-hover:text-indigo-800">Step 1</span>
          <span class="text-sm font-medium">Create account</span>
        </div>
      </li>
  
      <li class="md:flex-1">
        <!-- Current Step -->
        <div class="group pl-4 py-2 flex flex-col border-l-4 border-gray-200 hover:border-gray-300 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4">
          <span class="text-sm text-indigo-600 font-medium">Step 2</span>
          <span class="text-sm font-medium">Tell about yourself</span>
        </div>
      </li>
  
      <li class="md:flex-1">
        <!-- Upcoming Step -->
        <div class="group pl-4 py-2 flex flex-col border-l-4 border-gray-200 hover:border-gray-300 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4">
          <span class="text-sm text-gray-500 font-medium group-hover:text-gray-700">Step 3</span>
          <span class="text-sm font-medium">Submit application</span>
        </div>
      </li>
    </ol>
  </nav>
  






        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register.candidate.first') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Continue ➡️') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
