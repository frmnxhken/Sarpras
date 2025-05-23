<x-layout>

    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalPerawatanBarang">
        <i class="bi bi-plus-circle me-2"></i>Tambah Perawatan
    </button>
    @include('perawatan.popup.tambah')
    <!-- Search and Export Buttons -->
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
    </div>

    <!-- Table -->
    <div class="table-responsive">
        <table id="tabelPerawatan" class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Tanggal Perawatan</th>
                    <th>Nama Barang</th>
                    <th>Unit</th>
                    <th>Jenis Perawatan</th>
                    <th>Biaya (Rp)</th>
                    <th>Keterangan</th>
                    <th>Status pengajuan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dataPerawatan as $item )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->tanggal_perawatan }}</td>
                        <td>{{ $item->barang->nama_barang }}</td>
                        <td>{{ $item->barang->ruangan->nama_ruangan }}</td>
                        <td>{{ $item->jenis_perawatan }}</td>
                        <td>{{ $item->biaya_perawatan }}</td>
                        <td>{{ $item->keterangan ?? '-' }}</td>
                        <td><span class="badge @if ($item->ajuan[0]->status == 'pending') bg-warning @elseif ($item->ajuan[0]->status == 'disetujui') bg-success
                        @endif">{{ $item->ajuan[0]->status }}</span></td>
                        <td>
                            <div class="d-flex gap-1">
                                @if ($item->ajuan[0]->status == 'disetujui')
                                    <form action="{{ route('perawatan.updateStatus', ['id' => $item->id, 'status' => 'Selesai']) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-primary px-2 py-1" onclick="return confirm('Yakin sudah selesai?')">Selesai</button>
                                    </form>
                                @elseif ($item->ajuan[0]->status == 'pending')
                                    <button>Edit</button>
                                    <button>Hapus</button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <td colspan="9" class="text-center">Belum ada barang yang dirawat</td>\
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Script pencarian -->
    <script>
        document.getElementById('searchPerawatan').addEventListener('keyup', function() {
            const filter = this.value.toLowerCase();
            const rows = document.querySelectorAll('#tabelPerawatan tbody tr');
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    </script>

</x-layout>