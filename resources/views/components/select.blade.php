@props(['disabled' => false, 'items' => [], 'item_value' => null, 'item_text' => null])

<div>
  <select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md']) !!}>
    @foreach($items as $item)
      <option value="{{ $item_value ? $item[$item_value] : $item }}"
      >{{ $item_text ? $item[$item_text] : $item }}</option>
    @endforeach
  </select>
</div>