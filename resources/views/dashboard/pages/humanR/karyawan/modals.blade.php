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
            {{-- <p style="font-weight: bold">menghapus mungkin akan mempengaruhi data karyawan.</p> --}}
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
      $("#form-delete")[0].setAttribute("action","/HR/karyawan/"+$(this).data('id')+"/delete")
    })
  </script>

  {{-- modal untuk edit --}}
<div class="modal fade" id="editKaryawanModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
              <h3 class="font-weight-bolder card-title">Edit Data Karyawan</h3>
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
    $("#editKaryawanModal").on("show.bs.modal", function(e){
      var button = $(e.relatedTarget);
      var modal = $(this);
  
      modal.find(".card-body").load(button.data("remote"))
    })
  })
  </script>

{{-- Modal Input Data --}}
<div class="modal fade" id="inputKaryawanModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
              <h3 class="font-weight-bolder">Input Data Karyawan</h3>
            </div>
            <div class="card-body">
              <form role="form text-left" action="{{ route("karyawan.store") }}" method="post" enctype="multipart/form-data">
                @csrf
                @method("POST")
                <label>NIK</label>
                <div class="input-group mb-3">
                  <input name="NIK" type="text" pattern="^[0-9]*$" class="form-control" placeholder="Nomor Induk Karyawan" required>
                </div>
                <label>NIP</label>
                <div class="input-group mb-3">
                  <input name="NIP" type="text" pattern="^[0-9]*$" class="form-control" placeholder="Nomor Induk Penduduk" required>
                </div>
                <label>Photo</label>
                <div class="input-group mb-3">
                  <input name="photo" type="file" class="form-control" placeholder="Photo" required>
                </div>
                <label>Nama Lengkap</label>
                <div class="input-group mb-3">
                  <input name="nama" type="text" pattern="^[a-zA-Z_ ]*$" class="form-control" placeholder="Nama Lengkap" required>
                </div>
                <label>Jenis Kelamin</label>
                <select class="form-control" id="exampleFormControlSelect1" name="jenis_kelamin" required>
                    <option disabled>-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-Laki">L</option>
                    <option value="Perempuan">P</option>
                  </select>
                <label>Tempat Tanggal Lahir <span></span></label>
                <div class="input-group mb-3">
                  <input name="tempat_"  type="text" class="form-control" placeholder="Kota" required>
                  <input name="tgl_lahir" style="width: 40%" type="text" placeholder="DD/MM/YYY"  class="form-control" id="tanggal_lahir" required>
                </div>
                <script>
                  jQuery(document).ready(function($) {
                    if (window.jQuery().datetimepicker) {
                        $('#tanggal_lahir').datetimepicker({
                            // Formats
                            // follow MomentJS docs: https://momentjs.com/docs/#/displaying/format/
                            format: 'DD/MM/YYYY',
                            
                            // Your Icons
                            // as Bootstrap 4 is not using Glyphicons anymore
                            icons: {
                                time: 'fa fa-clock-o',
                                date: 'fa fa-calendar',
                                up: 'fa fa-chevron-up',
                                down: 'fa fa-chevron-down',
                                previous: 'fa fa-chevron-left',
                                next: 'fa fa-chevron-right',
                                today: 'fa fa-check',
                                clear: 'fa fa-trash',
                                close: 'fa fa-times'
                            }
                        });
                    }
                });
                </script>
                <label>Kewarganegaraan</label>
                <div class="input-group mb-3">
                  <input name="kewarganegaraan" type="text" class="form-control" placeholder="Kewarganegaraan" pattern="^[a-zA-Z_ ]*$" required>
                </div>
                <label>Pendidikan Terakhir</label>
                <div class="input-group mb-3">
                  <input name="pendidikan_terakhir" type="text" class="form-control" placeholder="S1, Universitas Indonesia" required>
                </div>
                <label>Agama</label>
                <select class="form-control" id="exampleFormControlSelect1" name="agama" required>
                    <option disabled selected value="">-- Pilih Agama --</option>
                    @foreach (getAgama() as $j)
                        <option value="{{ $j->id }}">{{ $j->name }}</option>
                        @endforeach
                  </select>
                <label>Status Perkawinan</label>
                <select class="form-control" id="exampleFormControlSelect1" name="status_perkawinan" required>
                    <option disabled selected value="">-- Pilih Status --</option>
                    <option value="Belum Kawin">Belum Kawin</option>
                    <option value="Kawin">Kawin</option>
                    <option value="Cerai Hidup">Cerai Hidup</option>
                    <option value="Cerai Mati">Cerai Mati</option>
                  </select>
                {{-- <label>Tanggungan</label>
                <div class="input-group mb-3">
                  <input name="tanggungan" type="number" class="form-control" placeholder="Jumlah Tanggungan" value="0" min="0" required>
                </div> --}}
                <label>Alamat</label>
                <div class="input-group mb-3">
                  <input name="alamat" type="text" class="form-control" placeholder="Alamat" required>
                </div>
                <label>Email</label>
                <div class="input-group mb-3">
                  <input name="email" type="email" class="form-control" placeholder="Email" required>
                </div>
                <label>Nomer Telephone</label>
                <div class="input-group mb-3">
                  <input name="no_telp" type="text" class="form-control" placeholder="+62" required>
                </div>
                <label>mulai_kerja</label>
                <div class="form-group">
                    {{-- <label for="example-date-input" class="form-control-label">Date</label> --}}
                    <input name="mulai_kerja" class="form-control" type="date" value="2022-11-23" >
                </div>
                <label>Jabatan</label>
                <div class="input-group mb-3">
                    <select class="form-control" id="exampleFormControlSelect1" name="jabatan" required>
                        <option disabled selected value="">-- Pilih Jabatan --</option>
                        @foreach (getJabatan() as $j)
                        <option value="{{ $j->id }}">{{ $j->name }}</option>
                        @endforeach
                      </select>
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