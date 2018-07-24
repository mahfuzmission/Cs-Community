<?php
	require_once("../../services/sessionHandler.php");
	require_once("../../services/encryption.php");
	require_once("../../services/form.php");
	require_once("../../data/DBconnect.php");
	
	startSession();
	$id = getSession("id") + 100000;
	$src = $_FILES['img']['tmp_name'];
    $dest = $_FILES['img']['name'];
	$date = date("YmdHms");
	$pathinfo = pathinfo("../view/images/"."//".$dest);
	$path = "../view/images/".$id."_".date("mdYHis").$pathinfo['basename'];
	$fileName = $id."_".date("mdYHis").$pathinfo['basename'];
	
	$rename = $pathinfo['dirname']."//".$fileName;
	$cond = "user_id = ".$id;
	$profile["pic"] = $fileName;
	updateTable("profiles",$profile, $cond);
    if(move_uploaded_file($src, $rename)){
		echo $fileName;
	}
	
?>