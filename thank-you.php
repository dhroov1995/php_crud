<?php
include "header.php";
?>



<div class="wrapper">
  <div class="container">
    <div class="row">
	
 
		
			<div>
				<br>
				<br>
				<br>
			</div>
			
			<div class="col-lg-10 offset-lg-1">
			<div class="mn-prgnis w-100 float-left">
			<div class="mn-prgnis-banner w-100 float-left">

			<?php
			if(isset($_SESSION['MemberID'])){
			?>

			<h1 class="text-center" >Thank You for Contacting with us. </h1>
			
			
			<p  class="text-center"><strong>MemberID: </strong><?php echo $_SESSION['MemberID']; ?></p>
			
			
			<p class="text-center">
				<a href="/" class="btn btn-success ">Return to home</a>
			</p>
			
			<?php } ?>

			</div>
			</div>
			</div> 
		
	</div>
  </div>
</div>	

<?php
include "footer.php";
?>