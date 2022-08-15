
    <main>
		<div class="container-fluid px-4">
			<h1 class="mt-4"><?php echo $heading ; ?></h1>
			<ol class="breadcrumb mb-4">
					<li class="breadcrumb-item active"><a href="<?php echo site_url('Maindashboard/index'); ?>" class="breadcrumb_anchor">Dashboard</a></li>
					<li class="breadcrumb-item active" ><a href="<?php echo site_url('User'); ?>" class="breadcrumb_anchor">Users</a></li>
					<li class="breadcrumb-item active">View User </li>
			</ol>
			
			<div class="card mb-4">
				<div class="card-header">
						<i class="fas fa-user"></i>
						 <?php echo $sub_heading ;?> 
						 <div class="float-end">
                            <a href="<?php echo site_url("User/index"); ?>"><button class="btn btn-primary">Back To User List </button></a>
                        </div>
				</div>
				<div class="card-body">
               <?php 
			      $userName = explode(" ",$userData->name) ;
				 // print_r($userName);exit; // o/p->Array ( [0] => jigasa [1] => pathak )
			    $first_name =$userName[0];
				$last_name= $userName[1];
				//print_r( $firstName);exit; 

				
				?>
                    <div class="row">
                        <div class="col">
						<label>First Name:</label>
                        <input type="text" class="form-control" placeholder="First name" value="<?php echo ucfirst($first_name); ?>">
                        </div>
                        <div class="col">
						<label>Last Name:</label>
                        <input type="text" class="form-control" placeholder="Last name" value="<?php echo ucfirst($last_name); ?>" >
                        </div>
                    </div>

					<div class="row">
                        <div class="col">
							<label>Email:</label>
                        <input type="text" class="form-control"  value="<?php echo $userData->email; ?>">
                        </div>
                        <div class="col">
						<label>address:</label>
                        <textarea row="2" class="form-control" ><?php echo $userData->address; ?></textarea>
                        </div>
                    </div>
					<div class="row">
                        <div class="col">
							<label>state:</label>
                          <input type="text" class="form-control"  value="<?php echo $userData->state_name; ?>">
                        </div>
                        <div class="col">
							<label>city:</label>
							<input type="text" class="form-control"  value="<?php echo $userData->city_name; ?>">
                        </div>
                    </div>

					<div class="row">
                        <div class="col-4">
							<label>zip:</label>
                          <input type="text" class="form-control"  value="<?php echo $userData->zip; ?>">
                        </div>
                        

						<div class="col-2 mt-3 ">
							<label class="mt-3">status:</label>
                          
						  <?php 
							$stsClass='';
							if($userData->status=='active'){
								$stsClass ='btn-success';

							}else if($userData->status=='inactive'){
								$stsClass ="btn-danger";
							}
							echo '<button class="btn btn-lg status_btn '.$stsClass.'" >'.ucfirst($userData->status).'</button>';
                            ?>
						</div>

						<div class="col-3 mt-2">
							<label class="mt-3">image:</label>
							<img  class="rounded-circle" src="<?php echo base_url(); ?>/assets/uploads/users/<?php if(!empty($userData->user_img)){echo $userData->user_img;} else{ echo "default.png";} ?>" height="60px" width="60px" alt="User Profile">
		                </div>
                    </div>
                
				</div>
			</div>
		</div>
    </main>

