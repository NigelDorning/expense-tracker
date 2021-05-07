@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-select rounded-lg border p-1 mt-1 border w-full']) !!}>
    {{ $slot }}
</select>

