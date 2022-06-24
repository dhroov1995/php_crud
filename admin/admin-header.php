<?php
$ADMIN_URL='';
include("../include/Crud.php"); 

if($_SESSION['adminlogged_in']=='true' && $_SESSION['intAdminID']!='')
{
	$_SESSION['intAdminID']= $_SESSION['intAdminID'];
}
else
{
	header("location:login.php");
	exit;
}

 


$crud = new Crud();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge"> 
	<title><?php echo $title; ?></title>

	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/all.min.css">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="assets/css/adminlte.min.css">
	
	<style>
	.response-msg {
		clear: both;
		text-align: center;
	}
	.error{
		color:#f00;
	}
	.ajaximg{
		
	}
	.ajaximg img{
		max-width: 112px;
	}
	
	.bg-custom-warning {
		background: #0E4CA2 !important;
	}
	
	
/*pagination*/

ul.pagination {
    margin: 2px 0;
    white-space: nowrap;
}
.pagination {
    display: inline-block;
    padding-left: 0;
    margin: 20px 0;
    /* border-radius: 4px; */
}
.pagination>li {
    display: inline;
}

.pagination>li:first-child>a, .pagination>li:first-child>span {
    margin-left: 0;
    /* border-top-left-radius: 4px;
    border-bottom-left-radius: 4px; */
}

.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
    z-index: 3;
    color: #fff;
    cursor: default;
    background-color: #0E4CA2;
    border-color: #0E4CA2;
}
.pagination>li>a {
    background: #fafafa;
    color: #666;
}
.pagination>li>a, .pagination>li>span {
    /* position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: #0E4CA2;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd; 
	*/
	position: relative;
    float: left;
    padding: 6px 14px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: #0E4CA2;
    text-decoration: none;
    background-color: #fff;
    /* border-radius: 50%; */
    font-size: 22px;
    font-weight: bold;
	
}

/*pagination*/
	</style>
	
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper"> 
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
   
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <h2 class="tchnicl-text"><?php echo SITE_TITLE; ?></h2>
    
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-users"></i>  <i class="fas fa-angle-down"></i> 
        </a>
        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
          <a href="logout.php" class="dropdown-item">
           Logout
          </a>
        
        </div>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->
  
  
  
  
  
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar  elevation-4">
    <div class="sidebar">
	
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="index.php" class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=='index.php'){ echo 'active'; } ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>           
          </li>
	
	
		<li class="nav-item">
			<a href="change-password.php" class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=='change-password.php'){ echo 'active'; } ?>">
			  <i class="nav-icon fas fa-key"></i>
			  <p>
				Change Password
			  </p>
			</a>
		  </li>
      
      <li class="nav-item">
			<a href="Manage-product.php" class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=='Manage-product.php'){ echo 'active'; } ?>">
			  <i class="nav-icon fa fa-users"></i>
			  <p>
				Manage Product
			  </p>
			</a>           
		  </li>

      <li class="nav-item">
			<a href="view-category.php" class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=='category.php'){ echo 'active'; } ?>">
			  <i class="nav-icon fa fa-eye"></i>
			  <p> 
				Categories
			  </p>
			</a>           
		  </li>

         
      </ul>
      </nav>
    </div>
    
  </aside>
