<x-layout>

    <!-- Tombol Tambah Mutasi -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalMutasiBarang">
        <i class="bi bi-plus-circle me-2"></i>Tambah Mutasi
    </button>

    <!-- Modal Form Mutasi -->
    <div class="modal fade" id="modalMutasiBarang" tabindex="-1" aria-labelledby="modalMutasiLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <form class="modal-content">

                <!-- Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="modalMutasiLabel">Form Mutasi Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Body -->
                <div class="modal-body">
                    <div class="row g-3">

                        <div class="col-md-12">
                            <label for="tanggalMutasi" class="form-label">Tanggal Mutasi</label>
                            <input type="date" class="form-control" id="tanggalMutasi" required>
                        </div>

                        <div class="col-md-12">
                            <label for="namaBarang" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="namaBarang" placeholder="Contoh: Laptop" required>
                        </div>

                        <div class="col-md-12">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" placeholder="Contoh: 2" required>
                        </div>

                        <div class="col-md-12">
                            <label for="keUnit" class="form-label">Ke Unit</label>
                            <input type="text" class="form-control" id="keUnit" placeholder="Contoh: Keuangan" required>
                        </div>

                        <div class="col-md-12">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan" rows="3"
                                placeholder="Contoh: Pindah ke ruangan baru"></textarea>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>

            </form>
        </div>
    </div>

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
