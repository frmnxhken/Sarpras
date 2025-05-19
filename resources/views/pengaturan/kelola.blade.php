<x-layout>
    <h2>
        Kelola Pengguna
    </h2>

    <!-- Pencarian Global -->
    <div class="row align-items-center mb-4">
        <!-- Kolom pencarian -->
        <div class="col-md-3">
            <input type="text" id="globalSearch" class="form-control" placeholder="cari pengguna...">
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped" id="tabelPengguna">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role id</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Admin</td>
                    <td>admin@gamil.com</td>
                    <td>1</td>
                    <td>.....</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Kepala Sekolah</td>
                    <td>kepsek@gmail.com</td>
                    <td>2</td>
                    <td>........</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Petugas Sarpras</td>
                    <td>petugas@gmail.com</td>
                    <td>2</td>
                    <td>........</td>
                </tr>
                <!-- Tambahkan baris sesuai data -->
            </tbody>
        </table>
    </div>
    <!-- Script pencarian global -->
    <script>
        document.getElementById('globalSearch').addEventListener('keyup', function () {
            const filter = this.value.toLowerCase();
            const rows = document.querySelectorAll('#tabelPengguna tbody tr');

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    </script>

</x-layout>