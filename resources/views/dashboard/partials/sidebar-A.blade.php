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
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#HRmenu" class="nav-link " aria-controls="applicationsExamples" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
              <i class="ni ni-atom text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Master SISDM</span>
          </a>
          <div class="collapse " id="HRmenu">
            <ul class="nav ms-4">
              <li class="nav-item ">
                <a class="nav-link " href="{{ route("karyawan.index") }}">
                  <span class="sidenav-mini-icon"> K </span>
                  <span class="sidenav-normal"> Karyawan </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="{{ route("sertif.index") }}">
                  <span class="sidenav-mini-icon"> K </span>
                  <span class="sidenav-normal"> Sertifikat </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="{{ route("jabatan.index") }}">
                  <span class="sidenav-mini-icon"> J </span>
                  <span class="sidenav-normal"> Jabatan </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="{{ route("agama.index") }}">
                  <span class="sidenav-mini-icon"> A </span>
                  <span class="sidenav-normal"> Agama </span>
                </a>
              </li>
              {{-- <li class="nav-item ">
                <a class="nav-link " href="../../pages/applications/wizard.html">
                  <span class="sidenav-mini-icon"> G </span>
                  <span class="sidenav-normal"> Gaji </span>
                </a>
              </li> --}}
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#Jadwalmenu" class="nav-link " aria-controls="applicationsExamples" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Pembelajaran</span>
          </a>
          <div class="collapse " id="Jadwalmenu">
            <ul class="nav ms-4">
              <li class="nav-item ">
                <a class="nav-link " href="{{ route("kelas.index") }}">
                  <span class="sidenav-mini-icon"> K </span>
                  <span class="sidenav-normal"> Kelas </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="{{ route("jadwal.index") }}">
                  <span class="sidenav-mini-icon"> J </span>
                  <span class="sidenav-normal"> Jadwal </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="{{ route("pelajaran.index") }}">
                  <span class="sidenav-mini-icon"> P </span>
                  <span class="sidenav-normal"> Pelajaran </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
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
                <a class="nav-link " href="{{ route("absensi.guru.index") }}">
                  <span class="sidenav-mini-icon"> AG </span>
                  <span class="sidenav-normal"> Absensi Guru </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="{{ route("absensi.admin.index") }}">
                  <span class="sidenav-mini-icon"> AK </span>
                  <span class="sidenav-normal"> Absensi Staff </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#Mutasimenu" class="nav-link " aria-controls="applicationsExamples" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Mutasi</span>
          </a>
          <div class="collapse " id="Mutasimenu">
            <ul class="nav ms-4">
              <li class="nav-item ">
                <a class="nav-link " href="{{ route("Mutasi.index") }}">
                  <span class="sidenav-mini-icon"> MM </span>
                  <span class="sidenav-normal">Masuk Tenaga Pendidik </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="{{ route("mutasi.keluar") }}">
                  <span class="sidenav-mini-icon"> MK </span>
                  <span class="sidenav-normal">Keluar Tenaga Pendidik </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#Mutasimenu" class="nav-link " aria-controls="applicationsExamples" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Plotting</span>
          </a>
          <div class="collapse " id="Mutasimenu">
            <ul class="nav ms-4">
              <li class="nav-item ">
                <a class="nav-link " href="{{ route("plotting.index") }}">
                  <span class="sidenav-mini-icon"> PP </span>
                  <span class="sidenav-normal">Plotting Penilaian </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        {{-- <li class="nav-item">
          <a data-bs-toggle="collapse" href="#Reportmenu" class="nav-link " aria-controls="applicationsExamples" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Laporan</span>
          </a>
          <div class="collapse " id="Reportmenu">
            <ul class="nav ms-4">
              <li class="nav-item ">
                <a class="nav-link " href="../../pages/applications/kanban.html">
                  <span class="sidenav-mini-icon"> G </span>
                  <span class="sidenav-normal"> Gaji </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="../../pages/applications/wizard.html">
                  <span class="sidenav-mini-icon"> SG </span>
                  <span class="sidenav-normal"> Slip Gaji </span>
                </a>
              </li>
            </ul>
          </div>
        </li> --}}
        {{-- <li class="nav-item">
          <a class="nav-link" href="{{ route("lowongan.index") }}">
            <div class="icon icon-shape icon-sm text-center  me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-align-left-2 text-dark text-sm"></i>
            </div>
            <span class="nav-link-text ms-1">Lowongan</span>
          </a>
        </li> --}}
        <li class="nav-item">
          <a class="nav-link" href="/penilaian" >
            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
              <i class="ni ni-settings-gear-65 text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Penilaian</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route("config.index") }}" >
            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
              <i class="ni ni-settings-gear-65 text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Config</span>
          </a>
        </li>
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