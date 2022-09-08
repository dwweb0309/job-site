<x-app-layout>

<div class="bg-gray-50">
  
    <main class="py-24">
      <div class="max-w-7xl mx-auto sm:px-2 lg:px-8">
        <div class="max-w-2xl mx-auto px-4 lg:max-w-4xl lg:px-0">
          <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:tracking-tight sm:text-3xl">All Users ({{ $users->count() }})</h1>
        </div>
      </div>
  
      <section aria-labelledby="recent-heading" class="mt-12">
        <table>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
          </tr>
          @foreach($users as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role->name }}</td>
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
