<br>
<p class="spm_title">Sản phẩm của chúng tôi </p>
<br>
<?php 
	
	$tv="select id,tenSP,gia,link_anh,maDM from sanpham  order by id desc limit 1,6";
	$tv_1=mysqli_query($connect,$tv);
	echo "<table>";
	while($tv_2=mysqli_fetch_array($tv_1))
	{
		echo "<tr>";
			for($i=1;$i<=3;$i++)
			{
				echo "<td class='sp' align='center' width='200px'  valign='top' >";
					if($tv_2!=false)
					{
						$link_anh="hinh_anh/san_pham/".$tv_2['link_anh'];
						$link_chi_tiet="?thamso=chi_tiet_san_pham&id=".$tv_2['id'];
						$gia=$tv_2['gia'];
						$gia=number_format($gia,0,",",".");
						echo "<a href='$link_chi_tiet' >";
							echo "<img src='$link_anh' width='190px' ";
						echo "</a>";
						echo "<br>";
						echo "<br>";
						echo "<a href='$link_chi_tiet' >";
							echo $tv_2['tenSP'];
						echo "</a>";
						echo "<div style='margin-top:5px' >";						
						echo $gia;
						echo "</div>";
						echo "<br>";
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
	echo "</table>";
?>