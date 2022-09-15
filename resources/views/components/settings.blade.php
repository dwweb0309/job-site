<div class="bg-gray-50">
<div class="container py-4 lg:py-8 sm:grid grid-cols-12 gap-4">

    <aside class="sm:col-span-3 pb-8">
        <div class="max-w-xs">
        {{ $submenu }}
        </div>
    </aside>
    <main class="sm:col-span-9">
        {{ $slot }}
    </main>

</div>

</div>