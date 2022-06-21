<?php
$title="Change Password";
$description="";
$keywords="";
 
$cls='alert-danger';


require("admin-header.php");

if(isset($_POST['submitPwd']))
{
	 
	
	$result=$crud->getData("SELECT *  FROM ".TABLE_PREFIX."adminmaster where intAdminID=".$_SESSION['intAdminID']." and vchPassword='".md5($_POST['vchCurPassword'])."' " );
	 
	
	
	if($result[0])
	{
		$sql="update ".TABLE_PREFIX."adminmaster set vchPassword='".md5($_POST['vchNewPassword'])."' where intAdminID=".$_SESSION['intAdminID'];

		$resupdate=$crud->execute($sql);
		
		
		if($resupdate)
		{	
			 
			 /* header('location:logout.php?msg=1');  */
			 echo "<script type='text/javascript'>location.href='logout.php?msg=1'</script>";
			exit();
		}
		else
		{
			$msg="Password is not changed.<br> You may be using same password again."; 
		}
	}
	else
	$msg="The current password you have entered is wrong. Please check.";
}
?> 

<div class="content-wrapper"> 
<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1 class="m-0 text-dark">Change Password</h1>
	  </div>
	</div>
  </div>
</div>

<div class="content rgst-dv">
  <div class="container-fluid">
	<div class="row">
	  <div class="col-lg-6 offset-lg-1 col-sm-10 offset-sm-1  col-md-8 offset-md-2">
	   <div class="card card-primary form-tickets">

<?php 
/**********************************/
/**********************************/
/**********************************/	
?>	
<form name="frmChange" method="post" action="<?php echo $PHP_SELF?>"  id="form-validation">
	<div class="col-md-12">
		
		<?php
		if(!empty($msg))
		{
		?>
		<div class="alert <?php echo $cls; ?> error" role="alert">
		<?php echo $msg ?>
		</div>
		<?php } ?>
	
        <div class="panel panel-white">
            <div class="panel-heading clearfix">
                 
            </div>
            <div class="panel-body">
                
                    <div class="form-group">
                        <label for="exampleInputEmail1">Current Password</label>
                        <input type="password" name="vchCurPassword" id="vchCurPassword" class="form-control m-t-xxs"> 
                    </div>
					
                    <div class="form-group">
                        <label for="exampleInputEmail1">New Password</label>
                        <input type="password" name="vchNewPassword" id="vchNewPassword" class="form-control m-t-xxs"> 
                    </div>
					
                    <div class="form-group">
                        <label for="exampleInputEmail1">Re-type New Password</label>
                        <input type="password" name="vchConfirmPassword" id="vchConfirmPassword" class="form-control m-t-xxs"> 
                    </div>
					<input type="submit" name="submitPwd" class="btn btn-primary m-t-xs m-b-xs">
                 
            </div>
        </div>
    </div>					 
</form>									
<?php 
	/**********************************/
	/**********************************/
	/**********************************/	
?>		


 </div> 
          </div>
        </div> 
      </div> 
    </div> 
  </div>


<?php require("admin-footer.php");  ?>



<script>
/****************ValidateEmail*********************/

	jQuery('document').ready(function() { 
	
		 
		 
		jQuery("#form-validation").validate({
		
		
			rules: { 
				vchCurPassword: "required",
				vchNewPassword: {
					required: true,
					minlength: 6
				},
				vchConfirmPassword: {
					required: true,
					minlength: 6,
					equalTo: "#vchNewPassword"
				},

				  
			},
			messages: { 
				vchCurPassword: "Please enter your current password",
				vchNewPassword: {
					required: "Please provide a password",
					minlength: "Your password must be at least 6 characters long"
				},
				vchConfirmPassword: {
					required: "Please provide a password",
					minlength: "Your password must be at least 6 characters long",
					equalTo: "Please enter the same password as above"
				},

				 
			}
		});

		 
	 
	});



/****************ValidateEmail*********************/
</script>