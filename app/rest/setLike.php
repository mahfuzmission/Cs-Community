<?php
	require_once("../../services/sessionHandler.php");
	require_once("../../services/encryption.php");
	require_once("../../services/form.php");
	require_once("../../data/DBconnect.php");
	
	startSession();
	
	$likes["like_id"] = "NULL";
	$likes["post_id"] = getPostData( "pid" );
	$likes["user_id"] = getSession("id") + 100000;
	
	foreach( $likes as $key => $value ){
		if( $value == false ){
			$likes[$key] = "NULL";
		}
	}
	
	$condition = "post_id = '".$likes["post_id"]."' AND user_id = '".$likes['user_id']."'";
	
	$data = getTableData( "likes", $condition );
	if($data){
		deleteTableData("likes", $condition);
		echo "deleted";
	}
	else{
		$result = insert("likes", $likes);
		echo $result;
	}
?>