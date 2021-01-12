<?php
error_reporting(0);
require 'header.php'; $page = "List-Lyrics";

if($_GET['a-id'])
{
	$get_iddd = $_GET['a-id'];
	
	$sselect = "select * from lyrics where id='$get_iddd'";
	$drun = mysqli_query($connect,$sselect);
	$dfetch = mysqli_fetch_array($drun);
	$dname = $dfetch['1'];
	
	$path = "Lyrical/$dname/";
	
	rmdir($path);
	
	$delte = "DELETE FROM lyrics WHERE id='$get_iddd'";
	$run_delete = mysqli_query($connect,$delte);
	
	if($run_delete)
	{
		echo "<script> document.location.href='List-Lyrics.php';</script>";
	}else{
		
		echo "<div class='alert text-white bg-primary' role='alert'>
                              <div class='iq-alert-icon'>
                                 <i class='ri-alert-line'></i>
                              </div>
                              <div class='iq-alert-text'>Lyrical Person Not <b>Delete</b> Something Wrong!</div>
                           </div>";
	
}
}

 if($_GET['Art-id'])
{
	
	
	$get_id = $_GET['Art-id'];
	$select = "select * from lyrics where id='$get_id'";
	$run = mysqli_query($connect,$select);
	$fetch = mysqli_fetch_array($run);
	$nname = $fetch['1'];
	$bbio = $fetch['2'];
	$imagee = $fetch['3'];
	
	
?>


  <div class="col-sm-12 col-lg-12">
                     <div class="iq-card">
						 <?php Update_Lyrical(); ?>
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Update Artist</h4>
                           </div>
							<div class="iq-card-header-toolbar d-flex align-items-center">
                           <a href="List-Lyrics.php" class="btn btn-primary">List Lyrical Person</a>
                        </div>
                        </div>
                        <div class="iq-card-body">
                           
                           <form class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
                              <div class="form-row">
                                 <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Full Name</label>
                                    <input type="text" value="<?php echo $nname ?>" class="form-control" name="artname" id="validationCustom01"  required>
                                    <div class="valid-feedback">
                                       Looks good!
                                    </div>
                                 </div>

                                 <div class="col-md-12 mb-3">
                                    <label for="validationCustom01">Bio</label>
                           <textarea class="form-control" name="artbio" id="validationCustom01" rows="4"><?php echo $bbio ?></textarea>
                                    
                                    <div class="valid-feedback">
                                       Looks good!
                                    </div>
                                 </div>

                               
                              </div>
                             
                              <button class="btn btn-primary" name="btnup" type="submit">Update Person</button>
                           </form>
                        </div>
                     </div>
					  
					  
                    
                  </div>



<?php }else if($_GET['img-id']) { 

$get_id = $_GET['img-id'];
	$select = "select * from lyrics where id='$get_id'";
	$run = mysqli_query($connect,$select);
	$fetch = mysqli_fetch_array($run);
	$pname = $fetch['1'];
	$pimg = $fetch['3'];


?>

<div class="col-sm-12 col-lg-12">
                     <div class="iq-card">
						 <?php Update_Lyrical_image(); ?>
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Update Lyrical Person Image</h4>
                           </div>
							<div class="iq-card-header-toolbar d-flex align-items-center">
                           <a href="List-Lyrics.php" class="btn btn-primary">List Lyrical Person</a>
                        </div>
                        </div>
                        <div class="iq-card-body">
                           
                           <form class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
                              <div class="form-row">
                                 <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Full Name</label>
                                    <input type="text" value="<?php echo $pname ?>" class="form-control" name="artname" id="validationCustom01"  required>
                                    <div class="valid-feedback">
                                       Looks good!
                                    </div>
                                 </div>
								  
								   
								  <div class="col-md-6 mb-3">
									 
                                    <img <?php echo "src='Lyrical/$pname/$pimg'"; ?> style="height: 150px; width: 200px;" class='img-fluid avatar-50  rounded' alt='author-profile'>
                                 </div>

                               

                               
								 
                                 <div class="col-md-6 mb-3">
                                    <label for="validationCustom05">Choose Image</label>
							<div class="custom-file">
                                 <input type="file" name="artpic"  class="custom-file-input" id="customFile validationCustom05"  required>
                                 <label class="custom-file-label" for="customFile">Choose file</label>
								<div class="invalid-feedback">
                                       Please provide a valid zip.
                                    </div>
                              </div>
                                   
                                    
                                 </div>
                              </div>
                             
                              <button class="btn btn-primary" name="imgup" type="submit">Update Person</button>
                           </form>
                        </div>
                     </div>
					  
					  
                    
                  </div>


<?php }else { ?>

         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Lyrical Person Lists</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                           <a href="Add-Lyrics.php" class="btn btn-primary">Add New Lyrical person</a>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive">
                           <table class="data-tables table table-striped table-bordered" style="width:100%">
                              <thead>
                                 <tr>
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 5%;">Profile</th>
                                    <th style="width: 15%;">Artist Name</th>
                                   
                                    <th style="width: 100%;">Bio/Description</th>
                                    <th style="width: 10%;">Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                               <?php list_Lyrical(); ?>
								  
								 
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>






<?php
			 
			}
			
require 'footer.php';
?>