<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carousel Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .img-banner {
      width: 100%;
      object-fit: cover;
    }
  </style>
</head>
<body>
  <!-- Carousel Section -->
  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="wrapper-img-banner">
          <img src="/img/banner.jpg" class="img-banner" alt="Banner Image">
          <div class="container">
            <div class="carousel-caption text-start">
              <h1 class="dark" style="color: #ffffff;">SEBUAH PERJALANAN</h1>
              <p style="color: #ffffff;">Kenalan lebih dekat sama sejarah Gojek dan orang-orang dibaliknya</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="container px-4 py-5" id="featured-3">
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
      <div class="feature col">
      
        <h4>Gabung jadi GoTroops, yuk!</h4>
        <p>Di belakang startup dengan pertumbuhan paling tinggi di Asia Tenggara, terdapat talenta yang memiliki ide-ide cemerlang.​</p>
        <a class="btn btn-primary btn-small" href="#">Selengkapnya</a>
      </div>
      <div class="feature col">
        <h4>Gabung Jadi Mitra Driver</h4>
        <p>Kami adalah rumah bagi lebih dari 2 juta mitra driver di Asia Tenggara, yang mendapat jaminan finansial dan fasilitas kesehatan.</p>
        <a class="btn btn-primary btn-small" href="#">Selengkapnya</a>
      </div>
      <div class="feature col">
        <h4 class="">Gabung Jadi Mitra Usaha</h4>
        <p>Kami membantu 500.000+ Mitra Usaha melipatgandakan penjualan, meluaskan jangkauan, dan berkembang dengan teknologi baru.</p>
        <a class="btn btn-primary btn-small" href="#">Selengkapnya</a>
      </div>
    </div>
  </div>

  <!-- About Section -->
  <div class="container mt-5">
    <div class="text-center">
      <h2>Tentang Kami</h2>
      <p>Anda Tahu Kami? Kami Akan Beri Tahu Anda</p>
    </div>
    <div class="row g-4 py-5">
      <div class="col-md-6">
        @if ($about)
          <img src="{{ $about->cover }}" class="img-fluid" alt="About Image">
        @else
          <p>Tidak ada informasi tentang kami.</p>
        @endif
      </div>
      <div class="col-md-6"> 
        {{ $about->desc ?? 'Deskripsi tidak tersedia.' }}
      </div>
    </div>
  </div>


  <!-- Blog Section -->
  <div class="container my-2">
    <div class="text-center">
      <h2>Blog</h2>
      <p>Apa Saja Kabar Hari Ini? Kami Akan Beri Tahu Anda</p>
    </div>
    <div class="row g-4 py-5">
    @foreach($blog as $item)
      <div class="col-md-3">
    
       <div class="card shadow-sm" style="width: 18rem;">
          <img src="/{{ $item->cover }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{ $item->title }}</h5>
              <p class="card-text">{!! Illuminate\Support\Str::limit($item->body, 100) !!}</p>
              <a href="/blog/show/{{ $item->id }}" class="btn btn-primary">Selengkapnya</a>
            </div>
        </div>
      
      </div>
      @endforeach  
    </div>
  </div>

  <div class="container my-5 mb-5">
    <div class="row g-4 py-5 text-center">
      
    <div class="text-center">
      <h4>Hubungi Kami</h4>
      <p>Anda dapat bertanya langsung ke kami</p>
      <a href="" class="btn btn-primary px-5" target="blank"><i class="fas fa-phone"></i> Hubungi Kami di Whatsapp</a>
    </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
