<form role="form text-left" action="{{ route("karyawan.update", $karyawan[0]->NIK) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <label>NIK</label>
    <div class="input-group mb-3">
      <input name="NIK" type="text" class="form-control" placeholder="Nomor Induk Karyawan" value="{{ $karyawan[0]->NIK }}" required readonly>
    </div>
    <label>Nama Lengkap</label>
    <div class="input-group mb-3">
      <input name="nama" type="text" class="form-control" placeholder="Nama Lengkap" value="{{ $karyawan[0]->nama }}" required>
    </div>
    <label>Jenis Kelamin</label>
    <select class="form-control" id="exampleFormControlSelect1" name="jenis_kelamin" required>
        <option disabled>-- Pilih Jenis Kelamin --</option>
        <option value="Laki-Laki" {{ $karyawan[0]->jenis_kelamin == "Laki-Laki" ? "Selected" : "" }}>L</option>
        <option value="Perempuan">{{ $karyawan[0]->jenis_kelamin == "Perempuan" ? "Selected" : "" }}</option>
      </select>
    {{-- <label>Tempat Tanggal Lahir</label>
    <div class="input-group mb-3">
      <input name="tempat_tgl_lahir" type="text" class="form-control" placeholder="Kota, 01 Januari 2000" value="{{ $karyawan[0]->tempat_tgl_lahir }}" required>
    </div> --}}
    <label>Kewarganegaraan</label>
    <div class="input-group mb-3">
      <input name="kewarganegaraan" type="text" list="negara" class="form-control" placeholder="Kewarganegaraan" value="{{ $karyawan[0]->kewarganegaraan }}" required>
      <datalist id="negara">
        <option value="Indonesia">
        <option value="Amerika">
        <option value="Inggris">
        <option value="Russia">
        <option value="Malaysia">
      </datalist>
    </div>
    <label>Pendidikan Terakhir</label>
    <div class="input-group mb-3">
      <input name="pendidikan_terakhir" type="text" class="form-control" placeholder="S1, Universitas Indonesia" value="{{ $karyawan[0]->pendidikan_terakhir }}" required>
    </div>
    <label>Agama</label>
    <select class="form-control" id="exampleFormControlSelect1" name="agama" required>
        <option disabled selected>-- Pilih Agama --</option>
        @foreach (getAgama() as $j)
            <option value="{{ $j->id }}" {{ $karyawan[0]->agama == $j->id ? "Selected" : "" }}>{{ $j->name }}</option>
            @endforeach
      </select>
    <label>Status Perkawinan</label>
    <select class="form-control" id="exampleFormControlSelect1" name="status_perkawinan" required>
        <option disabled selected>-- Pilih Status --</option>
        <option value="Belum Kawin" {{ $karyawan[0]->status_perkawinan == "Belum Kawin" ? "Selected" : ""}}>Belum Kawin</option>
        <option value="Kawin"{{ $karyawan[0]->status_perkawinan == "Kawin" ? "Selected" : ""}}>Kawin</option>
        <option value="Cerai Hidup"{{ $karyawan[0]->status_perkawinan == "Cerai Hidup" ? "Selected" : ""}}>Cerai Hidup</option>
        <option value="Cerai Mati"{{ $karyawan[0]->status_perkawinan == "Cerai Mati" ? "Selected" : ""}}>Cerai Mati</option>
      </select>
    {{-- <label>Tanggungan</label>
    <div class="input-group mb-3">
      <input name="tanggungan" type="number" class="form-control" placeholder="Jumlah Tanggungan" value="{{ $karyawan[0]->tanggungan }}" min="0" required>
    </div> --}}
    <label>Alamat</label>
    <div class="input-group mb-3">
      <input name="alamat" type="text" class="form-control" placeholder="Alamat" value="{{ $karyawan[0]->alamat }}" required>
    </div>
    <label>Nomer Telephone</label>
    <div class="input-group mb-3">
      <input name="no_telp" type="text" class="form-control" placeholder="+62" value="{{ $karyawan[0]->no_telp }}" required>
    </div>
    <label>Mulai Kerja</label>
    <div class="form-group">
        {{-- <label for="example-date-input" class="form-control-label">Date</label> --}}
        <input name="mulai_kerja" class="form-control" type="date" value="{{ $karyawan[0]->mulai_kerja }}" id="example-date-input">
    </div>
    <label>Jabatan</label>
    <div class="input-group mb-3">
        <select class="form-control" id="exampleFormControlSelect1" name="jabatan" required>
            <option disabled selected>-- Pilih Jabatan --</option>
            @foreach (getJabatan() as $j)
            <option value="{{ $j->id }}" {{ $karyawan[0]->jabatan == $j->id ? "Selected" : "" }}>{{ $j->name }}</option>
            @endforeach
          </select>
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Ubah Data</button>
    </div>
  </form>