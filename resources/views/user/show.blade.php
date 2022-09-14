<x-app-layout>
    <section class="container max-w-7xl px-5 py-12 mx-auto">
        <div class="">
            <div>{{ $user->name }}</div>
            <div>{{ $user->email }}</div>
        </div>
        @if(Auth::check())
        <div>
            <a href="{{ route('user.edit', $user->id) }}">Edit</a>
        </div>
        @endif
    </section>
</x-app-layout>
