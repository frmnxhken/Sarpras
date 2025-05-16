<x-layout>
    <div class="container my-5">
        <h2 class="mb-4 text-center">Form Peminjaman Barang</h2>

        <form class="row g-3 mb-4">
            <div class="col-md-4">
                <label for="tanggalPinjam" class="form-label">Tanggal Pinjam</label>
                <input type="date" class="form-control" id="tanggalPinjam" name="tanggal_pinjam">
            </div>
            <div class="col-md-4">
                <label for="namaPeminjam" class="form-label">Nama Peminjam</label>
                <input type="text" class="form-control" id="namaPeminjam" name="nama_peminjam">
            </div>
            <div class="col-md-4">
                <label for="unit" class="form-label">Unit</label>
                <input type="text" class="form-control" id="unit" name="unit">
            </div>
            <div class="col-md-4">
                <label for="barang" class="form-label">Barang</label>
                <input type="text" class="form-control" id="barang" name="barang">
            </div>
            <div class="col-md-4">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah">
            </div>
            <div class="col-md-4">
                <label for="status" class="form-label">Status</label>
                <select id="status" name="status" class="form-select">
                    <option selected disabled>Pilih status</option>
                    <option>Dipinjam</option>
                    <option>Dikembalikan</option>
                    <option>Hilang</option>
                </select>
            </div>
            <div class="col-12 d-flex justify-content-end gap-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form>
    </div>
    <div class="container my-5">
        <h2 class="mb-4 text-center">Daftar Barang yang Dipinjam</h2>

        <!-- Global Search -->
        <div class="row mb-4">
            <div class="col-md-6">
                <input type="text" id="globalSearch" class="form-control" placeholder="Cari apa saja di tabel...">
            </div>
        </div>

        <!-- Tabel Data -->
        <div class="table-responsive">
            <table id="dataTable" class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pinjam</th>
                        <th>Nama Peminjam</th>
                        <th>Unit</th>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>2024-05-01</td>
                        <td>Agus Setiawan</td>
                        <td>Laboratorium</td>
                        <td>Laptop</td>
                        <td>2</td>
                        <td>Dipinjam</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>2024-05-03</td>
                        <td>Dwi Rahmawati</td>
                        <td>TU</td>
                        <td>Proyektor</td>
                        <td>1</td>
                        <td>Dipinjam</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>2024-05-05</td>
                        <td>Rina Amelia</td>
                        <td>Keuangan</td>
                        <td>Printer</td>
                        <td>1</td>
                        <td>Dikembalikan</td>
                    </tr>
                    <!-- Tambahkan data sesuai kebutuhan -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Script Pencarian Global -->
    <script>
        document.getElementById('globalSearch').addEventListener('keyup', function () {
            const filter = this.value.toLowerCase();
            const rows = document.querySelectorAll('#dataTable tbody tr');

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    </script>
</x-layout>