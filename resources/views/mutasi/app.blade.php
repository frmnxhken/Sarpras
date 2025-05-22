<x-layout>

    <!-- Tombol Tambah Mutasi -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalMutasiBarang">
        <i class="bi bi-plus-circle me-2"></i>Tambah Mutasi
    </button>

    

    <!-- Fitur Pencarian & Ekspor -->
    <div class="row mb-3 align-items-center">
        <div class="col-md-3">
            <input type="text" id="searchMutasi" class="form-control" placeholder="Cari mutasi...">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary w-100"><i class="ri-search-line me-1"></i>Filter</button>
        </div>
        <div class="col-md-7 text-end">
            <button class="btn btn-danger me-2"><i class="bi bi-file-earmark-pdf"></i> Cetak PDF</button>
            <button class="btn btn-success"><i class="bi bi-file-earmark-excel"></i> Ekspor Excel</button>
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
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2024-05-10</td>
                    <td>Laptop</td>
                    <td>2</td>
                    <td>Laboratorium</td>
                    <td>Keuangan</td>
                    <td>Pindah ruangan baru</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>2024-05-11</td>
                    <td>PC</td>
                    <td>2</td>
                    <td>Laboratorium</td>
                    <td>Ruang Kepsek</td>
                    <td>Pindah ruangan baru</td>
                </tr>
                <!-- Tambahkan data lain sesuai kebutuhan -->
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
