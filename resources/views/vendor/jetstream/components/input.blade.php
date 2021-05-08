@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-lg border border-gray-300 p-2 mt-1 w-full']) !!}>
