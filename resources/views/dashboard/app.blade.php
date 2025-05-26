<x-layout>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body overflow-hidden position-relative">
                    <iconify-icon icon="solar:asteroid-bold-duotone" class="fs-36 text-info"></iconify-icon>
                    <h3 class="mb-0 fw-bold mt-3 mb-1">{{ $totalBarang }}</h3>
                    <p class="text-muted">Total Barang</p>
                    <a class="text-reset fw-semibold fs-12" href="/inventaris">View More</a>
                    <i class='ri-global-line widget-icon'></i>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->

        <div class="col">
            <div class="card">
                <div class="card-body overflow-hidden position-relative">
                    <iconify-icon icon="solar:black-hole-line-duotone" class="fs-36 text-success"></iconify-icon>
                    <h3 class="mb-0 fw-bold mt-3 mb-1">{{ $barangRusak }}</h3>
                    <p class="text-muted"> Barang Rusak</p>
                    <a href="/barangRusak" class="text-reset fw-semibold fs-12">View More</a>
                    <i class='ri-file-chart-line widget-icon'></i>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->

        <div class="col">
            <div class="card">
                <div class="card-body overflow-hidden position-relative">
                    <iconify-icon icon="solar:leaf-bold-duotone" class="fs-36 text-primary"></iconify-icon>
                    <h3 class="mb-0 fw-bold mt-3 mb-1">{{ $barangBaru2025 }}</h3>
                    <p class="text-muted">Barang Masuk (Thn {{ \Carbon\Carbon::now()->year }})</p>
                    <a href="/barangMasuk" class="text-reset fw-semibold fs-12">View More</a>
                    <i class='ri-drag-move-line widget-icon'></i>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row-->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row g-0">
                        <div class="col-lg-12 border-start border-5">
                            <div class="p-3">
                                <!-- <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="card-title">Performance</h4>
                                    <div>
                                        <button type="button" class="btn btn-sm btn-outline-light">ALL</button>
                                        <button type="button" class="btn btn-sm btn-outline-light">1M</button>
                                        <button type="button" class="btn btn-sm btn-outline-light">6M</button>
                                        <button type="button" class="btn btn-sm btn-outline-light active">1Y</button>
                                    </div>
                                </div> 

                                <div class="alert alert-info mt-3 text text-truncate mb-0" role="alert">
                                    We regret to inform you that our server is currently
                                    experiencing technical difficulties.
                                </div> -->

                                <div class="container mt-4">
                                    <div id="dash-performance-chart" class="apex-charts"></div>
                                </div>
                                <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const chartDiv = document.querySelector("#dash-performance-chart");

                                        // Bersihkan isi div agar chart lama hilang
                                        chartDiv.innerHTML = '';

                                        if (window.myApexChart) {
                                            window.myApexChart.destroy();
                                        }

                                        var options = {
                                            chart: {
                                                type: 'bar',
                                                height: 350
                                            },
                                            series: [{
                                                    name: 'Barang Baru',
                                                    data: @json($dataBarangBaru)
                                                },
                                                {
                                                    name: 'Barang Rusak',
                                                    data: @json($dataBarangRusak)
                                                }
                                            ],
                                            xaxis: {
                                                categories: @json($tahunLabels)
                                            },
                                            colors: ['#007bff', '#dc3545'],
                                            title: {
                                                text: 'Jumlah Barang Baru dan Rusak per Tahun',
                                                align: 'center'
                                            }
                                        };

                                        window.myApexChart = new ApexCharts(chartDiv, options);
                                        window.myApexChart.render();
                                    });
                                </script>

                            </div>
                        </div> <!-- end right chart card -->
                    </div> <!-- end chart card -->
                </div> <!-- end card body -->
            </div> <!-- end card -->
        </div> <!-- end col-->
    </div> <!-- end row-->
</x-layout>