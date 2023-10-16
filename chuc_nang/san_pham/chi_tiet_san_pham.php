<style>
	.thongso{
		border-collapse: collapse;
		width: 800px;
	}

	.thongso tr{

		border: 1px solid #ccc;
	}
	.thongso td{
		padding: 5px 12px;
		font-size: 19px;
		border: 1px solid #ccc;
	}
</style>

<?php 
	$id=$_GET['id'];
	$tv="select * from sanpham where id='$id'";
	$tv_1=mysqli_query($connect,$tv);
	$tv_2=mysqli_fetch_array($tv_1);
	$link_anh="hinh_anh/san_pham/".$tv_2['link_anh'];
	echo "<table>";
		echo "<tr>";
			echo "<td width='250px' align='center' >";
				echo "<img src='$link_anh' width='150px' >";
			echo "</td>";
			echo "<td valign='top' >";
				echo "<a href='#'>";
					echo $tv_2['tenSP'];
				echo "</a>";
				echo "<br>";
				echo "<br>";
				$gia=$tv_2['gia'];
				$gia=number_format($gia,0,",",".");
				echo $gia;
				echo "<br>";
				echo "<br>";
				echo "<form>";
					echo "<input type='hidden' name='id' value='".$_GET['id']."' > ";
					echo "<input type='text' name='so_luong' value='1' style='width:50px' > ";
					echo "<input type='submit' value='Thêm vào giỏ' style='margin-left:15px' > ";
				echo "</form>"; 
			echo "</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td colspan='2' >";
				echo "<br>";
				echo "<br>";
				echo '<h1>Thông số kĩ thuật</h1>';
				echo "<table class='thongso'>";
				foreach ($tv_2 as $key => $value) {
					if (!empty($value) && $key > 26) { 
						if (!in_array($key, ['id', 'maLSP', 'maDM', 'link_anh'])){
							if(in_array($key, ['gia']))
								$value = $gia;
							echo "<tr><td><h4>$key</h4></td><td>$value</td></tr>";
						}
							
					}
				}
				echo '</table>';
			echo "</td>";
		echo "</tr>";
	echo "</table>";
?>