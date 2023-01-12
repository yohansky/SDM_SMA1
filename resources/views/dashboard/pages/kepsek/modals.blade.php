  {{-- Modal Input Data --}}
  <div class="modal fade" id="inputSertifModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card card-plain">
              <div class="card-header pb-0 text-left">
                <h3 class="font-weight-bolder">Input Point Serfikat</h3>
              </div>
              <div class="card-body">
                <form role="form text-left"  method="post">
                  @csrf
                  @method("POST")
                  <div class="input-group mb-3">
                    <input name="link" type="text" class="form-control" value="" required hidden>
                  </div>
                  <label>Link</label>
                  <div class="input-group mb-3">
                      <input name="link" type="text" class="form-control" placeholder="link" required>
                    </div>
                    <label>Point</label>
                  <div class="input-group mb-3">
                    <input name="point" type="number" class="form-control" placeholder="point" required>
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