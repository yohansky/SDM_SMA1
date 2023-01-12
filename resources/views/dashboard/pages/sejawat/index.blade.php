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
                <h6 class="mb-2">Penilaian Sejawat</h6>
                {{-- <button type="button" class="btn bg-gradient-success" data-bs-toggle="modal" data-bs-target="#formSejawatModal" data-remote="{{ route("penilaian.form") }}"><i class="fa-solid fa-circle-plus"></i> Beri Penilaian</button> --}}
              </div>
            </div>
            <div class="table-responsive" style="padding: 30px;">
              <table class="table align-items-center" id="table-jabatan">
                <thead>
                  <tr>
                    <td>
                        <div class="text-center">
                          <p class="text-xs font-weight-bold mb-0">*</p>
                        </div>
                    </td>
                    <td>
                        <div class="text-center">
                          <p class="text-xs font-weight-bold mb-0">NIK</p>
                        </div>
                    </td>
                    <td>
                        <div class="text-center">
                          <p class="text-xs font-weight-bold mb-0">Status</p>
                        </div>
                    </td>
                    <td>
                        <div class="text-center">
                          <p class="text-xs font-weight-bold mb-0">Aksi</p>
                        </div>
                    </td>
                  </tr>
                </thead>
                <tbody>      
                  {{-- {{ dd($guru) }}        --}}
                  @forelse ($plotting as $g)
                  <tr style="text-align : center;">
                      <td>*</td>
                    <td>
                        {{ $g->NIK_dinilai }}
                    </td>
                    <td>{{ $g->status }}</td>
                    
                    <td>
                      @if ($g->status == "Belum")
                      <button type="button" class="btn bg-gradient-success" data-bs-toggle="modal" data-bs-target="#formSejawatModal" data-remote="{{ route("penilaian.form", [$g->NIK_dinilai, $g->id]) }}"><i class="fa-solid fa-circle-plus"></i> Beri Penilaian</button>
                      @else
                      <button type="button" class="btn bg-gradient-success" data-bs-toggle="modal" data-bs-target="#formSejawatModal" disabled><i class="fa-solid fa-circle-plus"></i> Beri Penilaian</button>
                      @endif
                    </td>
                </tr>
                  @empty
                      
                  @endforelse
                  
                </tbody>
              </table>
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
    </div><i class="fa fa-xing" aria-hidden="true"></i>
  </main>
  @include('dashboard.pages.sejawat.modals')
  <div class="div">
    <div class="modal fade" id="inputLinkModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card card-plain">
              <div class="card-header pb-0 text-left">
                <h3 class="font-weight-bolder">Input Data Sertifikat</h3>
              </div>
              <div class="card-body">
                @if (cekSertif(Auth()->user()->nik) == 0)
                <form role="form text-left" action="{{ route("sertif.store") }}" method="post">
                  @csrf
                  @method("POST")
                  <div class="input-group mb-3">
                    <input name="nik" type="text" class="form-control" placeholder="Link" value="{{ Auth()->user()->nik }}" required hidden>
                  </div>
                  <label>Link</label>
                  <div class="input-group mb-3">
                    <input name="link" type="text" class="form-control" placeholder="Link" required>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Tambahkan Data</button>
                  </div>
                </form>
                @else
                <h2>Sertif Udah DIinputkan</h2>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection