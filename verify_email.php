<?php 
include_once 'config/Database.php';
include_once 'class/Subscription.php';

$database = new Database();
$db = $database->getConnection();
$subscriber = new Subscription($db);

$verifyMessage = '';
if(!empty($_GET['email_verify'])){     
	$token = $_GET['email_verify']; 	
	$subscriber->verify_token = $token;
    if($subscriber->isValidToken()){ 
       	$subscriber->is_verified = 1;        
        if($subscriber->update()) { 
            $verifyMessage = '<p class="success">Your email address has been verified successfully.</p>'; 
        } else { 
            $verifyMessage = '<p class="error">Some problem occurred on verifying your email, please try again.</p>'; 
        } 
    } else { 
        $verifyMessage = '<p class="error">You have clicked on the wrong link, please check your email and try again.</p>'; 
	}
}
include('inc/header.php');
?>

<title>Email Subscription System with PHP & MySQL</title>
<?php include('inc/container.php');?>
<div class="content"> 
	<div class="container-fluid">
		<h2>Email Subscription System with PHP & MySQL</h2>
		<div class="row">
			<div class="col-lg-12">
				<?php echo $verifyMessage; ?>
			</div>
		</div>	 
	</div>       
</div>   		
<?php include('inc/footer.php');?>


