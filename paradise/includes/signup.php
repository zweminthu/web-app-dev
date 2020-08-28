<?php
include('config.php');
if(isset($_POST['submit']))
{
    $Uname=$_POST['Username'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $sql="INSERT INTO  user(UserName,Email,Pwd) VALUES(:uname,:email,:password)";
  
    $query = $dbp->prepare($sql);
    $query->bindParam(':uname',$Uname,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':password',$password,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbp->lastInsertId();
    if($lastInsertId)
    {
        $_SESSION['msg']="You are Scuccessfully registered. Now you can login ";
        header('location:signup.php');
    }
    else
    {
        $_SESSION['msg']="Something went wrong. Please try again.";
        header('location:signup.php');
    }
}

?>
<html>
<head>
<title>Paradise SignUp Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<script>
function checkAvailability() {

$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<link href="../css/style1.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->

<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Paradise SignUp Form</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="#" method="post">
					<input class="text" type="text" name="Username" placeholder="Username" required="">
					<input class="text email" type="email" name="email" placeholder="Email" onBlur="checkAvailability()" autocomplete="off" required="">
					<input class="text" type="password" name="password" placeholder="Password" required="">
					<input class="text w3lpass" type="password" name="password" placeholder="Confirm Password" required="">
					<div class="wthree-text">
						<label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span>I Agree To The Terms & Conditions</span>
						</label>
						<div class="clear"> </div>
					</div>
					<input type="submit" name="submit" value="SIGNUP">
				</form>
				<p>Already have an account? <a href="signin.php"> Login Now!</a></p>
			</div>
			<div class="back">
				
					<a href="../home.php"><h5>Back to home</h5></a>
				</div>
		</div>
		
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<!-- //main -->
</body>
</html>