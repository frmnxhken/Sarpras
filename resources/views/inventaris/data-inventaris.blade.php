<x-layout>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#TambahData">
        Tambah Data
    </button>
    <div class="modal fade" id="TambahData" tabindex="-1"
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
                              <label for="nama_barang" class="form-label">Nama Barang</label>
                              <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                         </div>
                         <div class="mb-3">
                              <label for="nama_barang" class="form-label">Merk/Tipe</label>
                              <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                         </div>
                         <div class="mb-3">
                              <label for="nama_barang" class="form-label">Tahun Perolehan</label>
                              <input type="date" class="form-control" id="nama_barang" name="nama_barang">
                         </div>
                         <div class="mb-3">
                              <label for="sumber_dana" class="form-label">Sumber Dana</label>
                              <select class="form-select" id="sumber_dana" name="sumber_dana">
                                  <option selected>Piliih Sumber Dana</option>
                                  <option value="bos">BOS</option>
                                  <option value="dak">DAK</option>
                                  <option value="hibah">Hibah</option>
                              </select>
                         </div>
                         <div class="mb-3">
                              <label for="lokasi" class="form-label">Lokasi</label>
                              <select class="form-select" id="lokasi" name="lokasi">
                                  <option selected>Pilih Lokasi</option>
                                  <option value="tes">tes</option>
                              </select>
                         </div>
                         <div class="mb-3">
                              <label for="harga_perolehan" class="form-label">Harga Perolehan</label>
                              <input type="number" class="form-control" id="harga_perolehan" name="harga_perolehan">
                         </div>
                         <div class="mb-3">
                              <label for="kondisi" class="form-label">Kondisi</label>
                              <select class="form-select" id="kondisi" name="kondisi">
                                  <option selected>Pilih Kondisi</option>
                                  <option value="Baik">Baik</option>
                                  <option value="Rusak">Rusak</option>
                                  <option value="Rusak">Rusak Berat</option>
                              </select>
                         </div>
                         <div class="mb-3">
                              <label for="kepemilikan" class="form-label">Kepemilikan</label>
                              <select class="form-select" id="kepemilikan" name="kepemilikan">
                                  <option selected>Pilih Kepemilikan</option>
                                  <option value="sekolah">Milik Sekolah</option>
                                  <option value="negara">Milik Negara</option>
                                  <option value="pinjam">Pinjam</option>
                              </select>
                         </div>
                         <div class="mb-3">
                              <label for="upload" class="form-label">Upload foto</label>
                              <input type="file" accept="image/*" class="form-control" id="upload" name="upload">
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
                <th scope="col">Merk / Tipe</th>
                <th scope="col">Tahun Perolehan</th>
                <th scope="col">Sumber Dana</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Kondisi</th>
                <th scope="col">Kepemilikan</th>
                <th scope="col">Gambar</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
               <td>1</td>
               <td>023</td>
               <td>Kursi</td>
               <td>DIY</td>
               <td>2000</td>
               <td>BOS</td>
               <td>Lab Kumputer</td>
               <td>Baik</td>
               <td>Milik Sekolah</td>
               <td>p</td>
               <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#TambahData">
                         Mutasi
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#TambahData">
                         Cetak
                    </button>
               </td>
            </tr>
            <tr>
               <td>2</td>
               <td>024</td>
               <td>Meja</td>
               <td>DIY</td>
               <td>2000</td>
               <td>BOS</td>
               <td>Lab Kumputer</td>
               <td>Baik</td>
               <td>Milik Sekolah</td>
               <td>p</td>
               <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#TambahData">
                         Mutasi
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#TambahData">
                         Cetak
                    </button>
               </td>
            </tr>
            <tr>
               <td>3</td>
               <td>025</td>
               <td>Papan Tulis</td>
               <td>DIY</td>
               <td>2000</td>
               <td>BOS</td>
               <td>Lab Kumputer</td>
               <td>Baik</td>
               <td>Milik Sekolah</td>
               <td>p</td>
               <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#TambahData">
                         Mutasi
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#TambahData">
                         Cetak
                    </button>
               </td>
            </tr>
        </tbody>
    </table>
</x-layout>
