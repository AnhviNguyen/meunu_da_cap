<?php 
	$so_du_lieu=15;
	$tv="select count(*) from sanpham";
	$tv_1=mysqli_query($connect,$tv);
	$tv_2=mysqli_fetch_array($tv_1);
	$so_trang=ceil($tv_2[0]/$so_du_lieu);
	
	if(!isset($_GET['trang'])){$vtbd=0;}else{$vtbd=($_GET['trang']-1)*$so_du_lieu;}
	
	$tv="select id,tenSP,gia,link_anh from sanpham order by id desc limit $vtbd,$so_du_lieu";
	$tv_1=mysqli_query($connect,$tv);
	echo "<table>";
	while($tv_2=mysqli_fetch_array($tv_1))
	{
		echo "<tr>";
			for($i=1;$i<=3;$i++)
			{
				echo "<td align='center' width='305px' valign='top' >";
					if($tv_2!=false)
					{
						$link_anh="hinh_anh/san_pham/".$tv_2['link_anh'];
						$link_chi_tiet="?thamso=chi_tiet_san_pham&id=".$tv_2['id'];
						$gia=$tv_2['gia'];
						$gia=number_format($gia,0,",",".");
						echo "<a href='$link_chi_tiet' >";
							echo "<img src='$link_anh' width='180px' >";
						echo "</a>"; echo "<br>";	echo "<br>";
						echo "<a href='$link_chi_tiet' >";
							echo $tv_2['tenSP'];
						echo "</a>";
						echo "<div style='margin-top:5px' >";						
						echo $gia;
						echo "</div>"; echo "<br>";
					}
					else 
					{
						echo "&nbsp;";
					}
				echo "</td>";
				if($i!=3)
				{
					$tv_2=mysqli_fetch_array($tv_1);
				}
			}
		echo "</tr>";
	}
	echo "<tr>";
		echo "<td colspan='3' align='center' >";
			echo "<div class='phan_trang' >";
				for($i=1;$i<=$so_trang;$i++)
				{
					$link="?thamso=xuat_san_pham_2&trang=".$i;
					echo "<a href='$link' >";
						echo $i;echo " ";
					echo "</a>";
				}
			echo "</div>";
		echo "</td>";
	echo "</tr>";
	echo "</table>";
?>