<?php require("admin-header.php");
include_once 'DbConfig.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $product_code = $crud->format_data($_POST['product_code']);
    $product_name = $crud->format_data($_POST['product_name']);
    $product_colour = $crud->format_data($_POST['product_colour']);
    
     
  
    if ($product_code == '' || $product_name == ''|| $product_colour == '') {
  
      $errorMsg = 'Error : Fill all field.';
      
      
    } else {

$insert_product = array();
	$insert_product['product_code'] = $product_code;
    $insert_product['product_name'] = $product_name;
    $insert_product['product_colour'] = $product_colour;
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
	print_r($crud);
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
                    <form action="" method="post">
                        <div class="mb-3 col-md-6">
                            <label for="exampleInputEmail1" class="form-label">Product code</label>
                            <input type="text" name="product_code" class="form-control" value="<?php if (isset($_POST['product_code'])) {
                                                                                          echo $_last_id['product_code'];
                                                                                        } ?>" class="inputs-prgnis required"> 

                        </div>
                       <div class="mb-3 col-md-6">
                            <label for="exampleInputPassword1" class="form-label">Product name</label>
                            <input type="text" name="product_name" class="form-control" value="<?php if (isset($_POST['product_name'])) {
                                                                                          echo $_POST['product_name'];
                                                                                        } ?>" class="inputs-prgnis required">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="exampleInputPassword1" class="form-label">Product colour</label>
                            <input type="text" name="product_colour" class="form-control" value="<?php if (isset($_POST['product_colour'])) {
                                                                                          echo $_POST['product_colour'];
                                                                                        } ?>" class="inputs-prgnis required">
                        </div> 

                        <input type="submit" class="btn btn-primary" name="submit" value="Submit"></button>
                    </form>
                </div>
 





















               