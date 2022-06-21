<?php
include "header.php";

$errorMsg = "";
$successMsg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $FullName = $crud->format_data($_POST['FullName']);
  $MobileNo = $crud->format_data($_POST['MobileNo']);
  $Age = $crud->format_data($_POST['Age']);
  $EmailAddress = $crud->format_data($_POST['EmailAddress']);
   

  if ($FullName == ''  || $MobileNo == '' || $Age == ''   || $EmailAddress == ''  ) {

    $errorMsg = 'Error : Fill all field.';
	
  } else if (!filter_var($EmailAddress, FILTER_VALIDATE_EMAIL)) {

    $errorMsg = 'Error : Invalid Email Address format';
	
  } else {


	/* insert data */
	
	$insert_data = array();
	$insert_data['full_name'] = $FullName;
	$insert_data['mobile_no'] = $MobileNo;	
	$insert_data['age'] = $Age; 
	$insert_data['email_address'] = $EmailAddress; 
	$insert_data['created_date'] = date('Y-m-d H:i:s'); 
	
	
	$sql_insert = "INSERT INTO `" . TABLE_PREFIX . "contact` SET ";
	foreach ($insert_data as $key => $value) {
		$sql_insert .= '`' . $key . '`="' . $crud->escape_string($value) . '",';
	}
	$sql_insert  = trim($sql_insert, ","); 
	$last_id= $crud->fnInsert($sql_insert);  

	$_POST['last_id'] = $MemberID  = $last_id;	
	/* insert data */
 
 
	$_SESSION['MemberID'] = $MemberID;	

    $successMsg = 'Success: Form submitted successfully.'; 
	
	echo "<script type='text/javascript'>location.href='thank-you.php'</script>";
	exit();  

	 
	
  }
}

?>

<div class="wrapper">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 offset-lg-1">
        <div class="mn-prgnis w-100 float-left">
          <div class="mn-prgnis-banner w-100 float-left">
            <img src="assets/images/banner.png" alt="">
          </div>
          <!--mn-prgnis-banner-->

          <div class="row">
            <div class="col-sm-12">
			
              <?php
              if ($errorMsg != "") {
              ?>
                <div class="p-2 mt-2  alert-danger text-center"><?php echo $errorMsg; ?></div>
              <?php } else if ($successMsg != "") {
              ?>
                <div class="p-2 mt-2  alert-success text-center"><?php echo $successMsg; ?></div>
              <?php
              }
              ?>
            </div>
			
			
            <div>
              <div class="mn-prgnis-form w-100 float-left">
			  
			  
			  <!-- form start -->
                <form id="prgnis-frm" method="post">

                  <div class="form-pera w-100 float-start">
                    <input type="text" placeholder="Full Name*" name="FullName" value="<?php if (isset($_POST['FullName'])) {
                                                                                          echo $_POST['FullName'];
                                                                                        } ?>" class="inputs-prgnis required">
                  </div>
                 

                  <div class="form-pera w-100 float-start">
                    <input type="text" placeholder="Mobile No*" name="MobileNo" value="<?php if (isset($_POST['MobileNo'])) {
                                                                                          echo $_POST['MobileNo'];
                                                                                        } ?>" class="inputs-prgnis">
                  </div>
                  
				  
 

                  <div class="form-pera w-100 float-start">
                    <input type="text" placeholder="Age" name="Age" value="<?php if (isset($_POST['Age'])) {
                                                                              echo $_POST['Age'];
                                                                            } ?>" class="inputs-prgnis">
                  </div>
                  <!--form-pera-->

                  <div class="form-pera w-100 float-start">
                    <input type="text" placeholder="Email Address*" name="EmailAddress" value="<?php if (isset($_POST['EmailAddress'])) {
                                                                                                  echo $_POST['EmailAddress'];
                                                                                                } ?>" class="inputs-prgnis">
                  </div>
                  <!--form-pera-->
 
  

                  

                  <div id="prgnis_msg"></div>

                  <div class="submt-btns w-100 float-left">
                    <input type="submit" id="prgnis_submit" value="Submit" name="btnsave">
                  </div>

                </form>

              </div>
             
            </div>
           
          </div>
         
        </div>
        
      </div>
    
    </div>
    


    <?php
    include "footer.php";
    ?>