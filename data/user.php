<?php
	function emailExist( $mail ){
		
		$sql = "SELECT * FROM user where email = '$mail'";
		$con = DBConnect();
		$result = mysqli_query( $con, $sql);
		$result = mysqli_fetch_assoc($result);
		if($result)
			return true;
		else
			return false;
	}
	
	
	function createNewUser( $person ){
		getService("encryption");
		$con = DBConnect();
		//$splitmail = explode( '@', $person['email'] );
		//$username = $splitmail[0]."_".$splitmail[1];
		$splitmail = explode( '@', decode( $person['email'] ) );
		$username = encode( $splitmail[0] ) .encode("_"). encode($splitmail[1]);
		$querry = "INSERT INTO user (userID, fullName, userName, phoneNumber, email, password, address, school, college, university, workPlace, gender) VALUES (NULL, '".$person["fName"]."','".$username."','01716216982', '".$person["email"]."', '".$person["signPass"]."','NULL','NULL','NULL','NULL','NULL','".$person["gender"][0]."')";
		$result = mysqli_query( $con, $querry );
		return $result;
	}
	
	
?>