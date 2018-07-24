<?php
	function loginModel( $email, $password ){
		$user = getTableData("users", "email = '{$email}'");
		$table["online_status"] = 1;
		
		updateTable( "users", $table, "email = '{$email}'" );
		if( !$user )
			return false;
		else if( $user[0]["password"] != $password )
			return false;
		else
			return $user[0];
	}

?>