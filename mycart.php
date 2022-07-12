<?php
include_once 'include/crud.php';
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>MY Cart</title>
</head>
<body>

    <div class="container">
    <button class="btn btn-success  my-3"><a href="category.php"class="text-decoration-none text-white">Back</a></button>
        <div class="row">
            
            <div class="col-lg-12 text-center  border rounded bg-dark text-white my-5" >
                <h1>MY Cart</h1>
                
            </div>
            
            <div class="col-lg-9">
            <table class="table">
  <thead class="text-center">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Product_image</th>
      <th scope="col">Product name</th>
      <th scope="col">Product price</th>
      <th scope="col">Quantity</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody class="text-center">
    <?php
    $total=0;
    if(isset($_SESSION['cart']))
    {
    foreach($_SESSION['cart'] as $key => $value)
    {
$total=$total+$value['product_price'];
echo"
<tr>
<td> $value[id]</td>

<td>
<img src=<?php echo $value[product_image]?>>
</td>
<td>$value[product_name]</td>
<td>$value[product_price]</td>



<form action='manage-cart.php' method='post'>
<td><input class='text-center iquantity' onchange='this.form.submit' type='number' name='ModQuantity' class='text-center' value='$value[product_quantity]' min='1' max='10'></td>
<input type='hidden' name='product_name' value='$value[product_name]'>
<input type='hidden' name='user_id' value='$value[user_id]'>

</form>

<td>
<form action='manage-cart.php' method='post'>
<button name='remove_product'class='btn btn-sm btn-outline-danger'>Remove</button>
<input type='hidden' name='product_name' value='$value[product_name]'>
<input type='hidden' name='user_id' value='$value[user_id]'>
</form>
</td>
</tr>

";
    }
}
    
    ?>
    
  </tbody>
</table>


            </div>
            <div class="col-lg-3">
   <div class="border bg-light rounded p-4">
   <h3>Total:</h3>
    <h5 class="text-right"><?php echo $total?></h5>
    <?php
    if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
    {
    ?>
    <form action="place-order.php" method="POST">
    <div class="form-group">
        <label>Full name</label>
        <input type="text" name="fname" class="form-control"required>
   </div>
   <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control"required>
   </div>
   <div class="form-group">
        <label>Phone Number</label>
        <input type="number" name="number" class="form-control"required>
   </div>

   <div class="form-group">
    <label>State</label>
    <select class="form-select" name="state">
  <option selected>select state</option>
  <option value="Uttarakhand">Uttarakhand</option>
  <option value="UttarPradesh">UttarPradesh</option>
  <option value="Punjab">Punjab</option>
</select>
    </div>

    <div class="form-group">
    <label>City</label>
    <select class="form-select" name="city">
  <option selected>select city</option>
  <option value="Dehradun">Dehradun</option>
  <option value="Haridwar">Haridwar</option>
  <option value="Saharanpur">Saharanpur</option>
  <option value="Muradabad">Muradabad</option>
  <option value="Amritsar">Amritsar</option>
  <option value="Ludhiana">Ludhiana</option>
</select>
    </div>

   <div class="form-group">
        <label>Address</label>
        <input type="text"  name="address" class="form-control" required>
   </div>
        <div class="form-check">
  <input class="form-check-input" type="radio" name="pay_mode" value="COD">
  <label class="form-check-label" for="flexRadioDefault1">
    Cash on Delivery
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    UPI
  </label>
  
</div>
<br>
        <button class="btn btn-primary btn-block w-100" name="purchase">Place Order</button>
    </form>
    <?php }?>
   </div>
</div>
        </div>
    </div>
</body>
</html>