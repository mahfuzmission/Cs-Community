<?php
	require_once("../../services/sessionHandler.php");
	require_once("../../services/encryption.php");
	require_once("../../services/form.php");
	require_once("../../data/DBconnect.php");
	
	startSession();
	
	
	$authorID = getSession('id') + 100000;
	
	$tableName = getPostData('name');
	$post = getTableData( $tableName );
	
	for( $i = 0; $i < count($post); $i++){
		
		$cond = "post_id = ".$post[$i]['post_id']." AND user_id = ".$authorID;
		$cond2 = "post_id = ".$post[$i]['post_id'];
		$data = getTableData( "likes", $cond );
		$total = getTableData( "likes", $cond2 );
		$comments = getTableData( "comments",$cond2 );
		
		if($data)
			$post[$i]['like'] = 1;
		else
			$post[$i]['like'] = 0;
		
		//$post[$i]['post_text'] = html_entity_decode($post[$i]['post_text'])
		
		$post[$i]['like_num'] = count($total);
		$post[$i]['comment_num'] = count($comments);
		for( $j = 0; $j < count($comments); $j++ ){
			$cond3 = "user_id  = ".$comments[$j]['author_user_id'];
			$profile = getTableData( 'profiles', $cond3 );
			$comments[$j]['author_name'] = $profile[0]['full_name'];
			$comments[$j]['user_name'] = $profile[0]['user_name'];
			$comments[$j]['author_pic'] = $profile[0]['pic'];
			//$comments[$j]['comment_text'] = html_entity_decode($comments[$j]['comment_text']);
			
		}
		$post[$i]['comments'] = $comments;
	}
	
	echo json_encode($post);

?>