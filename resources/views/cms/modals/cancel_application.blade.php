<!-- The Modal -->
<div class="modal fade" id="cancelRequest">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <form action="" method="post" id="cancelForm">
      @csrf
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Decline</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          
            <div class="form-group">
              <label style="font-weight: bold;" for="cancelTextarea">Reason:</label>
              <textarea class="form-control" rows="3" placeholder="Reason"
                name="reason" id="cancelTextarea" required></textarea>
            </div>
          
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-brown">Submit</button>
        </div>

      </div>
    </form>
  </div>
</div>