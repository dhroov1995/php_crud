<?php
$title = 'Manage Contact';
require("admin-header.php");
?>

<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<div class="heds-new">
						<h1 class="m-0 text-dark">Contact Record</h1>
					</div>
				</div>
			</div>
		</div>
	</section>


	<?php if ($msg) { ?>
		<div class="<?php echo $cls; ?> alert" onclick="this.style.display='none'">
			<?php echo $msg; ?>
		</div>
	<?php }

	$exception = $_SESSION['exception'];
	$success = $_SESSION['success'];

	if (!empty($success)) {

		echo "<div class='response-msg alert alert-success alert-dismissible text-center'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
					 " . $success . "
				</div>";
		unset($_SESSION['success']);
	} else if (!empty($exception)) {

		echo "<div class='response-msg alert alert-danger alert-dismissible text-center'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
					 " . $exception . "
				</div>";
		unset($_SESSION['exception']);
	}
	?>

	<!-- Main content -->
	<section class="content nw-list">
		<div class="row d-flex align-items-stretch">
			<div class="col-lg-12">

				<div class="card">
					<div class="card-header">
						<div class="search-row">

							<form id="form1" role="form" action="">
								 
								<div class="row">
									
						
									<div class="col-lg-4 col-md-4">
										 <div class="input-group input-group-sm">
										  <label>Search</label>
											<input type="text" name="search" value="<?php echo $_REQUEST['search']; ?>" class="form-control " placeholder="Search"  > 
										  </div>
									  </div>


									  <div class="col-lg-3 col-md-3 ">
										<div class="form-group input-group-sm">
										  <label>From</label>
										  <input type="text" name="fromdate" value="<?php echo $_REQUEST['fromdate']; ?>" class="form-control col-datepicker" id="fromInput" autocomplete="off" >
										</div>
									  </div>
							  
									  <div class="col-lg-3 col-md-3 ">
										<div class="form-group input-group-sm">
										  <label>To</label> 
										  <input type="text" name="todate" value="<?php echo $_REQUEST['todate']; ?>" class="form-control col-datepicker" id="toInput" autocomplete="off" > 
										</div>
									  </div>
									  
						
						
									<div class="col-lg-2 col-md-2 ">
										<label>&nbsp;</label>
										<input type="submit" class="btn btn-success btn-sm" value="Search">
										
										&nbsp;&nbsp; 
									</div>

								</div>
							</form>
						</div>

					</div>
				</div>


				<div class="card-body listing-list">
					<div class="table-tabs w-100 float-left"> 
			
			
						<!----export data-->

							<form method="post"  action="export-excel.php">
						    
								<input type="hidden" name="search" value="<?php echo $_REQUEST['search']; ?>" >
								<input type="hidden" name="fromdate" value="<?php echo $_REQUEST['fromdate']; ?>" >
								<input type="hidden" name="todate" value="<?php echo $_REQUEST['todate']; ?>" > 
							    <input type="submit" name="ExportExcel" value="Export to Excel"   class="btn btn-sm btn-success" style="margin-bottom: 16px;" />
							</form>

						<!----export data-->
							

						<?php
						$where = '   ';  
						?>

						<table class="table style-1 tbl-listings">
							<thead>
								<tr role="row">    
									<th>FullName</th>
									<th>MobileNo</th>
									 <th>Age</th>
									 <th>EmailAddress</th>
									 <th>Date</th>
								</tr>
							</thead>
							<tbody>

								<?php
								
								 if($_REQUEST['todate']!=""  || $_REQUEST['fromdate']!=""){
				 
										$fromdate=  $_REQUEST['fromdate']; 
										$todate=  $_REQUEST['todate']; 
										
										
										if($fromdate==""){  $fromdate = '1970-01-01'; }
										if($todate==""){  $todate = '2030-01-01';  }
										
										
										 $where .=' AND DATE(`created_date`) >= DATE("'.date("Y-m-d",strtotime($fromdate)).'") AND  DATE(`created_date`) <= DATE("'.date("Y-m-d",strtotime($todate)).'") ';
									  } 
									  
									  
									  if($_REQUEST['search']!=""){
										 
										$where .=' and (full_name LIKE "%'.$_REQUEST['search'].'%"  OR  mobile_no LIKE "%'.$_REQUEST['search'].'%"  OR   email_address LIKE "%'.$_REQUEST['search'].'%"    ) ';
										 
									 }
									 


								$sql = "SELECT COUNT(*) as count  FROM " . TABLE_PREFIX . "contact where 1=1 $where order by contact_id desc";

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

								$sql = "SELECT * FROM " . TABLE_PREFIX . "contact where 1=1 $where order by contact_id desc LIMIT " . $offset . ", " . $rowsperpage . "";


								$result = $crud->getData($sql);


								foreach ($result as $obj) {

echo"vdvdgb";
									
								?>

									<tr>
								 
									 
										
										<td> 
											<?php echo $obj['full_name'];  ?>
										</td>
										
										<td> 
											<?php echo $obj['mobile_no'];  ?>
										</td> 
										
										  
										<td> 
											<?php echo $obj['age'];  ?>
										</td>
										
										
										<td> 
											<?php echo $obj['email_address'];  ?>
										</td>
										
										<td> 
											<?php echo date("d M,Y",strtotime($obj['created_date']));  ?>
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
		<!-- /.card -->
	</section>



	<?php
	require("admin-footer.php");
	?>
	
	
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script>
$( function() {
$( ".col-datepicker" ).datepicker({ dateFormat: "yy-mm-dd" }); 
} );
</script>