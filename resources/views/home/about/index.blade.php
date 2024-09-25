<div class="wrapper my-5">
    <div class="text-center">
        <h1 class="text-center">About</h1>
        <p>Apa Saja Kabar Hari Ini? Kami Akan Beri Tahu Anda</p>
    </div>
</div>

<div class="container py-3">
    <div class="row">
        <div class="col-md-4">
            @if ($about && $about->cover)
            <img src="/storage/{{ $about->cover }}" class="img-fluid" alt="About Image">
            @else
                <img src="/img/default-image.jpg" class="img-fluid" alt="Default Image">
            @endif
        </div>
        <div class="col-md-8">
            @if ($about)
                {!! $about->desc !!}
            @else
                <p>Tidak ada informasi tentang kami.</p>
            @endif
        </div> 
    </div>
</div>
