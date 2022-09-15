<x-app-layout>
    <section class="container max-w-7xl px-5 py-12 mx-auto">
        <div class="">
            <div>{{ $user->name }}</div>
            <div>{{ $user->email }}</div>
        </div>
        <div>
            <button type="submit">Update</button>
        </div>
    </section>
</x-app-layout>
