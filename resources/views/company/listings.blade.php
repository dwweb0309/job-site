<x-app-layout>

<div class="bg-gray-50">
  
    <main class="py-24">
      <div class="max-w-7xl mx-auto sm:px-2 lg:px-8">
        <div class="max-w-2xl mx-auto px-4 lg:max-w-4xl lg:px-0">
          <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:tracking-tight sm:text-3xl">All Listings ({{ $listings->count() }})</h1>
        </div>
      </div>
  
      <section aria-labelledby="recent-heading" class="mt-12">
        <table>
          <tr>
            <th>Title</th>
            <th>Company</th>
            <th>Salary Min</th>
            <th>Salary Max</th>
            <th>Is Active</th>
            <th>Actions</th>
          </tr>
          @foreach($listings as $listing)
          <tr>
            <td>{{ $listing->title }}</td>
            <td>{{ $listing->company->name }}</td>
            <td>${{ $listing->salary_min }}</td>
            <td>${{ $listing->salary_max }}</td>
            <td>{{ $listing->is_active ? 'Yes' : 'No' }}</td>
            <td>
              <button>Edit</button>
            </td>
          </tr>
          @endforeach
        </table>
      </section>
    </main>

  </div>

</x-app-layout>
