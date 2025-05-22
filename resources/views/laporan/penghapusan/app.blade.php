<x-layout>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#TambahPenghapusan">
        <i class="bi bi-plus-circle me-2"></i>Tambah Penghapusan
    </button>

    <!-- Modal Penghapusan Barang -->
    <div class="modal fade" id="TambahPenghapusan" tabindex="-1" aria-labelledby="TambahPenghapusanLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <form class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="TambahPenghapusanLabel">Form Penghapusan Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="tglPenghapusan" class="form-label">Tanggal Penghapusan</label>
                            <input type="date" class="form-control" id="tglPenghapusan" required>
                        </div>

                        <div class="col-12">
                            <label for="namaBarangHapus" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="namaBarangHapus" placeholder="Contoh: Komputer"
                                required>
                        </div>

                        <div class="col-12">
                            <label for="jumlahHapus" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" id="jumlahHapus" min="1" required>
                        </div>

                        <div class="col-12">
                            <label for="alasanHapus" class="form-label">Alasan Penghapusan</label>
                            <input type="text" class="form-control" id="alasanHapus" placeholder="Rusak total / Usang"
                                required>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Pencarian Global -->
    <div class="row align-items-center mb-4">
        <!-- Kolom pencarian -->
        <div class="col-md-3">
            <input type="text" id="globalSearch" class="form-control" placeholder="Cari data penghapusan...">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary w-100"><i class="ri-search-line me-1"></i>Filter</button>
        </div>
        <div class="col-md-7 text-end">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-file-earmark-pdf"></i> Cetak PDF
                </button>
                <!-- <ul class="dropdown-menu bg-danger" style=" min-width: 100%;">
                    <li><a class="dropdown-item text-white" href="{{ route('penghapusan.cetakPDF') }}?periode=1" target="_blank">1 Bulan</a></li>
                    <li><a class="dropdown-item text-white" href="{{ route('penghapusan.cetakPDF') }}?periode=3" target="_blank">3 Bulan</a></li>
                    <li><a class="dropdown-item text-white" href="{{ route('penghapusan.cetakPDF') }}?periode=6" target="_blank">6 Bulan</a></li>
                    <li><a class="dropdown-item text-white" href="{{ route('penghapusan.cetakPDF') }}?periode=12" target="_blank">1 Tahun</a></li>
                </ul> -->
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-file-earmark-excel"></i> Ekspor Excel
                </button>
                <!-- <ul class="dropdown-menu bg-success" style="min-width: 100%;">
                    <li><a class="dropdown-item text-white" href="{{ route('penghapusan.exportExcel', ['periode' => 1]) }}">1 Bulan</a></li>
                    <li><a class="dropdown-item text-white" href="{{ route('penghapusan.exportExcel', ['periode' => 3]) }}">3 Bulan</a></li>
                    <li><a class="dropdown-item text-white" href="{{ route('penghapusan.exportExcel', ['periode' => 6]) }}">6 Bulan</a></li>
                    <li><a class="dropdown-item text-white" href="{{ route('penghapusan.exportExcel', ['periode' => 12]) }}">1 Tahun</a></li>
                </ul> -->
            </div>
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