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
      $("#form-delete")[0].setAttribute("action","/master/agama/"+$(this).data('id')+"/delete")
    })
  </script>
  
  {{-- modal untuk edit --}}
  <div class="modal fade" id="editLowonganModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
              <h3 class="font-weight-bolder card-title">Edit Data Lowongan</h3>
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
    $("#editLowonganModal").on("show.bs.modal", function(e){
      var button = $(e.relatedTarget);
      var modal = $(this);
  
      modal.find(".card-body").load(button.data("remote"))
    })
  })
  </script>
  
  {{-- modal detail applicant --}}
  <!-- Modal -->
  <div class="modal fade" id="detailApplicantModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Detail Applicant</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <i class="fa fa-spinner fa-spin"></i>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
</div>
  
  
  <script>
  $(document).ready(function($){
    $("#detailApplicantnModal").on("show.bs.modal", function(e){
      var button = $(e.relatedTarget);
      var modal = $(this);
  
      modal.find(".modal-body").load(button.data("remote"))
    })
  })
  </script>

  {{-- Modal Input Data --}}
  <div class="modal fade" id="eligibleApplicantModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
              <h3 class="font-weight-bolder">Set Jadwal Wawancara</h3>
            </div>
            <div class="card-body">
              <form role="form text-left" action="{{ route("lowongan.applicant.eligible") }}" method="post">
                @csrf
                @method("POST")
                <input type="hidden" class="form-control" id="jabatan" name="vacancy_id" >
                <input type="hidden" class="form-control" id="email" name="email" >
                <input type="hidden" class="form-control" id="apl_id" name="apl_id" >
                <label for="">Tanggal</label>
                <div class="form-group">
                  {{-- <label for="example-date-input" class="form-control-label">Date</label> --}}
                  <input name="tanggal" class="form-control" type="date" value="2022-11-23" required>
              </div>
                <label for="">Waktu</label>
                <div class="input-group mb-3">
                  <input name="waktu" type="time" class="form-control"  required id="mulai" required>
                </div>
                <label for="">Tempat</label>
                <div class="input-group mb-3">
                  <input name="tempat" type="text" class="form-control" placeholder="Tempat" required>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Kirim Jadwal</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>    
    $(document).on("click","#open-eligible", function(){
      $("#jabatan")[0].setAttribute("value",$(this).data('id'))
      $("#email")[0].setAttribute("value",$(this).data('email'))
      $("#apl_id")[0].setAttribute("value",$(this).data('aid'))
    })
  </script>
  

  {{-- Modal Input Data --}}
  <div class="modal fade" id="inputLowonganModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card card-plain">
              <div class="card-header pb-0 text-left">
                <h3 class="font-weight-bolder">Input Data Lowongan</h3>
              </div>
              <div class="card-body">
                <form role="form text-left" action="{{ route("lowongan.store") }}" method="post">
                  @csrf
                  @method("POST")
                  <label>Jabatan</label>
                  <div class="input-group mb-3">
                    <input name="jabatan" type="text" class="form-control" placeholder="Jabatan" required>
                  </div>
                  <label>Desc</label>
                  <div class="input-group mb-3">
                    <input name="desc" type="text" class="form-control" placeholder="Desc" required>
                  </div>
                  <label>Syarat</label>
                  <div class="input-group mb-0">
                    <input name="syarat" type="text" class="form-control" placeholder="Syarat" required>
                  </div>
                  <span style="font-size: 11px" class="mb-3">gunakan , (koma) sebagai separator. ex : syarat1, syarat2</span>
                  <br>
                  <label>Keahlian</label>
                  <div class="input-group mb-0">
                    <input name="keahlian" type="text" class="form-control" placeholder="Keahlian" required>
                  </div>
                  <span style="font-size: 11px" class="mb-3">gunakan , (koma) sebagai separator. ex : keahlian1, keahlian2</span>
                  <br>
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

    