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
                <h6 class="mb-2">Data Store Mutasi Keluar</h6>
                <button type="button" class="btn bg-gradient-success" data-bs-toggle="modal" data-bs-target="#inputMutasiKeluarModal"><i class="fa-solid fa-circle-plus"></i> Tambah Mutasi</button>
                <a class="btn bg-gradient-success" href="{{ route('surat.mutasi', "keluar") }}"><i class="fa-solid fa-circle-plus"></i> Download Laporan</a>
              </div>
            </div>
            <div class="table-responsive" style="padding: 30px;">
              <table class="table align-items-center" id="table-jabatan">
                <thead>
                  <tr>
                    <td>
                        <div class="text-center">
                          <p class="text-xs font-weight-bold mb-0">NIK</p>
                        </div>
                    </td>
                    <td>
                        <div class="text-center">
                          <p class="text-xs font-weight-bold mb-0">Nama</p>
                        </div>
                    </td>
                    <td>
                        <div class="text-center">
                          <p class="text-xs font-weight-bold mb-0">Sebagai Tenaga</p>
                        </div>
                    </td>
                    <td>
                        <div class="text-center">
                          <p class="text-xs font-weight-bold mb-0">Tanggal Masuk</p>
                        </div>
                    </td>
                    <td>
                        <div class="text-center">
                          <p class="text-xs font-weight-bold mb-0">Keterangan</p>
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
                  @forelse ($mutasi as $m)
                    <tr>
                      <td>
                        <div class="text-center">
                          <h6 class="text-sm mb-0">{{ $m->karyawan->NIK }}</h6>
                        </div>
                      </td>
                      <td>
                        <div class="text-center">
                        
                          <h6 class="text-sm mb-0">{{ $m->Karyawan->nama }}</h6>
                        </div>
                      </td>
                      <td>
                        <div class="text-center">
                          <h6 class="text-sm mb-0">{{ $m->Karyawan->getJabatan->name }}</h6>
                        </div>
                      </td>
                      <td>
                        <div class="text-center">
                          <h6 class="text-sm mb-0">{{ $m->Karyawan->mulai_kerja }}</h6>
                        </div>
                      </td>
                      <td>
                        <div class="text-center">
                          <h6 class="text-sm mb-0">{{ $m->keterangan }}</h6>
                        </div>
                      </td>
                      <td class="align-middle text-sm">
                        {{-- <div class="col text-center">
                          <a class="btn btn-primary" href="{{ route("Mutasi.show.karyawan", $a->name) }}"><i class="fa-solid fa-user-check"></i></a>
                          <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editMutasiModal" data-remote="{{ route("Mutasi.edit", $a->id) }}" data-title="Update Jabatan {{ $a->id }}"><i class="fa-solid fa-pencil"></i></button>
                          <button type="button" class="btn bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#modal-notification" id="open-deletemodal" data-id="{{ $a->id }}"><i class="fa-solid fa-rectangle-xmark"></i></button>
                        </div> --}}
                      </td>
                    </tr>
                  @empty
                      <tr  class="text-center">
                        <td colspan="4">
                          Belum Ada Data Mutasi
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
  @include('dashboard.pages.mutasi.modals')
  
@endsection