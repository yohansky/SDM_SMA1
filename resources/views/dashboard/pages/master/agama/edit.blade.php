<form role="form text-left" action="{{ route("agama.update", $agama->id) }}" method="post">
    @csrf
    @method("PUT")
    <label>Nama Agama</label>
    <div class="input-group mb-3">
      <input name="name" type="text" class="form-control" placeholder="Nama Agama" value="{{ $agama->name }}" required>
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Ubah Data</button>
    </div>
  </form> 