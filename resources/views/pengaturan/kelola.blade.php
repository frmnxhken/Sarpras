<x-layout>
    <h4 class="mb-4">
        Kelola pengguna
    </h4>

    <!-- Pencarian Global -->
    <div class="row align-items-center mb-4">
        <!-- Kolom pencarian -->
        <div class="col-md-3">
            <input type="text" id="globalSearch" class="form-control" placeholder="cari pengguna...">
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle" id="tabelPengguna">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->role == 1)
                                Admin
                            @elseif ($user->role == 2)
                                Waka
                            @elseif ($user->role == 3)
                                Petugas
                            @elseif ($user->role == 4)
                                Kepala Sekolah
                            @else
                                Unknown
                            @endif
                        </td>
                        <td>
                            {{-- <a href="{{ route('pengaturan.edit', $user->id) }}" class="btn btn-primary px-2 py-1">Edit</a>
                            <form action="{{ route('pengaturan.destroy', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE') --}}
                                <button type="submit" class="btn btn-danger px-2 py-1">Hapus</button>
                            {{-- </form> --}}
                        </td>
                    </tr>
                @endforeach
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