<!-- Add -->
<style>
    hr {
        position: relative;
        border: none;
        height: 2px;
        background: darkgray;
        margin-top: 30px;
    }
    .hr1 {
        position: relative;
        border: none;
        height: 2px;
        background: darkgray;
        margin-top: -10px;
    }
    .modal-header
    {
        background-color: #060647;
    }
    h3{
        color: white;
    }
    .close{
        color: white !important;
        font-size: 30px;
    }
    #save{
      background: #060647;
      font-size: 18px;
    }
    #close{
      font-size: 18px;
      color: #990000 !important;
    }
    #closea{
      color: #990000 !important;
    }
</style>
<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                            <h3 class="modal-title"><b>Payment</b></h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="payment_edit.php" enctype="multipart/form-data">
              <div class="form-group">
              <div class="col-sm-3">
                <h4><b>Basic Information</b></h4>
              </div>
              </div>

              <div class="row">
                <input type="hidden" class="id" name="id">
                    <div class="col-4">
                      <label for="trackingno" class="form-label">Tracking Number</label>
                      <input type="text" class="form-control" id="edit_trackingno" name="trackingno" readonly>
                    </div>
                    <div class="col-4">
                      <label for="purpose" class="form-label">Document Request</label>
                      <input type="text" class="form-control" id="edit_purpose" name="purpose" readonly>
                    </div>
                    <div class="col-4">
                      <label for="status" class="form-label">Status</label>
                      <input type="text" class="form-control" id="edit_status" name="status" readonly>
                    </div>
                </div><br>

                <div class="row">
                <div class="col-3">
                      <label for="residentid" class="form-label">Resident ID</label>
                      <input type="text" class="form-control" id="edit_residentid" name="residentid" readonly>
                    </div>
                    <div class="col-3">
                      <label for="firstname" class="form-label">First Name</label>
                      <input type="text" class="form-control" id="edit_fname" name="fname" readonly>
                    </div>
                    <div class="col-3">
                      <label for="lastname" class="form-label">Last Name</label>
                      <input type="text" class="form-control" id="edit_sname" name="sname" readonly>
                    </div>
                    <div class="col-3">
                      <label for="middlename" class="form-label">Middle Name</label>
                      <input type="text" class="form-control" id="edit_mname" name="mname" readonly>
                    </div>
                </div><br>


                <div class="row">
                    <div class="col-3">
                      <label for="puroknumber" class="form-label">Purok No.</label>
                      <input type="text" class="form-control" id="edit_purokno" name="purokno" readonly>
                    </div>     
                  <div class="col-3">
                      <label for="address" class="form-label">Address</label>
                      <input type="text" class="form-control" id="edit_address" name="address" readonly>
                    </div>    
                    <div class="col-3">
                      <label for="contactno" class="form-label">Phone/Telephone Number</label>
                      <input type="text" class="form-control" id="edit_contno" name="contno" readonly>
                    </div>
                    <div class="col-3">
                      <label for="email" class="form-label">Email Address</label>
                      <input type="email" class="form-control" id="edit_email" name="email" readonly>
                    </div>
                </div><br>

                <div class="form-group">
              <div class="col-sm-3">
                <h4><b>Payment</b></h4>
              </div>
              </div>

            <div class="row">
                    <div class="col-3">
                    </div>
                    <div class="col-3">
                    </div>    
                    <div class="col-3">
                    </div>
                    <div class="col-3">
                      <label for="total" class="form-label">Total</label>
                      <input type="text" class="form-control" id="edit_total" name="total">
                    </div>    
                </div>

                </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal" id="close"><i class="fa fa-close" id="closea"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="edit"  id="save"><i class="fa fa-save"></i> Submit</button>
              </form>
            </div>
        </div>
    </div>
</div>