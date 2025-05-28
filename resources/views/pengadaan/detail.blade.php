<!-- Modal Detail Pengadaan -->
<div class="modal fade" id="modalDetailPengadaan" tabindex="-1" aria-labelledby="modalDetailPengadaanLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetailPengadaanLabel">Detail Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <dl class="row">
                    <dt class="col-sm-4">Kode Pengadaan</dt>
                    <dd class="col-sm-8">PGD-001</dd>

                    <dt class="col-sm-4">Nama Barang</dt>
                    <dd class="col-sm-8">Proyektor Epson</dd>

                    <dt class="col-sm-4">Jenis Barang</dt>
                    <dd class="col-sm-8">Elektronik</dd>

                    <dt class="col-sm-4">Merk / Spesifikasi</dt>
                    <dd class="col-sm-8">Epson X400, 3000 lumens</dd>

                    <dt class="col-sm-4">Jumlah Barang</dt>
                    <dd class="col-sm-8">2 Unit</dd>

                    <dt class="col-sm-4">Tanggal Pengadaan</dt>
                    <dd class="col-sm-8">15 Januari 2025</dd>

                    <dt class="col-sm-4">Sumber Dana</dt>
                    <dd class="col-sm-8">BOS</dd>

                    <dt class="col-sm-4">Supplier / CV</dt>
                    <dd class="col-sm-8">CV. Sinar Abadi</dd>

                    <dt class="col-sm-4">Harga Satuan</dt>
                    <dd class="col-sm-8">Rp. 5.000.000</dd>

                    <dt class="col-sm-4">Total Harga</dt>
                    <dd class="col-sm-8">Rp. 10.000.000</dd>

                    <dt class="col-sm-4">Status Pengajuan</dt>
                    <dd class="col-sm-8"><span class="badge bg-warning text-dark">Menunggu</span></dd>

                    <dt class="col-sm-4">Dibuat Oleh</dt>
                    <dd class="col-sm-8">admin@sarpras.sch.id</dd>
                </dl>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary px-3" data-bs-dismiss="modal">Kembali</button>
                <button class="btn btn-primary px-3" data-bs-toggle="modal" data-bs-target="#modalEditPengadaan">Edit</button>
                <button class="btn btn-danger px-3">Hapus</button>
            </div>
        </div>
    </div>
</div>
@include('pengadaan.edit')