<x-layout>

    <!-- Tombol Tambah Mutasi -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalMutasiBarang">
        <i class="bi bi-plus-circle me-2"></i>Tambah Mutasi
    </button>
    @include('mutasi.popup.tambah')

    <!-- Fitur Pencarian & Ekspor -->
    <div class="row mb-3 align-items-center">
        <div class="col-md-3">
            <input type="text" id="searchMutasi" class="form-control" placeholder="Cari mutasi...">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary w-100"><i class="ri-search-line me-1"></i>Filter</button>
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
                    <th>Status Pengajuan</th>
                    <th>Aksi</th>
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
                        <td>
                            {{ $ruangans[$item->tujuan] ?? '-' }}
                        </td>
                        <td>{{ $item->keterangan ?? '-' }}</td>
                        <td>
                            <span class="badge @if ($item->ajuan[0]->status == 'pending') bg-warning  @elseif ($item->ajuan[0]->status == 'disetujui') bg-success @else bg-danger @endif text-white">{{ $item->ajuan[0]->status }}</span>
                        </td>
                        <td>
                            @if ($item->ajuan[0]->status == 'pending')
                                <form action="{{ route('mutasi.updateStatus', ['id' => $item->id, 'status' => 'Selesai']) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-primary px-2 py-1">Edit</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">Data mutasi kosong</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Script Pencarian -->
    <script>
        document.getElementById('searchMutasi').addEventListener('keyup', function() {
            const filter = this.value.toLowerCase();
            const rows = document.querySelectorAll('#tabelMutasi tbody tr');
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    </script>

</x-layout>
