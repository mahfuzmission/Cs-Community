

<!DOCTYPE html>

<html>
    <head>
        <title>CS Community</title>
        
         <link rel = "stylesheet" type = "text/css" href = "app/view/css/cols.css" />
         <link rel = "stylesheet" type = "text/css" href = "app/view/css/rows.css" />
         <link rel = "stylesheet" type = "text/css" href = "app/view/css/style.css" />
         <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
         <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
		 
		 <script src = "app/view/js/ajax.js"></script>
    </head>
	
	<body id = "home-body">
	
	
		
	
		<div class="header">
			<ul class = "menu-bar">
				<li><a href = "home">home</a></li>
				<li><a href = "profile">profile</a></li>
				<li><a href = "logout">log out</a></li>
			</ul>
		</div>
		
		<div class = "row home-wrapper">
			<div class = "fw">
				<div class = "col-l-2">
				
				</div>
				<div class = "col-l-10">
					<div class = "row">
						<div class = "write-post-wrapper">
							<form class = "write-post">
								<div class = "row">
									<textarea id = "write-post-text" rows = "10" cols = "1000"></textarea>
								</div>
								<div class = "row">
									<label for = "writePostCategory" id = "write-post-category-label" class = "col-l-2">add category</label>
									<select name = "writePostCategory" id = "write-post-category" class = "col-l-2">
										<option value = "cat">Category</option>
										<?php
										//var_dump($data);
											$i=0;
											for($i=0;$i<count($data);$i++){
												echo '<option value = "'.$data[$i]['catagory_name'].'">'.$data[$i]['catagory_name'].'</option>';
											}
										//echo $str;
										?>
										
									</select>
									<div class = "col-l-8" style = "padding:0px">
										<div class = "col-l-10"></div>
										<input type = "button"  value = "POST" class = "col-l-2" onclick="getPostValue()"/>
									</div>
								</div>
							</form>
						</div>
					</div>
					
					<div id ="main-post-container" class = "row home-post-wrapper" onload = "getLikes()">
						<!--<div class = "row post-wrapper"  >
							
							<div class = "row post-info">
								<div class = "post-author-info-wrapper col-l-6">
									<div class = "row">
										<div class = "col-l-6 author-img-wrapper">
											<img src = "app/view/images/pp.jpg" alt = "" class = "post-author-img" />
										</div>
										<div class = "col-l-6 post-author-info" >
											<div class = "row post-author-name"><a href = "profile">Author Name</a></div>
											<div class = "row post-author-time">10/06/1994 - 23:25:24</div>
										</div>
									</div>
								</div>
								<div class = "post-author-editable col-l-6"></div>
							</div>
							
							<!--POST ITEMS--
							<div class = "row post-box">
								<div id = "loadPost" class = "post-text-box">
									Post Text
								</div>
							</div>
							
							<!--POST EMOTE--
							<div class = "row post-emote-box">
								<div id = "post-id-1" class = "col-l-6 post-like" onclick = "setLike(this)">like <span class = "post-like-num">( 50 )</span> </div>
								<div class = "col-l-6 post-comment"> <span class = "post-comment-num">( 50 )</span> comment </div>
							</div>
							
							<div class = "row comment-box-wrapper">
								<div class = "col-l-1">
									<div class = "author-img-wrapper">
										<img src = "app/view/images/pp.jpg" alt = "" class = "post-author-img" />
									</div>
								</div>
								<div class = "comment-box-form col-l-11">
									<div class = "row">
										<div class = "col-l-3 comment-author">
											<div class = "row post-author-name"><a href = "profile">Author Name</a></div>
											<div class = "row post-author-time">10/06/1994 - 23:25:24</div>
										</div>
										<div class = "col-l-9  main-comment">
											kasdkajldkjaldjlk
										</div>
									</div>
								</div>
							</div>
							
							<div class = "row comment-box-wrapper">
								<div class = "col-l-1">
									<div class = "author-img-wrapper">
										<img src = "app/view/images/pp.jpg" alt = "" class = "post-author-img" />
									</div>
								</div>
								<form class = "col-l-11 comment-box-form">
									<div class = "row">
										<input type = "text" class = "col-l-9" id = "comment-id-input-edit-1"/>
										<div class = "col-l-1"></div>
										<input class = "col-l-2" type = "button" value = "comment" id = "comment-id-input-1" onclick = "getComment(this.id)"/>
									</div>
								</form>
							</div>
						</div>
						
					</div>
					-->
					
				</div>
				
			</div>
		
		</div>
		
		<script type = "text/javascript" src = "app/view/js/ajax.js"></script>
		<script type = "text/javascript" src = "app/view/js/home.js"></script>
		<!--<script type = "text/javascript" src = "app/view/js/getPost.js"></script>-->
		
		<script>
			
		</script>
		
		
	</body>

</html>