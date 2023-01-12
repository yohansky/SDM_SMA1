{{-- modal untuk edit --}}
<div class="modal fade" id="formSejawatModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
              <h3 class="font-weight-bolder card-title">Penilaian Sejawat</h3>
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
    $("#formSejawatModal").on("show.bs.modal", function(e){
      var button = $(e.relatedTarget);
      var modal = $(this);
  
      modal.find(".card-body").load(button.data("remote"))
    })
  })
  </script>