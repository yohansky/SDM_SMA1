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
        <div class="col-lg-12 mb-lg-4 mb-4">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">Absensi Mandiri</h6>
                <div class="" id="jam"></div>
              </div>
            </div>
            <div class="table-responsive" style="padding: 30px;">
              <table>
                  <tr>
                      <td>Tanggal</td>
                      <td> : </td>
                      <td>{{ date("d/m/Y") }}</td>
                  </tr>
                  <tr>
                      <td>Jam Masuk </td>
                      <td> : </td>
                      <td>{{ getJamAbsen()[0]->waktu_mulai_absen_staff }}</td>
                  </tr>
                  <tr>
                      <td>Jam Pulang </td>
                      <td> : </td>
                      <td>{{ getJamAbsen()[0]->waktu_selesai_absen_staff }}</td>
                  </tr>
                  <tr>
                      @if ($eli == 0)
                      <td>
                        <form action="{{ route("absensi.staff.post") }}" method="POST">
                          @csrf
                          @method("POST")
                          {{-- <button type="button" onclick="getLocation()" class="btn bg-gradient-info" data-bs-toggle="modal" ><i class="fa-solid fa-circle-plus"></i> Cek Posisi</button>
                          <br> --}}
                          <input type="text" name="longitude" id="long" hidden readonly required>
                          <br>
                          <input type="text" name="latitude" id="lat" hidden readonly required>
                          <br>
                          <button type="submit" class="btn bg-gradient-success" data-bs-toggle="modal" ><i class="fa-solid fa-circle-plus"></i> Absen Masuk</button>
                        </form>
                      </td>
                      @elseif($eli2 == 0)
                      <td><button type="button" class="btn bg-gradient-danger" data-bs-toggle="modal" ><i class="fa-solid fa-circle-plus"></i> Absen Pulang</button></td>
                      @endif
                      
                  </tr>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">Riwayat Absen</h6>
                <div class="" id="jam"></div>
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
                          <p class="text-xs font-weight-bold mb-0">Tanggal</p>
                        </div>
                    </td>
                    <td>
                        <div class="text-center">
                          <p class="text-xs font-weight-bold mb-0">Jam Absen Masuk</p>
                        </div>
                    </td>
                    <td>
                        <div class="text-center">
                          <p class="text-xs font-weight-bold mb-0">Jam Absen Pulang</p>
                        </div>
                    </td>
                    <td>
                        <div class="text-center">
                          <p class="text-xs font-weight-bold mb-0">Status</p>
                        </div>
                    </td>
                    <td>
                        <div class="text-center">
                          <p class="text-xs font-weight-bold mb-0">Desc</p>
                        </div>
                    </td>
                    <td>
                        <div class="text-center">
                          <p class="text-xs font-weight-bold mb-0">Map</p>
                        </div>
                    </td>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($riwayat as $r)
                  
                    <tr>
                        <td class="text-center">*</td>
                      <td>
                        <div class="text-center">
                          <h6 class="text-sm mb-0">{{ $r->tanggal }}</h6>
                        </div>
                      </td>
                      <td>
                        <div class="text-center">
                          <h6 class="text-sm mb-0">{{ $r->jam_absen_masuk }}</h6>
                        </div>
                      </td>
                      <td>
                        <div class="text-center">
                          <h6 class="text-sm mb-0">{{ $r->jam_absen_keluar }}</h6>
                        </div>
                      </td>
                      <td>
                        <div class="text-center">
                          <h6 class="text-sm mb-0 badge bg-gradient-success">{{ $r->status }}</h6>
                        </div>
                      </td>
                      <td>
                        <div class="text-center">
                          <h6 class="text-sm mb-0">{{ $r->desc }}</h6>
                        </div>
                      </td>
                    </tr>
                      <td>
                        <div class="text-center">
                          <a type="button" class="btn btn-info" href="http://maps.google.co.id/?q={{ $r->latitude }},{{  $r->longitude }}"><i class="fa-solid fa-earth-asia"></i></a>
                        </div>
                      </td>
                    </tr>
                  @empty
                      <tr  class="text-center">
                        <td colspan="4">
                          Belum Ada Data Absensi
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

  <script>  

    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
        
      }
    }

    function showPosition(position) {
      document.getElementById("long").value = position.coords.longitude
      document.getElementById("lat").value = position.coords.latitude
    }

    window.onload = getLocation()

    function startTime() {
      const today = new Date();
      let h = today.getHours();
      let m = today.getMinutes();
      let s = today.getSeconds();
      m = checkTime(m);
      s = checkTime(s);
      document.getElementById('jam').innerHTML =  h + ":" + m + ":" + s;
      setTimeout(startTime, 1000);
    }
    
    function checkTime(i) {
      if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
      return i;
    }
    </script>
  
@endsection