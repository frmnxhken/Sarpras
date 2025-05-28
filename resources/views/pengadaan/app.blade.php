<x-layout>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#TambahPengadaan">
        <i class="bi bi-plus-circle me-2"></i>Tambah Pengadaan
    </button>
    <div class="table-responsive">
        <table id="tabelPengadaan" class="table table-bordered table-striped align-middle">
            <thead class="table-light text-center">
                <tr>
                    <th>No</th>
                    <!-- <th>Kode Barang</th> -->
                    <th>Nama Barang</th>
                    <!-- <th>Jenis Barang</th> -->
                    <th>Merk / Spesifikasi</th>
                    <th>Jumlah Barang</th>
                    <th>Tanggal Pengadaan</th>
                    <!-- <th>Sumber Dana</th> -->
                    <!-- <th>Supplier</th> -->
                    <th>Harga Satuan</th>
                    <th>Total Harga</th>
                    <th>Status Pengajuan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <!-- <td>BRG-001</td> -->
                    <td>Proyektor Epson</td>
                    <!-- <td>Elektronik</td> -->
                    <td>Epson X400, 3000 lumens</td>
                    <td>2 Unit</td>
                    <td>15-01-2025</td>
                    <!-- <td>BOS</td> -->
                    <!-- <td>CV. Sinar Abadi</td> -->
                    <td>Rp 5.000.000</td>
                    <td>Rp 10.000.000</td>
                    <td><span class="badge bg-warning text-dark">Menunggu</span></td>
                    <td><button class="btn btn-primary px-2 py-1 m-0" data-bs-toggle="modal" data-bs-target="#modalDetailPengadaan">Detail</button>
                    </td>
                    @include('pengadaan.detail')
                </tr>
            </tbody>
        </table>
    </div>
</x-layout>