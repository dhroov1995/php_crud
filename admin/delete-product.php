<?php require("admin-header.php");
include_once 'DbConfig.php';



$id = $_GET['id'];
$sql_delete="DELETE FROM ".TABLE_PREFIX ."product where id = '".$id."' ";
$sql_delete  = trim($sql_delete, ","); 
$crud->execute($sql_delete); 

if($sql_delete)
{
    
    echo "<script>alert('Are you sure')</script>";
    header('location:manage-product.php');


   
}
else
{
    echo "failed";
}
 /*
    echo"<pre>";
	print_r($crud);
	echo"</pre>";
		die();																							
*/
?>



















               