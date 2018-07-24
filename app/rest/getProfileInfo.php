<?php
	require_once("../../services/sessionHandler.php");
	require_once("../../services/encryption.php");
	require_once("../../services/form.php");
	require_once("../../data/DBconnect.php");
	
	startSession();
	
	$id = getSession('id') + 100000;
	
	$tableName = getPostData( "name" );
	$email     = getPostData("mail");
	$u_id	   = getPostData("id");
	if( $email ){
		$data = getTableData( $tableName, "email = '{$email}'" );
		
		$datas    = array();
		if( $data ){
			for( $i = 0; $i < count($data); $i++ )
				$datas[$i] = json_encode( $data[$i] );
			
			
			echo json_encode($datas);
		}
		else
			echo false;
	}
	else if( $u_id ){
		$data = getTableData( $tableName, "user_id = '{$u_id}'" );
		$data[1] = getTableData( $tableName, "user_id = '{$id}'" );
		$datas    = array();
		if( $data ){
			/*for( $i = 0; $i < count($data); $i++ )
				$datas[$i] = json_encode( $data[$i] );
			*/
			
			
			echo json_encode($data);
		}
		else
			echo false;
	}
	else{
		$data = getTableData( $tableName, "user_id = '{$id}'" );
		
		$datas    = array();
		for( $i = 0; $i < count($data); $i++ )
			$datas[$i] = json_encode( $data[$i] );
		
		
		echo json_encode($datas);
	}
?>