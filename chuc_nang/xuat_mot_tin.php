<?php 
	$id=$_GET['id'];
	$tv="select * from menu_ngang where id='$id'";
	$tv_1=mysqli_query($connect,$tv);
	$tv_2=mysqli_fetch_array($tv_1);
	echo "<h1 class='title-content'>";
		echo $tv_2['ten'];
	echo "</h1>";
	echo $tv_2['noi_dung'];
?>