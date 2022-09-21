<x-app-layout>

    <div class="bg-gray-50">
        <div class="container py-4">
            <x-nav-internal />
        </div>

        <div class="container py-8 lg:py-12">
            <form action="{{ route('tags.update', $tag->id) }}" method="post" class="space-y-4">
                @method('PUT')
                @csrf

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-200 text-red-800">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mb-4 mx-2">
                    <x-label for="name" value="Tag Name" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                        :value="old('name') ?? $tag->name" />
                </div>

                <div class="mb-2 mx-2">
                <button type="submit" id="form_submit"
                    class="block w-full items-center bg-indigo-500 text-white border-0 py-2 focus:outline-none hover:bg-indigo-600 rounded text-base mt-4 md:mt-0">Update</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function ConfirmDelete()
        {
            const x = confirm("Are you sure you want to delete?");

            return x ? true : false;
        }
    </script>
</x-app-layout>
