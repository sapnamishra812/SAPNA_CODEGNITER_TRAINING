
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
						 <?php echo $sub_heading ;?>
				</div>
				<div class="card-body">
					<form method="post"  action="<?php echo site_url("User/editUserAction/".base64_encode($userData->id)); ?>" enctype="multipart/form-data" >
                        
					<?php
						if(!empty($userData->name))  {
							$userName= explode(" ", $userData->name);
							//print_r($userName);exit;
							$firstName = $userName[0];
							$lastName = $userName[1];
						}
			        ?>
						<div class="form-group">
							<label for="fname" class="required">First Name </label><span class="error"><?php echo form_error('first_name'); ?></span>
							<input type="text" 
							       class="form-control" 
								   id="fname"
								   placeholder="Enter First Name" 
								   name="first_name" 
								   value="<?php if(isset($firstName)){echo $firstName; } ?>">
							
						</div>
						<div class="form-group">
							<label for="lname" class="required">Last Name </label><span class="error"><?php echo form_error('last_name'); ?></span>
							<input type="text" 
							       class="form-control" 
								   id="lname" 
								   placeholder="Enter Last Name" 
								   name="last_name" 
								   value="<?php if(isset($lastName)){echo  $lastName ;} ?>">
						</div>
						<div class="form-group">
							<label for="email" class="required">Email </label><span class="error"><?php echo form_error('email'); ?></span>
							<input type="text" 
							       class="form-control" 
								   id="email" 
								   aria-describedby="emailHelp" 
								   placeholder="Enter Email" 
								   name="email" 
								   value="<?php if(!empty($userData->email)){echo $userData->email;} ?>" >
						</div>
						<div class="form-group purple-border">
								<label for="address">Address </label>
								<textarea class="form-control" 
								          id="address" 
										  rows="3" 
										  placeholder="Enter Your Address" 
										  name="address"
										  > <?php  if(!empty($userData->address)){ echo $userData->address ;}?>
										 
								</textarea>
						</div>
					
						<div class="row">
						        <div class="form-group col-4">
									<label for="inputState">State </label>
									<select id="inputState" class="custom-select my-1 mr-sm-2 form-control" name="state" >
										<option  value="0" selected >Select State</option>
										<?php if(!empty($states)){foreach($states as $state){?>
											<option value="<?php echo $state['id'];?>" <?php if($userData->$state_id==$state['id']){
												echo 'selected';
											}?>><?php echo $state['state_name']; ?></option>
											<?php }}?>
									</select>
								</div>
								<div class="form-group col-4">
									<label for="inputCity">City </label>
									<select id="inputCity" class="form-control" name="city">
										<option value="0" selected>Select City</option>
										<?php if(!empty($cities)){foreach($cities as $city){ ?>
											<option value="<?php echo $city['id'];?>" <?php if($userData->$city_id==$city['id']){echo 'selected';}?>><?php echo $city['city_name']; ?></option>
											<?php }}?>
									</select>
								</div>
								
								<div class="form-group col-2">
								<label for="inputZip">Zip</label>
									<!-- <label for="inputZip">Zip</label><span class="error"><#?php echo form_error('zip'); ?></span> -->
									<input type="text" class="form-control" id="inputZip" name="zip"  value="<?php echo $userData->zip ;?>">
								</div>
						</div>
						<div class="row">
							<div class="form-group col-4 mt-2">
								<label for="gender" class="required">Gender: </label><span class="error"><?php echo form_error('gender'); ?></span>
								<label class="radio-inline form-check-inline"><input type="radio" 
								                                                     class="form-check-input px-1" 
																					 value="male" 
																					 name="gender"
																					 <?php if($userData->gender=='male'){echo 'checked';}?>>Male</label>
								<label  class="radio-inline form-check-inline"><input type="radio" 
								                                                      class="form-check-input px-1 ml-1" 
																					  value="female" 
																					  name="gender"
																					  <?php if($userData->gender=='female'){echo 'checked';}?>>Female</label>
								<label  class="radio-inline form-check-inline"><input type="radio" 
								                                                      class="form-check-input px-1 ml-1" 
																					  value="other" 
																					  name="gender"
																					  <?php if($userData->gender=='other'){echo 'checked';}?>>Other</label>
							</div>
							<div class="form-group col-8 mt-2">
								<label for="hobbies">Hobbies: </label> 
								<?php 
								      if(!empty($userData->hobbies))  {
										$hobbies= explode(",", $userData->hobbies);
										//print_r($hobbies);exit;
										// $fst=$hobbies[0];
										// //print_r($fst);exit;
										// $sec=$hobbies[1];
										// $thd=$hobbies[2];
										// $fth=$hobbies[3];
										// $fty = $hobbies[4];
									}
								 ?>
								<div class="form-check form-check-inline">
										<input class="form-check-input" 
										       type="checkbox" 
											   id="val1" 
											   value="reading" 
											   name="hobbies[]"
											   <?php if(is_array($hobbies[0])){if(in_array('reading',$hobbies[0])){echo 'checked';}}?>>
										<label class="form-check-label" for="val1">Reading</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" 
										       type="checkbox" 
											   id="val2" 
											   value="singing"  
											   name="hobbies[]" 
											   <?php if(is_array($hobbies[1])){if(in_array('singing', $hobbies[1])){echo 'checked';}}?>> 
										<label class="form-check-label" for="val2">Singing</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" 
										       type="checkbox" 
											   id="val3" 
											   value="dance"  
											   name="hobbies[]"
											 <?php if(is_array($hobbies[2])){if(in_array('dance',$hobbies[2])){echo 'checked';}}?>> 
										
										<label class="form-check-label" for="val3">Dance </label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input"
										       type="checkbox" 
											   id="val4" 
											   value="cricketer" 
											   name="hobbies[]"
											   <?php if(is_array($hobbies[3])){if(in_array('cricketer',$hobbies[3])){echo 'checked';}}?>>
										<label class="form-check-label" for="val4">Cricketer </label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" 
										       type="checkbox" 
											   id="val5" 
											   value="doctor"  
											   name="hobbies[]" 
											   <?php if(is_array($hobbies[4])){if(in_array('doctor', $hobbies[4])){echo 'checked';}}?>>
										<label class="form-check-label" for="val5">Doctor </label>
									</div>
							</div> 
						</div>
							
						<div class="form-group">
							<label for="img">Profile</label> <span class='error'><?php echo $this->session->flashdata('file_error'); ?></span>
							<input type="file" class="form-control" name="user_profile"  value="<?php if(!empty($userData->user_img)){ echo $userData->user_img; } ?>" >
							<small id="img" class="form-text text-muted">Only .png, .jpg, .jpeg, .gif extension is allowed.</small>
							<img src="<?php echo base_url(); ?>/assets/uploads/users/<?php if(!empty($userData->user_img)){echo $userData->user_img;} else{ echo "default.png";} ?>" height="50px" width="50px" alt="User Profile">

						</div>
						<br>
						<button type="submit" class="btn btn-primary" name="edit_userbtn">Update</button>
						<a href="<?php echo site_url("User/index"); ?>" ><button type="button" class="btn btn-danger">Cancel</button></a>
					
					</form>
				</div>
			</div>
		</div>
    </main>
</div>
