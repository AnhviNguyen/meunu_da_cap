<br > <p class="spm_title">Sản phẩm mới</p><br>
<center>
	<?php 
		$tv="select id,tenSP,link_anh from sanpham order by id asc limit 0,3";
		$tv_1=mysqli_query($connect,$tv);
		while($tv_2=mysqli_fetch_array($tv_1))
		{
			$link_anh="hinh_anh/san_pham/".$tv_2['link_anh'];
			$link_chi_tiet="?thamso=chi_tiet_san_pham&id=".$tv_2['id'];
			echo "<a href='$link_chi_tiet' >";
				echo "<img src='$link_anh' width='130px' >";
			echo "</a>";
			echo "<br><br>";
			echo "<a href='$link_chi_tiet' >" . $tv_2['tenSP']. '</a>';
			echo "<br>";
			echo "<br>";
		}
	?>
</center>
