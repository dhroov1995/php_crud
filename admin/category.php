<?php require("admin-header.php");
include_once 'DbConfig.php';

?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$filename = $crud->format_data( $_FILES['category_image']['name']);
    $tempname= $crud->format_data($_FILES['category_image']['tmp_name']);
    $folder="images/".$filename;
    move_uploaded_file($tempname,$folder);
$category_name = $crud->format_data($_POST['category_name']);




if ($category_name == '') {

  $errorMsg = 'Error : Fill all field.';
  
  
} else {

$insert_product = array();
$insert_product['category_image'] = $folder;
$insert_product['category_name'] = $category_name;
      


$sql_insert = "INSERT INTO `" . TABLE_PREFIX . "category` SET ";
foreach ($insert_product as $key => $value) {
    $sql_insert .= '`' . $key . '`="' . $crud->escape_string($value) . '",';
}
$sql_insert  = trim($sql_insert, ","); 
$last_id= $crud->fnInsert($sql_insert); 
header('location:category.php');


}
}

/*
  echo"<pre>";
print_r($category_image);
echo"</pre>";
die(); 																						
*/

?>
<div class="content-wrapper">



<!-- Main content -->
<section class="content nw-list">
    <div class="row d-flex align-items-stretch">
        <div class="col-lg-12">


            <div class="container mt-5">
                <h1> Add category </h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3 col-md-6">
                        <label for="exampleInputEmail1" class="form-label">Category Image</label>
                        <input type="file" name="category_image" class="form-control" value="<?php if (isset($_FILES['category_image'])) {
                                                                                      echo $_last_id['category_image'];
                                                                                    } ?>" class="inputs-prgnis required"> 

                    </div>
                   
                   <div class="mb-3 col-md-6">
                        <label for="exampleInputPassword1" class="form-label">Category name</label>
                        <input type="text" name="category_name" class="form-control" value="<?php if (isset($_POST['category_name'])) {
                                                                                      echo $_POST['category_name'];
                                                                                    } ?>" class="inputs-prgnis required">
                    </div>

                    
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit"></button>
                </form>
            </div>













<?php
	require("admin-footer.php");
	?>