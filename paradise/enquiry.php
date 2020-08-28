<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
{
    $fname=$_POST['fname'];
    $email=$_POST['email'];
    $mobile=$_POST['mobileno'];
    $subject=$_POST['subject'];
    $description=$_POST['description'];
    $sql="INSERT INTO  enquire(Name,Email,MobileNo,Subject,Description) VALUES(:fname,:email,:mobile,:subject,:description)";
    $query = $dbp->prepare($sql);
    $query->bindParam(':fname',$fname,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
    $query->bindParam(':subject',$subject,PDO::PARAM_STR);
    $query->bindParam(':description',$description,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbp->lastInsertId();
    if($lastInsertId)
    {
        $msg="Enquiry  Successfully submited";
    }
    else
    {
        $error="Something went wrong. Please try again";
    }
    
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
	 <div class="col-md-6">
		<h2 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;"><b>Enquiry Form</b></h2>
		<form name="enquiry" method="post">
		 <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
	<p style="width: 350px;">
		
			<b>Full name</b>  <input type="text" name="fname" class="form-control" id="fname" placeholder="Full Name..." required="">
	</p> 
<p style="width: 350px;">
<b>Email</b>  <input type="email" name="email" class="form-control" id="email" placeholder="Email..." required="">
	</p> 

	<p style="width: 350px;">
<b>Mobile No</b>  <input type="text" name="mobileno" class="form-control" id="mobileno" maxlength="10" placeholder="Mobile No..." required="">
	</p> 

	<p style="width: 350px;">
<b>Subject</b>  <input type="text" name="subject" class="form-control" id="subject"  placeholder="Subject..." required="">
	</p> 
	<p style="width: 350px;">
<b>Description</b>  <textarea name="description" class="form-control" rows="6" cols="50" id="description"  placeholder="Description..." required="">
</textarea> 
	</p> 

			<p style="width: 350px;">
<button type="submit" name="submit" class="btn-primary btn">Submit</button>
			</p>
			</form>

		
	</div>
	 <div class="col-md-6"><div class="tv-product-banner-one">
	 <br><br><br><br>
            <div class="tv-product-image">
            <img src="images/enquiry.jpg" class="img-responsive" alt="image">
            </div>
            </div></div>
</div>
          </div>  
        
            
        
            
            </div>
            <!--End-->
            
            <!--footer-->
            <?php include('includes/footer.php');?>
            <!--End-->
            <div id="back-to-top"><a class="back-to-top" href="#"><i class="fa fa-angle-up"></i>TOP</a></div>
            </div>
            </div>
            </body>
            </html>
            