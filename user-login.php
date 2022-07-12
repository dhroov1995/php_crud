<?php
include_once 'include/crud.php';

?>
<?php
$crud =new crud();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


$name = $crud->format_data($_POST['name']);
$password = $crud->format_data($_POST['password']);



if ($name ==""|| $password == "") {

  $errorMsg= 'Error : Fill all field.';
  echo $errorMsg;
  
}


      
$sql_insert =  "SELECT * FROM `tbl_registration` WHERE name ='$name' OR email='$name' AND password = '$password' ";
session_start();
$result = $crud->getData($sql_insert);

if($result)
{
    $_SESSION['user'] =$name;   
    echo"<script>
    alert('successfully logIn');
    window.location.href='category.php';
    </script>";
}else{
    echo"username and password not correct";
}
}

?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 border border-info m-auto mt-5">
                <h3 class="text-warning text-center">User Login</h3>
                <form action="" method="post">
                   
                    
                    <div class="mb-3">
                        <label>UserEmail</label>
                        <input type="email" name="name" class="form-control" placeholder="Enter your email" required>
                    </div>
                    
                
                    <div class="mb-3">
                        <label>UserPassword</label>
                        <input type="text" name="password" class="form-control" placeholder="Enter your pasword" required>
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-success w-100">Login</button> 
                    </div>

                    <div class="mb-3">
                        
                        <button class="btn btn-warning w-100 text " name="submit" ><a href="user-registration.php"class="text-decoration-none text-white"> Register</a></button>

                    </div>

                    
                </form>
            </div>
        </div>
    </div>
</body>
</html>