

<?php require "header.php";
include_once 'include/DbConfig.php';
?>
<html>
<body style="background-color:white;">
	

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="home.php">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home</a>
      </li>
    </ul>
    <div>
		<a href="mycart.php" class="btn btn-outline-success">My cart(0)</a>
	</div>
  </div>
</nav>
<div class="container mt-5">
	<div class="row">
		
		







                        <?php
				    	$where = '   ';  
						?>


                                <?php
								
								$sql = "SELECT COUNT(*) as count  FROM " . TABLE_PREFIX . "product where 1=1 $where order by id desc";

								$r = $crud->getData($sql);
								$totalrecord = $numopen = $numrows = $r[0]['count'];

								$rowsperpage = PAGINATION;
								$totalpages = ceil($numrows / $rowsperpage);


								if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {

									$currentpage = (int) $_GET['currentpage'];
								} else {

									$currentpage = 1;
								}

								if ($currentpage > $totalpages) {

									$currentpage = $totalpages;
								}

								if ($currentpage < 1) {

									$currentpage = 1;
								}

								$offset = ($currentpage - 1) * $rowsperpage;

								$sql = "SELECT * FROM " . TABLE_PREFIX . "product where 1=1 $where order by id desc LIMIT " . $offset . ", " . $rowsperpage . "";

								
								$result = $crud->getData($sql);

								
								foreach ($result as $obj) {
									
								?>

                         
								

											<div class="col-lg-3">
	<form action="manage-cart.php" method="post">
	<div class="card">
  <img src="<?php echo $obj['product_image']?>">
  <div class="card-body text-center">
    <h5 class="card-title"><?php echo $obj['product_name'];  ?></h5>
    <p class="card-text">
	<p class= "card-text">&#8377;: 00000<span class="text-success">(10 % off)</span></p>
	<i class="fa-solid fa-star"></i>
											<i class="fa-solid fa-star"></i>
											<i class="fa-solid fa-star"></i>
											<i class="fa-solid fa-star"></i>
											<i class="fa-regular fa-star" style='color: blue'></i>
	</p>
    <input type="submit" class="btn btn-primary" name="cartbtn" value="Add to Cart"></a>
	<input type="hidden" name="product_image" value="<?php echo $obj['product_image'];?>">
	<input type="hidden" name="product_name" value="<?php echo $obj['product_name'];  ?>">
  </div>
</div>
</form>
</div>								
								
										
									
									
				
									<?php
								/*	echo"<pre>";
									print_r($obj['product_image']);
									echo"</pre>";
										die(); */
									?>

                               

                                <?php }
								$range = RANGE;
								

								if ($numrows > PAGINATION) {
								?>

                                <tr>
                                    <td colspan="5">
                                        <ul class="pagination">
                                            <?php

												$search = '';
												if ($_GET['status'] != "") {
													$search .= '&status=' . $_GET['status'];
												}
												if ($_GET['search'] != "") {
													$search .= '&search=' . $_GET['search'];
												}
												if ($_GET['fromdate'] != "") {
													$search .= '&fromdate=' . $_GET['fromdate'];
												}
												if ($_GET['todate'] != "") {
													$search .= '&todate=' . $_GET['todate'];
												}

												if ($currentpage > 1) {

													echo "<li> <a href='{$_SERVER['PHP_SELF']}?currentpage=1$search'><<</a></li> ";

													$prevpage = $currentpage - 1;

													echo "<li> <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage$search'><</a> </li>";
												}


												for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {

													if (($x > 0) && ($x <= $totalpages)) {

														if ($x == $currentpage) {

															echo "<li class='active'> <a href='javascript:;' class='paginate_button'>$x</a> </li>";
														} else {

															echo "<li> <a href='{$_SERVER['PHP_SELF']}?currentpage=$x$search'>$x</a> </li>";
														}
													}
												}


												if ($currentpage != $totalpages) {

													$nextpage = $currentpage + 1;

													echo "<li> <a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage$search'>></a> </li>";

													echo "<li> <a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages$search'>>></a> </li>";
												}


											}?>
                                        </ul>
                                    </td>
                                </tr>

                                <?php
								

								if ($totalrecord <= 0) {
									echo "<tr><td colspan='9'><h4  class='text-center'>No record</h4></td></tr>";
								}
								?>

                           
						</div>
						</div>
						</body>
</html>

	<?php
	require("admin-footer.php");
	?>