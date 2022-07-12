<?php

include_once 'include/crud.php';

?>

<?php
$crud =new crud();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


$name = $crud->format_data($_POST['name']);
$email = $crud->format_data($_POST['email']);
$number = $crud->format_data($_POST['number']);
$password = $crud->format_data($_POST['password']);



if ($name ==""|| $email == ""|| $number == ""|| $password == "") {

  $errorMsg= 'Error : Fill all field.';
  echo $errorMsg;
  
 
} else {

$insert_user = array();
$insert_user['name'] = $name;
$insert_user['email'] = $email;
$insert_user['number'] = $number;
$insert_user['password'] = $password;
      


$sql_insert = "INSERT INTO `" . TABLE_PREFIX . "registration` SET ";
foreach ($insert_user as $key => $value) {
    $sql_insert .= '`' . $key . '`="' . $crud->escape_string($value) . '",';
}
$sql_insert  = trim($sql_insert, ","); 
$last_id= $crud->fnInsert($sql_insert); 


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
                <h3 class="text-warning text-center">User Registration</h3>
                <form action="" method="post">

                
                    <div class="mb-3">
                        <label>UserName</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter your username" required>
                    </div>
                    
                    <div class="mb-3">
                        <label>UserEmail</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                    </div>
                    
                    <div class="mb-3">
                        <label>UserPhone</label>
                        <input type="number" name="number" class="form-control" placeholder="Enter your phone"required>
                    </div>
                
                    <div class="mb-3">
                        <label>UserPassword</label>
                        <input type="text" name="password" class="form-control" placeholder="Enter your pasword"required>
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-warning w-100 " name="submit">Register</button> 
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-info w-100"><a href="user-login.php" class="text-decoration-none text-white">Aready Acoount</a></button> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>