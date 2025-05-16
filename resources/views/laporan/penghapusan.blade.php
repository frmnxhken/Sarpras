<x-layout>
    <div class="container my-5">
    <h2 class="mb-4 text-center">Form Penghapusan Barang</h2>
    <form class="row g-3 mb-5">
        <div class="col-md-3">
            <label for="tglPenghapusan" class="form-label">Tanggal Penghapusan</label>
            <input type="date" class="form-control" id="tglPenghapusan" required>
        </div>
        <div class="col-md-3">
            <label for="namaBarangHapus" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="namaBarangHapus" placeholder="Contoh: Komputer" required>
        </div>
        <div class="col-md-3">
            <label for="jumlahHapus" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="jumlahHapus" min="1" required>
        </div>
        <div class="col-md-3">
            <label for="alasanHapus" class="form-label">Alasan Penghapusan</label>
            <input type="text" class="form-control" id="alasanHapus" placeholder="Rusak total / Usang" required>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Simpan Penghapusan</button>
        </div>
    </form>
        
    
    <h2 class="mb-4 text-center">Data Penghapusan Barang</h2>
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
        <table class="table table-bordered table-striped" id="tabelPenghapusan">
            <thead class="table-dark">
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
</div>

</x-layout>