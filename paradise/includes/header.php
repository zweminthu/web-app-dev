<?php if($_SESSION['login'])
{?>
<div class="top-header">
	<div id="tv-top-head">
	<div class="container">
	
		<div class="collapse navbar-collapse navbar-ex1-collapse">
		<div class=col-md-6>
<ul class="nav navbar-nav">
			<li class="dropdown"><a href="myprofile.php">My Profile</a></li>
			<li class="dropdown"><a href="change-password.php">Change Password</a></li>
				
			<li class="dropdown"><a href="order-history.php">My Order History</a></li>
			
		</ul>
		</div>
		<div class=col-md-6>
		<ul class="nav navbar-nav"> 
			<li class="dropdown">Welcome: <?php echo htmlentities($_SESSION['login']);?></li>				
			
			<li class="dropdown"><a href="signout.php"> Logout</a></li>
        </ul>
        </div>
		<div class="clearfix"></div>
	</div>
	</div>
	</div>
</div>
<?php } else {?>
<div class="header-layout">
<div id="tv-top-head">
<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="tv-login-related pull-right hidden-sm hidden-xs">
<ul class="list-inline tv-top-link-bar">


<li>  <a href="includes/signup.php"><i class="fa fa-user-plus"></i>Register</a></li>
<li>  <a href="includes/signin.php"><i class="fa fa-sign-in"></i>Login</a></li>
</ul>
</div>
<div class="tv-show-mobile hidden-lg hidden-md pull-right">
<div class="tv-mobile-user pull-left">
<div class="tv-menu-toggle">
<i class="fa fa-user"></i>
</div>
<div class="tv-inner-toggle">
<div class="login links">
<a href="includes/signup.php"><i class="fas fa-sign-in-alt"></i>Register</a>
<a href="includes/signin.php"><i class="fa fa-sign-in"></i>Login</a>

</div>
</div>
</div>
<div class="tv-mobile-access pull-left">
<div class="tv-menu-toggle">
<i class="fa fa-list"></i>
</div>
<div class="tv-inner-toggle">
<ul class="links pull-left">

<li><a class="shoppingcart" href="cart.php"><i class="fa fa-shopping-bag"></i>Shopping Cart</a></li>
</ul>
</div>
</div>
</div>
<div class="tv-lang-curr-related pull-left">
<div class="tv-inner-toggle">
<ul class="links pull-left">
<li><a href="admin/admin-signin.php"><i class="fa fa-user-circle-o"></i>Admin Login</a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
<?php } ?>
<div id="tv-main-header">
<div class="container">
<div class="row">
<div class="logo inner col-lg-3 col-md-3 col-sm-4 col-xs-12">
<div class="tv-logo">
<!--<a href="index.html"><img src="images/logo.png" alt="logo"></a>-->
<a href="home.php"><span>Paradise</span></a>
</div>
</div>
<form action="item.php" method="post">
<div class="col-sm-4 col-xs-12 header-search">
<div class="search" style="display: none"><i class="fa fa-search"></i></div>
<div id="search" class="input-group searchtoggle">

<div id="searchbox" style="display: block;" class="">
											 
                                            <input name="searchtxt" value="" placeholder="Search Items Here..." class="form-control input-lg search-autocomplete ui-autocomplete-input" autocomplete="off" type="text">
                                             <br>
<!--                                              <input name="searchcat" value="" placeholder="Search Category Here..." class="form-control input-lg search-autocomplete ui-autocomplete-input" autocomplete="off" type="text"> -->
                                       

                                        </div>
                                        
                                        <a href="item.php?catID=<?php echo htmlentities($string)?>"> <button type="submit" class="btn btn-default btn-lg" name="search"><span class="search">Search</span></button></a>


</div>
</div></form>
<div class="col-sm-3 hidden-xs">
<div class="tv-header-right">
<div class="headertopright">

<div class="text2">

</div>

</div>
</div>
</div>

</div>
</div>
</div>
<div id="tv-header-nav" class="hidden-xs hidden-sm">
<div class="container">
<div class="row">
<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
<div id="tv-main-nav" class="hidden-sm hidden-xs">
<nav id="tv-mega-menu" class="navbar">
<div class="navbar-header">
<button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
</div>
<div class="collapse navbar-collapse navbar-ex1-collapse">
<ul class="nav navbar-nav">
<li class="dropdown"><a href="home.php">Home</a></li>
<li class="dropdown"><a href="item.php">Item</a>

</li>
<li><a href="aboutus.php">About</a></li>
<li><a href="contactus.php">Contact</a></li>
<li><a href="enquiry.php">Enquiry</a></li>
</ul>
</div>
</nav>
</div>
</div>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
<div class="tv-bg-overlay"></div>
<div id="tv-cart-top" class="pull-right cart-right">
<div class="tv-cart-top">
<div id="cart" class="pull-right clearfix">
<a href="cart.php" class="btn bg-black btn-block">
<div class="cart-inner tv-media-body">


<p class="text-center view-cart"><i class="fa fa-shopping-basket fa-2x"></i>Shopping Cart
</p>


</div>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

