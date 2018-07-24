<?php
	require_once("../../services/sessionHandler.php");
	require_once("../../services/encryption.php");
	require_once("../../services/form.php");
	require_once("../../data/DBconnect.php");
	
	startSession();
	
	$pid = getPostData( "pid" );
	$uid = getSession("id") + 100000;
	
	$cond = "post_id = ".$pid."AND user_id = ".$uid;
	$cond2 = "post_id = ".$pid;
	$data = getTableData( "likes", $cond );
	$total = getTableData( "likes", $cond2 );
	
	if($data){
		$str = "like ".count($total);
	}
	else{
		$str = "unlike ".count($total);
	}
	echo $str." ".$pid;
?>