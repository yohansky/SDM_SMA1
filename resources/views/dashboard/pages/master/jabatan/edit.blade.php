<form role="form text-left" action="{{ route("jabatan.update", $jabatan->id) }}" method="post">
    @csrf
    @method("PUT")
    @if ($jabatan->name != "Guru Honorer")
    <label>Nama Jabatan</label>
    <div class="input-group mb-3">
      <input name="name" type="text" class="form-control" placeholder="Nama Jabatan" value="{{ $jabatan->name }}" required>
    </div>
    @endif
    <label>Upah</label>
    <div class="row">
      
      <div class="form-group">
          <div class="input-group mb-4">
          <span class="input-group-text">RP.</span>
          <input name="upah" class="form-control" placeholder="0" type="number" min="0" value="{{ $jabatan->upah }}" required>
          </div>
      </div>
    <label>Tunjangan</label>
    <div class="row">
      
      <div class="form-group">
          <div class="input-group mb-4">
          <span class="input-group-text">RP.</span>
          <input name="tunjangan" class="form-control" placeholder="0" type="number" min="0" value="{{ $jabatan->tunjangan }}" required>
          </div>
      </div>
      
    <div class="text-center">
      <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Ubah Data</button>
    </div>
  </form>