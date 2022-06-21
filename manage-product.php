<?php require("admin-header.php");
include_once 'DbConfig.php';

?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="heds-new">

                        <a href = add-product.php class="btn btn-success">Add Product</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Main content -->
    <section class="content nw-list">
        <div class="row d-flex align-items-stretch">
            <div class="col-lg-12">
                <div class="card-body listing-list">
                    <div class="table-tabs w-100 float-left">


                        <?php
				    	$where = '   ';    
						?>

                        <table class="table style-1 tbl-listings">
                            <thead>
                                <tr role="row">
                                    <th>Id</th>
                                    <th>Product Code</th>
                                    <th>Product Name</th>
                                    <th>Product colour</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
								
						/*		 if($_REQUEST['todate']!=""  || $_REQUEST['fromdate']!=""){
				 
										$fromdate=  $_REQUEST['fromdate']; 
										$todate=  $_REQUEST['todate']; 
										
										
										if($fromdate==""){  $fromdate = '1970-01-01'; }
										if($todate==""){  $todate = '2030-01-01';  }
										
										
										 $where .=' AND DATE(`created_date`) >= DATE("'.date("Y-m-d",strtotime($fromdate)).'") AND  DATE(`created_date`) <= DATE("'.date("Y-m-d",strtotime($todate)).'") ';
									  } 
									  
									  
									  if($_REQUEST['search']!=""){
										 
										$where .=' and (full_name LIKE "%'.$_REQUEST['search'].'%"  OR  mobile_no LIKE "%'.$_REQUEST['search'].'%"  OR   email_address LIKE "%'.$_REQUEST['search'].'%"    ) ';
										 
									 } */
									


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

                                <tr>
								    <td>
									<?php echo $obj['id'];  ?>
                                    </td>

                                    <td>
									<?php echo $obj['product_code'];  ?>
                                    </td>

                                    <td>
									<?php echo $obj['product_name'];  ?>
                                    </td>


                                    <td>
									<?php echo $obj['product_colour'];  ?>
                                    </td>

									<td>
										
									 <a href ="update-product.php?id=<?php echo $obj[id]; ?>" class="btn btn-success mr-3">Update
								
									 <a href ="delete-product.php?id=<?php echo $obj[id]; ?>" class="btn btn-danger">Delete
									</td>
                                


                                </tr>

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
            </div>



        </div>

    </section>



    <?php
	require("admin-footer.php");
	?>
