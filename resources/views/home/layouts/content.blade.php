@if (view()->exists($content))
    @include($content)
@else
    <p>Halaman tidak ditemukan.</p>
@endif
