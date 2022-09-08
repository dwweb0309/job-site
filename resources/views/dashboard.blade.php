<x-app-layout>

<div class="bg-gray-50">
  
    <main class="py-24">
      <div class="max-w-7xl mx-auto sm:px-2 lg:px-8">
        <div class="max-w-2xl mx-auto px-4 lg:max-w-4xl lg:px-0">
          <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:tracking-tight sm:text-3xl">Your listings ({{ $listings->count() }})</h1>
          <p class="mt-2 text-sm text-gray-500">Check the status of all your current and previous job postings.</p>
        </div>
      </div>
  
      <section aria-labelledby="recent-heading" class="mt-12">
        <h2 id="recent-heading" class="sr-only">Recent orders</h2>

        @foreach($listings as $listing)
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-8 mb-2 lg:mb-4">
          <div class="max-w-2xl mx-auto space-y-8 sm:px-4 lg:max-w-4xl lg:px-0">
            <div class="bg-white border-t border-b border-gray-200 shadow-sm sm:rounded-lg sm:border">
              <h3 class="sr-only">Order placed on <time datetime="2021-07-06">{{ $listing->created_at }}</time></h3>
  
              <div class="flex items-center p-4 border-b border-gray-200 sm:p-6 sm:grid sm:grid-cols-4 sm:gap-x-6">
                <dl class="flex-1 grid grid-cols-2 gap-x-6 text-sm sm:col-span-3 sm:grid-cols-3 lg:col-span-2">
                  <div>
                    <dt class="font-medium text-gray-900">Order number</dt>
                    <dd class="mt-1 text-gray-500">WU88191111</dd>
                  </div>
                  <div class="hidden sm:block">
                    <dt class="font-medium text-gray-900">Date placed</dt>
                    <dd class="mt-1 text-gray-500">
                      <time datetime="2021-07-06">{{ $listing->created_at->format('M d, Y') }}</time>
                    </dd>
                  </div>
                  <div>
                    <dt class="font-medium text-gray-900">Total amount</dt>
                    <dd class="mt-1 font-medium text-gray-900">99.00</dd>
                  </div>
                </dl>
  
                <div class="relative flex justify-end lg:hidden" x-data="{ isOpen : false }">
                  <div class="flex items-center">
                    <button @click="isOpen = ! isOpen" type="button" class="-m-2 p-2 flex items-center text-gray-400 hover:text-gray-500" id="menu-0-button" aria-expanded="false" aria-haspopup="true">
                      <span class="sr-only">Options for order WU88191111</span>
                      <!-- Heroicon name: outline/dots-vertical -->
                      <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                      </svg>
                    </button>
                  </div>
  
                  <!--
                    Dropdown menu, show/hide based on menu state.
  
                    Entering: "transition ease-out duration-100"
                      From: "transform opacity-0 scale-95"
                      To: "transform opacity-100 scale-100"
                    Leaving: "transition ease-in duration-75"
                      From: "transform opacity-100 scale-100"
                      To: "transform opacity-0 scale-95"
                  -->
                  <div x-show="isOpen" @click.outside="isOpen = false" class="origin-bottom-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-0-button" tabindex="-1">
                    <div class="py-1" role="none">
                      <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                      <a href="{{ route('listings.show', $listing->slug) }}" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-0-item-0"> View listing </a>
                      <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-0-item-1"> Invoice </a>
                      @if(!$listing->is_active)
                      <a href="#" class="text-green-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-0-item-1"> 🔁 Reactivate listing </a>
                        @endif
                    </div>
                  </div>
                </div>
  
                <div class="hidden lg:col-span-2 lg:flex lg:items-center lg:justify-end lg:space-x-4">
                  <a href="{{ route('listings.show', $listing->slug) }}" class="flex items-center justify-center bg-white py-2 px-2.5 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <span>View Listing</span>
                    <span class="sr-only">WU88191111</span>
                  </a>
                  <a href="#" class="flex items-center justify-center bg-white py-2 px-2.5 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <span>View Invoice</span>
                    <span class="sr-only">for order WU88191111</span>
                  </a>
                  @if(!$listing->is_active)
                  <a href="#" class="flex items-center justify-center bg-white py-2 px-2.5 border border-gray-300 bg-gray-100 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <span>🔁 Reactivate</span>
                    <span class="sr-only">for order WU88191111</span>
                  </a>
                  @endif

                </div>
              </div>
  
              <ul role="list" class="divide-y divide-gray-200">
                <a href="{{ route('listings.show', $listing->slug) }}">
                <li class="p-4 sm:p-6">
                  <div class="flex items-center sm:items-start">
                    <div class="flex-1 text-sm">
                      <div class="font-medium text-gray-900 sm:flex sm:justify-between">
                        <h3 class="text-lg">{{ $listing->title}}</h3>
                        <p class="mt-2 sm:mt-0">{{ number_format($listing->salary_min) }} - {{ number_format($listing->salary_max) }} {{ $listing->currency_code }}</p>
                      </div>
                      <p class="hidden text-gray-500 sm:block sm:mt-2">Number of views: {{ $listing->clicks()->count() }}</p>
                    </div>
                  </div>
  
                  <div class="mt-6 sm:flex sm:justify-between">
                    <div class="flex items-center">
                      <!-- Heroicon name: solid/check-circle -->
                      <svg class="w-5 h-5 {{ $listing->is_active ? 'text-green-500' : 'text-gray-500'}}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        @if($listing->is_active)
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        @else
                        <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
                        @endif
                    </svg>    
                      
                      <p class="ml-2 text-sm font-medium text-gray-500">{{ $listing->is_active ? 'Listing is active' : 'Listing is closed' }}</p>
                    </div>
  
                  </div>
                </li>
            </a>
                </ul>
            </div>
            </div>
        </div>

        @endforeach


      </section>
    </main>

  </div>

</x-app-layout>
