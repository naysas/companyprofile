<div class="container">

    <div class="text-center my-5">
        <h1 class="">Kontak Kami</h1>
        <p>Berikan Saran dan Masukan Untuk Kami</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="/contact/send" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="Nama">Nama</label>
                            <input type="text" class="form-control" name="name" placeholder="Masukan nama anda" required>
                        </div>

                        <div class="form-group mt-4">
                            <label for="Pesan">Isi Pesan</label>
                            <textarea name="desc" cols="30" rows="10" class="form-control" placeholder="Masukan pesan anda" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Kirim</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="d-flex">
                <i class="fas fa-phone fa-1x px-3"></i>
                <p>(1210) 78656</p>
            </div>

            <div class="d-flex mt-2">
                <i class="fas fa-envelope fa-1x px-3"></i>
                <p>gojekjaksel@gojek.co.id</p>
            </div>

            <div class="d-flex mt-2">
                <i class="fas fa-map-marker fa-1x px-3"></i>
                <p>jl. Kemang Timur No.21, RT.7/RW.3, Bangka, Kec. Mampang, Kota Jakarta Selatan</p>
            </div>
        </div>
    </div>
</div>
