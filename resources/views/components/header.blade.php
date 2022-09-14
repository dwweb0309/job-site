<header>
    <div class="relative bg-white">
        <div
            class="flex justify-between items-center max-w-7xl mx-auto px-4 py-6 sm:px-6 md:justify-start md:space-x-10 lg:px-8">
            <div class="flex justify-start lg:w-0 lg:flex-1">
                <a href="{{ route('listings.index') }}">
                    <span class="sr-only">RecruitGo</span>
                    <x-application-logo class="h-8 w-auto sm:h-10" />
                </a>
            </div>
            <div class="-mr-2 -my-2 md:hidden">
                <button type="button"
                    class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                    aria-expanded="false">
                    <span class="sr-only">Open menu</span>
                    <!-- Heroicon name: outline/menu -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
            <div class="md:flex items-center justify-end md:flex-1 lg:w-0">
              @guest
        <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Log in</a>
        @endguest
                <a href="{{ route('listings.create') }}"
                    class="ml-8 whitespace-nowrap inline-flex items-center justify-center bg-gradient-to-r from-sky-600 to-indigo-600 bg-origin-border px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white hover:from-purple-700 hover:to-indigo-700">
                    Post Job <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                    </svg></a>

                @auth
                    <div class="hidden md:ml-4 md:flex md:flex-shrink-0 md:items-center">
                        <!-- Profile dropdown -->
                        <div class="relative ml-3" x-data="{ isOpen: false }">
                            <div>
                                <button @click="isOpen = ! isOpen" type="button"
                                    class="flex rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <!-- <img class="h-8 w-8 rounded-full"
                                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt=""> -->
                                    <img class="h-8 w-8 rounded-full"
                                        src="{{ Auth::user()->avatar_url() }}"
                                        alt="">
                                </button>
                            </div>

                            <!--
                  Dropdown menu, show/hide based on menu state.

                  Entering: "transition ease-out duration-200"
                    From: "transform opacity-0 scale-95"
                    To: "transform opacity-100 scale-100"
                  Leaving: "transition ease-in duration-75"
                    From: "transform opacity-100 scale-100"
                    To: "transform opacity-0 scale-95"
                -->
                            <div x-show="isOpen"
                                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">

                                <div class="pb-2 py-2 px-4 mb-2 border-b border-gray-100">
                                  <p class="text-base font-bold">{{ auth()->user()->name }}</p>
                                  <p class="text-xs text-gray-700">{{ auth()->user()->email }}</p>
                                </div>
                                <!-- Active: "bg-gray-100", Not Active: "" -->
                                <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-blue-700" role="menuitem"
                                    tabindex="-1" id="user-menu-item-0">My listings</a>
                                <a href="{{ route('user.show', Auth::user()->id) }}" class="block px-4 py-2 text-sm text-blue-700" role="menuitem"
                                    tabindex="-1" id="user-menu-item-0">
                                    @if(Auth::user()->is_employer())
                                        Company information
                                    @else
                                        My Profile
                                    @endif
                                </a>
                                <a href="#" class="block px-4 py-2 text-sm text-blue-700" role="menuitem"
                                    tabindex="-1" id="user-menu-item-1">Settings</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                    this.closest('form').submit();"
                                        role="menuitem" tabindex="-1">
                                        {{ __('Log Out') }}
                                    </x-responsive-nav-link>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</header>
