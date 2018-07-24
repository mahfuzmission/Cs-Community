<?php
	require_once("../../services/sessionHandler.php");
	require_once("../../services/encryption.php");
	require_once("../../services/form.php");
	require_once("../../data/DBconnect.php");
	
	startSession();
	
	$comments['comment_id'] = 'NULL';
	$comments['comment_text'] = getPostData('cmmnt') ;
	$comments['author_user_id'] = getSession("id")+100000;
	$comments['parent_id'] = getPostData('parent');
	$comments['time'] = date("Y-m-d-H:m:s");
	$comments["post_id"] = getPostData("pst");
	
	
	$res = ""; 
	foreach( $comments as $key => $value ){
		if( $value == false ){
			$comments[$key] = "NULL";
		}
	}
	
	$res = insert("comments", $comments);
	
	
	echo $res;

?>