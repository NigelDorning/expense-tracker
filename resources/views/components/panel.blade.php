@props([
    'hasHeader' => true
])

<div class="bg-white rounded-lg">

    @if($hasHeader)

        <header class="px-5 py-3 border-b flex items-center justify-between">
        
            <h2 class="font-bold">{{ $title ?? '' }}</h2>

            {{ $modalTrigger ?? '' }}

        </header>

    @endif

    {{ $slot }}

    @if(isset($footer))
        <footer class="px-5 py-3 border-t">
            {{ $footer }}
        </footer>
    @endif

</div>