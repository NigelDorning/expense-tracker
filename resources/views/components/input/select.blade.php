@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-select rounded-lg border border-gray-300 p-2 mt-1 w-full']) !!}>
    {{ $slot }}
</select>

