<form role="form text-left" action="{{ route("lowongan.update", $lowongan->id) }}" method="post">
    @csrf
    @method("PUT")
    <label>Jabatan</label>
    <div class="input-group mb-3">
      <input name="jabatan" type="text" class="form-control" placeholder="Jabatan" value="{{ $lowongan->jabatan }}" required>
    </div>
    <label>Desc</label>
    <div class="input-group mb-3">
      <input name="desc" type="text" class="form-control" placeholder="Desc" required value="{{ $lowongan->desc }}">
    </div>
    <label>Syarat</label>
    <div class="input-group mb-0">
      <input name="syarat" type="text" class="form-control" placeholder="Syarat" value="{{ $lowongan->syarat }}" required>
    </div>
    <span style="font-size: 11px" class="mb-3">gunakan , (koma) sebagai separator. ex : syarat1, syarat2</span>
    <br>
    <label>Keahlian</label>
    <div class="input-group mb-0">
      <input name="keahlian" type="text" class="form-control" placeholder="Keahlian" value="{{ $lowongan->keahlian }}" required>
    </div>
    <span style="font-size: 11px" class="mb-3">gunakan , (koma) sebagai separator. ex : keahlian1, keahlian2</span>
    <br>
    <div class="text-center">
      <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Ubah Data</button>
    </div>
  </form>