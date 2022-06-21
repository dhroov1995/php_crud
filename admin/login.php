<?php
include_once("../include/Crud.php");
$crud = new Crud();

$message="";
 

if($_SERVER['REQUEST_METHOD']=='POST')
{ 
 
	$query= "SELECT * FROM ".TABLE_PREFIX."adminmaster where (vchEmail = '".trim($_POST['vchUsername'])."' OR vchUserName = '".trim($_POST['vchUsername'])."' ) and vchPassword = '".md5($_POST['vchPassword'])."' ";
  
/*
echo"<pre>";
  print_r($query);
  echo"</pre>";
 */ 

	$res=$crud->getData($query);
	
	if($_POST['vchUsername']=="" || $_POST['vchPassword']==""){
		
		$message="Username or password can not be blank.";
	
	}else if(count($res)>0)
	{ 

		$row=$res[0];	
		if($row['enumStatus']=='D')
		{
			$message="Your account is deactivated by admin.Please contact admin for details.";
		}
		else
		{ 
			
		$_SESSION['adminlogged_in']='true';
		$_SESSION['intAdminID']=$row['intAdminID'];
		$_SESSION['vchUserName']=$row['vchUserName'];
		$_SESSION['vchName']=$row['vchName'];
		$_SESSION['user_type']=$row['user_type'];
    

		
    

		
		header("Location: index.php");
		exit;
		}
	}
	else{
		$message="Either username or password is incorrect. Please check.";
	} 
	
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?php echo SITE_TITLE; ?> - Admin login</title>

    <!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/css/adminlte.min.css">
  <link rel="stylesheet" href="assets/css/custom-style.css">
  
</head>
<body class="hold-transition login-page">



<div class="login-box">
  <div class="login-logo" style="padding-bottom:5px;">
    
    <h4>
		<?php echo SITE_TITLE; ?> <br> Login
	</h4>

  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body py-4">
      
	  
		<h5 class="text-center">
		<?php
		if(!empty($message))
		echo "<span class='error'><strong>".$message."</strong></span>";
		?>
		</h5>

      <form name="frmLogin" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Email/Username" name="vchUsername" value="<?php if(isset($_REQUEST['vchUsername'])){ echo $_REQUEST['vchUsername']; } ?>" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="vchPassword">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
         
          <div class="col-12">
           <button type="submit" class="btn btn-clr btn-block mt-3 sbmt-btn btn-success"    >Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     
    

    </div>
  </div>
</div>




</body>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/adminlte.js"></script>
<script >
/*   $('.btn').on('click', function(event) {
    event.preventDefault(); 
    var url = $(this).data('target');
    location.replace(url);
}); */
</script>

</html>
