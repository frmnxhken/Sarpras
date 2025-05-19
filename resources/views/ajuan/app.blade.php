<x-layout>
    <h4 class="mb-4">Verifikasi Ajuan</h4>

    <div class="container my-4">
        <div class="row g-3">
            <div class="col-md-3">
                <div class="card text-center shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="text-muted">Total Ajuan</h6>
                        <h4><span class="badge bg-primary">25</span></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="text-muted">Menunggu</h6>
                        <h4><span class="badge bg-warning text-dark">10</span></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="text-muted">Disetujui</h6>
                        <h4><span class="badge bg-success">12</span></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="text-muted">Ditolak</h6>
                        <h4><span class="badge bg-danger">3</span></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Filter -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <select class="form-select">
                <option selected>Semua Jenis Ajuan</option>
                <option>Peminjaman</option>
                <option>Pengadaan</option>
                <option>Perawatan</option>
                <option>Penghapusan</option>
            </select>
        </div>
        <div class="col-md-3">
            <select class="form-select">
                <option selected>Semua Status</option>
                <option>Menunggu</option>
                <option>Disetujui</option>
                <option>Ditolak</option>
            </select>
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" placeholder="Cari nama pengaju/barang...">
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary w-100"><i class="ri-search-line me-1"></i>Filter</button>
        </div>
    </div>

    <!-- Tabel -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Pengaju</th>
                    <th>Jenis Ajuan</th>
                    <th>Barang</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2025-05-10</td>
                    <td>Rudi Hartono</td>
                    <td>Peminjaman</td>
                    <td>Proyektor - 2 Unit</td>
                    <td><span class="badge bg-warning text-dark">Menunggu</span></td>
                    <td>
                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modalDetail"><i
                                class="ri-eye-line"></i> Detail</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>2025-05-11</td>
                    <td>Hendra Hartono</td>
                    <td>Pengadaan</td>
                    <td>Proyektor - 2 Unit</td>
                    <td><span class="badge bg-success text-dark">Disetuji</span></td>
                    <td>
                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modalDetail"><i
                                class="ri-eye-line"></i> Detail</button>
                    </td>
                </tr>
                <!-- Tambah data lain di sini -->
            </tbody>
        </table>
    </div>


    <!-- Modal Detail -->
    <div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetailLabel">Detail Ajuan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <dl class="row">
                        <dt class="col-sm-4">Nama Pengaju</dt>
                        <dd class="col-sm-8">Rudi Hartono</dd>
                        <dt class="col-sm-4">Unit</dt>
                        <dd class="col-sm-8">Lab Komputer</dd>
                        <dt class="col-sm-4">Jenis Ajuan</dt>
                        <dd class="col-sm-8">Peminjaman</dd>
                        <dt class="col-sm-4">Barang</dt>
                        <dd class="col-sm-8">2 Unit Proyektor</dd>
                        <dt class="col-sm-4">Keperluan</dt>
                        <dd class="col-sm-8">Ujian Praktik Multimedia</dd>
                        <dt class="col-sm-4">Tanggal Penggunaan</dt>
                        <dd class="col-sm-8">13 Mei 2025</dd>
                        <dt class="col-sm-4">Lampiran</dt>
                        <dd class="col-sm-8"><a href="#">Surat_Permohonan.pdf</a></dd>
                    </dl>
                    <hr>
                    <label for="catatan" class="form-label">Catatan Verifikasi</label>
                    <textarea class="form-control" id="catatan" rows="2"
                        placeholder="(Opsional) Tambahkan alasan jika ditolak..."></textarea>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger">Tolak</button>
                    <button class="btn btn-success">Setujui</button>
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->
    </body>

    </html>

</x-layout>