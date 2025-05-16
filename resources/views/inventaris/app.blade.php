<x-layout>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#TambahData">
        Tambah Data
    </button>
    @if ($errors->any())
        @dd($errors->all())
    @endif
    <div class="modal fade" id="TambahData" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <form class="modal-content" action="/inventaris/tambah" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ old('nama_barang') }}">
                    </div>
                    <div class="mb-3">
                        <label for="jenis_barang" class="form-label">Jenis Barang</label>
                        <input type="text" class="form-control" id="jenis_barang" name="jenis_barang" value="{{ old('jenis_barang') }}">
                    </div>
                    <div class="mb-3">
                        <label for="merk_barang" class="form-label">Merk/Spesifikasi</label>
                        <input type="text" class="form-control" id="merk_barang" name="merk_barang" value="{{ old('merk_barang') }}">
                    </div>
                    <div class="mb-3">
                        <label for="tahun_perolehan" class="form-label">Tahun Perolehan</label>
                        <input type="number" min="1900" max="2099" step="1" class="form-control" id="tahun_perolehan" name="tahun_perolehan" value="{{ old('tahun_perolehan') }}">
                    </div>
                    <div class="mb-3">
                        <label for="sumber_dana" class="form-label">Sumber Dana</label>
                        <select class="form-select" id="sumber_dana" name="sumber_dana" >
                            <option selected>Piliih Sumber Dana</option>
                            <option value="bos">BOS</option>
                            <option value="dak">DAK</option>
                            <option value="hibah">Hibah</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="harga_perolehan" class="form-label">Harga Perolehan</label>
                        <input type="number" class="form-control" id="harga_perolehan" name="harga_perolehan" value="{{ old('harga_perolehan') }}">
                    </div>
                    <div class="mb-3">
                        <label for="cv_pengadaan" class="form-label">CV Pengadaan</label>
                        <input type="text" class="form-control" id="cv_pengadaan" name="cv_pengadaan" value="{{ old('cv_pengadaan') }}">
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                        <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" value="{{ old('jumlah_barang') }}">
                    </div>
                    <div class="mb-3">
                        <label for="ruangan_id" class="form-label">Lokasi</label>
                        <select class="form-select" id="ruangan_id" name="ruangan_id">
                            <option selected disabled>Pilih Lokasi</option>
                            @foreach ($ruangans as $ruangan)
                                <option value="{{ $ruangan->id }}">{{ $ruangan->nama_ruangan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="kondisi" class="form-label">Kondisi</label>
                        <select class="form-select" id="kondisi" name="kondisi">
                            <option selected>Pilih Kondisi</option>
                            <option value="Baik">Baik</option>
                            <option value="Rusak">Rusak</option>
                            <option value="Berat">Rusak Berat</option>
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
                        <label for="penanggung_jawab" class="form-label">Penanggung Jawab</label>
                        <input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab" value="{{ old('penanggung_jawab') }}">
                    </div>
                    <div class="mb-3">
                        <label for="upload" class="form-label">Upload foto</label>
                        <input type="file" accept="image/*" class="form-control" id="upload" name="upload" value="{{ old('upload') }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Kondisi</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dataInventaris as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kode_barang }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->ruangan->nama_ruangan ?? '-' }}</td>
                        <td>{{ $item->kondisi_barang }}</td>
                        <td>
                            <a type="button" data-bs-toggle="modal" data-bs-target="#ImageModal">
                                <img src="assets/images/small/img-5.jpg" alt="image"
                                    class="img-fluid avatar-md rounded" />
                            </a>
                            <div class="modal fade" id="ImageModal" tabindex="-1"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="assets/images/small/img-5.jpg" class="d-block w-100"
                                                alt="img-3">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Kembali</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex gap-1 align-items-center">
                                <a class="btn btn-primary px-2 py-1" href="/detail/{{ $item->id }}">
                                    Detail
                                </a>
                            </div>
                        </td>
                    </tr>

                @empty
                    Data Kosong
                @endforelse
            </tbody>
        </table>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item"><a class="page-link" href="javascript:void(0);">Previous</a></li>
            <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0);">Next</a></li>
        </ul>
    </nav>
</x-layout>
