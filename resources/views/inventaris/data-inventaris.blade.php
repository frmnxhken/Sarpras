<x-layout>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenteredScrollable">
        Tambah Data
    </button>
    <div class="modal fade" id="exampleModalCenteredScrollable" tabindex="-1"
        aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                         @csrf
                        <div class="mb-3">
                            <label for="kode_barang" class="form-label">Kode Barang</label>
                            <input type="text" class="form-control" id="kode_barang" name="kode_barang">
                         </div>
                         <div class="mb-3">
                              <label for="nama_barang" class="form-label">Nama Barang</label>
                              <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                         </div>
                         <div class="mb-3">
                              <label for="lokasi" class="form-label">Lokasi</label>
                              <input type="text" class="form-control" id="lokasi" name="lokasi">
                         </div>
                         <div class="mb-3">
                              <label for="kondisi" class="form-label">Kondisi</label>
                              <select class="form-select" id="kondisi" name="kondisi">
                                  <option selected>Pilih Kondisi</option>
                                  <option value="Baik">Baik</option>
                                  <option value="Rusak">Rusak</option>
                              </select>
                         </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="button" class="btn btn-primary">Simpan Data</button>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-centered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Barang</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Kondisi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>023</td>
                <td>Kursi</td>
                <td>Lab Kumputer</td>
                <td>Baik</td>
            </tr>
            <tr>
                <td>2</td>
                <td>024</td>
                <td>Meja</td>
                <td>Kls XA</td>
                <td>Rusak</td>
            </tr>
            <tr>
                <td>3</td>
                <td>025</td>
                <td>Papan Tulis</td>
                <td>Kelas XII</td>
                <td>Baik</td>
            </tr>
        </tbody>
    </table>
</x-layout>
