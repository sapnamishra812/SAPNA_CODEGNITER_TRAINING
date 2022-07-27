
<main>
	<div class="container-fluid px-4">
		<h1 class="mt-4">Change Password</h1>
		<ol class="breadcrumb mb-4">
			<a href="<?php echo site_url("Maindashboard"); ?>"> <li class="breadcrumb-item active">Dashboard</a></li>
			<a href="<?php echo site_url("User/profileSetting"); ?>"><li class="breadcrumb-item active"> Profile Setting</a></li>
		    <li class="breadcrumb-item active">Change Password</li>
		</ol>
		<span class="pull-right text-danger">You will be logged out once passsword get changed</span>
		<div class="card mb-4">
			<div class="card-header">
				<i class="fas fa-user me-1"></i>
				Change your password! <?php echo $this->session->flashdata('success_message'); ?>
				<?php echo $this->session->flashdata('error_message'); ?>
			</div>
			<div class="card-body">
			<form method="post" action="<?php echo site_url("User/changePasswordAction"); ?>" >
				<div class="row mb-3">
					<div class="col-md-6">
						<div class="form-floating mb-3 mb-md-0">
							<input  class="form-control" 
									id="currentPassword" 
									type="password" 
									placeholder="Your old password" 
									name="current_password"
									/>
							<label for="currentPassword">Current Password</label>
						</div>
						<span class="text-danger"><?php echo form_error('current_password'); ?></span>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-md-6">
						<div class="form-floating mb-3 mb-md-0">
							<input  class="form-control" 
									id="newPassword" 
									type="password" 
									placeholder="Enter your new password" 
									name="new_password"
									/>
							<label for="newPassword">New Password</label>
						</div>
						<span class="text-danger"><?php echo form_error('new_password'); ?></span>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-md-6 col-sm-12 col-lg-6">
						<div class="form-floating mb-3 mb-md-0">
							<input  class="form-control" 
									id="confirmPassword" 
									type="password" 
									placeholder="Enter your confirm  password" 
									name="confirm_password"
									/>
							<label for="confirmPassword">Confirm Password</label>
						</div>
						<span class="text-danger"><?php echo form_error('confirm_password'); ?></span>
					</div>
				</div>
				<div class="mt-4 ml-3 mb-0">
					<button class="btn btn-primary"type="submit" name="change_passwordbtn">Submit</button>
				</div>
			</form>
			</div>
		</div>
		
	</div>
</main>
