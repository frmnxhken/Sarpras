<x-layout>
    
    <div class="row mb-3 align-items-center">
        <div class="col-md-3">
            <input type="text" id="searchMutasi" class="form-control" placeholder="Cari mutasi...">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary w-100"><i class="ri-search-line me-1"></i>Filter</button>
        </div>
        <div class="col-md-7 text-end">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bi bi-file-earmark-pdf"></i> Cetak PDF
                </button>
                <ul class="dropdown-menu bg-danger" style=" min-width: 100%;">
                    <li><a class="dropdown-item text-white"  target="_blank">1 Bulan</a></li>
                    <li><a class="dropdown-item text-white"  target="_blank">3 Bulan</a></li>
                    <li><a class="dropdown-item text-white"  target="_blank">6 Bulan</a></li>
                    <li><a class="dropdown-item text-white"  target="_blank">1 Tahun</a></li>
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

    <!-- Tabel Data Mutasi -->
    <div class="table-responsive">
        <table id="tabelMutasi" class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Tanggal Mutasi</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Dari Unit</th>
                    <th>Ke Unit</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mutasi as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->tanggal_mutasi }}</td>
                        <td>{{ $item->barang->nama_barang }}</td>
                        <td>{{ $item->jumlah_barang }}</td>
                        <td>{{ $item->barang->ruangan->nama_ruangan }}</td>
                        <td>{{ $ruangans[$item->tujuan] }}</td>
                        <td>{{ $item->keterangan ?? '-' }}</td>
                        <td>
                            @if ($item->ajuan[0]->status == 'pending')
                                <span class="badge bg-warning">Belum disetujui</span>
                            @elseif ($item->ajuan[0]->status == 'disetujui')
                                <span class="badge bg-success">Dipindah</span>
                            @else
                                <span class="badge bg-danger">Ditolak</span>
                            @endif
                        </td>
                    </tr>
                @empty
                        <td colspan="8" class="text-center">Data mutasi kosong</td>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Script Pencarian -->
    <script>
        document.getElementById('searchMutasi').addEventListener('keyup', function () {
            const filter = this.value.toLowerCase();
            const rows = document.querySelectorAll('#tabelMutasi tbody tr');
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    </script>

</x-layout>