<?php
session_start();
error_reporting(0);
include('includes/config.php');
 if(strlen($_SESSION['alogin'])==0)
     {
         header('location:admin-signin.php');
     }
 else{
?>
    <?php
include('includes/config.php');
if(isset($_POST['add']))
{
    $Iname=$_POST['itemname'];
    $Price=$_POST['price'];
    $ohqty=$_POST['ohi'];
    $Bname=$_POST['bname'];
    $Cname=$_POST['cname'];
    $Iimage=$_FILES["itemimage"]["name"];
    move_uploaded_file($_FILES["itemimage"]["tmp_name"],"itemimages/".$_FILES["itemimage"]["name"]);
    $sql="INSERT INTO  item(ItemName,Price,OnHandItem,BrandName,CatId,Img) VALUES(:itemname,:price,:ohi,:bname,:cname,:itemimage)";
    $query = $dbp->prepare($sql);
    $query->bindParam(':itemname',$Iname,PDO::PARAM_STR);
    $query->bindParam(':price',$Price,PDO::PARAM_STR);
    $query->bindParam(':ohi',$ohqty,PDO::PARAM_STR);
    $query->bindParam(':bname',$Bname,PDO::PARAM_STR);
    $query->bindParam(':cname',$Cname,PDO::PARAM_STR);
    $query->bindParam(':itemimage',$Iimage,PDO::PARAM_STR);
  
    $query->execute();
    $lastInsertId = $dbp->lastInsertId();
    if($lastInsertId)
    {
        $_SESSION['msg']="Adding New Item Scuccessfully.";
        header('location:additem.php');
    }
    else
    {
        $_SESSION['msg']="Something went wrong. Please try again.";
        header('location:additem.php');
    }
}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Paradise | Admin Manage User</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="../css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<!-- tables -->
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<link rel="stylesheet" type="text/css" href="css/basictable.css" />
<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('#table').basictable();

      $('#table-breakpoint').basictable({
        breakpoint: 768
      });

      $('#table-swap-axis').basictable({
        swapAxis: true
      });

      $('#table-force-off').basictable({
        forceResponsive: false
      });

      $('#table-no-resize').basictable({
        noResize: true
      });

      $('#table-two-axis').basictable();

      $('#table-max-height').basictable({
        tableWrapper: true
      });
    });
</script>
<!-- //tables -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="../css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
</head> 
<body>
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
				<?php include('includes/header.php');?>
				<div class="clearfix"> </div>	
				</div>
				   	<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i><a href="item-management.php">Manage Item</a><i class="fa fa-angle-right"></i>Create Item </li>
            </ol>
		<!--grid-->
 	<div class="grid-form">
 
<!---->
  <div class="grid-form1">
  	       <h3>Create Item</h3>
  	        	  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" name="category" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Item Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="itemname" placeholder="Itemname..." required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Price</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="price" placeholder="Price..." required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">OnHandItem</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="ohi" placeholder="OnHandQty..." required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Brand</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="bname" placeholder="Brand..." required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Category</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="cname" placeholder="Category..." required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Item Image</label>
									<div class="col-sm-8">
										<input type="file" name="itemimage" id="itemimage" required>
									</div>
								</div>	

	




								<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<button type="submit" name="add" class="btn-primary btn">Add</button>

				<button type="reset" class="btn-inverse btn">Reset</button>
			</div>
		</div>	
						</form>					
					</div>
      
      <div class="panel-footer">
		
	 </div>
   
  </div>
 	</div>					

					</div>

			</div>
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">

</div>
<!--inner block end here-->
<!--copy rights start here-->
<?php include('includes/footer.php');?>
<!--COPY rights end here-->
</div>

  <!--//content-inner-->
		<!--/sidebar-menu-->
						<?php include('includes/sidebarmenu.php');?>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   

</body>
</html>
<?php } ?>

