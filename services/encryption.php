<?php
	
	function encode( $str ){
		$str = bin2hex( $str );
		return $str;
	}
	
	function decode( $hex ){
		$hex = pack("H*",$hex);
		return $hex;
	}

	function encodeAssoc( $str ){
		
		foreach( $str as $key => $value){
			$str[$key] = bin2hex( $value );
		}
		return $str;
	}
	
	function decodeAssoc( $hex ){
		foreach( $hex as $key => $value){
			$hex[$key] = pack("H*",$value);
		}
		return $hex;
	}
?>