<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
{
    header('location:includes/signin.php');
}
else{
    if(isset($_POST['submit6']))
    {
        $name=$_POST['name'];
     
        $email=$_SESSION['login'];
        
        $sql="update user set UserName=:name where Email=:email";
        $query = $dbp->prepare($sql);
        $query->bindParam(':name',$name,PDO::PARAM_STR);
     
        $query->bindParam(':email',$email,PDO::PARAM_STR);
        $query->execute();
        $msg="Profile Updated Successfully";
    }
    
    ?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="images/favicon.png"/>
<title>home</title>
<link href="css/owl.carousel.min.css" rel="stylesheet">
<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->

<link href="css/style.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">

<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/owl.carousel.min.js" type="text/javascript"></script>
<script src="js/custom.js" type="text/javascript"></script>
</head>
<body id="myPage">
<div class="mypage">
<div class="tv-left-canvas tv-left-canvas-left">


<div class="tv-left-offcanvas visible-sm visible-xs">
<div class="container">
<button data-toggle="offcanvas" class="btn btn-primary visible-xs visible-sm" type="button"><i class="fa fa-bars"></i></button>
</div>
</div>
<div class="sidebar-offcanvas visible-xs visible-sm">
<div class="offcanvas-heading panel-heading">
<button data-toggle="offcanvas" class="btn btn-primary visible-xs visible-sm" type="button"> <span class="fa fa-times"></span></button>
</div>


</div>

<?php include('includes/header.php');?>



<!--middle content-->
<div id="common-home">


	

					
<div class="privacy">
	<div class="container">
		<h3 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;"><b>Update Profile</b></h3>
		<form name="chngpwd" method="post">
		 <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

<?php 
$useremail=$_SESSION['login'];
$sql = "SELECT * from user where Email=:useremail";
$query = $dbp -> prepare($sql);
$query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

	<p style="width: 350px;">
		
			<b>Name</b>  <input type="text" name="name" value="<?php echo htmlentities($result->UserName);?>" class="form-control" id="name" required="">
	</p> 



<p style="width: 350px;">
<b>Email</b>
	<input type="email" class="form-control" name="email" value="<?php echo htmlentities($result->Email);?>" id="email" readonly>
			</p>
<p style="width: 350px;">
<b>Last Updation Date : </b>
<?php echo htmlentities($result->RegistrationDate);?>
</p>


<?php }} ?>

			<p style="width: 350px;">
<button type="submit" name="submit6" class="btn-primary btn">Update</button>
			</p>
			</form>

		
	</div>
</div>
<!--- /privacy ---->
<!--- footer-top ---->
<!--- /footer-top ---->
<?php include('includes/footer.php');?>

			
        
            
        
            
            </div>
            <!--End-->
            
            <!--footer-->
           
            <!--End-->
          
            </div>
            </div>
            </body>
            </html>
<?php } ?>