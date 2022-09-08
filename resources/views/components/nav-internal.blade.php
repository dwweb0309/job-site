<div>
      <div class="border-b border-gray-200">
        <nav class="-mb-px flex space-x-8" aria-label="Tabs">
          <a href="{{ route('admin.users') }}"
          class="@if(Route::is('admin.users')) border-indigo-500 text-indigo-600 @else border-transparent text-gray-500 hover:text-gray-700 @endif hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
          >Users</a>

          <a href="{{ route('admin.companies') }}"
          class="@if(Route::is('admin.companies')) border-indigo-500 text-indigo-600 @else border-transparent text-gray-500 hover:text-gray-700 @endif hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
          >Companies</a>

          <a href="{{ route('admin.listings') }}"
          class="@if(Route::is('admin.listings')) border-indigo-500 text-indigo-600 @else border-transparent text-gray-500 hover:text-gray-700 @endif hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
          >Listings</a>
        </nav>
      </div>
  </div>
  