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
                <h6 class="mb-2">Data Karyawan ({{ $jabatan }})</h6>
                
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
                          <p class="text-xs font-weight-bold mb-0">Info</p>
                        </div>
                    </td>
                    <td>
                        <div class="text-center">
                          <p class="text-xs font-weight-bold mb-0">Jabatan</p>
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
                  @forelse ($karyawan as $k)
                  
                    <tr>
                        <td class="text-center">*</td>
                        <td>
                            <div class="d-flex px-2 py-1">
                            <div>
                            <img src="{{ url("/storage/".$k->photo) }}" class="avatar avatar-sm me-3" alt="user1">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $k->nama }}</h6>
                            <p class="text-xs text-secondary mb-0">NIK.{{ $k->NIK }}</p>
                            </div>
                            </div>
                        </td>
                      <td>
                        <div class="text-center">
                          <h6 class="text-sm mb-0">{{ $k->getJabatan->name }}</h6>
                        </div>
                      </td>
                      <td class="align-middle text-sm">
                        <div class="col text-center">
                          <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editKaryawanModal" data-remote="{{ route("karyawan.edit", $k->NIK) }}" data-title=""><i class="fa-solid fa-pencil"></i></button>
                          <button type="button" class="btn bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#modal-notification" id="open-deletemodal" data-id="{{ $k->NIK }}"><i class="fa-solid fa-rectangle-xmark"></i></button>
                        </div>
                      </td>
                    </tr>
                  @empty
                      <tr  class="text-center">
                        <td colspan="4">
                          Belum Ada Data Karyawan
                        </td>
                      </tr>
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
    </div>
  </main>
  @include('dashboard.pages.humanR.karyawan.modals')
  
@endsection