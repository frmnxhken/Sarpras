<x-layout>
    <form method="GET" action="{{ route('penghapusan.index') }}">
        <div class="row mb-3 align-items-center justify-content-between">
            {{-- Kolom Pencarian --}}
            <div class="col-md-4 d-flex">
                <input type="text" name="search" id="searchMutasi" class="form-control me-2" placeholder="Cari barang..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">
                    <i class="ri-search-line me-1"></i>Filter
                </button>
            </div>

            {{-- Tombol Ekspor --}}
            <div class="col-md-4 text-end">
                <div class="btn-group me-2">
                    <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-file-earmark-pdf"></i> Cetak PDF
                    </button>
                    <ul class="dropdown-menu bg-danger" style=" min-width: 100%;">
                        <li><a class="dropdown-item text-white" target="_blank">1 Bulan</a></li>
                        <li><a class="dropdown-item text-white" target="_blank">3 Bulan</a></li>
                        <li><a class="dropdown-item text-white" target="_blank">6 Bulan</a></li>
                        <li><a class="dropdown-item text-white" target="_blank">1 Tahun</a></li>
                    </ul>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-file-earmark-excel"></i> Ekspor Excel
                    </button>
                    <ul class="dropdown-menu bg-success" style="min-width: 100%;">
                        <li><a class="dropdown-item text-white">1 Bulan</a></li>
                        <li><a class="dropdown-item text-white">3 Bulan</a></li>
                        <li><a class="dropdown-item text-white">6 Bulan</a></li>
                        <li><a class="dropdown-item text-white">1 Tahun</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </form>
    <div class="table-responsive">
        <table id="tabelPenghapusan" class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Alasan Penghapusan</th>
                    <th>Status Pengajuan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->created_at->format('Y-m-d') }}</td>
                        <td>{{ $item->barang->nama_barang }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            @if ($item->ajuan[0]->status == 'pending')
                                <span class="badge bg-warning">Belum disetujui</span>
                            @elseif ($item->ajuan[0]->status == 'disetujui')
                                <span class="badge bg-success">Disetujui</span>
                            @else
                                <span class="badge bg-danger">Ditolak</span>
                            @endif
                        </td>
                    </tr>
                    
                @empty
                    <td colspan="8" class="text-center">Tidak ada data laporan</td>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- Script pencarian global -->
    <script>
        document.getElementById('globalSearch').addEventListener('keyup', function () {
            const filter = this.value.toLowerCase();
            const rows = document.querySelectorAll('#tabelPenghapusan tbody tr');

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    </script>

</x-layout>