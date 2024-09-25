<style>
    .menu-active{
        color: black !important;
        font-weight: bold;
    }
</style>
<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-light bg-light shadow">
    <div class="container">
      <a class="navbar-brand" href="">
        <img src="{{ asset('img/logo.png') }}" alt="logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <!-- Gunakan ms-auto untuk memastikan item berada di kiri -->
        <ul class="navbar-nav ms-0 mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'menu-active' : ''}}" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('about') ? 'menu-active' : ''}}" href="/about">About</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link {{ Request::is('services') ? 'menu-active' : ''}}" href="/services">Services</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link {{ Request::is('blog*') ? 'menu-active' : ''}}" href="/blog">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('contact') ? 'menu-active' : ''}}" href="/contact">Contact</a>
          </li>
        </ul>
        <form class="d-flex ms-auto">
            @auth
            <a href="/admin/dashboard" class="btn btn-primary">Masuk</a>
            @else
            <a href="/login" class="btn btn-primary">Masuk</a>
            @endauth
        </form>
      </div>
    </div>
  </nav>
</header>
