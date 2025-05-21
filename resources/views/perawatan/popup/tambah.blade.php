@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(document.getElementById('modalPerawatanBarang'), {
                keyboard: false
            });
            myModal.show();
        });
    </script>
@endif
<div class="modal fade" id="modalPerawatanBarang" tabindex="-1" aria-labelledby="modalPerawatanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <form class="modal-content" action="{{ route('perawatan.store') }}" method="POST">
            @csrf

            <div class="modal-header">
                <h5 class="modal-title" id="modalPerawatanLabel">Form Perawatan Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row g-3">

                    <div class="col-md-12">
                        <label for="tanggal_perawatan" class="form-label">Tanggal Perawatan</label>
                        <input type="date" class="form-control" id="tanggal_perawatan" name="tanggal_perawatan" required>
                    </div>

                    <div class="col-md-12">
                        <label for="barang_id" class="form-label">Nama Barang</label>
                        <select class="form-select" id="barang_id" name="barang_id" required>
                            <option value="">-- Pilih Barang --</option>
                            @foreach($barang as $barang)
                                <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label for="jenis_perawatan" class="form-label">Jenis Perawatan</label>
                        <input type="text" class="form-control" id="jenis_perawatan" name="jenis_perawatan" placeholder="Contoh: Pembersihan" required>
                    </div>

                    <div class="col-md-12">
                        <label for="biaya_perawatan" class="form-label">Biaya Perawatan (Rp)</label>
                        <input type="number" class="form-control" id="biaya_perawatan" name="biaya_perawatan" placeholder="Contoh: 50000" min="0">
                    </div>

                    <div class="col-md-12">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Contoh: Membersihkan debu pada komponen internal"></textarea>
                    </div>

                    <div class="col-md-12">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="belum" selected>Belum</option>
                            <option value="selesai">Selesai</option>
                        </select>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>
        </form>
    </div>
</div>

