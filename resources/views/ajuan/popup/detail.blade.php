<div class="modal fade" id="modalDetail{{ $loop->iteration }}" tabindex="-1" aria-labelledby="modalDetailLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetailLabel">Detail Ajuan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <dl class="row">
                    <dt class="col-sm-4">Nama Pengaju</dt>
                    <dd class="col-sm-8">{{ $item['pengaju'] }}</dd>
                    <dt class="col-sm-4">Unit</dt>
                    <dd class="col-sm-8">{{ $item['ruangan'] }}</dd>
                    <dt class="col-sm-4">Jenis Ajuan</dt>
                    <dd class="col-sm-8">{{ $item['jenis'] }}</dd>
                    <dt class="col-sm-4">Barang</dt>
                    <dd class="col-sm-8">{{ $item['jumlah'] }} Unit {{ $item['barang'] }}</dd>
                    <dt class="col-sm-4">Keperluan</dt>
                    <dd class="col-sm-8">Ujian Praktik Multimedia</dd>
                    <dt class="col-sm-4">Tanggal Penggunaan</dt>
                    <dd class="col-sm-8">{{ $item['created_at'] }}</dd>
                    <dt class="col-sm-4">Lampiran</dt>
                    <dd class="col-sm-8"><a href="#">Surat_Permohonan.pdf</a></dd>
                </dl>
                <hr>
                <label for="catatan" class="form-label">Catatan Verifikasi</label>
                <textarea class="form-control" id="catatan" rows="2" placeholder="(Opsional) Tambahkan alasan jika ditolak..."></textarea>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger">Tolak</button>
                <button class="btn btn-success">Setujui</button>
            </div>
        </div>
    </div>
</div>
