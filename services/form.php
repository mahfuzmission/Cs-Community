<?php

	//######## RETRIEVING $_POST ARRAY DATA  ############
	function getPostData($key){
		
		if( !isset($_POST[$key]) )
			return false;
		return $_POST[$key];
	}


	//#######  LOGIN VALIDATION ###########
	function loginValidation( $login ){
		$isValid["email"]= true;
		$isValid["password"]= true;
		 
		if( loginEmailValidation( $email ) )
			$isValid["email"] = false;
		if( !$login["password"] ||  $login["password"] < 8 )
			$isValid["password"] = false;
		return $isValid;
	}
	
	function loginEmailValidation( $email ){
		$email = rtrim( $email, " " );
		
		if( !filter_var( $email, FILTER_VALIDATE_EMAIL ) )
			return false;
		if( $email == "" || strtolower( $email ) == strtolower( "Email: example@email.com" ) )
			return false;
		
		return true;
	}
	
	//######## REGISTRATION VALIDATION ###########
	
	function nameValidation( $name ){
		$name = rtrim( $name, " " );
		
		if( !preg_match( "/^[a-zA-Z ]*$/", $name ) )
			return false;
		if( !preg_match( "/^[A-Z]*$/", $name{0} ) )
			return false;
		if( str_word_count( $name ) < 2 )
			return false;
		if( $name == "" || strtolower( $name ) == strtolower( "Full Name" ) )
			return false;
		
		return true;
	}
	
	function emailValidation( $email ){
		$email = rtrim( $email, " " );
		
		if( !filter_var( $email, FILTER_VALIDATE_EMAIL ) )
			return false;
		if( $email == "" || strtolower( $email ) == strtolower( "example@email.com" ) )
			return false;
		
		return true;
	}
	
	function passValidation( $pass ){
		if( $pass == "" || !$pass )
			return false;
		if( !preg_match( "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*_-]).{8,20}$/", $pass ) )
			return false;
		return true;
	}
	
	function registrationValidation( $user ){
		$isValid["fName"]= true;
		$isValid["email"]= true;
		$isValid["signPass"]= true;
		$isValid["signCPass"]= true;
		$isValid["match"]= true;
		$isValid["gender"]= true;
		
		if ( !nameValidation( $user["fName"] ) )	
			$isValid["fName"]= false;
		if( !emailValidation( $user["email"] ) )
			$isValid["email"] = false;
		if( !passValidation( $user["signPass"] ) )
			$isValid["signPass"] = false;
		if( $user["signCPass"]=="" || !$user["signCPass"] )
			$isValid["signCPass"] = false;
		if( $user["signCPass"]!= $user["signPass"] )
			$isValid["match"]= false;
		if( $user["gender"]=="")
			$isValid["gender"]= false;
		
		return $isValid;
	
	}
	
?>