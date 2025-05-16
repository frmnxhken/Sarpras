<x-layout>
    <div class="container my-5">
        <h2 class="mb-4 text-center">Form Mutasi Barang</h2>

        <form class="row g-3 mb-4">
            <div class="col-md-4">
                <label for="tanggalMutasi" class="form-label">Tanggal Mutasi</label>
                <input type="date" class="form-control" id="tanggalMutasi" required>
            </div>
            <div class="col-md-4">
                <label for="namaBarang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="namaBarang" required>
            </div>
            <div class="col-md-4">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" required>
            </div>
            <div class="col-md-4">
                <label for="dariUnit" class="form-label">Dari Unit</label>
                <input type="text" class="form-control" id="dariUnit" required>
            </div>
            <div class="col-md-4">
                <label for="keUnit" class="form-label">Ke Unit</label>
                <input type="text" class="form-control" id="keUnit"  required>
            </div>
            <div class="col-md-4">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="keterangan">
            </div>
            <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Simpan Mutasi</button>
            </div>
        </form>
    </div>
    <div class="container my-5">
        <h2 class="mb-4 text-center">Data Mutasi Barang</h2>

        <!-- Kolom pencarian dan tombol ekspor jika dibutuhkan -->
        <div class="row mb-3 align-items-center">
            <div class="col-md-6">
                <input type="text" id="searchMutasi" class="form-control" placeholder="Cari mutasi...">
            </div>
            <div class="col-md-6 text-end">
                <button class="btn btn-danger me-2"><i class="bi bi-file-earmark-pdf"></i> Cetak PDF</button>
                <button class="btn btn-success"><i class="bi bi-file-earmark-excel"></i> Ekspor Excel</button>
            </div>
        </div>

        <!-- Tabel mutasi -->
        <div class="table-responsive">
            <table id="tabelMutasi" class="table table-bordered table-striped">
                <thead class="table-dark">
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
                        <td>Pc</td>
                        <td>2</td>
                        <td>Laboratorium</td>
                        <td>Ruang Kepsek</td>
                        <td>Pindah ruangan baru</td>
                    </tr>
                    <!-- Tambahkan data lain sesuai kebutuhan -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Script filter pencarian mutasi -->
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