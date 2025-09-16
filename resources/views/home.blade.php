@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0" style="background:#fff8f0;">
                <div class="card-header text-center fw-bold" style="background:#f5e6d3; color:#5c4033; font-size:1.3rem;">
                    {{ __('Dashboard') }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4 class="text-center mb-4" style="color:#5c4033;">Statistik Pengunjung</h4>

                    {{-- ✅ Canvas grafik --}}
                    <canvas id="grafikPengunjung" height="120"></canvas>

                    {{-- ✅ Chart.js --}}
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        const labels = @json($grafikTamu->keys());
                        const data   = @json($grafikTamu->values());

                        const ctx = document.getElementById('grafikPengunjung').getContext('2d');

                        new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Jumlah Pengunjung',
                                    data: data,
                                    backgroundColor: [
                                        '#a67c52', // coklat medium
                                        '#c4a484', // cream-coklat muda
                                        '#f5e6d3', // cream
                                        '#8b5e3c', // coklat tua
                                        '#d9bfa7', // krem muda
                                    ],
                                    borderColor: '#5c4033',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        labels: { color: '#5c4033', font: { size: 14 } }
                                    },
                                    title: {
                                        display: false
                                    }
                                },
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        ticks: { color: '#5c4033' },
                                        grid: { color: '#e0d6c3' }
                                    },
                                    x: {
                                        ticks: { color: '#5c4033' },
                                        grid: { color: '#e0d6c3' }
                                    }
                                }
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
