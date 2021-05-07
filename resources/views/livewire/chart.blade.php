<x-panel>
    <x-slot name="title">Income</x-slot>

    <div class="p-5">
        <canvas id="{{ $type }}-chart" class="w-full" height="800"></canvas>
    </div>
</x-panel>

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js" integrity="sha512-VMsZqo0ar06BMtg0tPsdgRADvl0kDHpTbugCBBrL55KmucH6hP9zWdLIWY//OTfMnzz6xWQRxQqsUFefwHuHyg==" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('livewire:load', function () {

            const config = {
                type: 'bar',
                data: {
                    labels: @this.labels,
                    datasets: [{
                        label: 'Income',
                        data: @this.data,
                        backgroundColor: '#1F2937'
                    }]
                },
                options: {
                    indexAxis: 'y',
                    maintainAspectRatio: false
                }
            };

            const chart = new Chart(
                document.querySelector(`#${@this.type}-chart`),
                config
            );

            console.log(@this.type)
        });
    </script>
@endpush