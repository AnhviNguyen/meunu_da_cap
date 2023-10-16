<style>
	.my-menu{
		list-style-type: none;
		width: 100%;
	}

	.my-menu li{
		width: 100%;
		padding: 15px 18px;
		font-size: 20px;
		color: gray;
		background-color: rgb(245, 245, 245);
    	transition: transform 1s; 
		position: relative;
		border-bottom: lightgray 1px solid;
	}

	.my-menu li:hover{
		border-left: rgb(201, 20, 126) 1px solid;
		border-right: rgb(201, 20, 126) 1px solid;
		font-weight: bolder;	
	}

	.my-menu li a{
		color: gray;
	}

	.my-menu li:hover a:hover{
		color: rgb(201, 20, 126);
		width: 100%;
	}

	 .my-menu ul {
    	display: none;
		list-style-type: none;
    	transition: transform 1s;
		position: absolute;
		left: 87%;
		top: 0;
		width: 100%;
	}

 	.my-menu li:hover > ul {
    	display: block;
		list-style-type: none;
		transform: translateX(10px);
	}

	.my-menu li:hover > ul:hover{
    	color: rgb(201, 20, 126);
	}
</style>

<?php 

	$tv="select * from danhmuc order by id";
    $tv_1=mysqli_query($connect,$tv);


	$danhmuc = array();


	while ($row = $tv_1->fetch_assoc()) {
		$danhmuc[$row['id']] = $row['tenDM'];
	}


	echo "<ul class='my-menu'>";
	foreach ($danhmuc as $maDM => $tenDM) {
		$link="?thamso=xuat_san_pham&id=".$maDM;
		echo '<li>' . "<a href='$link'>" . $tenDM. " </a>";
		echo '<ul class="submenu">';

		$query = "SELECT ID, ten,moTa FROM loaisp WHERE maDM = $maDM";
		$result = $connect->query($query);

		while ($row = $result->fetch_assoc()) {
			$maLoaiSP = $row['ID'];
			$tenLoaiSP = $row['ten'];
			$moTaSP = $row['moTa'];
			

			$linkL="?thamso=xuat_san_pham_theo_loai&id=". $maLoaiSP;

			if (!empty($moTaSP)){
				echo '<li>' . "<a href='$linkL'>" . $moTaSP . " </a>";
			}else {
				echo '<li>' . "<a href='$linkL'>" . $tenLoaiSP . " </a>";
			}

		
			echo '<ul class="submenu">';
			// Truy vấn sản phẩm (sanpham) dựa trên maLSP và maDM
			$query = "SELECT id, tensp FROM sanpham WHERE maLSP = $maLoaiSP AND maDM = $maDM";
			$resultSanPham = $connect->query($query);

			while ($rowSanPham = $resultSanPham->fetch_assoc()) {
				$tenSanPham = $rowSanPham['tensp'];
				$idSanPhan = $rowSanPham['id'];
				$link="?thamso=chi_tiet_san_pham&id=".$rowSanPham['id'];
				echo '<li>' . "<a href='$link'>" .$rowSanPham['tensp']. '</a>' . '</li>';
			}
			echo '</ul>';
			echo '</li>';
		}
		echo '</ul>';
		echo '</li>';
	}
echo '</ul>';

?>
