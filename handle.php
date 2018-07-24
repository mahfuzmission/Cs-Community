<?php
    $src = $_FILES['img']['tmp_name'];
    $dest = $_FILES['img']['name'];
	$date = date("YmdHms");
	mkdir($date,0777,true);
	$pathinfo = pathinfo($date."//".$dest);
	$path = $date."/".date("mdYHis").$pathinfo['basename'];
	
	
	$rename = $pathinfo['dirname']."//".date("mdYHis").$pathinfo['basename'];
	
    if(move_uploaded_file($src, $rename)){
		echo $path;
	}
?>
