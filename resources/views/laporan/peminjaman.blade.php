<x-layout>
    <div class="container my-5">
        <h2 class="mb-4 text-center">Laporan Peminjaman Barang</h2>

        <!-- Filter Form -->
        <form class="row g-3 mb-4">
            <div class="col-md-3">
                <label for="startDate" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control" id="startDate">
            </div>
            <div class="col-md-3">
                <label for="endDate" class="form-label">Tanggal Akhir</label>
                <input type="date" class="form-control" id="endDate">
            </div>
            <div class="col-md-3">
                <label for="status" class="form-label">Status</label>
                <select id="status" class="form-select">
                    <option selected>Semua</option>
                    <option>Dipinjam</option>
                    <option>Dikembalikan</option>
                    <option>Hilang</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="peminjam" class="form-label">Nama Peminjam</label>
                <input type="text" class="form-control" id="peminjam" placeholder="Cari nama...">
            </div>
            <div class="col-12 d-flex justify-content-end gap-2">
                <button type="submit" class="btn btn-primary">Filter</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form>

        <!-- Tombol Ekspor -->
        <div class="d-flex justify-content-end mb-3 gap-2">
            <button class="btn btn-danger"><i class="bi bi-file-earmark-pdf"></i> Cetak PDF</button>
            <button class="btn btn-success"><i class="bi bi-file-earmark-excel"></i> Ekspor Excel</button>
        </div>

        <!-- Tabel -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
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
                        <td>Dikembalikan</td>
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
                    <!-- Tambahkan data sesuai kebutuhan -->
                </tbody>
            </table>
        </div>
    </div>
</x-layout>