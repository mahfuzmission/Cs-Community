<?php
	function registration(){
		
		//getting user inputs
		$user["fName"]     = getPostData("fName");
		$user["email"]     = getPostData("email");
		$user["signPass"]  = getPostData("signPass");
		$user["signCPass"] = getPostData("signCPass");
		$user["gender"]    = getPostData("gender");
		$user["gender"]    = $user["gender"][0];
		
		//setSession("user",$user);
		
		foreach( $user as $key => $value){
			if( $key != "gender" && !$value ){
				header('Location: '.DEFAULT_URL.'error');
				exit;
			}
		}
		
		$validateModel = getModel("registrationValidateModel");
		$entryModel    = getModel("registrationEntryModel");
		$loginModel    = getModel("loginModel");
		getModel("userModel");
		$result = $validateModel( $user );
		
		foreach( $result as $key => $value ){
			if( !$value ){
				header('Location: '.DEFAULT_URL.'registrationerror');
				exit;
			}
		}
		
		$users['user_id']   	 = 'NULL';
		$users['email']     	 = $user['email'];
		$users['password']  	 = $user['signPass'];
		$users['online_status']  = 1;
		
		$splitMail = explode( '@', $user['email'] );
		$username  = $splitMail[0].'_'.$splitMail[1];
		
		$profiles['profile_id'] = 'NULL';
		$profiles['user_id']	= 'NULL';
		$profiles['full_name']  = $user['fName'];
		$profiles['user_name']  = $username;
		$profiles['email']      = $user['email'];
		$profiles['phone']		= 'NULL';
		$profiles['address']    = 'NULL';
		$profiles['school']     = 'NULL';
		$profiles['college']    = 'NULL';
		$profiles['university'] = 'NULL';
		$profiles['workplace']  = 'NULL';
		$profiles['gender']     = $user['gender'];
		$profiles['pic']		= 'NULL';
		
		$result = $entryModel( $profiles, $users );
		if( $result ){
			setSession('log',true);
			$prof = getProfileByUname( $username );
			setSession( "id", $prof["user_id"] - 100000 );
			header('Location: '.DEFAULT_URL.'profile/'.$username);
			exit;
		}
		else{
			header('Location: '.DEFAULT_URL.'registrationerror');
			exit;
			print_r( $result );
		}
	}
?>