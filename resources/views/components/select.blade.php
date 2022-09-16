@props(['disabled' => false, 'selected' => null, 'items' => [], 'item_value' => null, 'item_text' => null])

<div>
  <select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md']) !!}>
    @foreach($items as $item)
      @if($item_value)
      <option value="{{ $item[$item_value] }}" @if($item[$item_value] == $selected) selected @endif
      >{{ $item[$item_text] }}</option>
      @else
      <option value="{{ $item }}" @if($item == $selected) selected @endif
      >{{ $item }}</option>
      @endif

    @endforeach
  </select>
</div>