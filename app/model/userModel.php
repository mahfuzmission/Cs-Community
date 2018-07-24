<?php
	function getUser($id){
		$user = getTableData( "users", "user_id = '{$id}'" );
		if($user)
			return $user[0];
		else
			return false;
	}
	
	function getProfile($id){
		$profile = getTableData( "profiles", "user_id = '{$id}'" );
		if($profile)
			return $profile[0];
		else
			return false;
	}
	
	function getProfileByUname( $uname ){
		$profile = getTableData( "profiles", "user_name = '{$uname}'" );
		if($profile)
			return $profile[0];
		else
			return false;
	}
?>