<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><?php echo  $heading ; ?></h1>
                        <div class="float">
                            <div class="float-end">
                               <a href="<?php echo site_url("User/addUserList"); ?>"><button class="btn btn-primary">Add Users</button></a>
                            </div>
                            <div>
                                <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url('Maindashboard/index'); ?>">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Users</li>
                                </ol>
                            </div>  
                        </div>
                        
                    
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-users me-1"></i>
                                <?php echo  $sub_heading ; ?>
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
											   <button class="btn btn-xs statusBtn'.$value['id'].' '.$stsClass.'" >'.
											   ucfirst($value['status']).'</button></a>';
                                                ?>
                                            </td>

                                            <td>
                                            <?php echo $value['address'];
                                                //  $length = strlen($value['address']);
                                                //  if($length>100){
                                                //  $text= str_repeat('.. ', 100-$length);
                                                //  str_repeat('<br>...', 5);
                                                //  }
                                                //  else{
                                                //  $text = substr($value['address'], 0, 50);
                                                //  }
                                                //  echo $text; // will print the text max and min to 100
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
