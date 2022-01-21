<!--Header start -->

<link rel="stylesheet" type="text/css" href="style2.css">
<div class="h">Foodfair</div>
<div class="mbg">
	<a href="after_login.php" class="menu">Parcel Clients</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="food.php" class="menu">Food Menu</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="gallery.php" class="menu">Gallery</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="review.php" class="menu">Reviews</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="food_cat.php" class="menu">Food Category</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="logout.php" class="menu" style="color: red;">Logout</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
</div>
<br><br>

<!--Header end -->


<?php include "connect.php"; ?>
<style type="text/css">
	tr{
		font-size: 1.2em;


	}
	tr:hover{
		background-color: black;
		color: white;
	

	}
	th{
		color: tomato;
		font-size: 1.3em;
	}
	.del{
		color: red;
		text-decoration: none;
	}
	.del:hover{
		color: blue;
		text-decoration: none;
		text-shadow: 2px 3px 2px #FFFFFF;
	}


</style>
<div class="content">
	<?php
		$a = $_GET['a'];
		mysqli_query($con,"delete from menu where id='$a'");
		header("location:view_food.php");
	?>
		
</div>

<!-- Footer Start -->

<br><br>
<div class="footer"> Design & Developed By: Avadh Tutor</div>

<!-- Footer end -->