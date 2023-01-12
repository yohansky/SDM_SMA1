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
                  <h6 class="mb-2">Penilaian</h6>
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
                            <p class="text-xs font-weight-bold mb-0">Info Karyawan</p>
                          </div>
                      </td>
                      
                      <td>
                          <div class="text-center">
                            <p class="text-xs font-weight-bold mb-0">Rata Rata Nilai Teman Sejawat</p>
                          </div>
                      </td>
                      <td>
                          <div class="text-center">
                            <p class="text-xs font-weight-bold mb-0">Point Absen</p>
                          </div>
                      </td>
                      {{-- <td>
                          <div class="text-center">
                            <p class="text-xs font-weight-bold mb-0">Point Sertifikat</p>
                          </div>
                      </td> --}}
                      <td>
                          <div class="text-center">
                            <p class="text-xs font-weight-bold mb-0">Status</p>
                          </div>
                      </td>
                      {{-- <td>
                          <div class="text-center">
                            <p class="text-xs font-weight-bold mb-0">Aksi</p>
                          </div>
                      </td> --}}
                    </tr>
                  </thead>
                  <tbody>      
                    {{-- {{ dd($guru) }}        --}}
                    @forelse (getKaryawanExceptHonorer() as $d)
                    <tr style="text-align : center;">
                        <td>*</td>
                      <td>
                        <div class="d-flex px-2 py-1">
                            <div>
                            <img src="{{ url("/storage/".$d->photo) }}" class="avatar avatar-sm me-3" alt="user1">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $d->nama }}</h6>
                            <p class="text-xs text-secondary mb-0">NIK.{{ $d->NIK }}</p>
                            </div>
                            </div>
                      </td>
                      <td>
                          {{ getRataRataPenilaian($d->NIK) / 100 * 30 }}
                      </td>
                      <td>
                          {{ getPointPresence($d->NIK) }}
                      </td>
                      {{-- <td>
                          {{ getPointPresence($d->NIK) }}
                      </td> --}}
                      <td>
                          @php
                              $nilai = ( getRataRataPenilaian($d->NIK) / 100 * 30) + getPointPresence($d->NIK);
                          @endphp

                          @if ($nilai >= 85)
                              Sangat Baik
                          @elseif($nilai>= 70)
                          Baik
                          @elseif($nilai>=50)
                          Cukup
                          @elseif($nilai>=30)
                          Kurang
                          @else
                               Sangat Kurang
                          @endif
                      </td>
                      {{-- <td>
                        @if ($d->status == "Menunggu")
                            <a class="btn btn-success" href="{{ route("rekomendasi.update.status",[$d->id, 'Approve']) }}">Approve</i></a>
                        @else
                            <a class="btn btn-warning" href="{{ route("rekomendasi.update.status",[$d->id, 'Menunggu']) }}">Pending</i></a>
                        @endif
                        <button type="button" class="btn bg-gradient-success" data-bs-toggle="modal" data-bs-target="#inputSertifModal"><i class="fa-solid fa-memo"></i></button>
                      </td> --}}
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
    </div>
  </main>
  @include('dashboard.pages.kepsek.modals')
  
@endsection