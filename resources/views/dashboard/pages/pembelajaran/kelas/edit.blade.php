<form role="form text-left" action="{{ route("kelas.update", $kelas->id) }}" method="post">
    @csrf
    @method("PUT")
    <label>Kelas</label>
    <div class="input-group mb-3">
      <input name="kelas" type="text" class="form-control" placeholder="kelas" value="{{ $kelas->kelas }}" required>
    </div>
    <label>Kelas</label>
    <select class="form-control" id="exampleFormControlSelect1" name="wali_kelas" required>
        <option disabled selected>-- Pilih Wali Kelas --</option>
        @foreach (getGuru() as $j)
            <option value="{{ $j->nama }}" {{ $j->nama == $kelas->wali_kelas ? "selected" : "" }} >{{ $j->nama }}</option>
            @endforeach
      </select>
    <div class="text-center">
      <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Tambahkan Data</button>
    </div>
  </form>