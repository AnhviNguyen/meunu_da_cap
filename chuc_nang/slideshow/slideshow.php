<style type="text/css" >
	div.slideshow img {
		width:900px;
		height:500px;
		
	}
</style>
<center>
<div class="slideshow" id="slideshow" >
	<?php 
		$tv="select hinh from banner order by id desc";
		$tv_1=mysqli_query($connect,$tv);
		while($tv_2=mysqli_fetch_array($tv_1))
		{
			$link_hinh="hinh_anh/banner/".$tv_2['hinh'];
			echo "<img src='".$link_hinh."'>";
		}
	?>
</div>
</center>
<script type="text/javascript" >

	var i_img=0;
	var div_slideshow=document.getElementById("slideshow");
	var img_slideshow=div_slideshow.getElementsByTagName("img");
	for(var i=0;i<img_slideshow.length;i++)
	{
		img_slideshow[i].style.display="none";
	}
	img_slideshow[0].style.display="block";
	
	setInterval(function(){
		img_slideshow[i_img].style.display="none";
		i_img=i_img+1;
		if(i_img>=img_slideshow.length){i_img=0;}
		img_slideshow[i_img].style.display="block";		
	},5000);
</script>