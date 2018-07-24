<?php
	function router(){
		$url = ( isset( $_GET['url'] ) ) ? $_GET['url'] : "index";
		
		$url = rtrim( $url, "/" );
		$url = explode( '/', $url );
		$urlLen = count($url);
		//print_r(count($url));
		if(!$url[0]){
			$controller = "error";
			require_once( CONTROLLER_PATH.$controller.".php" );
			$controller();
		}
		else if( $urlLen == 2 ){
			$controller = $url[0];
			if( file_exists( CONTROLLER_PATH.$controller.".php" ) ){
				require_once( CONTROLLER_PATH.$controller.".php" );
				$controller($url[1]);
			}
			else{
				$controller = "error";
				require_once( CONTROLLER_PATH.$controller.".php" );
				$controller();
			}
		}
		else{
			$controller = $url[0];
			strtolower($controller);
			if( file_exists( CONTROLLER_PATH.$controller.".php" ) ){
				require_once( CONTROLLER_PATH.$controller.".php" );
				
					$controller();
			}
			else if(!$controller || $controller == "index.php"){
				$controller = "index";
				require_once( CONTROLLER_PATH.$controller.".php" );
				$controller();
			}
			else{
				$controller = "error";
				require_once( CONTROLLER_PATH.$controller.".php" );
				$controller();
			}
		}
	}

?>