<?php require "header.php";

include_once 'include/DbConfig.php';
?>
    <!-- Main content -->
   
<div class="container mt-5">
    <div class="row">

   

                        <?php
				    	$where = '   ';  
						?>

                       

                                <?php 
									


								$sql = "SELECT COUNT(*) as count  FROM " . TABLE_PREFIX . "category where 1=1 $where order by id desc";

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

								$sql = "SELECT * FROM " . TABLE_PREFIX . "category where 1=1 $where order by id desc LIMIT " . $offset . ", " . $rowsperpage . "";

								
								$result = $crud->getData($sql);

								
								foreach ($result as $obj) {
									
								?>

                                
								    
                                      <div class ="col-lg-3">
										<form action="" method = "post">
										<div class ="card">
										<img src=<?php echo $obj['category_image']?> class="">
										<div class = "card-body text-center">
											<h5 class ="card-title"><?php echo $obj['category_name'];  ?></h5>
											
											

											
											<input type="submit" class="btn btn-primary" name="cartbtn" value="view more">
											
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


												?>
                                        </ul>
                                    </td>
                                </tr>

                                <?php
								}

								if ($totalrecord <= 0) {
									echo "<tr><td colspan='9'><h4  class='text-center'>No record</h4></td></tr>";
								}
								?>

                            </tbody>
                        </table>

                        </div>

</div>



    <?php
	require("admin-footer.php");
	?>