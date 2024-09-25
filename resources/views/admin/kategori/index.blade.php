<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a href="/admin/posts/kategori/create" class="btn btn-primary mb-3"> <i class="fas fa-plus"></i> Tambah</a>
                    <table class="table">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        <tbody>
                            @foreach ($kategori as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="/admin/posts/kategori/{{ $item->id }}/edit" class="btn btn-success mx-2">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        
                                        <form action="/admin/posts/kategori/{{ $item->id }}" method="POST" onsubmit="return confirmDelete()">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Script konfirmasi penghapusan -->
    <script>
        function confirmDelete() {
            return confirm('Apakah Anda yakin ingin menghapus data ini?');
        }
    </script>
