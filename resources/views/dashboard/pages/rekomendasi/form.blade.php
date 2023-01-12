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
                <h6 class="mb-2">Golongan Yang Dituju</h6>
                <button form="uploadLogo" class="btn bg-gradient-success" ><i class="fa-solid fa-check"></i> Ajukan</button>
              </div>
            </div>
            <div class="card-body">
              <form role="form text-left" action="{{ route("request.post") }}" method="post" enctype="multipart/form-data" id="uploadLogo">
                @csrf
                @method("POST")
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Golongan</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="golongan" required>
                     <option value="III/A" >Penata Muda - III/A</option>
                     <option value="III/B">Penata Muda Tingkat 1 - III/B</option>
                     <option value="III/C">Penata - III/C</option>
                     <option value="III/D">Penata Tingkat 1 - III/D</option>
                     <option value="IVIA">Pembina - IVIA</option>
                     <option value="IV/B">Pembina Tingkat 1 - IV/B</option>
                     <option value="IV/C">Pembina Utama Muda - IV/C</option>
                     <option value="IV/D">Pembina Utama Madya - IV/D</option>
                     <option value="IV/E">Pembina Utama  - IV/E</option>
                    </select>
                  </div>
                </form> 
              </div>
              </form>
            </div>
          </div>
          <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card ">
              <div class="card-header pb-0 p-3">
                <div class="d-flex justify-content-between">
                  <h6 class="mb-2">Riwayat Pengajuan Surat Rekomendasi</h6>
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
                            <p class="text-xs font-weight-bold mb-0">Golongan Tujuan</p>
                          </div>
                      </td>
                      <td>
                          <div class="text-center">
                            <p class="text-xs font-weight-bold mb-0">Status</p>
                          </div>
                      </td>
                      <td>
                          <div class="text-center">
                            <p class="text-xs font-weight-bold mb-0">Surat</p>
                          </div>
                      </td>
                    </tr>
                  </thead>
                  <tbody>      
                    {{-- {{ dd($guru) }}        --}}
                    @forelse ($data as $d)
                    <tr style="text-align : center;">
                        <td>*</td>
                      <td>
                          {{ $d->golongan }}
                      </td>
                      <td>
                         {{ $d->status }}
                      </td>
                      <td>
                        
                        @if ($d->status == "Menunggu")
                          <button class="btn btn-success" href="" disabled>Download</i></button>
                        @else
                          <a class="btn btn-success" href="{{ route("surat.rekomendasi", $d->id) }}">Download</i></a>
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
    </div>
  </main>
  @include('dashboard.pages.master.agama.modals')
  
@endsection