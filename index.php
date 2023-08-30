<?php 
include('inc/header.php');
?>
<title>Email Subscription System with PHP & MySQL</title>
<script src="js/ajax_subscribe.js"></script>
<link rel="stylesheet" href="css/style.css">
<?php include('inc/container.php');?>
<div class="content"> 
	<div class="container-fluid">
		<h2>Email Subscription System with PHP & MySQL</h2>
		<div class="row">
			<div class="col-lg-12">
				<div class="main-content">
					<div class="susbcribe-container">
						<div class="top">
							<h2>Subscribe Now</h2>													
						</div>
						<div class="bottom">							
							<div class="status"></div>						
							<form action="#" id="subscribeForm" method="post">							
								<input type="text" class="form-control" id="name" placeholder="Full Name" required="">	
								<span class="text-danger hidden" id="nameError"></span>
								<input type="email" class="form-control" id="email" placeholder="E-mail" required="">
								<span class="text-danger hidden" id="emailError"></span>
								<input type="button" id="subscribeButton" value="Subscribe Now">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>	 
	</div>       
</div>   		
<?php include('inc/footer.php');?>

