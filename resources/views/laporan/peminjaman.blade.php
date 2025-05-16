<x-layout>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#TambahPeminjaman">
        Tambah Peminjaman
    </button>

    <div class="modal fade" id="TambahPeminjaman" tabindex="-1" aria-labelledby="TambahPeminjamanLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 600px;">
            <div class="modal-content">

                <!-- Header Modal -->
                <div class="modal-header">
                    <h5 class="modal-title" id="TambahPeminjamanLabel">Form Peminjaman Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Body Modal -->
                <div class="modal-body px-3">
                    <form class="row g-3 mb-3">

                        <div class="col-12">
                            <label for="tanggalPinjam" class="form-label">Tanggal Pinjam</label>
                            <input type="date" class="form-control" id="tanggalPinjam" name="tanggal_pinjam">
                        </div>

                        <div class="col-12">
                            <label for="namaPeminjam" class="form-label">Nama Peminjam</label>
                            <input type="text" class="form-control" id="namaPeminjam" name="nama_peminjam">
                        </div>

                        <div class="col-12">
                            <label for="unit" class="form-label">Unit</label>
                            <input type="text" class="form-control" id="unit" name="unit">
                        </div>

                        <div class="col-12">
                            <label for="barang" class="form-label">Barang</label>
                            <input type="text" class="form-control" id="barang" name="barang">
                        </div>

                        <div class="col-12">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah">
                        </div>

                        <div class="col-12">
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

            </div>
        </div>
    </div>



    <div class="row align-items-center mb-4">
        <!-- Kolom pencarian -->
        <div class="col-md-6">
            <input type="text" id="globalSearch" class="form-control" placeholder="Cari apa saja di tabel...">
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
            </tbody>
        </table>
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