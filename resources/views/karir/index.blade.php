@extends('dashboard.layout.base2')

@section('content')
<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    @include('dashboard.partials.nav2')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      @if (Session::has("berhasil"))
      <div class="alert alert-success text-white" role="alert">
        <strong>Berhasil!</strong> {{ Session::get("berhasil") }}
      </div>
      @elseif(Session::has("error"))
      <div class="alert alert-warning text-white" role="alert">
        <strong>Gagal!</strong> {{ Session::get("error") }}
      </div>
      @endif
        <div class="row">
            @forelse ($lowongan as $l)
            <div class="col-xl-3 col-sm-6 mb-xl-2 mb-4">
                <div class="card p-2">
                    <button class="card-block stretched-link text-decoration-none" style="border-style: none" data-bs-toggle="modal" data-bs-target="#applyKarirModal" data-remote="{{ route("lowongan.list.show", $l->id) }}">
                        <h4 class="card-title">{{ $l->jabatan }}</h4>
                        <p class="card-text">Dipublish pada {{ $l->created_at }}</p>  
                    </butt>
                </div>
            </div>
            @empty
                <center><h1>Belum ada lowongan saat ini</h1></center>
            @endforelse
          </div>
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  @include('karir.modals')
  
@endsection