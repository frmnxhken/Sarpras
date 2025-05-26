<x-layout>
    <h4>Barang Masuk (Tahun {{ $latestYear }})</h4>
    <table id="dataTable" class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Kondisi</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dataInventaris as $item)
                    <tr>
                        <td>{{ $loop->iteration + ($dataInventaris->currentPage() - 1) * $dataInventaris->perPage() }}</td>
                        <td>{{ $item->kode_barang }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->ruangan->nama_ruangan ?? '-' }}</td>
                        <td>
                            @if ($item->kondisi_barang == 'baik')
                                Baik
                            @elseif ($item->kondisi_barang == 'rusak')
                                Rusak Ringan
                            @elseif ($item->kondisi_barang == 'berat')
                                Rusak Berat
                            @endif
                        </td>
                        <td>{{ $item->jumlah_barang }}</td>
                        <td>
                            <a type="button" data-bs-toggle="modal" data-bs-target="#ImageModal{{ $loop->iteration }}">
                                <img src="{{ asset($item->gambar_barang) }}" alt="image"
                                    class="img-fluid avatar-md rounded" />
                            </a>
                            <div class="modal fade" id="ImageModal{{ $loop->iteration }}" tabindex="-1"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">
                                                {{ $item->nama_barang }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ asset($item->gambar_barang) }}" class="d-block w-100"
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
                        <td class="text-center align-middle">
                            <div class="d-flex justify-content-center gap-2 p-0">
                                <a class="btn btn-primary px-2 py-1 m-0"
                                    href="{{ route('inventaris.detail', $item->id) }}">
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
</x-layout>