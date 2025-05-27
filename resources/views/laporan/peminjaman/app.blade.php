<x-layout>
    <form method="GET" action="{{ route('peminjaman.index') }}">
        <div class="row align-items-center mb-4">
            <div class="col-md-3">
                <select name="status" class="form-select">
                    <option value="">Pilih Status</option>
                    <option value="Dipinjam" {{ request('status') == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                    <option value="Dikembalikan" {{ request('status') == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                    <option value="Hilang" {{ request('status') == 'Hilang' ? 'selected' : '' }}>Hilang</option>
                </select>
            </div>
            <div class="col-md-3">
                <input type="text" name="search" class="form-control" placeholder="Cari data peminjaman..." value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100"><i class="ri-search-line me-1"></i>Filter</button>
            </div>
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

    <!-- Tabel Data -->
    <div class="table-responsive">
        <table id="dataPeminjaman" class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Tanggal Pinjam</th>
                    <th>Batas Pinjam</th>
                    <th>Nama Peminjam</th>
                    <th>Unit</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->tanggal_peminjaman }}</td>
                    <td>{{ $item->tanggal_pengembalian }}</td>
                    <td>{{ $item->nama_peminjam }}</td>
                    <td>{{ $item->barang->ruangan->nama_ruangan }}</td>
                    <td>{{ $item->barang->nama_barang }}</td>
                    <td>{{ $item->jumlah_barang }}</td>
                    <td>
                        @if ($item->ajuan[0]->status == 'pending')
                        <span class="badge bg-warning">Belum disetujui</span>
                        @elseif ($item->ajuan[0]->status == 'disetujui')
                        @if ($item->status_peminjaman == 'Dipinjam')
                        <span class="badge bg-warning">Dipinjam</span>
                        @elseif ($item->status_peminjaman == 'Dikembalikan')
                        <span class="badge bg-success">Dikembalikan</span>
                        @else
                        <span class="badge bg-danger">Hilang</span>
                        @endif
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
</x-layout>