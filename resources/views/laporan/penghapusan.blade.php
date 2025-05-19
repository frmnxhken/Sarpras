<x-layout>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#TambahPenghapusan">
        Tambah Penghapusan
    </button>

    <div class="modal fade" id="TambahPenghapusan" tabindex="-1" aria-labelledby="TambahPenghapusanLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

                <!-- Header Modal -->
                <div class="modal-header">
                    <h5 class="modal-title" id="TambahPenghapusanLabel">Form Penghapusan Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Body Modal -->
                <div class="modal-body">
                    <form class="row g-3">
                        <div class="col-md-12">
                            <label for="tglPenghapusan" class="form-label">Tanggal Penghapusan</label>
                            <input type="date" class="form-control" id="tglPenghapusan" required>
                        </div>
                        <div class="col-md-12">
                            <label for="namaBarangHapus" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="namaBarangHapus" placeholder="Contoh: Komputer"
                                required>
                        </div>
                        <div class="col-md-12">
                            <label for="jumlahHapus" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" id="jumlahHapus" min="1" required>
                        </div>
                        <div class="col-md-12">
                            <label for="alasanHapus" class="form-label">Alasan Penghapusan</label>
                            <input type="text" class="form-control" id="alasanHapus" placeholder="Rusak total / Usang"
                                required>
                        </div>

                        <div class="col-12 d-flex justify-content-end mt-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Pencarian Global -->
    <div class="row align-items-center mb-4">
        <!-- Kolom pencarian -->
        <div class="col-md-6">
            <input type="text" id="globalSearch" class="form-control" placeholder="Cari data penghapusan...">
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
    <div class="table-responsive">
        <table id="tabelPenghapusan" class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Alasan Penghapusan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2024-06-15</td>
                    <td>Kursi Kantor</td>
                    <td>5</td>
                    <td>Rusak parah dan tidak bisa diperbaiki</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>2024-06-20</td>
                    <td>Printer</td>
                    <td>1</td>
                    <td>Sudah tidak berfungsi</td>
                </tr>
                <!-- Tambahkan baris sesuai data -->
            </tbody>
        </table>
    </div>
    <!-- Script pencarian global -->
    <script>
        document.getElementById('globalSearch').addEventListener('keyup', function () {
            const filter = this.value.toLowerCase();
            const rows = document.querySelectorAll('#tabelPenghapusan tbody tr');

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    </script>

</x-layout>