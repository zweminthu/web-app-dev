<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
{
    $fname=$_POST['fname'];
    $email=$_POST['email'];
    $mobile=$_POST['mobileno'];
   
    $message=$_POST['message'];
    $sql="INSERT INTO  message(Mname,Email,MobilePh,Message) VALUES(:fname,:email,:mobile,:message)";
    $query = $dbp->prepare($sql);
    $query->bindParam(':fname',$fname,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
   
    $query->bindParam(':message',$message,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbp->lastInsertId();
    if($lastInsertId)
    {
        $msg="Message  Successfully submited";
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
	<div class=col-md-6>
		<h2 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;"><b>Send Us a Message</b></h2>
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
<b>Message</b>  <textarea name="message" class="form-control" rows="6" cols="50" id="description"  placeholder="Message..." required=""></textarea> 
	</p> 

			<p style="width: 350px;">
<button type="submit" name="submit" class="btn-primary btn">Submit</button>
			</p>
			</form>
			</div>
			<h2><b>Map</b></h2>
<div class="col-md-6"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15276.224859063372!2d96.1303147!3d16.8235671!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd6abf239773b3969!2sInfo+Myanmar+College!5e0!3m2!1smy!2smm!4v1545737732806" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
<h2><b>
Contact Paradise Home Appliance Today!
</b></h2>
<b>We work with all kinds of appliances, including refrigerators, microwave ovens, and more. Count on our more than 30 years of experience. Call us today.</b>
<h4><b>Mobile Ph: </b></h4>
<a href="tel:+959795528455" target="_self" style="color:grey"><b>795-528-455</b></a>

<h4><b>Email: </b></h4>
<a href="mailto:zweminthu8@gmail.com" target="_self" style="color:grey"><b>zweminthu8@gmail.com</b></a>

<h4><b>Business Hours: </b></h4>
<b>Monday to Sunday - 9:00 AM to 5:00 PM</b>
<h4><b>Contact Person: </b></h4>
<b>Zwe Min Thu</b>

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
            