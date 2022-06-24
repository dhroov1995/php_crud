

<?php require("admin-header.php");
include_once 'DbConfig.php';
$crud = new Crud();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $filename = $crud->format_data( $_FILES['category_image']['name']);
    $tempname= $crud->format_data($_FILES['category_image']['tmp_name']);
    $folder="images/".$filename;
    move_uploaded_file($tempname,$folder);
   
    $category_name = $crud->format_data($_POST['category_name']);
   
   
   $update_product = array();
   $id = $_GET['id'];
   $update_product['category_image'] = $folder;
	
    $update_product['category_name'] = $category_name;
    
//	$update_product['created_date'] = date('Y-m-d H:i:s'); 

$sql_update="UPDATE  `".TABLE_PREFIX."category` SET  ";
	foreach ($update_product as $key => $value) {
		$sql_update .= '`' . $key . '`="' . $crud->escape_string($value) . '",';
	}
	$sql_update  = trim($sql_update, ","); 
    $sql_update .= ' WHERE id="'.$id.'"';
    $crud->execute($sql_update); 
              
    header('location:view-category.php');
}


      
      $id = $_GET['id'];
     
     $res=$crud->getData("SELECT * FROM ".TABLE_PREFIX ."category where id = '".$id."' ");  
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
                    <h1> update category </h1>
                    <form action="" method="post"  enctype="multipart/form-data">
                        <div class="mb-3 col-md-6">
                        <div class="mb-3 col-md-6">
                            <label for="exampleInputEmail1" class="form-label">Category Image</label>
                            <input type="file" name="category_image" class="form-control" value="<?php if (isset($_FILES['category_image'])) {
                                                                                          echo $_last_id['category_image'];
                                                                                        } ?>" class="inputs-prgnis required"> 
                            
                        </div>
                       <div class="mb-3 col-md-6">
                            <label for="exampleInputPassword1" class="form-label">Category   name</label>
                            <input type="text" name="category_name" class="form-control" value="<?php echo $data['category_name'];?>" class="inputs-prgnis required">
                        </div>

                       

                        <input type="submit" class="btn btn-primary" name="submit" value="Submit"></button>
                    </form>
                </div> 
 




















               