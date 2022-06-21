<?php
include("../include/Crud.php"); 
$crud = new Crud();

$filename = "demofile.xls";  

header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=$filename");  
header("Pragma: no-cache"); 
header("Expires: 0"); 


echo "FullName";  echo "\t";
echo "MobileNo"; echo "\t";
echo "Age";  echo "\t";
echo "Date"; 
echo "\n";  

$tab= "\t"; 
	
	

if($_REQUEST['todate']!=""  || $_REQUEST['fromdate']!="")
{

	$fromdate=  $_REQUEST['fromdate']; 
	$todate=  $_REQUEST['todate']; 

	if($fromdate==""){  $fromdate = '1970-01-01'; }
	if($todate==""){  $todate = '2030-01-01';  }

	$where .=' AND DATE(`created_date`) >= DATE("'.date("Y-m-d",strtotime($fromdate)).'") AND  DATE(`created_date`) <= DATE("'.date("Y-m-d",strtotime($todate)).'") ';
} 

if($_REQUEST['search']!=""){
	$where .=' and (full_name LIKE "%'.$_REQUEST['search'].'%"  OR  mobile_no LIKE "%'.$_REQUEST['search'].'%"  OR   email_address LIKE "%'.$_REQUEST['search'].'%"    ) ';
}


$sql = "SELECT * FROM " . TABLE_PREFIX . "contact where 1=1 $where order by contact_id desc ";


$result = $crud->getData($sql);

foreach ($result as $obj) {


		if($obj['premium_membership'] =="Offline"){
		 
			$MemberID =  $obj['membership_card_number'];  
			
		}else{
			
			$memberidnumber = 220000;
			$memberidnumber = $memberidnumber+ $obj['contact_id'];
			$MemberID =  'ON'.$memberidnumber; 
		}


		echo $obj['full_name']; 
		echo $tab; 
		
		echo $obj['mobile_no']; 
		echo $tab; 
		
		 
		
		echo $obj['age'];   
		echo $tab; 
		
		echo $obj['email_address'];  
		echo $tab; 
		 
		 
		
		echo date("d M,Y",strtotime($obj['created_date']));  
									 
		echo "\n"; 
}



?>
