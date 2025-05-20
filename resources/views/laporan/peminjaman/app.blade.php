<x-layout>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#TambahPeminjaman">
        Tambah Peminjaman
    </button>
    @include('laporan.peminjaman.popup.tambah_peminjaman')
    <div class="row align-items-center mb-4">
        <!-- Kolom pencarian -->
        <div class="col-md-6">
            <input type="text" id="globalSearch" class="form-control" placeholder="Cari data peminjaman...">
        </div>
        <div class="col-md-6 text-end">
            <button class="btn btn-danger me-2">
                <i class="bi bi-file-earmark-pdf"></i> Cetak PDF
            </button>
            <button class="btn btn-success">
                <i class="bi bi-file-earmark-excel"></i> Ekspor Excel
            </button>
        </div>
    </div>

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
                    <th>Aksi</th>
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
                            <span class="badge @if ($item->status_peminjaman == 'Dipinjam') bg-warning  @elseif ($item->status_peminjaman == 'Dikembalikan') bg-success @else bg-danger @endif text-white">{{ $item->status_peminjaman }}</span>
                        </td>
                        <td>
                            @if ($item->status_peminjaman == 'Dipinjam')
                                <form
                                    action="{{ route('peminjaman.updateStatus', ['id' => $item->id, 'status' => 'Dikembalikan']) }}"
                                    method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-success px-2 py-1"
                                        onclick="return confirm('Yakin ingin mengembalikan?')">Kembalikan</button>
                                </form>

                                <form
                                    action="{{ route('peminjaman.updateStatus', ['id' => $item->id, 'status' => 'Hilang']) }}"
                                    method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-danger px-2 py-1"
                                        onclick="return confirm('Yakin barang ini hilang?')">Hilang</button>
                                </form>
                            @endif
                            {{-- <button>Dikembalikan</button> --}}
                        </td>
                    </tr>
                @empty
                    Tidak ada data peminjaman
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Script Pencarian Global -->
    <script>
        document.getElementById('globalSearch').addEventListener('keyup', function() {
            const filter = this.value.toLowerCase();
            const rows = document.querySelectorAll('#dataPeminjaman tbody tr');

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    </script>
</x-layout>
