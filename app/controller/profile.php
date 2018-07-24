<?php
	//require_once(CONTROLLER_PATH."controller.php");
	function profile( $username = false ){
		//var_dump($_SESSION);
		
		
		if(getSession("log")){
			getModel("userModel");
			$user['users']    = getUser( getSession('id')+100000 );
			$user['profiles'] = getProfile( getSession('id')+100000 );
			
			//getView( "profileView1",$user );
			
			if( $username == false ){
				$url = DEFAULT_URL.'profile/'.$user['profiles']['user_name'];
				header( 'Location: '.$url);
				exit;
			}
			else if( $user["profiles"]["user_name"] == $username ){
				getModel('homeModel');
				$data = homeModel();
				$user['data'] = $data;
				getView( "profileView2",$user );
			}
			else{
				$otherUser['profiles'] = getProfileByUname( $username );
				if( $otherUser["profiles"] == false ){
					getView("errorView");
				}
				else{
					getView( "profileView3",$otherUser );
				}
			}
		}
		else{
			header('Location: '.DEFAULT_URL);
		}
	}
	
?>