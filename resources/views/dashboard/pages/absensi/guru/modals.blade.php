{{-- Modal Input Data --}}
<div class="modal fade" id="inputAbsenModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
              <h3 class="font-weight-bolder">Input Absen</h3>
            </div>
            <div class="card-body">
              <form role="form text-left" action="{{ route("absensi.guru.post") }}" method="post" enctype="multipart/form-data">
                @csrf
                @method("POST")
                <input type="text" name="long" id="long" hidden>
                <input type="text" name="lat" id="lat" hidden>
                <input type="hidden" value="" name="jadwal_id" id="jadwal_id">
                <label>Tanggal<span></span></label>
                <div class="input-group mb-3">
                  <input name="tanggal" type="text" placeholder="DD/MM/YYY"  class="form-control" id="tanggal" required>
                </div>
                <script>
                  jQuery(document).ready(function($) {
                    if (window.jQuery().datetimepicker) {
                        $('#tanggal').datetimepicker({
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
                <label>Status</label>
                <div class="input-group mb-3">
                  <select class="form-control" id="exampleFormControlSelect1" name="status" required>
                    <option disabled>-- Pilih Status --</option>
                    <option value="Masuk">Masuk</option>
                    <option value="Izin">Izin</option>
                    <option value="Alpha">Alpha</option>
                  </select>
                </div>
                <label>Desc</label>
                <div class="input-group mb-3">
                  <input name="desc" type="text" class="form-control" placeholder="" required>
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
  const long = document.getElementById("long");
    const lat = document.getElementById("lat");

    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
        x.innerHTML = "Geolocation tidak didukung pada browser ini.";
      }
    }

    function showPosition(position) {
      long.value = position.coords.longitude
      lat.value = position.coords.latitude
    }

    window.onload = getLocation()

    
    $(document).on("click","#open-absenmodal", function(){
      $("#jadwal_id")[0].setAttribute("value",$(this).data('id'))
    })
  </script>