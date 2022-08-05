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
                                <?php echo $sub_heading ; ?>
								<div class="float-end">
                               <a href="<?php echo site_url("User/addUser"); ?>"><button class="btn btn-primary">Add Users</button></a>
                            </div>
                            </div>
							
                            <div class="card-body">
                                <table id="userTableId">
                                    <thead>
                                        <tr>
                                            <th>Sr no.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>status</th>
                                            <th>Address</th>
                                            <th>Profile</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr> 
                                            <th>Sr no.</th>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $i =1;
                                        foreach($userData as $key =>$value){?> 

                                            <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $value['name']; ?></td>
                                            <td><?php echo $value['email']; ?></td>
                                            <td> 
                                              <?php 
                                               $stsClass='';
                                               if($value['status']=='active'){
                                                $stsClass ='btn-success';

                                               }elseif($value['status']=='inactive'){
                                                $stsClass ="btn-danger";
                                               }
                                               echo '<a class="changeUserStatus" data-status="'.$value['status'].'"data-userid="'.$value['id'].'">
											   <button class="btn btn-xs status_btn  statusBtn'.$value['id'].' '.$stsClass.'" >'.ucfirst($value['status']).'</button></a>';
                                                ?>
                                            </td>

                                            <td>
                                            <?php 
                                                 $newAddress = strlen($value['address'])>30 ? substr($value['address'],0,30)."..." : $value['address'] ;
												 echo $newAddress;
                                                ?> 
                                             </td>
                                            <td>
                                               <img src="<?php  echo base_url().'/assets/uploads/users/'.$value['user_img'];?>" alt="User Profile" height="70px" width="60px">
                                             </td>
                                            <td><a href="<?php echo site_url("Users/edit");?>"><button class="btn btn-primary btn-xs rounded-pill customBtn">Edit</button></a>
                                            <a href="<?php echo site_url("Users/delete");?>"><button class="btn btn-danger btn-xs rounded-pill customBtn">Delete</button></a></td>
                                           
                                        </tr>

                                        <?php $i++; } ?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
