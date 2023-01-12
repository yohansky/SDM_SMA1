<form role="form text-left" action="{{ route("jadwal.update") }}" method="post">
    @csrf
    @method("PUT")
    <label>Mata Pelajaran</label>
    <select class="form-control" id="exampleFormControlSelect1" name="mapel" required>
      <option disabled selected>-- Pilih Mata Pelajaran --</option>
      @foreach (getPelajaran() as $j)
          <option value="{{ $j->id }}" {{ $j-> }}>{{$j->id . " - " . $j->nama }}</option>
          @endforeach
    </select>
    <label>Pengajar</label>
    <select class="form-control" id="exampleFormControlSelect1" name="pengajar" required>
        <option disabled selected>-- Pilih Pengajar --</option>
        @foreach (getGuru() as $j)
            <option value="{{ $j->NIK }}">{{ $j->NIK . " - " . $j->nama }}</option>
            @endforeach
      </select>
    <label>Kelas</label>
    <select class="form-control" id="exampleFormControlSelect1" name="kelas" required>
        <option disabled selected>-- Pilih Kelas --</option>
        @foreach (getKelas() as $j)
            <option value="{{ $j->id }}">{{ $j->kelas }}</option>
            @endforeach
      </select>
      <label>Hari</label>
      <select class="form-control" id="exampleFormControlSelect1" name="hari" required>
        <option disabled selected>-- Pilih Hari --</option>
        @foreach (listHari() as $index => $j)
            <option value="{{ ++$index }}">{{ $j}}</option>
            @endforeach
      </select>
      <label>Jam Mulai</label>
      <div class="input-group mb-3">
        <input name="mulai" type="time" class="form-control"  required id="mulai" onchange="setSelesaiMinimumTime()">
      </div>
      <label>Jam Selesai</label>
      <div class="input-group mb-3">
        <input name="selesai" type="time" class="form-control"  required id="selesai">
      </div>
    <div class="text-center">
      <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Tambahkan Data</button>
    </div>
  </form>