<?php require("admin-header.php");
include_once 'DbConfig.php';
$crud = new Crud();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $filename = $crud->format_data( $_FILES['product_image']['name']);
    $tempname= $crud->format_data($_FILES['product_image']['tmp_name']);
    $folder="images/".$filename;
    move_uploaded_file($tempname,$folder);
    $product_category = $crud->format_data($_POST['product_category']);
    $product_code = $crud->format_data($_POST['product_code']);
    $product_name = $crud->format_data($_POST['product_name']);
    $product_colour = $crud->format_data($_POST['product_colour']);
    
   
   $update_product = array();
   $id = $_GET['id'];
   $update_product['product_image'] = $folder;
   $update_product['product_category'] = $product_category;
	$update_product['product_code'] = $product_code;
    $update_product['product_name'] = $product_name;
    $update_product['product_colour'] = $product_colour;
//	$update_product['created_date'] = date('Y-m-d H:i:s'); 

$sql_update="UPDATE  `".TABLE_PREFIX."product` SET  ";
	foreach ($update_product as $key => $value) {
		$sql_update .= '`' . $key . '`="' . $crud->escape_string($value) . '",';
	}
	$sql_update  = trim($sql_update, ",");
    $sql_update .= ' WHERE id="'.$id.'"';
    $crud->execute($sql_update); 
               
      
    header('location:manage-product.php');
   
}



      
      $id = $_GET['id'];
     
     $res=$crud->getData("SELECT * FROM ".TABLE_PREFIX ."product where id = '".$id."' ");  
     $data=$res[0];

      
    /*
echo"<pre>";
    print_r($sql_update);
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
                    <h1> update Product </h1>
                    <form action="" method="post"  enctype="multipart/form-data">
                        <div class="mb-3 col-md-6">
                       
                            <label for="exampleInputEmail1" class="form-label">Product Image</label>
                            <input type="file" name="product_image" class="form-control" value="<?php if (isset($_FILES['product_image'])) {
                                                                                          echo $data['product_image'];
                                                                                        } ?>" class="inputs-prgnis required"> 


                       <div class="mb-3 col-md-6"> 
                        <label for="" class="form-label">Product category</label>
                        <select name="product_category" class="form-control">
                            <option selected>Choose...</option>
                            <option value="bike"
                            <?php
                                if($data['product_category'] =='bike')
                                {
                                    echo"selected";
                                }
                                ?>
                            >Bike</option>
                            <option value="tv"
                            <?php
                                if($data['product_category'] =='tv')
                                {
                                    echo"selected";
                                }
                                ?>
                            >TV</option>
                            
                            </select>
                        </div>
                        
                            <label for="exampleInputEmail1" class="form-label">Product code</label>
                            <input type="text" name="product_code" class="form-control" value="<?php echo $data['product_code'];?>" class="inputs-prgnis required"> 

                        </div>
                       <div class="mb-3 col-md-6">
                            <label for="exampleInputPassword1" class="form-label">Product name</label>
                            <input type="text" name="product_name" class="form-control" value="<?php echo $data['product_name'];?>" class="inputs-prgnis required">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="exampleInputPassword1" class="form-label">Product colour</label>
                            <input type="text" name="product_colour" class="form-control" value="<?php echo $data['product_colour'];?>" class="inputs-prgnis required">
                        </div> 

                        <input type="submit" class="btn btn-primary" name="submit" value="Submit"></button>
                    </form>
                </div>
 





















               