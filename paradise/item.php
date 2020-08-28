<?php
session_start();
error_reporting(0);
include('includes/config.php');


if(isset($_POST['search']))
{
    $txtsearch=$_POST['searchtxt'];
//     $catsearch=$_POST['searchcat'];
    
    
//     $query=$dbp -> prepare($sql);
//     $query-> bindParam(':searchtxt', $txt, PDO::PARAM_STR);
//     $query-> execute();
//     if(!empty($txtsearch)){
//         echo "something to search";
//         $product_array = $db_handle->runQuery("SELECT * FROM tblproduct where name LIKE '%" . $txtsearch."%'");
//     }
//     else {
//         echo "show all";
//         $product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
//     }

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
<h2 class="box-heading">Item</h2>
</div>
                                   
<div class="row-items">

<?php
// if($txtsearch!=null || $catsearch=null)
// {
//     $sql="select * from item where ItemName LIKE '%" . $txtsearch."%'";
// }
// else if($catsearch!=null||$txtsearch=null)
// {   
//     $sql="select * from item, category where ItemName LIKE '%" . $txtsearch."%' and CatName LIKE '%" . $catsearch."%'";
// //     $sql="select * from category where CatName LIKE '%" . $catsearch."%'";
// }
if($txtsearch!=null)
 {
     $sql="select * from item where ItemName LIKE '%" . $txtsearch."%'";
 }
// if($catsearch!=null && $txtsearch!=null)
// {
//     $sql="select * from item, category where ItemName LIKE '%" . $txtsearch."%' and CatName LIKE '%" . $catsearch."%'";
// }
else
{
    $sql = "SELECT * from item order by rand()";
}

$query = $dbp->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>	 



<div class="product-layout grid-style product-grid col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="product-thumb transition">
                                            <div class="item">
                                                <div class="item-inner">
                                                    <div class="image images-container">
                                                        <a href="item-details.php?idid=<?php echo htmlentities($result->ItemId);?>" class="product-image">
                                                            <img src="admin/itemimages/<?php echo htmlentities($result->Img);?>" class="img-responsive" alt="">
                                                        </a>

                                                    </div>
                                                    <div class="caption">
                                                        <div class="button-group tv-action-btn">
                                                            <a href="item-details.php?idid=<?php echo htmlentities($result->ItemId);?>">View</a>
                                                           
                                                        </div>
                                                        <h4 class="product-name"><a href=""><?php echo htmlentities($result->ItemName);?></a></h4>
                                                        
                                                        <div class="price-box">
                                                            <label>Price:</label>
                                                           <h5><b>US$</b> <?php echo htmlentities($result->Price);?></h5>
                                                           
                                                        </div>
                                                    </div> <!-- caption -->
													
                                                </div>
                                                
                                            </div><!-- product-thumb -->
                                            
                                        </div><!-- product-layout -->
                                        
                                    </div>
                                    
		
			


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
            