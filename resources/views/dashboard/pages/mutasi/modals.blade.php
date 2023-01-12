{{-- Modal hapus data --}}
<div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title" id="modal-title-notification">Peringatan</h6>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="py-3 text-center">
                <i class="ni ni-bell-55 ni-3x"></i>
                <h4 class="text-gradient text-danger mt-4">Yakin Akan Menghapus Data ini ?</h4>
                <p>data akan terhapus saat anda memilih tombol Yakin!.</p>
                <p style="font-weight: bold">menghapus mungkin akan mempengaruhi data karyawan.</p>
              </div>
            </div>
            <div class="modal-footer">
              <form method="post" id="form-delete">
                @csrf
                @method("delete")
                <button type="submit" class="btn btn-white">Yakin</button>
                <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Batal</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <script>    
        $(document).on("click","#open-deletemodal", function(){
          $("#form-delete")[0].setAttribute("action","/pembelajaran/pelajaran/"+$(this).data('id')+"/delete")
        })
        </script>
    
    {{-- modal untuk edit --}}
    <div class="modal fade" id="editMapelModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card card-plain">
              <div class="card-header pb-0 text-left">
                <h3 class="font-weight-bolder card-title">Edit Data Mata Pelajaran</h3>
              </div>
              <div class="card-body">
                <i class="fa fa-spinner fa-spin"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    
    
    <script>
    $(document).ready(function($){
      $("#editMapelModal").on("show.bs.modal", function(e){
        var button = $(e.relatedTarget);
        var modal = $(this);
    
        modal.find(".card-body").load(button.data("remote"))
      })
    })
    </script>
    
    <div class="modal fade" id="PindahFormModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card card-plain">
                <div class="card-header pb-0 text-left">
                  <h3 class="font-weight-bolder">Input Data Mutasi</h3>
                </div>
                <div class="card-body">
                <form action="{{ route("Mutasi.store") }}" method="POST">
                @csrf
                @method("POST")
                <label>NIK</label>
                  <div class="input-group mb-3">
                        <input list="browsers" name="NIK" id="browser" class="form-control">
                        <datalist id="browsers">
                          @foreach (getKaryawan() as $item)
                          <option value="{{ $item->NIK }}">
                          @endforeach
                        </datalist>
                  </div>
                <label>Dari Instansi</label>
                  <div class="input-group mb-3">
                    <input name="dari_instansi" type="text" class="form-control"  required>
                  </div>
                <label>Ke Instansi</label>
                  <div class="input-group mb-3">
                    <input name="ke_instansi" type="text" class="form-control" id="ke"  required>
                  </div>
                {{-- <label>Keterangan</label> --}}
                  <div class="input-group mb-3">
                    <input name="keterangan" type="text" class="form-control" value="Pindah Tugas" required hidden>
                  </div>
                  <div class="input-group mb-3">
                    <input name="status" type="text" id="status" class="form-control" value="Masuk" required hidden>
                  </div>
                  <button type="submit" class="btn bg-gradient-info">Input Data Pindah Tugas</button>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <div class="modal fade" id="PindahKeluarFormModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card card-plain">
                <div class="card-header pb-0 text-left">
                  <h3 class="font-weight-bolder">Input Data Mutasi</h3>
                </div>
                <div class="card-body">
                <form action="{{ route("Mutasi.store") }}" method="POST">
                @csrf
                @method("POST")
                <label>NIK</label>
                  <div class="input-group mb-3">
                        <input list="browsers" name="NIK" id="browser" class="form-control">
                        <datalist id="browsers">
                          @foreach (getKaryawan() as $item)
                          <option value="{{ $item->NIK }}">
                          @endforeach
                        </datalist>
                  </div>
                <label>Dari Instansi</label>
                  <div class="input-group mb-3">
                    <input name="dari_instansi" type="text" class="form-control"  required>
                  </div>
                <label>Ke Instansi</label>
                  <div class="input-group mb-3">
                    <input name="ke_instansi" type="text" class="form-control" id="ke"  required>
                  </div>
                {{-- <label>Keterangan</label> --}}
                  <div class="input-group mb-3">
                    <input name="keterangan" type="text" class="form-control" value="Pindah Tugas" required hidden>
                  </div>
                  <div class="input-group mb-3">
                    <input name="status" type="text" id="status" class="form-control" value="Keluar" required hidden>
                  </div>
                  <button type="submit" class="btn bg-gradient-info">Input Data Pindah Tugas</button>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <div class="modal fade" id="AnggotaBaruFormModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card card-plain">
                <div class="card-header pb-0 text-left">
                  <h3 class="font-weight-bolder">Input Data Mutasi</h3>
                </div>
                <div class="card-body">
                <form action="{{ route("Mutasi.store") }}" method="POST">
                @csrf
                @method("POST")
                <label>NIK</label>
                  <div class="input-group mb-3">
                        <input list="browsers" name="NIK" id="browser" class="form-control">
                        <datalist id="browsers">
                          @foreach (getKaryawan() as $item)
                          <option value="{{ $item->NIK }}">
                          @endforeach
                        </datalist>
                  </div>
                {{-- <label>Keterangan</label> --}}
                  <div class="input-group mb-3">
                    <input name="keterangan" type="text" class="form-control" value="Anggota Baru" required hidden>
                  </div>
                        <div class="input-group mb-3">
                        <input name="status" type="text" class="form-control" value="Masuk" required hidden>
                        </div>
                        <button type="submit" class="btn bg-gradient-info">Input Data</button>
                        </form>
                        </div>
                </div>
                </div>
                </div>
                </div>
        </div>
    <div class="modal fade" id="PensiunFormModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card card-plain">
                <div class="card-header pb-0 text-left">
                  <h3 class="font-weight-bolder">Input Data Mutasi</h3>
                </div>
                <div class="card-body">
                <form action="{{ route("Mutasi.store") }}" method="POST">
                @csrf
                @method("POST")
                <label>NIK</label>
                  <div class="input-group mb-3">
                        <input list="browsers" name="NIK" id="browser" class="form-control">
                        <datalist id="browsers">
                          @foreach (getKaryawan() as $item)
                          <option value="{{ $item->NIK }}">
                          @endforeach
                        </datalist>
                  </div>
                {{-- <label>Keterangan</label> --}}
                  <div class="input-group mb-3">
                    <input name="keterangan" type="text" class="form-control" value="Pensiun" required hidden>
                  </div>
                        <div class="input-group mb-3">
                        <input name="status" type="text" class="form-control" value="Keluar" required hidden>
                        </div>
                        <button type="submit" class="btn bg-gradient-info">Input Data</button>
                        </form>
                        </div>
                </div>
                </div>
                </div>
                </div>
        </div>
    <div class="modal fade" id="MengundurkanDiriFormModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card card-plain">
                <div class="card-header pb-0 text-left">
                  <h3 class="font-weight-bolder">Input Data Mutasi</h3>
                </div>
                <div class="card-body">
                <form action="{{ route("Mutasi.store") }}" method="POST">
                @csrf
                @method("POST")
                <label>NIK</label>
                  <div class="input-group mb-3">
                        <input list="browsers" name="NIK" id="browser" class="form-control">
                        <datalist id="browsers">
                          @foreach (getKaryawan() as $item)
                          <option value="{{ $item->NIK }}">
                          @endforeach
                        </datalist>
                  </div>
                {{-- <label>Keterangan</label> --}}
                  <div class="input-group mb-3">
                    <input name="keterangan" type="text" class="form-control" value="Mengundurkan Diri" required hidden>
                  </div>
                        <div class="input-group mb-3">
                        <input name="status" type="text" class="form-control" value="Keluar" required hidden>
                        </div>
                        <button type="submit" class="btn bg-gradient-info">Input Data</button>
                        </form>
                        </div>
                </div>
                </div>
                </div>
                </div>
        </div>

    {{-- Modal Input Data --}}
    <div class="modal fade" id="inputMutasiModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card card-plain">
                <div class="card-header pb-0 text-left">
                  <h3 class="font-weight-bolder">Pilih Opsi Mutasi</h3>
                </div>
                <div class="card-body">
                        <button type="button" class="btn bg-gradient-success" data-bs-toggle="modal" data-bs-target="#AnggotaBaruFormModal"><i class="fa-solid fa-circle-plus"></i> Anggota Pendidik Baru</button>
                        <button type="button" class="btn bg-gradient-info" data-bs-toggle="modal" data-bs-target="#PindahFormModal"><i class="fa-solid fa-circle-plus"></i> Pindah Tugas</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    {{-- Modal Input Data --}}
    <div class="modal fade" id="inputMutasiKeluarModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card card-plain">
                <div class="card-header pb-0 text-left">
                  <h3 class="font-weight-bolder">Pilih Opsi Mutasi Keluar</h3>
                </div>
                <div class="card-body">
                        <button type="button" class="btn bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#PensiunFormModal"><i class="fa-solid fa-circle-plus"></i>Pensiun</button>
                        <button type="button" class="btn bg-gradient-warning" data-bs-toggle="modal" data-bs-target="#MengundurkanDiriFormModal"><i class="fa-solid fa-circle-plus"></i>Mengundurkan Diri</button>
                        <button type="button" id="open-baru" class="btn bg-gradient-info" data-bs-toggle="modal" data-bs-target="#PindahKeluarFormModal" data-status="Keluar"><i class="fa-solid fa-circle-plus"></i>Pindah Tugas</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>