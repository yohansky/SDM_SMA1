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
                <h6 class="mb-2">Logo Sekolah</h6>
                <button form="uploadLogo" class="btn bg-gradient-success" ><i class="fa-solid fa-check"></i> Simpan</button>
              </div>
            </div>
            <div class="card-body">
              <form role="form text-left" action="{{ route("config.logo") }}" method="post" enctype="multipart/form-data" id="uploadLogo">
                @csrf
                @method("PUT")
                <div class="form-group">
                  <input type="file" name="logo" required>
                </div>
              </form>
            </div>
          </div>
        </div>
        {{-- <div class="col-lg-6 mb-lg-0 mb-4">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">Tanggal Gajian</h6>
                <button class="btn bg-gradient-success" form="formTanggal"><i class="fa-solid fa-check"></i> Simpan</button>
              </div>
            </div>
            <div class="card-body">
              <form role="form text-left" action="{{ route("config.tanggal") }}" method="post" id="formTanggal">
                @csrf
                @method("PUT")
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Tanggal gajian</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="tgl_gajian" required>
                    @for ($i = 1; $i < 29; $i++)
                          @if ($i < 10)
                            <option value="{{ "0".$i }}" {{ $config[0]->tgl_gajian == "0".$i ? "Selected" : ""  }} >{{ "0".$i}}</option>
                          @else
                            <option value="{{ $i }}" {{ $config[0]->tgl_gajian == "0".$i ? "Selected" : ""  }}>{{ $i }}</option>
                         @endif
                    @endfor	
                  </select>
                </div>
              </form> 
            </div>
          </div>
        </div> --}}
        <div class="col-lg-12 mb-lg-5 mb-4 pt-5">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">Waktu Absen Staff</h6>
                <button form="waktuAbsen" class="btn bg-gradient-success" ><i class="fa-solid fa-check"></i> Simpan</button>
              </div>
            </div>
            <div class="card-body">
              <form role="form text-left" action="{{ route("config.absen") }}" method="post" id="waktuAbsen">
                @csrf
                @method("PUT")
                <label>Jam Mulai</label>
                  <div class="input-group mb-3">
                    <input name="mulai" type="time" class="form-control"  required id="mulai" onchange="setSelesaiMinimumTime()" value="{{ $config[0]->waktu_mulai_absen_staff }}">
                  </div>
                  <label>Jam Selesai</label>
                  <div class="input-group mb-3">
                    <input name="selesai" type="time" class="form-control"  required id="selesai" value="{{ $config[0]->waktu_selesai_absen_staff }}">
                  </div>
                  <script>
                    var setSelesaiMinimumTime = () => {
                      var x = document.getElementById("mulai").value;
                      document.getElementById("selesai").setAttribute("min", x);
                    }
                  </script>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">Menu Penilaian</h6>
                <button class="btn bg-gradient-success" form="formNaik"><i class="fa-solid fa-check"></i> Simpan</button>
              </div>
            </div>
            <div class="card-body">
              <form role="form text-left" action="{{ route("config.penilaian.update") }}" method="post" id="formNaik">
                @csrf
                @method("PUT")
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Status</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="status" required>
                   <option value="Buka" {{ $config[0]->penilaian_sejawat == "Buka" ? "Selected" : ""  }}>Buka</option>
                   <option value="Tutup" {{ $config[0]->penilaian_sejawat == "Tutup" ? "Selected" : ""  }}>Tutup</option>
                  </select>
                </div>
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
  @include('dashboard.pages.master.agama.modals')
  
@endsection