<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                @if (isset($banner))
                    <form action="/admin/banner/{{ $banner->id }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                @else
                    <form action="/admin/banner" method="POST" enctype="multipart/form-data">
                @endif
                    @csrf
                    <div class="form-group">
                        <label for="">Headline</label>
                        <input type="text" id="headline" name="headline" class="form-control @error('headline') is-invalid @enderror"
                         placeholder="Headline" value="{{ isset($banner) ? $banner->headline : old('headline') }}">
                        @error('headline')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <input type="text" id="desc" name="desc" class="form-control @error('desc') is-invalid @enderror"
                         placeholder="Desc" value="{{ isset($banner) ? $banner->desc : old('desc') }}">
                        @error('desc')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Gambar</label>
                        <input type="file" id="gambar" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
                        @error('gambar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        @if (isset($banner))
                            <img src="/{{ $banner->gambar }}" width="100%" class="mt-4" alt="">
                        @endif
                            
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
