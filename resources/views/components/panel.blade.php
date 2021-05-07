<div class="bg-white rounded-lg">

    <header class="px-5 py-3 border-b flex items-center justify-between">
    
        <h2 class="font-bold">{{ $title }}</h2>

        {{ $modalTrigger ?? '' }}

    </header>

    {{ $slot }}

</div>