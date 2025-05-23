<x-layout>
    <div class="modal fade" id="modalPerawatanBarang" tabindex="-1" aria-labelledby="modalPerawatanLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <form class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="modalPerawatanLabel">Form Perawatan Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="tanggalPerawatan" class="form-label">Tanggal Perawatan</label>
                            <input type="date" class="form-control" id="tanggalPerawatan" required>
                        </div>

                        <div class="col-md-12">
                            <label for="namaBarang" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="namaBarang" placeholder="Contoh: Komputer" required>
                        </div>

                        <div class="col-md-12">
                            <label for="unit" class="form-label">Unit</label>
                            <input type="text" class="form-control" id="unit" placeholder="Contoh: Lab Komputer" required>
                        </div>

                        <div class="col-md-12">
                            <label for="jenisPerawatan" class="form-label">Jenis Perawatan</label>
                            <input type="text" class="form-control" id="jenisPerawatan" placeholder="Contoh: Pembersihan" required>
                        </div>

                        <div class="col-md-12">
                            <label for="biaya" class="form-label">Biaya Perawatan (Rp)</label>
                            <input type="number" class="form-control" id="biaya" placeholder="Contoh: 50000" required>
                        </div>

                        <div class="col-12">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan" rows="3" placeholder="Contoh: Membersihkan debu pada komponen internal"></textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>

            </form>
        </div>
    </div>

    <div class="row mb-3 align-items-center">
        <div class="col-md-3">
            <select class="form-select">
                <option selected>Semua Status</option>
                <option>Diperbaiki</option>
                <option>Selesai</option>
            </select>
        </div>
        <div class="col-md-3">
            <input type="text" id="globalSearch" class="form-control" placeholder="Cari data peminjaman...">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary w-100"><i class="ri-search-line me-1"></i>Filter</button>
        </div>
        <div class="col-md-4 text-end">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
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
                <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-file-earmark-excel"></i> Ekspor Excel
                </button>
                <ul class="dropdown-menu bg-success" style="min-width: 100%;">
                    <li><a class="dropdown-item text-white" >1 Bulan</a></li>
                    <li><a class="dropdown-item text-white" >3 Bulan</a></li>
                    <li><a class="dropdown-item text-white" >6 Bulan</a></li>
                    <li><a class="dropdown-item text-white" >1 Tahun</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table id="tabelPerawatan" class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Tanggal Perawatan</th>
                    <th>Nama Barang</th>
                    <th>Unit</th>
                    <th>Jenis Perawatan</th>
                    <th>Jumlah</th>
                    <th>Biaya (Rp)</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dataPerawatan as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->tanggal_perawatan }}</td>
                        <td>{{ $data->barang->nama_barang }}</td>
                        <td>{{ $data->barang->ruangan->nama_ruangan }}</td>
                        <td>{{ $data->jenis_perawatan }}</td>
                        <td>{{ $data->jumlah ?? '-' }}</td>
                        <td>{{ number_format($data->biaya, 0, ',', '.') }}</td>
                        <td>{{ $data->keterangan ?? '-'}}</td>
                        <td>
                            @if ($data->ajuan[0]->status == 'pending')
                                <span class="badge bg-warning">belum disetujui</span>
                            @elseif ($data->ajuan[0]->status == 'disetujui')
                                @if ($data->status == 'belum')
                                    <span class="badge bg-warning">Diperbaiki</span>
                                @else
                                    <span class="badge bg-success">Selesai</span>
                                @endif
                            @else
                                <span class="badge bg-danger">Ditolak</span>
                            @endif
                        </td>
                    </tr>
                    
                @empty
                    <td colspan="9" class="text-center">Tidak ada data laporan</td>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layout>