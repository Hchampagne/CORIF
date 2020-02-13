<!-- Modal -->
<div class="modal fade" id="inscriptionConfModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">
          Confirmation
        </h4>
      </div>
      <hr>
      <div class="modal-body">
        <div>
          <p><?= isset($mess) ? $mess : ""; ?></p>
        </div>
        <hr>
        <div class="form-group row justify-content-md-center">
          <div class="col-sm-1 col-form-label">
          </div>
          <div class="col-sm-7">
            <a href="" type="button" class="btn btn-default" data-dismiss="modal">Fermer</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
