<x-app-layout>

<div class="bg-gray-50">
  
    <main class="py-24">
      <div class="max-w-7xl mx-auto sm:px-2 lg:px-8">
        <div class="max-w-2xl mx-auto px-4 lg:max-w-4xl lg:px-0">
          <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:tracking-tight sm:text-3xl">All Companies ({{ $companies->count() }})</h1>
        </div>
      </div>
  
      <section aria-labelledby="recent-heading" class="mt-12">
        <table>
          <tr>
            <th>Logo</th>
            <th>Name</th>
            <th>Location</th>
            <th>Tags</th>
            <th>Industries</th>
            <th>Actions</th>
          </tr>
          @foreach($companies as $company)
          <tr>
            <td>
              <img src="{{ $company->logo }}" alt="" width="50" height="50">
            </td>
            <td>{{ $company->name }}</td>
            <td>{{ $company->location->name }}</td>
            <td>
              @foreach($company->tags as $tag)
                <span>{{ $tag->name }}</span>
              @endforeach
            </td>
            <td>
              @foreach($company->industries as $industry)
                <span>{{ $industry->name }}</span>
              @endforeach
            </td>
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
