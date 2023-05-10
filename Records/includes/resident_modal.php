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
<div class="modal fade" id="addnew">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"><b>Add New Resident</b></h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="residents_add.php" enctype="multipart/form-data">
              <div class="form-group">
              <div class="col-sm-6">
                <h4><b>Basic Information</b></h4>
              </div>
              </div>
                <div class="row">
                    <div class="col-4">
                      <label for="email" class="form-label">Email Address</label>
                      <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="col-4">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="col-4">
                      <label for="contno" class="form-label">Contact Number</label>
                      <input type="text" class="form-control" id="contno" name="contno">
                </div>
                </div>
            <div class="row">
                <div class="col-3">
                      <label for="lastname" class="form-label">Lastname</label>
                      <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>
                <div class="col-3">
                      <label for="firstname" class="form-label">Firstname</label>
                      <input type="text" class="form-control" id="firstname" name="firstname" required>
                </div>
                <div class="col-3">
                      <label for="middlename" class="form-label">Middlename</label>
                      <input type="text" class="form-control" id="middlename" name="middlename" required>
                </div>
                <div class="col-3">
                      <label for="suffix" class="form-label">Suffix</label>
                      <input type="text" class="form-control" id="suf" name="suf" required>
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                      <label for="pob" class="form-label">Place of Birth</label>
                      <input type="text" class="form-control" id="pob" name="pob" required>
                </div>
                <div class="col-3">
                      <label for="dob" class="form-label">Date of Birth</label>
                      <input type="date" class="form-control" id="dob" name="dob" required>
                </div>  
                <div class="col-3">
                  <label>Gender</label>
                  <select class="form-control select2" name="gender" style="width: 100%;">
                    <option selected="selected" value="Others">Others</option>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                  </select>
                </div>
                <div class="col-3">
                      <label for="religion" class="form-label">Religion</label>
                      <input type="text" class="form-control" id="religion" name="religion" required>
                </div> 
                 
            </div>
            <hr>
            <div class="row">
              <div class="col-6">
                <h4><b>Other Information</b></h4>
              </div>
              </div>
            <div class="row">
                   <div class="col-3">
                      <label for="nationality" class="form-label">Nationality</label>
                      <input type="text" class="form-control" id="nationality" name="nationality" required>
                    </div>   
                    <div class="col-3">
                      <label>Civil Status</label>
                      <select class="form-control select2" name="cs" style="width: 100%;">
                        <option selected="selected" value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Widowed">Widowed</option>
                      </select>
                    </div>
                    <div class="col-6">
                      <label for="photo" class="form-label">Photo</label>
                      <input type="file" class="form-control" id="photo" name="photo" required>
                    </div>    
                </div>

                <div class="row">
                    <div class="col-3">
                      <label for="address" class="form-label">Address</label>
                      <input type="text" class="form-control" id="address" name="address" required>
                    </div>   
                    <div class="col-3">
                      <label for="puroknumber" class="form-label">Purok Number</label>
                      <input type="text" class="form-control" id="puroknumber" name="puroknumber" required>
                    </div>   
                    <div class="col-3">
                      <label>Home Ownership Status</label>
                    <select class="form-control select2" name="unt" style="width: 100%;">
                      <option selected="selected" value="Owner">Owner</option>
                      <option value = "Renter">Renter</option>
                      <option value = "Sharer">Sharer</option>
                    </select>
                    </div>    
                    <div class="col-3">
                      <label for="occupation" class="form-label">Occupation</label>
                      <input type="text" class="form-control" id="occupation" name="occupation">
                    </div>
                </div>
                </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal" id="close"><i class="fa fa-close" id="closea"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"  id="save"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>


