<main>
	<div class="container-fluid px-4">
		<h1 class="mt-4"><?php echo $heading ; ?></h1>
		<div class="float">
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item"><a href="<?php echo site_url('Maindashboard/index'); ?>" class="breadcrumb_anchor">Dashboard</a></li>
				<li class="breadcrumb-item active " >Users</li>
			</ol> 
		</div>
		
		<div class="card mb-4">
			<div class="card-header">
				<i class="fas fa-users me-1"></i>
				<?php echo $sub_heading ; ?> |<span style='color:green;'><?php if(!empty($this->session->flashdata('sccess_msg'))){ echo $this->session->flashdata('sccess_msg');} ?></span>
				<div class="float-end">
				<a id="openStateModal"><button type="button" class="btn btn-primary custBtn">Add States</button></a>
			</div>
			</div>
			
			<div class="card-body">
				<table id="userTableId">
					<thead>
						<tr>
							<th>Sr no.</th>
							<th>State</th>
							<th>status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr> 
							<th>Sr no.</th>
							<th>State</th>
							<th>status</th>
							
							<th>Action</th>
						</tr>
					</tfoot>
					<tbody>
						<?php
						$i = 1;
						foreach($stateData as $key =>$value){?> 

							<tr>
							<td><?php echo $i; ?></td>
							<td>
								<?php echo  $value['state_name'];?>
							</td>
							<td> 
								<?php 
								$stsClass='';
								if($value['status']=='active'){
								$stsClass ='btn-success';

								}else if($value['status']=='inactive'){
								$stsClass ="btn-danger";
								}
								echo '<a class="changeStateStatus" data-status="'.$value['status'].'"data-stateid="'.$value['id'].'">
								<button class="btn btn-xs status_btn statusBtn' .$value['id'].' '.$stsClass.'" >'.ucfirst($value['status']).'</button></a>';
								?>
							</td>
							
							<td>
							<a href="<?php echo site_url("User/edit/".base64_encode($value['id']) );?>"><button class="btn btn-primary btn-xs rounded-pill customBtn">Edit</button></a>
							<a class="deleteUser" data-user_id="<?php echo $value['id']; ?>"><button class="btn btn-danger btn-xs rounded-pill customBtn">Delete</button></a>
							</td>
						</tr>
						<?php $i++; } ?>
					
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- Add States-->

	<div class="modal" tabindex="-1" role="dialog" id="stateModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add State</h5>
					<button type="button" class="closeStateModal" data-dismiss="stateModal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="state">State Name<span class="error" id="state_error"></span></label>
						<input type="text" class="form-control" id="state_name" placeholder="Enter State Name" name="state_name" value="state">

					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" id="stateSave">Save</button>
					<button type="button" class="btn btn-secondary closeStateModal" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
    </div>
	<!--add state-->
</main>
