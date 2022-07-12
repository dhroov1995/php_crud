<?php
include_once 'include/crud.php';

?>
<?php
session_start();
//session_destroy();

if($_SERVER['REQUEST_METHOD'] == "POST")
{
   
    if(isset($_POST['pcartbtn']))
    {
       
        if(isset($_SESSION['cart']))
        {
            $myitems = array_column ($_SESSION['cart'],'product_name');
            if(in_array($_POST['product_name'],$myitems))
            {
                echo"<script>
                alert('item already added');
                window.location.href='product.php';
                </script>";
            }
            else
            {
            $count = count($_SESSION['cart']);
            $_SESSION['cart'][$count]=array('id'=>$_POST['id'],'product_image'=>$_POST['product_image'],'product_name'=>$_POST['product_name'],'product_price'=>$_POST['product_price'],'product_quantity' => 1);
            echo"<script>
            alert('item 
            added');
            window.location.href='product.php';
            </script>"; 
        }
        }
        else
        {
            $_SESSION['cart'][0]=array('id'=>$_POST['id'],'product_image'=>$_POST['product_image'],'product_name'=>$_POST['product_name'],'product_price'=>$_POST['product_price'],'product_quantity' => 1);
            echo"<script>
            alert('item added');
            window.location.href='product.php';
            </script>"; 
            
        }    
    }
    if(isset($_POST['remove_product']))
    {
        foreach($_SESSION['cart'] as $key=>$value)
        {
            if($value['product_name']==$_POST['product_name'])
            {
           unset($_SESSION['cart'][$key]) ;
           $_SESSION['cart']=array_value($_SESSION['cart']);
           echo"<script>
           alert('item removed');
           window.location.href='mycart.php';
           </script>";
    
        }
        }
    }

     if(isset($_POST['ModQuantity']))
     {
        foreach($_SESSION['cart'] as $key => $value)
        {
            if($value['product_name']==$_POST['product_name'])
            {
                $_SESSION['cart'][$key]['product_quantity']=$_POST['ModQuantity'];
          
          print_r($_SESSION['cart']);
    
        }
        } 
     }
}
?>