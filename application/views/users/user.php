
<main>
	<div class="container-fluid px-4">
		<h1 class="mt-4">Update Profile</h1>
		<div class="float">
		<div>
				<!--  add button for change password-->
		   <a href="<?php echo site_url('User/changePassword'); ?>"><button type="button" class="btn btn-primary float-end" >Change password</button></a>
		</div>
		<div>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item active">Dashboard</li>
			<li class="breadcrumb-item active">Profile Setting</li>
		</ol>
		</div>
		</div>
	
		<div class="card mb-4">
			<div class="card-header">
				<i class="fas fa-user me-1"></i>
				Profile setting | <?php if(!empty($this->session->flashdata('success_message'))) {echo $this->session->flashdata('success_message');} ?>
			</div>
			<?php if(isset($error_message) && !empty($error_message)){
				echo $error_message;
			}?>
			<div class="card-body">
			<form method="post" action="<?php echo site_url("User/profileSettingAction"); ?>" enctype="multipart/form-data" >
               <?php
			    //    $firstName = ''; // if sed this do not sed isset fnction to check errror handling
				//    $lastName = '';
			        if(!empty($userData->name))  {
						$userName= explode(" ", $userData->name);
						//print_r($userName);exit;
						$firstName = $userName[0];
						$lastName = $userName[1];
					}
			    ?>
     
				<div class="row mb-3">
					<div class="col-md-4">
						<div class="form-floating mb-3 mb-md-0">
							<input  class="form-control" 
									id="inputFirstName" 
									type="text" 
									placeholder="Enter your first name" 
									name="fname"
									value="<?php if(isset($firstName)){echo $firstName;} ?>"
									/>
							<label for="inputFirstName">First name</label>
						</div>
						<span style="color:red;"><?php echo form_error('fname'); ?></span>

					</div>

					<div class="col-md-4">
						<div class="form-floating">
							<input  class="form-control" 
									id="inputLastName" 
									type="text" 
									placeholder="Enter your last name"
									name="lname"
									value= "<?php if(isset($lastName)){echo $lastName; } ?>" >
							<label for="inputLastName">Last name</label>
						</div>
						<span style="color:red;"><?php echo form_error('lname'); ?></span>
					</div>
					
				</div>
				<div class="row mb-3">
					<div class="col-md-4">
						<div class="form-floating mb-3 mb-md-0">
							<input  class="form-control" 
									id="email" 
									type="text" 
									placeholder="enter email"
									name="email" 
									value= "<?php if(!empty($userData->email)){ echo $userData->email; } ?>"/>
							<label for="email">email </label>
						</div>
						<span style="color:red;"><?php echo form_error('email'); ?></span>
					</div>
					
					
					<div class="col-md-4">
						<div class="form-floating mb-3 mb-md-0">
							<input class="form-control pl-4" 
							       id="image" 
								   type="file" 
								   placeholder="file upload"  
								   name="user_img" value="<?php if(!empty($userData->user_img)){ echo $userData->user_img; } ?>"/>
						        <small class="form-text text-muted">Only .png, .jpg, .jpeg, .gif file extension allowed.</small>
								</div>
						   <span style="color:red;"><?php echo form_error('user_img'); ?></span>
					</div>
				</div>
				<div class="col-md-4">
						<div class="form-floating mb-3 mb-md-0">
							<textarea class="form-control" 
							          id="address" 
									  row="7" 
									  placeholder="Enter address"
									  name="address"><?php if(!empty($userData->address)){ echo $userData->address; } ?></textarea>
							<label for="id">Address</label>
						</div>
				</div>
				
				<div class="mt-4 ml-3 mb-0">
					<button class="btn btn-primary" name="profilebtn">Submit</button>
				</div>
			</form>
			</div>
		</div>
		
	</div>
</main>
