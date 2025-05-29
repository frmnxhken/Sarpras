<x-layout>
    <div class="table-responsive">
        <table id="tabelPengadaan" class="table table-bordered table-striped align-middle">
            <thead class="table-light text-center">
                <tr>
                    <th>No</th>
                    <th>Tanggal Pengadaan</th>
                    <th>Nama Barang</th>
                    <th>Merk / Spesifikasi</th>
                    <th>Jumlah Barang</th>
                    <th>Total Harga</th>
                    <th>Jenis Pengadaan</th>
                    <th>Status Pengajuan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pengadaans as $pengadaan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pengadaan->created_at->format('Y-m-d') }}</td>
                        <td>{{ $pengadaan->nama_barang }}</td>
                        <td>{{ $pengadaan->merk_barang }}</td>
                        <td>{{ $pengadaan->jumlah }}</td>
                        <td>Rp {{ number_format($pengadaan->harga_perolehan, 0, ',', '.') }}</td>
                        <td>
                            @if ($pengadaan->tipe_pengajuan === 'tambah')
                                Tambah Jumlah
                            @elseif ($pengadaan->tipe_pengajuan === 'baru')
                                Barang Baru
                            @else
                            {{ $pengadaan->tipe_pengajuan }}
                            @endif
                        </td>
                        <td>
                            @if ($pengadaan->status == 'pending')
                                <span class="badge bg-warning">{{ $pengadaan->status }}</span>
                            @elseif ($pengadaan->status == 'disetujui')
                                <span class="badge bg-success">{{ $pengadaan->status }}</span>
                            @else
                                <span class="badge bg-danger">{{ $pengadaan->status }}</span>
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-primary px-2 py-1 m-0" data-bs-toggle="modal" data-bs-target="#modalDetailPengadaan{{ $loop->iteration }}">Detail</button>
                        </td>
                        @include('pengadaan.popup.detail')
                    </tr>
                @empty
                    
                @endforelse
            </tbody>
        </table>
    </div>
</x-layout>