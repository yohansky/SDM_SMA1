<h1>{{ $lowongan->jabatan }}</h1>

<p>{{ $lowongan->desc }}</p>

<p>Syarat</p>
    <ul>
        @php
            $syarat = explode(",",$lowongan->syarat);    
        @endphp
        @foreach ($syarat as $s)
        <li>{{ $s }}</li>
        @endforeach
    </ul>
    <p>Keahlian</p>
    <ul>
        @php
            $keahlian = explode(",",$lowongan->keahlian);
        @endphp
        @foreach ($keahlian as $s)
        <li>{{ $s }}</li>
        @endforeach
    </ul>

    <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="panelsStayOpen-headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
              Form Apply Lowongan
            </button>
          </h2>
          <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
            <div class="accordion-body">
              <form role="form text-left" action="{{ Route("lowongan.apply") }}" method="post" enctype="multipart/form-data">
                @csrf
                @method("POST")
                <input type="text" name="vacancy_id" value="{{ $lowongan->id }}" hidden>
                <label>Nama Lengkap</label>
                <div class="input-group mb-3">
                  <input name="name" type="text" class="form-control" placeholder="Nama Lengkap" required>
                </div>
                <label>Nomor Induk Penduduk</label>
                <div class="input-group mb-3">
                  <input name="nip" type="text" class="form-control" placeholder="Nomor Induk Penduduk" required>
                </div>
                <label>Tempat Tanggal Lahir <span></span></label>
                <div class="input-group mb-3">
                  <input name="tempat_"  type="text" class="form-control" placeholder="Kota" required>
                  <input name="tgl_lahir" style="width: 40%" type="text" placeholder="DD/MM/YYY"  class="form-control" id="tanggal_lahir" required>
                </div>
                <script>
                  jQuery(document).ready(function($) {
                    if (window.jQuery().datetimepicker) {
                        $('#tanggal_lahir').datetimepicker({
                            // Formats
                            // follow MomentJS docs: https://momentjs.com/docs/#/displaying/format/
                            format: 'DD/MM/YYYY',
                            
                            // Your Icons
                            // as Bootstrap 4 is not using Glyphicons anymore
                            icons: {
                                time: 'fa fa-clock-o',
                                date: 'fa fa-calendar',
                                up: 'fa fa-chevron-up',
                                down: 'fa fa-chevron-down',
                                previous: 'fa fa-chevron-left',
                                next: 'fa fa-chevron-right',
                                today: 'fa fa-check',
                                clear: 'fa fa-trash',
                                close: 'fa fa-times'
                            }
                        });
                    }
                });
                </script>
                <label>Jenis Kelamin</label>
                <select class="form-control" id="exampleFormControlSelect1" name="jenis_kelamin" required>
                    <option disabled>-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-Laki"  >L</option>
                    <option value="Perempuan"> P </option>
                  </select>
                {{-- <label>Tempat Tanggal Lahir</label>
                <div class="input-group mb-3">
                  <input name="tempat_tgl_lahir" type="text" class="form-control" placeholder="Kota, 01 Januari 2000" value="{{ $karyawan[0]->tempat_tgl_lahir }}" required>
                </div> --}}
                <label>Kewarganegaraan</label>
                <div class="input-group mb-3">
                  <input name="kewarganegaraan" type="text" list="negara" class="form-control" placeholder="Kewarganegaraan" required>
                  <datalist id="negara">
                    <option value="Indonesia">
                    <option value="Amerika">
                    <option value="Inggris">
                    <option value="Russia">
                    <option value="Malaysia">
                  </datalist>
                </div>
                <label>Email</label>
                <div class="input-group mb-3">
                  <input name="email" type="text" class="form-control" placeholder="Email" required>
                </div>
                <label>Nomor Telephone</label>
                <div class="input-group mb-3">
                  <input name="no_hp" type="text" class="form-control" placeholder="No Telp" required>
                </div>
                <label>Agama</label>
                <select class="form-control" id="exampleFormControlSelect1" name="agama" required>
                    <option disabled selected>-- Pilih Agama --</option>
                    @foreach (getAgama() as $j)
                        <option value="{{ $j->id }}">{{ $j->name }}</option>
                        @endforeach
                  </select>
                <label>Status Perkawinan</label>
                <select class="form-control" id="exampleFormControlSelect1" name="status_perkawinan" required>
                    <option disabled selected>-- Pilih Status --</option>
                    <option value="Belum Kawin">Belum Kawin</option>
                    <option value="Kawin">Kawin</option>
                    <option value="Cerai Hidup">Cerai Hidup</option>
                    <option value="Cerai Mati">Cerai Mati</option>
                  </select>
                <label>Alamat</label>
                <div class="input-group mb-3">
                  <input name="alamat_lengkap" type="text" class="form-control" placeholder="Alamat" required>
                </div>
                <label>Curiculum Vitae</label>
                <div class="input-group mb-3">
                  <input name="cv" type="file" class="form-control" placeholder="Curiculum Vitae" accept="application/pdf" required>
                </div>
                <label>Link Sertifikat</label>
                  <div class="input-group mb-0">
                    <input name="link_sertifikat" type="text" class="form-control" placeholder="Link Sertifikat" required>
                  </div>
                  <span style="font-size: 11px" class="mb-3">Format(.Rar), Gunakan Penyedia Repository online (GD,Uptobox,Mega,Dll) dan pastikan link dapat dibuka</span>
                  <br>
                <div class="text-center">
                  <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Apply Lowongan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
