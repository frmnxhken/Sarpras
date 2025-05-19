<x-layout>


    <!-- Tombol Pemicu Modal -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalPerawatanBarang">
        Tambah Perawatan
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modalPerawatanBarang" tabindex="-1" aria-labelledby="modalPerawatanLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 700px;">
            <div class="modal-content">

                <!-- Header Modal -->
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPerawatanLabel">Form Perawatan Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Body Modal -->
                <div class="modal-body px-3">
                    <form class="row g-3">

                        <div class="col-md-6">
                            <label for="tanggalPerawatan" class="form-label">Tanggal Perawatan</label>
                            <input type="date" class="form-control" id="tanggalPerawatan" required>
                        </div>

                        <div class="col-md-6">
                            <label for="namaBarang" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="namaBarang" placeholder="Contoh: Komputer"
                                required>
                        </div>

                        <div class="col-md-6">
                            <label for="unit" class="form-label">Unit</label>
                            <input type="text" class="form-control" id="unit" placeholder="Contoh: Lab Komputer"
                                required>
                        </div>

                        <div class="col-md-6">
                            <label for="jenisPerawatan" class="form-label">Jenis Perawatan</label>
                            <input type="text" class="form-control" id="jenisPerawatan"
                                placeholder="Contoh: Pembersihan" required>
                        </div>

                        <div class="col-md-6">
                            <label for="biaya" class="form-label">Biaya Perawatan (Rp)</label>
                            <input type="number" class="form-control" id="biaya" placeholder="Contoh: 50000" required>
                        </div>

                        <div class="col-md-12">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan" rows="3"
                                placeholder="Contoh: Membersihkan debu pada komponen internal"></textarea>
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




    <div class="row mb-3 align-items-center">
        <div class="col-md-6">
            <input type="text" id="searchPerawatan" class="form-control" placeholder="Cari data perawatan...">
        </div>
        <div class="col-md-6 text-end">
            <button class="btn btn-danger me-2"><i class="bi bi-file-earmark-pdf"></i> Cetak PDF</button>
            <button class="btn btn-success"><i class="bi bi-file-earmark-excel"></i> Ekspor Excel</button>
        </div>
    </div>

    <div class="table-responsive">
        <table id="tabelPerawatan" class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Tanggal Perawatan</th>
                    <th>Nama Barang</th>
                    <th>Unit</th>
                    <th>Jenis Perawatan</th>
                    <th>Biaya (Rp)</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2024-06-01</td>
                    <td>Komputer</td>
                    <td>Lab Komputer</td>
                    <td>Pembersihan</td>
                    <td>50000</td>
                    <td>Membersihkan kipas dan casing</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>2024-06-10</td>
                    <td>Printer</td>
                    <td>Administrasi</td>
                    <td>Ganti Tinta</td>
                    <td>75000</td>
                    <td>Mengganti tinta printer warna</td>
                </tr>
                <!-- Tambahkan data lainnya sesuai kebutuhan -->
            </tbody>
        </table>
    </div>

    <!-- Script pencarian global -->
    <script>
        document.getElementById('searchPerawatan').addEventListener('keyup', function () {
            const filter = this.value.toLowerCase();
            const rows = document.querySelectorAll('#tabelPerawatan tbody tr');
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    </script>

</x-layout>