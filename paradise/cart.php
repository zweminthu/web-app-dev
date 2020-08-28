<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(($_GET['delid'])!=null)
{
    $cartID=intval($_GET['delid']);
    $sql="DELETE FROM cart WHERE cart.CartId=:cartID";
    $query = $dbp->prepare($sql);
    $query->bindParam(':cartID',$cartID,PDO::PARAM_STR);
    $query->execute();
    $msg="One item is removed.";
}
$ttlAmt=0;
     if(isset($_POST['CreateOrder']))
     {
         $email=$_SESSION['login'];
         $sql0 = "SELECT * FROM user where Email=:email";
         $query0 = $dbp->prepare($sql0);
         $query0->bindPARAM(':email',$email,PDO::PARAM_STR);
         $query0->execute();
         $results0=$query0->fetchAll(PDO::FETCH_OBJ);
         if($query0->rowCount() > 0)
         {
             foreach($results0 as $result0)
             {
                $usID=$result0->UserId;
             }
         }
        
         $ttl=$_POST['ttl'];
         $sql11="INSERT INTO `order`(`UserId`, `TotalAmount`) VALUES (:usID,:ttl)";
         $query11 = $dbp->prepare($sql11);
         $query11->bindParam(':usID',$usID,PDO::PARAM_STR);
         $query11->bindParam(':ttl',$ttl,PDO::PARAM_STR);
         $query11->execute();
         
         
          $sql12 = "SELECT * FROM cart where Email=:email";
          $query12 = $dbp->prepare($sql12);
          $query12->bindPARAM(':email',$email,PDO::PARAM_STR);
          $query12->execute();
          $results12=$query12->fetchAll(PDO::FETCH_OBJ);
          if($query12->rowCount() > 0)
          {
              foreach($results12 as $result12)
              {
                  $sql99="SELECT * FROM `order` ORDER BY OrderId DESC LIMIT 1";
                  $query99 = $dbp->prepare($sql99);
                  $query99->execute();
                  $results99=$query99->fetchAll(PDO::FETCH_OBJ);
                  if($query99->rowCount() > 0)
                  {
                      foreach($results99 as $result99)
                     {
                         
                         $orderID=$result99->OrderId;
                      }
                  }
                
                  $itemID=$result12->ItemId;
                  $qty=$result12->Qty;
                  $sql13 = "SELECT * FROM item where ItemId=:itemID";
                  $query13 = $dbp->prepare($sql13);
                  $query13->bindPARAM(':itemID',$itemID,PDO::PARAM_STR);
                  $query13->execute();
                  $results13=$query13->fetchAll(PDO::FETCH_OBJ);
                  if($query13->rowCount() > 0)
                  {
                      foreach($results13 as $result13)
                      {
                        
                         $amtt=$result13->Price*$qty;
                      }
                  }
                  $ioHand=$result13->OnHandItem;
                  $remaining=$ioHand-$qty;
                  $con="update item set OnhandItem=:remq where ItemId=:itemID";
                  $chngpwd1 = $dbp->prepare($con);
                  $chngpwd1-> bindParam(':remq', $remaining, PDO::PARAM_STR);
                  $chngpwd1-> bindParam(':itemID', $itemID, PDO::PARAM_STR);
                  $chngpwd1->execute();
                 
                  $sql="INSERT INTO orderdetail(OrderId, ItemId,Qty,TotalPrice) VALUES(:orderID,:itemID,:qty,:amtt)";
                  $query = $dbp->prepare($sql);
                  $query->bindParam(':orderID',$orderID,PDO::PARAM_STR);
                  $query->bindParam(':itemID',$itemID,PDO::PARAM_STR);
                  $query->bindParam(':qty',$qty,PDO::PARAM_STR);
                  $query->bindParam(':amtt',$amtt,PDO::PARAM_STR);
                  $query->execute();
             }
              $lastInsertId = $dbp->lastInsertId();
              if($lastInsertId)
              {
                  echo "<script>alert('Purchase Made Successfully.');</script>";
              }
              else
              {
                  echo "<script>alert('An Error has occured.');</script>";
              }
          }
           $sqldel="DELETE FROM cart WHERE cart.Email=:email";
           $querydel = $dbp->prepare($sqldel);
           $querydel->bindParam(':email',$email,PDO::PARAM_STR);
           $querydel->execute();
     }
     if(($_GET['empty'])!=null)
     {
         $uname=$_SESSION['login'];
         $sql0 = "SELECT * FROM user where Email=:email";
         $query0 = $dbp->prepare($sql0);
         $query0->bindPARAM(':email',$uname,PDO::PARAM_STR);
         $query0->execute();
         $results0=$query0->fetchAll(PDO::FETCH_OBJ);
         if($query0->rowCount() > 0)
         {
             foreach($results0 as $result0)
             {
                 $usID=$result0->UserId;
             }
         }
         $sqldel="DELETE FROM cart WHERE cart.UserId=:userid";
         $querydel = $dbp->prepare($sqldel);
         $querydel->bindParam(':userid',$usID,PDO::PARAM_STR);
         $querydel->execute();
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
		
		<div id="content" class="col-sm-12">
                                <h1>
                               <b> Shopping Cart</b>
                                </h1>
                                <form method="post">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <td class="text-center">Image</td>
                                                    <td class="text-left">ItemName</td>
                                                    <td class="text-left">Brand</td>
                                                    <td class="text-left">Quantity</td>
                                                    <td class="text-right">Unit Price</td>
                                                    <td class="text-right">Total Price</td>
                                                </tr>
                                                
                                            </thead>
                                           
                                            <tbody>

<?php 
$umail=$_SESSION['login'];
$sql9= "SELECT * FROM cart where Email=:umail";
$query9 = $dbp->prepare($sql9);
$query9->bindPARAM(':umail',$umail,PDO::PARAM_STR);
$query9->execute();
$results9=$query9->fetchAll(PDO::FETCH_OBJ);
if($query9->rowCount() > 0)
{
    foreach($results9 as $result9)
    {
 

?>
                                                <tr>
                                                <?php 
                                                $iid=$result9->ItemId;
                                                $sqlimage="SELECT * FROM item where ItemId=:iid";
                                                $queryimage = $dbp->prepare($sqlimage);
                                                $queryimage->bindPARAM(':iid',$iid,PDO::PARAM_STR);
                                                $queryimage->execute();
                                                $resultsimage=$queryimage->fetchAll(PDO::FETCH_OBJ);
                                                if($queryimage->rowCount() > 0)
                                                {
                                                    foreach($resultsimage as $resultimage)
                                                    {
                                                        $image=$resultimage->Img;
                                                    }
                                                }
                                                ?>
                                                    <td class="text-center">
                                                        <img src="admin/itemimages/<?php echo htmlentities($image);?>" width="110px" height="110px"  class="img-responsive" alt=""></td>
                                                    <td class="text-left"><?php echo htmlentities($result9->ItemName);?>              
                                                    </td>
                                                    <td class="text-left"><?php echo htmlentities($resultimage->BrandName);?></td>
                                                    <td class="text-left">
                                                        <div class="input-group btn-block" style="max-width: 200px;">
                                                            <input name="qty" value="<?php echo htmlentities($result9->Qty);?>" size="1" class="form-control" type="text">
                                                            <span class="input-group-btn">
                                                                
                                                              
                                                            <a href="cart.php?delid=<?php echo htmlentities($result9->CartId);?>"> <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Remove" name="remove"><i class="fa fa-times-circle"></i></button>
                                                            </a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">$<?php echo htmlentities($resultimage->Price);?></td>
                                                    <?php 
                                                    $amt=$result9->Qty*$resultimage->Price;
                                                    $ttlAmt+=$amt;
                                                    ?>
                                                    <td class="text-right">$<?php echo htmlentities($amt);?></td>
                                                </tr>
                                                
                                <?php }} ?>
                                            </tbody>

                                        </table>
                                    </div>
                                
                                <br>
                                <div class="row">
                                    <div class="col-sm-4 col-sm-offset-8">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="text-right"><strong>Total Amount: $</strong></td>
                                                    <td class="text-right">
                                                    <input type="text" name="ttl" value="<?php echo htmlentities($ttlAmt)?>">
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                    </div>
                                </div>
                                
                                <div class="buttons clearfix">
                                    <div class="pull-left"><a href="item.php" class="btn btn-default">Continue Shopping</a></div>
                                    <div class="pull-right"><button type="submit" name="CreateOrder" class="btn btn-primary">Place Order</button></div>
                                </div>
                            </div>
	</div>
</div>
</form>
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

 <?php ?>