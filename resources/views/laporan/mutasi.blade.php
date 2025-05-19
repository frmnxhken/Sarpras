<x-layout>

    <!-- Tombol Pemicu Modal -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalMutasiBarang">
        Tambah Mutasi
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modalMutasiBarang" tabindex="-1" aria-labelledby="modalMutasiLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 600px;">
            <div class="modal-content">

                <!-- Header Modal -->
                <div class="modal-header">
                    <h5 class="modal-title" id="modalMutasiLabel">Form Mutasi Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Body Modal -->
                <div class="modal-body px-3">
                    <form class="row g-3 mb-3">

                        <div class="col-12">
                            <label for="tanggalMutasi" class="form-label">Tanggal Mutasi</label>
                            <input type="date" class="form-control" id="tanggalMutasi" required>
                        </div>

                        <div class="col-12">
                            <label for="namaBarang" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="namaBarang" required>
                        </div>

                        <div class="col-12">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" required>
                        </div>

                        <div class="col-12">
                            <label for="dariUnit" class="form-label">Dari Unit</label>
                            <input type="text" class="form-control" id="dariUnit" required>
                        </div>

                        <div class="col-12">
                            <label for="keUnit" class="form-label">Ke Unit</label>
                            <input type="text" class="form-control" id="keUnit" required>
                        </div>

                        <div class="col-12">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan">
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