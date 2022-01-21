<!--Header start -->

<link rel="stylesheet" type="text/css" href="style2.css">
<div class="h"> Foodfair </div>
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


<div class="content">
	<br><br>
	<?php include  "connect.php"; ?>
	<table border=1 cellpadding="6" cellspacing="8">
		<tr>
			 <th colspan="8">PARCEL CLIENTS</th>
		</tr>
		<tr>
			<th>Product ID</th>
			<th>User ID</th>
			<th>Customer Name</th>
			<th>Mobile</th>
			<th>Email</th>
			<th>Address</th>
			<th>View Product</th>
			<th>Delete</th>
		</tr>
		<?php
		$s = mysqli_query($con,"select * from checkout");
		while($r = mysqli_fetch_array($s))
		{
		?>
		<tr>
			<td><?php echo $r['p_id']; ?></td>
			<td><?php echo $r['u_id']; ?></td>
			<td><?php echo $r['name']; ?></td>
			<td><?php echo $r['mobile']; ?></td>
			<td><?php echo $r['email']; ?></td>
			<td><?php echo $r['location']; ?></td>
			<td><a href="viewcart.php?pid=<?php echo $r['p_id']; ?>&uid=<?php echo $r['u_id']; ?>">View Product</a></td>
			<td><a href="">Delete</a></td>
		<?php
		}
		?>
	</table>
	 

</div>

<!-- Footer Start -->

<br><br>
<div class="footer"> Design & Developed By: FoodFair.com </div>

<!-- Footer end -->