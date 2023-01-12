{{-- modal untuk apply --}}
  <!-- Modal -->
  <div class="modal fade" id="applyKarirModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Detail Lowongan</h5>
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
    $("#applyKarirModal").on("show.bs.modal", function(e){
      var button = $(e.relatedTarget);
      var modal = $(this);
  
      modal.find(".modal-body").load(button.data("remote"))
    })
  })
  </script>