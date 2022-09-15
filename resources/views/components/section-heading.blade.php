@props(['title', 'description'])

<div class="mb-8">
<h2 class="text-xl font-medium text-gray-900">{{ $title }}</h2>
@if($description)
<p class="mt-1 text-sm text-gray-500">{{ $description }}</p>
@endif
</div>