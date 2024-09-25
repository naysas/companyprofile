@extends('admin.layouts.wrapper')

@section('content')
<div class="container">
    <h1>{{ $title }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/admin/posts/blog" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" class="form-control" id="title" required>
        </div>
        
        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori</label>
            <select name="kategori_id" class="form-control" id="kategori_id" required>
                @foreach($kategori as $k)
                    <option value="{{ $k->id }}">{{ $k->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Konten</label>
            <textarea name="body" class="form-control" id="body" required></textarea>
        </div>

        <div class="mb-3">
            <label for="cover" class="form-label">Gambar Sampul</label>
            <input type="file" name="cover" class="form-control" id="cover" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
