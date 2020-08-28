<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{ 
   
    $Aname=$_POST['aname'];
    $pwd=($_POST['pass']);
   
  
  
    if($Aname=="admin" && $pwd=="admin123!")
    {
        $_SESSION['alogin']=$_POST['aname'];
        echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
    } else{
        
        echo "<script>alert('Invalid Details');</script>";
        
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Admin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../lcs/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../lcs/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../lcs/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../lcs/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../lcs/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../lcs/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-90 p-b-30">
				<form class="login100-form validate-form" method="post">
			
					<span class="login100-form-title p-b-40">
					
						<b>Login Admin</b>
					</span>

					

					

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
						<input class="input100" type="text" name="aname" placeholder="Username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-20" data-validate = "Please enter password">
						<span class="btn-show-pass">
							<i class="fa fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						
<!-- 							<input class="btn" type="submit" name="login" value="Login"> -->
							<button class="login100-form-btn" name="login" value="login">
							Login
						</button>
					</div>
					
					
					
				</form>
				<br>
				<div class="back">
				
					<a href="../home.php"><h5>Back to home</h5></a>
				</div>
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->
	<script src="../lcs/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../lcs/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../lcs/bootstrap/js/popper.js"></script>
	<script src="../lcs/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../lcs/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../lcs/daterangepicker/moment.min.js"></script>
	<script src="../lcs/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../lcs/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>