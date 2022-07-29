<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <link href="<?php echo base_url(); ?>/assets/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3>
								      <?php if(isset($error_message) && !empty($error_message)){
										 echo $error_message;
									  }?>
								    </div>
                                    <div class="card-body">
                                        <form method="post" action="<?php echo site_url("Home/registrationAction"); ?>">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" 
														       id="inputFirstName" 
															   type="text" 
															   placeholder="Enter your first name" 
															   name="first_name" 
														       value="<?php echo set_value('first_name'); ?>"/>
                                                        <label for="inputFirstName">First name</label>
                                                    </div>
													<span style="color:red;"><?php echo form_error('first_name'); ?></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" 
														       id="inputLastName" 
															   type="text" 
															   placeholder="Enter your last name" 
															   name="last_name" 
															   value="<?php echo set_value('last_name'); ?>"/>
                                                        <label for="inputLastName">Last name</label>
                                                    </div>
													<span style="color:red;"><?php echo form_error('last_name');?></span>	
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" 
												       id="inputEmail" 
													   type="text" 
													   placeholder="name@example.com" 
													   name="email"
													   value="<?php echo set_value('email'); ?>" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
											<span style="color:red;"><?php echo form_error('email'); ?></span>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" 
														       id="inputPassword" 
															   type="password" 
															   placeholder="Create a password" 
															   name="password" 
															/>
                                                        <label for="inputPassword">Password</label>
                                                    </div>
													<span style="color:red;"><?php echo form_error('password'); ?></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirm password" name="confirm_password" />
                                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                                    </div>
													<span style="color:red;"><?php echo form_error('confirm_password'); ?></span>
                                                </div>  
                                            </div>
											
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary btn-block" type="submit" name="registerbtn">Create Account</button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="<?php echo site_url("Home"); ?>">Have an account? Go to login</a></div>
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
        <script src="<?php echo base_url();  ?>/assets/js/scripts.js"></script>
		
    </body>
</html>
