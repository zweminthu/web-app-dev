<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['addToCart']))
{
    echo $itemID=$_GET['idid'];
    $sqlIN="SELECT * FROM item where ItemId=:itemID";
    $queryIN = $dbp->prepare($sqlIN);
    $queryIN->bindParam(':itemID',$itemID,PDO::PARAM_STR);
    $queryIN->execute();
    $resultsIN=$queryIN->fetchAll(PDO::FETCH_OBJ);
    if($queryIN->rowCount() > 0)
    {
        foreach($resultsIN as $resultIN)
        {	
            echo $itemName=$resultIN->ItemName;    
        }
    }
    echo $qty=$_POST['quantity'];
    echo $userEmail=$_SESSION['login'];
    
    $sql="INSERT INTO  cart(ItemName,Qty,ItemId,Email) VALUES(:itemName,:qty,:itemID,:userEmail)";
    $query = $dbp->prepare($sql);
    $query->bindParam(':itemName',$itemName,PDO::PARAM_STR);
    $query->bindParam(':qty',$qty,PDO::PARAM_STR);
    $query->bindParam(':itemID',$itemID,PDO::PARAM_STR);
    $query->bindParam(':userEmail',$userEmail,PDO::PARAM_STR);    
    $query->execute();
   
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
	 <div class="tv-box-head">
<h2 class="box-heading">Item Details</h2>
</div>
                                   
<div class="row">

<?php
$Iid=intval($_GET['idid']);
$sql = "SELECT * from item WHERE ItemId=:iid";
$query = $dbp->prepare($sql);
$query -> bindParam(':iid', $Iid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>	 

<form name="item" method="post">
<div class="col-sm-6"> 
                                        <ul class="thumbnails">
                                            <li><a class="thumbnail"><img src="admin/itemimages/<?php echo htmlentities($result->Img);?>" class="img-responsive" alt=""></a></li>
                                             

                                        </ul>
                                        
                                    </div>
<div class="col-sm-6 tv-single-product-right">
                                        <h2 class="product-title"><?php echo htmlentities($result->ItemName);?></h2>
                                       
                                        <div class="tv-value-info-box">
                                            <ul class="list-unstyled">
                                                <li><div class="menufacture">Brands:</div><?php echo htmlentities($result->BrandName);?></li>
                                               
                                                <li><div class="menufacture">Availability:</div> In Stock</li>
                                            </ul>
                                        </div>
                                        <div class="tv-value-box">
                                            <ul class="list-unstyled">
                                              
                                                <li>
                                                     <h2><b>US$</b> <?php echo htmlentities($result->Price);?></h2>
                                                </li>
                                              
                                            </ul>
                                        </div>
                                        <div id="product"> <hr>
                                            <div class="tv-action form-group">
                                                <label class="control-label"><b>Qty</b></label>
                                                <div class="quantity-box">
                                                 
     											 <input type="number" name="quantity" min="1" max="<?php echo htmlentities($result->OnHandItem);?>">
      											
                                                </div>

                                                <button type="submit" class="button button-cart" id="button-cart" name="addToCart" data-loading-text="Loading...">Add to Cart</button>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="alert alert-info"><i class="fa fa-info-circle"></i> This product has a maximum quantity of <?php echo htmlentities($result->OnHandItem);?> in stock. </div>
                                        </div>
                                    </div>

                                    
		
			
</form>

<?php }} ?>
</div>
</div>
</div>
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
            