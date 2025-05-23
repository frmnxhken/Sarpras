<x-layout>
    <div class="row align-items-center mb-4">
        <div class="col-md-3">
            <input type="text" id="globalSearch" class="form-control" placeholder="Cari data penghapusan...">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary w-100"><i class="ri-search-line me-1"></i>Filter</button>
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
                    <th>Status Pengajuan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2024-06-15</td>
                    <td>Kursi Kantor</td>
                    <td>5</td>
                    <td>Rusak parah dan tidak bisa diperbaiki</td>
                    <td><span class="badge bg-warning">Pending</span></td>
                    <td>
                        <button type="submit" class="btn btn-primary px-2 py-1">Edit</button>
                        <button type="submit" class="btn btn-danger px-2 py-1">Batal</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>2024-06-20</td>
                    <td>Printer</td>
                    <td>1</td>
                    <td>Sudah tidak berfungsi</td>
                    <td><span class="badge bg-warning">Pending</span></td>
                    <td>
                        <button type="submit" class="btn btn-primary px-2 py-1">Edit</button>
                        <button type="submit" class="btn btn-danger px-2 py-1">Batal</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

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