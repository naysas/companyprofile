<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="/admin/about/update" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Perusahaan</label>
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="nama perusahaan" value="{{ isset($about) ? $about->name : old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Cover</label>
                                <input type="file" id="cover" name="cover" class="form-control @error('cover') is-invalid @enderror">
                                
                                @error('cover')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                @if (isset($about) && $about->gambar)
                                    <img src="/{{ $about->gambar }}" width="100%" class="mt-4" alt="">
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="desc">Deskripsi</label>
                                <textarea name="desc" id="summernote" class="form-control @error('desc') is-invalid @enderror" cols="30" rows="10">{{ isset($about) ? $about->desc : old('desc') }}</textarea>
                                @error('desc')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
