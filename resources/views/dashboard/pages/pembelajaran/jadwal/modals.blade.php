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
            <p style="font-weight: bold">menghapus mungkin akan mempengaruhi data lain.</p>
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
      $("#form-delete")[0].setAttribute("action","/pembelajaran/jadwal/"+$(this).data('id')+"/delete")
    })
    </script>

{{-- modal untuk edit --}}
<div class="modal fade" id="editJadwalModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="card card-plain">
          <div class="card-header pb-0 text-left">
            <h3 class="font-weight-bolder card-title">Edit Data Kelas</h3>
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
  $("#editKelasModal").on("show.bs.modal", function(e){
    var button = $(e.relatedTarget);
    var modal = $(this);

    modal.find(".card-body").load(button.data("remote"))
  })
})
</script>


{{-- Modal Input Data --}}
<div class="modal fade" id="inputJadwalModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
              <h3 class="font-weight-bolder">Input Data Jadwal</h3>
            </div>
            <div class="card-body">
              <form role="form text-left" action="{{ route("jadwal.store") }}" method="post">
                @csrf
                @method("POST")
                <label>Mata Pelajaran</label>
                <select class="form-control" id="exampleFormControlSelect1" name="mapel" required>
                  <option disabled selected>-- Pilih Mata Pelajaran --</option>
                  @foreach (getPelajaran() as $j)
                      <option value="{{ $j->kode_mapel }}">{{$j->id . " - " . $j->nama }}</option>
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    var setSelesaiMinimumTime = () => {
      var x = document.getElementById("mulai").value;
      document.getElementById("selesai").setAttribute("min", x);
    }
  </script>