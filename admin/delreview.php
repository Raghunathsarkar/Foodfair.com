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
		mysqli_query($con,"delete from review where id='$a'");

	?>
		<div style="color: red; font-size: 1.4em; font-weight: bold; border-radius:10px; background-color: yellow; padding: 10px; text-align: center;">Data Deleted SuccessFully</div>
		<br><br>
	<table border=1 width="100%" cellspacing="3" cellpadding="5" style="box-shadow: 5px 4px 10px 2px;">

		<tr>
			<th>ID</th><th>NAME</th><th>REVIEW</th><th>COMMENTS</th><th>REMOVE</th>
		</tr>
		<?php 
			$s = mysqli_query($con,"select * from review");
			while($r = mysqli_fetch_array($s))
			{
			?>
				<tr align=center>
					<td><?php echo $r['id']; ?></td>
					<td><?php echo $r['name']; ?></td>
					<td><?php echo $r['review']; ?></td>
					<td><?php echo $r['description']; ?></td>
					<td><a href="delreview.php?a=<?php echo $r['id']; ?>" class="del">DELETE</a></td>
				</tr>	
		<?php	
			}
		?>


	</table>	

</div>

<!-- Footer Start -->

<br><br>
<div class="footer"> Design & Developed By: Avadh Tutor</div>

<!-- Footer end -->