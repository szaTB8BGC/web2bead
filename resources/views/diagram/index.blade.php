@extends('layouts.arcana')

@section('title', 'Statisztika')

@section('content')
    <article>
        <header>
            <h2>Nemzeti Parkok statisztikája</h2>
            <p>Települések eloszlása nemzeti parkonként</p>
        </header>

        <div style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
            <canvas id="parksChart" width="400" height="200"></canvas>
        </div>

        <p style="margin-top: 20px;">
            Ez a diagram az adatbázisban szereplő összefüggéseket szemlélteti. 
            Segítségével könnyen azonosítható, mely nemzeti parkok rendelkeznek a legtöbb regisztrált településsel.
        </p>

        <script src="https://cdn.jsdelivr.net/npm/chart.js">//chart.js kell</script> 

        <script>
            const ctx = document.getElementById('parksChart').getContext('2d');
            
            // Adatok átvétele a PHP-ból JSON formátumban
            const labels = {!! json_encode($labels) !!};
            const data = {!! json_encode($counts) !!};

            new Chart(ctx, {
                type: 'bar', // Oszlopdiagram
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Települések száma',
                        data: data,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        }
                    }
                }
            });
        </script>
    </article>
@endsection