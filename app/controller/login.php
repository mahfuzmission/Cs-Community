<?php
	function login(){
		$email = getPostData("logName");
		$pass  = getPostData("logPass");
		/**/
		getModel("loginModel");
		getModel("userModel");
		if( !loginEmailValidation( $email ) || !passValidation( $pass ) )
			die();
		
		$user=loginModel( $email, $pass );
		var_dump($user);
		echo "</br>";
		if( $user ){
			$profile = getProfile( $user['user_id'] );
			var_dump($profile);
			echo "</br>";
			var_dump($user);
			setSession("id", $user['user_id']-100000);
			setSession("user_name", $profile['user_name']);
			setSession("log",true);
			header('Location: '.DEFAULT_URL.'profile/'.$profile['user_name']);
		}
		else{
			header('Location: '.DEFAULT_URL);
		}
	}
?>