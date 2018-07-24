<?php
	//require_once("../../services/config.php");
	//require_once("../controller/controller.php");
	//require_once("../model/model.php");
	//require_once("../../services/router.php");
	require_once("../../services/sessionHandler.php");
	require_once("../../services/encryption.php");
	require_once("../../services/form.php");
	require_once("../../data/DBconnect.php");
	
	startSession();
	
	$users['user_id']  		= getSession('id') + 100000;
	$users['email']    		= getPostData('mail');
	$users['password']		= getPostData('password');
	$users['online_status'] = getPostData('omStaus');
	
	$profiles['full_name']  = getPostData('fname');
	$profiles['user_name']  = getPostData('uname');
	$profiles['email']      = getPostData('mail');
	$profiles['phone']      = getPostData('phn');
	$profiles['address']    = getPostData('addrss');
	$profiles['school']     = getPostData('schl');
	$profiles['college']    = getPostData('clg');
	$profiles['university'] = getPostData('uni');
	$profiles['workplace']  = getPostData('wrkplc');
	
	$condition = '';
	$res= '';
	$data = array();
	foreach( $users as $key => $value ){
		if( $value != false && $key != 'user_id'){
			$condition = "id = '".$users['user_id']."'";
			$data[$key] = $value;
			$res = updateTable( 'users', $data, $condition );
		}
	}
	
	$data = array();
	
	foreach( $profiles as $key => $value ){
		if( $value != false ){
			$condition = "user_id = ".$users['user_id'];
			$data[$key] = $value;
			//var_dump($data);
			$res = updateTable( 'profiles', $data, $condition );
		}
	}
	
	echo $res;
?>