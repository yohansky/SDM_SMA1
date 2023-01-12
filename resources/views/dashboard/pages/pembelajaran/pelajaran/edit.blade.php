<form role="form text-left" action="{{ route("pelajaran.update", $mapel->id) }}" method="post">
    @csrf
    @method("PUT")
    <label>Mata Pelajaran</label>
    <div class="input-group mb-3">
      <input name="nama" type="text" class="form-control" placeholder="Mata Pelajaran" value="{{ $mapel->nama }}" required>
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Tambahkan Data</button>
    </div>
  </form>