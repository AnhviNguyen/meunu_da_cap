 
<?php
    include("ket_noi.php");
?> 
<html>
	<head>
		<meta charset="UTF-8">
		<title>Technology Shop</title>
		<link rel="stylesheet" type="text/css"  href="giao_dien/kieu.css">

		<style>
			 a{
				text-decoration: none;
				color: black;
				font-size: 20px;
			}
		</style>

	</head>
	<body>
		<center>
			<table width="1300px">
				<tr>
					<td colspan="2" ><p class="logo">Nguyễn Ngọc <label> Ánh Vi</label></p></td>
				</tr>
				<tr>
					<td colspan="2"><?php include("chuc_nang/banner/banner.php"); ?></td>
				</tr>
				<tr>
					<td colspan="2" height="50px" >
						<?php
							include("chuc_nang/menu_ngang/menu_ngang.php");
						?> 
					</td>
				</tr>
				<tr>
					<td class="cot1" valign="top" >
						<p class="danhmuc_title">Danh mục sản phẩm</p>
						<?php 
							include("chuc_nang/menu_doc/menu_doc.php");
							include("chuc_nang/san_pham/moi.php"); 
						?>					
					</td>
					<td width="900px" valign="top" >
						<?php 
							include("chuc_nang/dieu_huong.php");
						?>
					</td>
				</tr>
			</table>
		</center>
	</body>
</html>