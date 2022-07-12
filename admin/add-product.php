<?php require("admin-header.php");
include_once 'DbConfig.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $filename = $crud->format_data( $_FILES['product_image']['name']);
        $tempname= $crud->format_data($_FILES['product_image']['tmp_name']);
        $folder="images/".$filename;
        move_uploaded_file($tempname,$folder);
        $product_category = $crud->format_data($_POST['product_category']);
    $product_code = $crud->format_data($_POST['product_code']);
    $product_name = $crud->format_data($_POST['product_name']);
    $product_colour = $crud->format_data($_POST['product_colour']);
    $product_price = $crud->format_data($_POST['product_price']);
    
  
    if ($product_code == '' || $product_name == ''|| $product_colour == '') {
  
      $errorMsg = 'Error : Fill all field.';
      
      
    } else {

$insert_product = array();
    $insert_product['product_image'] = $folder;
    $insert_product['product_category'] = $product_category;
	$insert_product['product_code'] = $product_code;
    $insert_product['product_name'] = $product_name;
    $insert_product['product_colour'] = $product_colour;
	$insert_product['product_price'] = $product_price;
//	$insert_product['created_date'] = date('Y-m-d H:i:s'); 


	$sql_insert = "INSERT INTO `" . TABLE_PREFIX . "product` SET ";
	foreach ($insert_product as $key => $value) {
		$sql_insert .= '`' . $key . '`="' . $crud->escape_string($value) . '",';
	}
	$sql_insert  = trim($sql_insert, ","); 
	$last_id= $crud->fnInsert($sql_insert); 
    header('location:manage-product.php');
    

}
}

    /*
  	echo"<pre>";
print_r($product_image);
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
                    <h1> Add Product </h1>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3 col-md-6">
                            <label for="exampleInputEmail1" class="form-label">Product Image</label>
                            <input type="file" name="product_image" class="form-control" value="<?php if (isset($_FILES['product_image'])) {
                                                                                          echo $last_id['product_image'];
                                                                                        } ?>" class="inputs-prgnis required"> 

                        </div>
                        <div class="mb-3 col-md-6"> 
                        <label for="exampleInputEmail1" class="form-label">Product category</label>
                        <select name="product_category" class="form-control">
                            <option selected>Choose...</option>
                            <option value="bike">Bike</option>
                            <option value="tv">TV</option>
                            
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="" class="form-label">Product code</label>
                            <input type="text" name="product_code" class="form-control" value="<?php if (isset($_POST['product_code'])) {
                                                                                          echo $last_id['product_code'];
                                                                                        } ?>" class="inputs-prgnis required"> 

                        </div>
                       <div class="mb-3 col-md-6">
                            <label for="" class="form-label">Product name</label>
                            <input type="text" name="product_name" class="form-control" value="<?php if (isset($_POST['product_name'])) {
                                                                                          echo $last_id['product_name'];
                                                                                        } ?>" class="inputs-prgnis required">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="" class="form-label">Product colour</label>
                            <input type="text" name="product_colour" class="form-control" value="<?php if (isset($_POST['product_colour'])) {
                                                                                          echo $last_id['product_colour'];
                                                                                        } ?>" class="inputs-prgnis required">
                        </div> 
                            <div class="mb-3 col-md-6">
                            <label for="" class="form-label">Product price</label>
                            <input type="text" name="product_price" class="form-control" value="<?php if (isset($_POST['product_price'])) {
                                                                                          echo $last_id['product_price'];
                                                                                        } ?>" class="inputs-prgnis required">
                        </div> 
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit"></button>
                    </form>
                </div>
 





















               