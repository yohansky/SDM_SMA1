@extends('dashboard.layout.base')

@section('content')
<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    @include('dashboard.partials.nav')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row mt-4">

        @if (Session::has("berhasil"))
        <div class="alert alert-success text-white" role="alert">
          <strong>Berhasil!</strong> {{ Session::get("berhasil") }}
        </div>
        @elseif(Session::has("error"))
        <div class="alert alert-warning text-white" role="alert">
          <strong>Gagal!</strong> {{ Session::get("error") }}
        </div>
        @endif
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">Input Info Pelatihan</h6>
                {{-- <button type="button" class="btn bg-gradient-success" data-bs-toggle="modal" data-bs-target="#inputJabatanModal"><i class="fa-solid fa-circle-plus"></i> Tambah Jabatan</button> --}}
              </div>
            </div>
            <div class="card-body">
                <form>
                    <label>Tempat Tanggal Lahir <span></span></label>
                <div class="input-group mb-3">
                  {{-- <input name="tempat_"  type="text" class="form-control" placeholder="Kota" required> --}}
                  <input name="tgl_lahir" style="width: 40%" type="datetime-local" placeholder="DD/MM/YYY"  class="form-control" id="tanggal_lahir" required>
                </div>
                

                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Deksripi Pelatihan</label>
                        <div id="div_editor1">
                            <p>Ketik Sesuatu Disini.</p>
                        </div>
                    </div>
                    <script>
                        var editor1cfg = {}
                        editor1cfg.toolbar = "mytoolbar";
                        editor1cfg.toolbar_mytoolbar = "{bold,italic}|{fontname,fontsize}|{forecolor,backcolor}|removeformat"
                            + "#{undo,redo,fullscreenenter,fullscreenexit,togglemore}";
                        var editor1 = new RichTextEditor("#div_editor1", editor1cfg);
                    </script>
                    
                </form>
            </div>
          </div>
        </div>
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
  @include('dashboard.pages.master.jabatan.modals')
  
@endsection