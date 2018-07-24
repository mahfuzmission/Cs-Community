<?php
	function registrationEntryModel ( $profile, $user ){
		DBConnect();
		$condition = "email = '".$user['email']."'";
		$result = getTableData( 'users',$condition );
		
		if( !$result ){
			$res = insert( 'users', $user );
			$condition = "email = '".$user['email']."'";
			$usr = getTableData( 'users',$condition );
			$usr = $usr[0];
			setSession("id", $usr['user_id']-100000);
			$profile["user_id"] = $usr["user_id"];
			setSession("user_name", $user['user_name']);
			//print_r($profile);
			insert( 'profiles', $profile );
			return true;
		}
		else{
			echo "email exist";
			return false;
		}
	}
?>