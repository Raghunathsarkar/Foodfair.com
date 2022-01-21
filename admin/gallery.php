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
	
	.del{
		color: red;
		text-decoration: none;
	}
	.del:hover{
		color: blue;
		text-decoration: none;
		text-shadow: 2px 3px 2px #FFFFFF;
	}
	.btn{
		color: white;
		background-color: black;
		padding: 10px;
	}


</style>
<div class="content">
	
	<form action="" method="post" enctype="multipart/form-data">
	<table border=0 width="100%" cellspacing="5" cellpadding="5" style="box-shadow: 5px 4px 10px 2px;">

		<tr>
			<th colspan="2">Upload Your Image Here &nbsp;&nbsp;&nbsp;&nbsp; <a href="vgallery.php">View Gallery</a></th>
		</tr>
		<tr>
			<th>&nbsp;</th>
		</tr>
		<tr>
			<td align="right" width="50%">Choose Image Here</td><td><input type="file" name="img" value=""></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" class="btn" name="sb" value="    Upload Now    "></td>
		</td>
		<tr>
			<th>&nbsp;</th>
		</tr>

	

	</table>
	</form>
	<?php
	if(isset($_POST['sb']))
	{
		
		$i = "img/".$_FILES['img']['name'];
		move_uploaded_file($_FILES['img']['tmp_name'], $i);//move file inside folder

		
		include "connect.php";
		mysqli_query($con,"insert into gallery(image)values('$i')") or die(mysqli_error($con));
		echo "<div style='padding:15px; color:red; background-color:black; font-size:1.2em; border-radius:10px;'>Data Uploaded SuccessFully....</div>";
	}
	?>
	<br><br>	
</div>


<!-- Footer Start -->

<br><br>
<div class="footer"> Design & Developed By: Avadh Tutor</div>

<!-- Footer end -->