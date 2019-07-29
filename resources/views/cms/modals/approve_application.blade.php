<!-- The Modal -->
<div class="modal fade" id="approveRequest">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <form action="" method="post" id="approveForm">
      @csrf
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Please Confirm</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          
          You approve this applicant!  
          
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-brown">Approve</button>
        </div>

      </div>
    </form>
  </div>
</div>