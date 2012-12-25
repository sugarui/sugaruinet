<?php
	$image_urls = explode("@",$row_special['image_url']); //Array (이미지파일명, 이미지파일명)
	$i=0;
	while ($i < count($image_urls)){ 
		echo "<img src=\"./portfolio/"; //경로
		echo $image_urls[$i];
		echo "\"><br>";
		$i++;
	}
?>