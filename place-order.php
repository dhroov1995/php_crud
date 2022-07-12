<?php
include_once 'include/crud.php';
session_start();
//session_destroy();
$crud =new crud();

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    if(isset($_POST['purchase']))
    {
        $fname = $crud->format_data($_POST['fname']);
        $email = $crud->format_data($_POST['email']);
        $number = $crud->format_data($_POST['number']);
        $state = $crud->format_data($_POST['state']);
        $city = $crud->format_data($_POST['city']);
        $address = $crud->format_data($_POST['address']);
        
       

        $insert_user = array();
        $insert_user['fname'] = $fname;
        $insert_user['email'] = $email;
        $insert_user['number'] = $number;
        $insert_user['state'] = $state;
        $insert_user['city'] = $city;
        $insert_user['address'] = $address;

       
    
        $sql_insert = "INSERT INTO `" . TABLE_PREFIX . "user` SET  ";
        foreach ($insert_user as $key => $value) {
            $sql_insert .= '`' . $key . '`="' . $crud->escape_string($value) . '",';
        }
       
        $sql_insert  = trim($sql_insert, ","); 
        $last_id= $crud->fnInsert($sql_insert); 

        
        
        
        $sql = "INSERT INTO `" . TABLE_PREFIX . "order` SET ";
        foreach ($_SESSION['cart'] as $key => $value) {
            $sql .= '`' . $key . '`="' . $crud->escape_string($value) . '",';
           
            $product_name = $value['$product_name'];
            $product_price = $value[' $product_price'];
            $product_quantity = $value['$product_quantity'];

        }
       
        $sql  = trim($sql, ","); 
        $last_id= $crud->fnInsert($sql); 
    
        }
    } 
      
       /* echo"<pre>";
        print_r( $product_price);
        echo"</pre>"; 
        die(); */
      
?>