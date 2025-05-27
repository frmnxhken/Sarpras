<x-layout>
    
    <div class="row mb-3 align-items-center">
        <div class="col-md-3">
            <select class="form-select">
                <option selected>Pilih Status</option>
                <option>Diperbaiki</option>
                <option>Selesai</option>
            </select>
        </div>
        <div class="col-md-3">
            <input type="text" id="globalSearch" class="form-control" placeholder="Cari data perawatan...">
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