<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                            <h3 class="modal-title"><b>Update Resident Information</b></h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="residents_edit.php" enctype="multipart/form-data">
              <div class="form-group">
              <div class="col-sm-3">
                <h4><b>Basic Information</b></h4>
              </div>
              </div>

              <div class="row">
                <input type="hidden" class="id" name="id">
                    <div class="col-3">
                      <label for="residentid" class="form-label">Resident ID</label>
                      <input type="text" class="form-control" id="edit_residentid" name="residentid" readonly required>
                    </div>
                </div>

                <div class="row">
                <input type="hidden" class="id" name="id">
                    <div class="col-3">
                      <label for="firstname" class="form-label">First Name</label>
                      <input type="text" class="form-control" id="edit_firstname" name="firstname" required>
                    </div>
                    <div class="col-3">
                      <label for="lastname" class="form-label">Last Name</label>
                      <input type="text" class="form-control" id="edit_lastname" name="lastname" required>
                    </div>
                    <div class="col-3">
                      <label for="middlename" class="form-label">Middle Name</label>
                      <input type="text" class="form-control" id="edit_middlename" name="middlename">
                  </div>
                  <div class="col-3">
                        <label for="middlename" class="form-label">Suffix</label>
                        <input type="text" class="form-control" id="edit_suf" name="suf">
                  </div>
                </div>

            <div class="row">
                <div class="col-3">
                      <label for="birthdate" class="form-label">Date of Birth</label>
                      <input type="date" class="form-control" id="edit_dob" name="dob" required>
                </div>
                <div class="col-3">
                      <label for="birthplace" class="form-label">Place of Birth</label>
                      <input type="text" class="form-control" id="edit_pob" name="pob" required>
                </div>
                <div class="col-3">
                  <label>Gender</label>
                  <select class="form-control select2" name="gender" id="edit_gender" style="width: 100%;">
                    <option selected="selected" value="Others">Others</option>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                  </select>
                </div>
                <div class="col-3">
                      <label for="civilstatus" class="form-label">Civil Status</label>
                      <input type="text" class="form-control" id="edit_cs" name="cs" required>
                </div>
            </div>

            <hr>
            <div class="row">
              <div class="col-3">
                <h4><b>Other Information</b></h4>
              </div>
              </div>
            <div class="row">
                    <div class="col-3">
                      <label>Land Ownership Status</label>
                      <select class="form-control select2" name="unt" id="edit_unt" style="width: 100%;">
                        <option selected="selected" value="Owner">Owner</option>
                        <option value="Renter">Renter</option>
                        <option value="Sharer">Sharer</option> 
                      </select>
                    </div>
                    <div class="col-3">
                      <label for="puroknumber" class="form-label">Purok Area No.</label>
                      <input type="text" class="form-control" id="edit_puroknumber" name="puroknumber" required>
                    </div>    
                    <div class="col-6">
                      <label for="address" class="form-label">Address</label>
                      <input type="text" class="form-control" id="edit_address" name="address" required>
                    </div> 
                </div>

                <div class="row">
                  <div class="col-4">
                      <label>Home Ownership Status</label>
                      <select class="form-control select2" name="unt" id="edit_unt" style="width: 100%;">
                      <option selected="selected" value="Owner">Owner</option>
                      <option value="Renter">Renter</option>
                      <option value="Sharer">Sharer</option> 
                      </select>
                    </div>    
                    <div class="col-4">
                      <label for="religion" class="form-label">Religion</label>
                      <input type="text" class="form-control" id="edit_religion" name="religion" >
                    </div>
                    <div class="col-4">
                      <label for="nationality" class="form-label">Nationality</label>
                      <input type="text" class="form-control" id="edit_nationality" name="nationality" >
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-4">
                      <label for="phonenumber" class="form-label">Phone/Telephone Number</label>
                      <input type="text" class="form-control" id="edit_contno" name="contno">
                    </div>
                    <div class="col-4">
                      <label for="email" class="form-label">Email Address</label>
                      <input type="email" class="form-control" id="edit_email" name="email" required>
                    </div>
                    <div class="col-4">
                      <label for="occupation" class="form-label">Occupation</label>
                      <input type="text" class="form-control" id="edit_occupation" name="occupation" >
                    </div>
                </div>

                </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal" id="close"><i class="fa fa-close" id="closea"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="edit"  id="save"><i class="fa fa-save"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                            <h3 class="modal-title"><b>Deleting...</b></h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="residents_delete.php">
                <input type="hidden" class="id" name="id">
                <input type="hidden" class="edit_residentid" name="residentid">
                <input type="hidden" class="edit_firstname" name="firstname">
                <input type="hidden" class="edit_lastname" name="lastname">
                <input type="hidden" class="edit_middlename" name="middlename">
                <input type="hidden" class="edit_suf" name="suf">
                <input type="hidden" class="edit_password" name="password">
                <input type="hidden" class="edit_dob" name="dob">
                <input type="hidden" class="edit_pob" name="pob">
                <input type="hidden" class="edit_gender" name="gender">
                <input type="hidden" class="edit_cs" name="cs">
                <input type="hidden" class="edit_address" name="address">
                <input type="hidden" class="edit_puroknumber" name="puroknumber">
                <input type="hidden" class="edit_unt" name="unt">
                <input type="hidden" class="edit_user_type" name="user_type">
                <input type="hidden" class="edit_occupation" name="occupation">
                <input type="hidden" class="edit_religion" name="religion">
                <input type="hidden" class="edit_contno" name="contno">
                <input type="hidden" class="edit_email" name="email">
                <input type="hidden" class="edit_nationality" name="nationality">
                <input type="hidden" class="edit_photo" name="photo">
                <div class="text-center">
                    <p>DELETE RESIDENT</p>
                    <h2 class="bold fullname"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="fullname"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="voters_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>


     