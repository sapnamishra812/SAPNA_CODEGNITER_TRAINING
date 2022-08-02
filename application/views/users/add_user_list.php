
<div class=".container">
    <h2 class="d-flex justify-content-center">Add UserList Form </h2>



    <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Add UserList Form</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Profile Settings</li>
                        </ol>
    
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-user"></i>
                              Add Users List    
                            </div>
                            <div class="card-body">
                            <form method="post"  action="<?php echo site_url("Users"); ?>" enctype="multipart/form-data" >
                
                              <div class="form-group">
                                <label for="exampleInputEmail1">First Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter First Name" name="first_name" value="<?php if(isset($firstName)){ echo $firstName; } ?>">
                               <!--  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Last Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Last Name" name="last_name" value="<?php if(isset($lastName)){ echo $lastName; } ?>">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Email <?php echo  form_error("email"); ?></label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" name="email" value="<?php if(!empty($userData->email)){ echo $userData->email; } ?>">
                              </div>
                              <div class="form-group purple-border">
                                  <label for="exampleFormControlTextarea4">Address</label>
                                  <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="Enter Your Address" name="address"><?php if(!empty($userData->address)){ echo $userData->address; } ?></textarea>
                              </div>
                            
                              <div class="row">
                                  <div class="form-group col-4">
                                    <label for="inputCity">City</label>
                                    <select id="inputCity" class="form-control">
                                      <option selected>Choose City</option>
                                      <option>Mumbai</option>
                                      <option>Delhi</option>
                                      <option>Lucknow</option>
                                      <option>Haryana</option>
                                      <option>Gossaw</option>
                                      <option>Palghar</option>
                                    </select>
                                  </div>
                                  <div class="form-group col-4">
                                    <label for="inputState">State</label>
                                    <select id="inputState" class="custom-select my-1 mr-sm-2 form-control" >
                                      <option selected>Choose State</option>
                                      <option value="1">Maharastra</option>
                                      <option  value="2">Panjab</option>
                                      <option  value="3">Gujrat</option>
                                      <option  value="4">Goa</option>
                                      <option  value="5">Guwathi</option>
                                      <option  value="6">UP</option>
                                    </select>
                                  </div>
                                  <div class="form-group col-2">
                                    <label for="inputZip">Zip</label>
                                    <input type="text" class="form-control" id="inputZip">
                                  </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-4 mt-2">
                                  <label for="gender">Gender:</label>
                                  <label class="radio-inline form-check-inline"><input type="radio" class="form-check-input px-1" value="male" name="gender">Male</label>
                                  <label  class="radio-inline form-check-inline"><input type="radio" class="form-check-input px-1 ml-1" value="female" name="gender">Female</label>
                                  <label  class="radio-inline form-check-inline"><input type="radio" class="form-check-input px-1 ml-1" value="other" name="gender">Other</label>
                                </div>
                                <div class="form-group col-8 mt-2">
                                  <label for="hobbies">Hobbies:</label>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" id="val1" value="option1">
                                      <label class="form-check-label" for="val1">Reading</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" id="val2" value="option2">
                                      <label class="form-check-label" for="val2">Singing</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" id="val3" value="option3" >
                                      <label class="form-check-label" for="val3">Dance </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" id="val4" value="option3" >
                                      <label class="form-check-label" for="val4">Cricketer </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" id="val5" value="option3" >
                                      <label class="form-check-label" for="val5">Doctor </label>
                                    </div>
                                </div> 
                              </div>
                               

                              <div class="form-group">
                                <label for="exampleInputPassword1">Profile</label>
                                <input type="file" class="form-control" name="user_profile" value="<?php if(!empty($userData->image)){ echo $userData->image; } ?>">
                               <small id="emailHelp" class="form-text text-muted">Only .png, .jpg, .jpeg, .gif extension is allowed.</small>
                              </div>
                              <br>
                              <button type="submit" class="btn btn-primary" name="profile_setting">Save</button>
                            <a href="<?php echo site_url("User/index"); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
                           
                            </form>
                            </div>
                        </div>
                    </div>
                </main>
<!-- <form>
  <div class="row mx-1 mt-2">
    <div class="form-group col-4 ">
      <input type="text" class="form-control" placeholder="First name">
    </div>
    <div class="col-4">
      <input type="text" class="form-control" placeholder="Last name">
    </div>
  </div>
  <div class="row mx-1 mt-2">
    <div class="form-group col-5 ">
      
      <textarea class="form-control" id="Address" rows="1" placeholder="Address"></textarea>
    </div>
    <div class=" form-group col-3">
      <input type="text" class="form-control" placeholder="Phone number ">
    </div>
  </div>

  <div class="row mx-1 mt-2">
    <div class="form-group col-sm-4 col-md-3 col-3">
            
      <input type="text" class="form-control" id="inputCity" placeholder="City">
    </div>
    <div class="form-group col-sm-4 col-md-3 col-3">
      <select id="test" class="form-control">
        <option selected>Choose Hobbies</option>
        <option>Game Develop</option>
        <option>Singing</option>
        <option>Doctor</option>
        <option>Writer</option>
        <option>Lawer</option>
        <option>Reading</option>
         
      </select>
    </div>
    <div class="form-group col-sm-4 col-md-2 col-3">
      <input type="text" class="form-control" id="inputZip" placeholder="Zip">
    </div>
  </div>

  <div class=" row form-group">
      <div class=" col-7 mt-3 ml-2">
        <label class="radio-inline form-check-inline"><input type="radio" class="form-check-input pl-1" value="male" name="gender">Male</label>
        <label  class="radio-inline form-check-inline"><input type="radio" class="form-check-input" value="female" name="gender">Female</label>
        <label  class="radio-inline form-check-inline"><input type="radio" class="form-check-input" value="other" name="gender">Other</label>
      </div>
  </div>
  <div class="row">
    <div class=" ">
     <a><button class="btn btn-primary mx-3">Save</button></a>
     <a><button class="btn btn-primary mx-3">Cancel</button></a>
    </div>
  </div>
</form> -->

</div>