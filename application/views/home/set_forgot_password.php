<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Password Reset - SB Admin</title>
        <link href="<?php echo base_url(); ?>/assets/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Forgot Password</h3>
									<?php echo $this->session->flashdata('success_message'); ?>
				                           <?php echo $this->session->flashdata('error_message'); ?>
								    </div>
                                    <div class="card-body">
                                        <!-- <div class="small mb-3 text-muted">Enter your email address and we will send you a link to reset your password.</div> -->
                                        <form method="post" action="<?php echo site_url("Home/setForgotToNewPasswordAction/".$userId); ?>">
											<div class="row mb-3">
												<div class="col-md-12">
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
												<div class="col-md-12 ">
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
											<button class="btn btn-primary"type="submit" name="set_new_passwordbtn">Submit</button>
										</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>/assets/js/scripts.js"></script>
    </body>
</html>
