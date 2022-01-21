<?php session_start(); ?> 

 <!DOCTYPE html>
 <html lang="en"> <!-- Basic -->
 <head>
	 <meta charset="utf-8">
	 <meta http-equiv="X-UA-Compatible" content="IE=edge">   
	
	 <!-- Mobile Metas -->
	 <meta name="viewport" content="width=device-width, initial-scale=1">
  
	  <!-- Site Metas -->
	 <title>FoodFair</title>  
	 <meta name="keywords" content="">
	 <meta name="description" content="">
	 <meta name="author" content="">
 
	 <!-- Site Icons -->
	 <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	 <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
 
	 <!-- Bootstrap CSS -->
	 <link rel="stylesheet" href="css/bootstrap.min.css">    
	 <!-- Site CSS -->
	 <link rel="stylesheet" href="css/style.css">    
	 <!-- Responsive CSS -->
	 <link rel="stylesheet" href="css/responsive.css">
	 <!-- Custom CSS -->
	 <link rel="stylesheet" href="css/custom.css">
 
	 <!--[if lt IE 9]>
	   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	   <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	 <![endif]-->
 
 </head>
 
 <body>
	 <!-- Start header -->
	 <header class="top-navbar">
		 <nav class="navbar navbar-expand-lg navbar-light bg-light">
			 <div class="container">
				 <a class="navbar-brand" href="index.html">
					 <img src="images/logo.png" alt="" />
				 </a>
				 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				   <span class="navbar-toggler-icon"></span>
				 </button>
				 <div>
 
					 <?php
					 if(isset($_SESSION['uid']))
					 {
					 ?>
					 HI <?php echo $_SESSION['uid']; ?> &nbsp;&nbsp; <a href="cart.php">Cart</a>&nbsp;&nbsp; <a href="logout.php">LogOut</a>
					 <?php	
					 }
					 else
					 {	
					 ?>
					 <a href="registration.php">New User</a>&nbsp;&nbsp;&nbsp;<a href="login.php">Login</a>
					 <?php
					 }
					 ?>	
 
					   </div>
				 <div class="collapse navbar-collapse" id="navbars-rs-food">
					 <ul class="navbar-nav ml-auto">
						 <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
						 <li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
						 <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
						 <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
						 <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
						 <li class="nav-item"><a class="nav-link" href="review.php">Review</a></li>
 
						 <!--<li class="nav-item dropdown">
							 <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Pages</a>
							 <div class="dropdown-menu" aria-labelledby="dropdown-a">
								 <a class="dropdown-item" href="reservation.html">Reservation</a>
								 <a class="dropdown-item" href="stuff.html">Stuff</a>
								 <a class="dropdown-item" href="gallery.html">Gallery</a>
							 </div>
						 </li> -->
						 <!--<li class="nav-item dropdown">
							 <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Blog</a>
							 <div class="dropdown-menu" aria-labelledby="dropdown-a">
								 <a class="dropdown-item" href="blog.html">blog</a>
								 <a class="dropdown-item" href="blog-details.html">blog Single</a>
							 </div>
						 </li> -->
						 <!--<li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li> -->
					 </ul>
				 </div>
			 </div>
		 </nav>
	 </header>
	 <!-- End header -->
  
<body>
	
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>ADD CART </h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<!-- Start Contact -->
	
	<div class="contact-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">

	<form action="" method="post">
		
		<table align="center" border="1" cellspacing="14" cellpadding="12" style="color: black" >

			    <tr align="center">

			    	<td style="color: red">  Product ID  </td>
			    	<td> <input type="hidden" name="pid"  value="<?php echo $_GET['pid']; ?>"><?php echo $_GET['pid']; ?></td>
			    	
			    </tr>

			    <tr align="center">
			    	<td style="color: red">   Your USERID </td>
			        <td> <input type="hidden" name="uid" value="<?php echo $_GET['uid']; ?>"><?php echo $_GET['uid']; ?></td>
			    </tr>
			    <tr align="center">
			    	<td style="color: red">   Price </td>
			        <td> <input type="hidden" name="price" value="<?php echo $_GET['price']; ?>"><?php echo $_GET['price']; ?></td>
			    </tr>
				    <tr align="center">
			    	<td style="color: red">   QTY</td>
			        <td> <input type="number" name="qty" value="" min=1 max=10 required></td>
			    </tr>

                <tr align="center">
                	<td colspan="4"> <input type="submit" name="sb" value="Add Cart Now"></td>
                </tr>
		</table>
	</form>
			<?php
			if(isset($_POST['sb']))
			{
				$pid = $_POST['pid'];
				$uid = $_POST['uid'];
				$price = $_POST['price'];
				$qty = $_POST['qty'];
				$total  = $price*$qty;

				include "connect.php";
				mysqli_query($con,"insert into addcart(p_id,u_id,price,qty,total ) values('$pid','$uid','$price','$qty','$total')") or die(mysqli_error($con));
				echo "<script>alert('Your data Is Add Inside Cart')</script>";

			}

			?>
					




				</div>
			</div>
		
		</div>
	</div>
	<!-- End Contact -->


		<!-- Start Footer -->
		<footer class="footer-area bg-f">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3>About Us</h3>
					<p> Food, in the end, in our own tradition, is something holy. It's not about nutrients and calories. It's about sharing. It's about honesty. It's about identity.</p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>UseFull Links</h3>
					<div class="subscribe_form">
						
						<a href="">Home</a><br>
						<a href="">Contact Us</a><br>
						<a href="">Food Menu</a><br>
						<a href="">Gallery</a><br>
						
						
					</div>
					<ul class="list-inline f-social">
						<li class="list-inline-item"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Contact information</h3>
					<p class="lead">Ajmer, Kolkata, Gujarat, Mumbai, Pin - 305023</p>
					<p class="lead"><a href="#">+91 987 5647 098</a></p>
					<p><a href="#"> foodfair@gmail.com

</a></p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Opening hours</h3>
					<p><span class="text-color">Monday: </span> 7:Am - 12PM</p>
					<p><span class="text-color">Tue-Wed :</span> 7:Am - 12PM</p>
					<p><span class="text-color">Thu-Fri :</span> 7:Am - 12PM</p>
					<p><span class="text-color">Sat-Sun :</span> 7:Am - 12PM</p>
				</div>
			</div>
		</div>
		
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="company-name"> &copy; 2021  Developed By : Foodfair.com
				       </p>
					</div>
				</div>
			</div>
		</div>
		
	</footer>
	<!-- End Footer -->
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

	<!-- ALL JS FILES -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
	<script src="js/jquery.superslides.min.js"></script>
	<script src="js/images-loded.min.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/baguetteBox.min.js"></script>
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>