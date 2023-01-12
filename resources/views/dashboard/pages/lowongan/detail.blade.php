<form role="form text-left" enctype="multipart/form-data">
    <input type="text" name="vacancy_id" value="{{ $a->id }}" hidden>
    <label>Nama Lengkap</label>
    <div class="input-group mb-3">
      <input name="name" type="text" class="form-control" placeholder="Nama Lengkap" value="{{ $a->name }}" disabled>
    </div>
    <label>Nomor Induk Penduduk</label>
    <div class="input-group mb-3">
      <input name="nip" type="text" class="form-control" placeholder="Nomor Induk Penduduk"  value="{{ $a->nip }}" disabled>
    </div>
    {{-- <label>Tempat Tanggal Lahir <span></span></label>
    <div class="input-group mb-3">
      <input name="tempat_"  type="text" class="form-control" placeholder="Kota" disabled>
      <input name="tgl_lahir" style="width: 40%" type="text" placeholder="DD/MM/YYY"  class="form-control" id="tanggal_lahir" disabled>
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
    </script> --}}
    <label>Jenis Kelamin</label>
    <select class="form-control" id="exampleFormControlSelect1" name="jenis_kelamin" disabled>
        <option disabled>-- Pilih Jenis Kelamin --</option>
        <option value="Laki-Laki" {{ $a->jenis_kelamin == "Laki-Laki" ? "Selected" : "" }}>L</option>
        <option value="Perempuan" {{ $a->jenis_kelamin == "Perempuan" ? "Selected" : "" }}> P </option>
      </select>
    <label>Kewarganegaraan</label>
    <div class="input-group mb-3">
      <input name="kewarganegaraan" type="text" list="negara" class="form-control" placeholder="Kewarganegaraan" value="{{ $a->kewarganegaraan }}" disabled>
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
      <input name="email" type="text" class="form-control" placeholder="Email" value="{{ $a->email }}" disabled>
    </div>
    <label>Nomor Telephone</label>
    <div class="input-group mb-3">
      <input name="no_hp" type="text" class="form-control" placeholder="No Telp" value="{{ $a->no_hp }}" disabled>
    </div>
    <label>Agama</label>
    <select class="form-control" id="exampleFormControlSelect1" name="agama" disabled>
        <option disabled selected>-- Pilih Agama --</option>
        @foreach (getAgama() as $j)
            <option value="{{ $j->id }}" {{ $a->agama == $j->id ? "Selected" : "" }}>{{ $j->name }}</option>
            @endforeach
      </select>
    <label>Status Perkawinan</label>
    <select class="form-control" id="exampleFormControlSelect1" name="status_perkawinan" disabled>
        <option disabled selected>-- Pilih Status --</option>
        <option value="Belum Kawin" {{ $a->status_perkawinan == "Belum Kawin" ? "Selected" : ""}}>Belum Kawin</option>
        <option value="Kawin"{{ $a->status_perkawinan == "Kawin" ? "Selected" : ""}}>Kawin</option>
        <option value="Cerai Hidup"{{ $a->status_perkawinan == "Cerai Hidup" ? "Selected" : ""}}>Cerai Hidup</option>
        <option value="Cerai Mati"{{ $a->status_perkawinan == "Cerai Mati" ? "Selected" : ""}}>Cerai Mati</option>
      </select>
    <label>Alamat</label>
    <div class="input-group mb-3">
      <input name="alamat_lengkap" type="text" class="form-control" placeholder="Alamat" value="{{ $a->alamat_lengkap }}" disabled>
    </div>
    <label>Link Sertifikat</label>
    <div class="input-group mb-0">
        <a href="{{ $a->link_sertifikat }}">{{ $a->link_sertifikat }}</a>
    </div>
    <label>Curiculum Vitae</label>
    <div class="input-group mb-0">
        <a href="{{ asset("/storage/".$a->cv); }}" target="_blank">Download</a>
    </div>
  </form>