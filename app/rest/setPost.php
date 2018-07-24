<?php
	
	require_once("../../services/sessionHandler.php");
	require_once("../../services/encryption.php");
	require_once("../../services/form.php");
	require_once("../../data/DBconnect.php");
	
	startSession();
	
	
	$posts["post_id"]          = "NULL";
	$posts["post_text"]        = getPostData("post");
	$posts["author_user_id"]   = getSession("id")+100000;
	$posts["time"]             = date("Y-m-d-H:m:s");
	$posts["category"]         = getPostData("post-category");
	$posts["post_text"]        = trim($posts["post_text"], "</br>");
	$res = ""; 
	foreach( $posts as $key => $value ){
		if( $value == false ){
			$posts[$key] = "NULL";
		}
	}
	
	$res = insert("post", $posts);
	
	echo $res;
?>