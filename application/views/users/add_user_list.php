
<div class=".container">
  <main>
		<div class="container-fluid px-4">
			<h1 class="mt-4"><?php echo $heading ; ?></h1>
			<ol class="breadcrumb mb-4">
					<li class="breadcrumb-item active"><a href="<?php echo site_url('Maindashboard/index'); ?>" class="breadcrumb_anchor">Dashboard</a></li>
					<li class="breadcrumb-item active" ><a href="<?php echo site_url('User'); ?>" class="breadcrumb_anchor">Users</a></li>
					<li class="breadcrumb-item active">Add User </li>
			</ol>
			
			<div class="card mb-4">
				<div class="card-header">
						<i class="fas fa-user"></i>
						 <?php echo $sub_heading ;?>  <?php echo $this->session->flashdata('success_message'); ?>
				</div>
				<div class="card-body">
					<form method="post"  action="<?php echo site_url("User/addUserAction"); ?>" enctype="multipart/form-data" >

						<div class="form-group">
							<label for="fname" class="required">First Name </label><span class="error"><?php  echo form_error('first_name'); ?></span>
							<input type="text" 
							       class="form-control" 
								   id="fname"
								   placeholder="Enter First Name" 
								   name="first_name" 
								   value="<?php echo set_value('first_name');?>">
							
						</div>
						<div class="form-group">
							<label for="lname" class="required">Last Name </label><span class="error"><?php echo form_error('last_name'); ?></span>
							<input type="text" 
							       class="form-control" 
								   id="lname" 
								   placeholder="Enter Last Name" 
								   name="last_name" 
								   value="<?php echo set_value('last_name'); ?>">
						</div>
						<div class="form-group">
							<label for="email" class="required">Email </label><span class="error"><?php echo form_error('email'); ?></span>
							<input type="text" 
							       class="form-control" 
								   id="email" 
								   aria-describedby="emailHelp" 
								   placeholder="Enter Email" 
								   name="email" 
								   value="<?php echo set_value('email'); ?>" >
						</div>
						<div class="form-group purple-border">
								<label for="address">Address </label>
								<textarea class="form-control" 
								          id="address" 
										  rows="3" 
										  placeholder="Enter Your Address" 
										  name="address"
										  value=<?php echo set_value('address');?> >
										 
								</textarea>
						</div>
					
						<div class="row">
						        <div class="form-group col-4">
									<label for="inputState">State </label>
									<select id="inputState" class="custom-select my-1 mr-sm-2 form-control" name="state" >
										<option  value="0" selected >Select State</option>
										<?php if(!empty($states)){ foreach($states as $state) {?>
											<option value="<?php echo $state['id']; ?>"><?php echo $state['state_name']; ?></option>
											<?php }}?>
									</select>
								</div>
								<div class="form-group col-4">
									<label for="inputCity">City </label>
									<select id="inputCity" class="form-control" name="city">
										<option value="0" selected>Choose City</option>
										<option value="1">Mumbai</option>
										<option value="2">Delhi</option>
										<option value="3">Lucknow</option>
										<option value="4">Haryana</option>
										<option value="5">Gossaw</option>
										<option value="6">Palghar</option>
									</select>
								</div>
								
								<div class="form-group col-2">
									<label for="inputZip">Zip </label>
									<input type="text" class="form-control" id="inputZip" name="zip">
								</div>
						</div>
						<div class="row">
							<div class="form-group col-4 mt-2">
								<label for="gender" class="required">Gender: </label><span class="error"><?php echo form_error('gender'); ?></span>
								<label class="radio-inline form-check-inline"><input type="radio" class="form-check-input px-1" value="male" name="gender">Male</label>
								<label  class="radio-inline form-check-inline"><input type="radio" class="form-check-input px-1 ml-1" value="female" name="gender">Female</label>
								<label  class="radio-inline form-check-inline"><input type="radio" class="form-check-input px-1 ml-1" value="other" name="gender">Other</label>
							</div>
							<div class="form-group col-8 mt-2">
								<label for="hobbies">Hobbies: </label> 
								<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" id="val1" value="option1" name="hobbies">
										<label class="form-check-label" for="val1">Reading</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" id="val2" value="option2"  name="hobbies">
										<label class="form-check-label" for="val2">Singing</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" id="val3" value="option3"  name="hobbies">
										<label class="form-check-label" for="val3">Dance </label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" id="val4" value="option4"  name="hobbies">
										<label class="form-check-label" for="val4">Cricketer </label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" id="val5" value="option5"  name="hobbies" >
										<label class="form-check-label" for="val5">Doctor </label>
									</div>
							</div> 
						</div>
							
						<div class="form-group">
							<label for="img">Profile <?php echo form_error('user_profile'); ?></label>
							<input type="file" class="form-control" name="user_profile" >
							<small id="omg" class="form-text text-muted">Only .png, .jpg, .jpeg, .gif extension is allowed.</small>
						</div>
						<br>
						<button type="submit" class="btn btn-primary" name="add_userbtn">Save</button>
						<a href="<?php echo site_url("User/index"); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
					
					</form>
				</div>
			</div>
		</div>
  </main>
</div>
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
