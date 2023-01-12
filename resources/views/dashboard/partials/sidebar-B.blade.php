<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main" data-color="warning">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
        <img src="{{ asset("/argon_assets/img/logo-ct-dark.png") }}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">SI-SDM</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto h-auto ps" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="#">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Menu</h6>
        </li>
        
        @if (Auth()->user()->role == "Kepsek")
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#Absensimenu" class="nav-link " aria-controls="applicationsExamples" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Rekomendasi</span>
          </a>
          <div class="collapse " id="Absensimenu">
            <ul class="nav ms-4">
              <li class="nav-item ">
            
                <a class="nav-link " href="{{ route("kepsek.index") }}">
                  <span class="sidenav-mini-icon"> A </span>
                  <span class="sidenav-normal"> Daftar Pengajuan Surat Rekomendasi </span>
                </a>
                
              </li>
            </ul>
          </div>
        </li>
        @endif

        @if (Auth()->user()->role != "Kepsek")
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#Absensimenu" class="nav-link " aria-controls="applicationsExamples" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Absensi</span>
          </a>
          <div class="collapse " id="Absensimenu">
            <ul class="nav ms-4">
              <li class="nav-item ">
                @if (Auth()->user()->jabatan == "J000")
                <a class="nav-link " href="{{ route("absensi.guru") }}">
                  <span class="sidenav-mini-icon"> A </span>
                  <span class="sidenav-normal"> Absensi </span>
                </a>
                @else
                <a class="nav-link " href="{{ route("absensi.staff.index") }}">
                  <span class="sidenav-mini-icon"> A </span>
                  <span class="sidenav-normal"> Absensi </span>
                </a>
                @endif
              </li>
            </ul>
          </div>
        </li>
        @endif

        @if (getSejawat()[0]->penilaian_sejawat == "Buka" && auth()->user()->role == "Guru")
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#Absensimenu" class="nav-link " aria-controls="applicationsExamples" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Kenaikan Golongan</span>
          </a>
          <div class="collapse " id="Absensimenu">
            <ul class="nav ms-4">
              <li class="nav-item ">
                <a class="nav-link " href="{{ route("request.rekomendasi") }}">
                  <span class="sidenav-mini-icon"> RS </span>
                  <span class="sidenav-normal"> Surat Rekomendasi </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        {{-- <li class="nav-item">
          <a data-bs-toggle="collapse" href="#Absensimenu" class="nav-link " aria-controls="applicationsExamples" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Kuisoner</span>
          </a>
          <div class="collapse " id="Absensimenu">
            <ul class="nav ms-4">
              <li class="nav-item ">
                <a class="nav-link " href="{{ route("penilaian.sejawat") }}">
                  <span class="sidenav-mini-icon"> RS </span>
                  <span class="sidenav-normal"> Penilaian Teman Sejawat </span>
                </a>
              </li>
            </ul>
          </div>
        </li> --}}
        @endif
        @if (getSejawat()[0]->penilaian_sejawat == "Buka")
          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#Absensimenu" class="nav-link " aria-controls="applicationsExamples" role="button" aria-expanded="false">
              <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                <i class="ni ni-collection text-warning text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Kuisoner</span>
            </a>
            <div class="collapse " id="Absensimenu">
              <ul class="nav ms-4">
                <li class="nav-item ">
                  <a class="nav-link " href="{{ route("penilaian.sejawat") }}">
                    <span class="sidenav-mini-icon"> RS </span>
                    <span class="sidenav-normal"> Penilaian Teman Sejawat </span>
                  </a>
                </li>
              </ul>
              <ul class="nav ms-4">
                <li class="nav-item ">
                  <button type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#inputLinkModal" ><i class="fa-solid fa-circle-plus"></i> Upload Link Sertifikat</button>
                </li>
              </ul>
            </div>
          </li>
        @endif
        <li class="nav-item">
          <hr class="horizontal dark">
          <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder opacity-6">DOCS</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://github.com/creativetimofficial/ct-argon-dashboard-pro/blob/main/CHANGELOG.md" target="_blank">
            <div class="icon icon-shape icon-sm text-center  me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-align-left-2 text-dark text-sm"></i>
            </div>
            <span class="nav-link-text ms-1">Changelog</span>
          </a>
        </li>
      </ul>
    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
    <div class="sidenav-footer mx-3 ">
      <div class="card card-plain shadow-none" id="sidenavCard">
        <img class="w-50 mx-auto" src="{{ url("/storage/".getLogo()) }}" alt="sidebar_illustration">
        <div class="card-body text-center p-3 w-100 pt-0">
          
        </div>
      </div>
      </div>
  </aside>

  