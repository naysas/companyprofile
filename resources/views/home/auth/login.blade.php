<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-lg-4 align-self-center">    
            <main class="form-signin w-100 m-auto py-4 mt-4 mb-4 text-center">
                <h3 class="fw-bold">Login Dashboard</h3>
                <p class="text-center">Masukkan akses akun anda</p>

                @if(session()->has('loginError'))
                <div class="alert alert-danger">{{ session('loginError')}}</div>
                @endif
                <form action="/login/do" method="POST">
                    @csrf
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" name="email" id="floatingInput" placeholder="Masukan email anda">
                        <label for="floatingInput">Alamat Email</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="password" class="form-control" name="password" id="floatingInput" placeholder="Masukan password anda">
                        <label for="floatingInput">Password</label>
                    </div>

                    <button class="btn btn-primary w-100 mt-2 px-5 py-3">Masuk</button>
                </form>
            </main>
        </div>
    </div>    
       
    
</div>
