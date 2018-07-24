
<?php
//print_r($_SESSION);
//var_dump($data);
?>


<!DOCTYPE html>

<html>
    <head>
        <title>CS Community</title>
        
         <link rel = "stylesheet" type = "text/css" href = "../app/view/css/cols.css" />
         <link rel = "stylesheet" type = "text/css" href = "../app/view/css/rows.css" />
         <link rel = "stylesheet" type = "text/css" href = "../app/view/css/style.css" />
         <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
         <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
		 
		 <script type = "text/javascript" src = "../app/view/js/ajax.js"></script>
    </head>
    
    <body class = "profile-body"> 
	
       <div class="header">
			<ul class = "menu-bar">
				<li><a href = "../home">home</a></li>
				<li><a href = "../profile">profile</a></li>
				<li><a href = "../logout">log out</a></li>
			</ul>
		</div>

		
			<div class = "row fw">
				
				<div class = "timeline-pic-wrapper" class = "row">
					<img id = "timeline-picture" src = "../app/view/images/<?php echo $data['profiles']['pic']?>"  alt="<?php echo $data['profiles']['pic']?>" />
					
				</div>
				<div class="row">
					<div class = "profile-menu-wrapper">
						<div class="col-md-6 name-wrapper flex-box content-center">
							<h4 class = "profile-name vertical-center"><a id="main-name" href = "../profile/<?php echo $data['profiles']['user_name'];?>"><?php echo $data['profiles']['full_name'];?></a></h4>
						</div>
						<div class="col-md-6 profile-menu-box">
							<ul class = "row tik">
								<div class = "col-l-3"></div>
								<li class = "col-l-3 profile-menu flex-box content-center">
									<span id = "menu-feed" class = "vertical-center" onclick = "switchMenu( this )" >feed</span>
								</li>
								<li class = "col-l-3 profile-menu flex-box content-center">
									<span id = "menu-info" class = "vertical-center" onclick = "switchMenu( this )" >info</span>
								</li>
								<li class = "col-l-3 profile-menu flex-box content-center">
									<span class = "vertical-center">follow</span>
								</li>
							</ul>
						</div>
					</div>
					
				</div>
				
				<!-- ####################################################################### -->	
			<div class = "row">	
			
				<div id = "feed-container" class = "row feed-wrapper">
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
												for($i=0;$i<count($data['data']);$i++){
													echo '<option value = "'.$data[$i]['catagory_name'].'">'.$data['data'][$i]['catagory_name'].'</option>';
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
						
						</div>
					</div>
				</div>
			
			
				<div id = "info-container" class = "row info-wrapper">
					<div class = "info-sub-menu-wrapper col-l-3">
						<div class = "info-sub-menu">
							<ul class = "info-menu-bar">
								<li id = "overview-menu" class = "active-info-menu" onclick = "switchInfo( this.id )">overview</li>
								<li id = "basic-menu" class = "inactive-info-menu" onclick = "switchInfo( this.id )">basic</li>
								<li id = "edu-menu" class = "inactive-info-menu" onclick = "switchInfo( this.id )">education & work</li>
							</ul>
						</div>
					</div>
					<div class = "info-details-box-wrapper col-l-9">
						<!--########  OVERVIEW #########-->
						<div id = "overview" class = "info-details info-overview-wrapper active">
							<div id = "info-overview-full-name" class = "row info-overview">
								<h4 class = "info-basic-field-name col-l-2">Full Name: </h4>
								<p class = "info-basic-field-value col-l-4"><?php echo $data['profiles']['full_name'];?></p>
								
							</div>
							
							<div id = "info-overview-addrss" class = "row info-overview">
								<h4 class = "info-basic-field-name col-l-2">Address: </h4>
								<p class = "info-basic-field-value col-l-4"><?php echo $data['profiles']['address'];?></p>
								
							</div>
							<div id = "info-overview-addrss" class = "row info-overview">
									<div class = "info-basic-button-wrapper col-l-3">
										<input id ='edit-pic' name ="img"  type = "file" value =  "Edit Pic" class = "info-basic-edit-button"/>
									</div>
									<div class = "info-basic-button-wrapper col-l-3">
										<input id = 'upload-pic' type = "submit" value = "Upload" class = "info-basic-edit-button" onclick = "uploadImage()"/>
									</div>
								
								
							</div>
						</div>
						
						
						<!--########  BASIC INFO #########-->
						
						<div id = "basic" class = "info-details info-basic-wrapper inactive">
						
							<!--#######  FULL NAME #########2-->
							<div id = "info-basic-full-name" class = "row info-overview">
								<h4 class = "info-basic-field-name col-l-2">Full Name: </h4>
								<p id = "info-full-name" class = "info-basic-field-value col-l-4"><?php echo $data['profiles']['full_name'];?></p>
								<div class = "info-basic-button-wrapper col-l-6">
									<button id = 'full-name' class = "info-basic-edit-button" onclick = "editField(this.id)">Edit</button>
								</div>
							</div>
							<div id = "info-basic-full-name-edit" class = "row info-overview">
								<h4 class = "info-basic-field-name col-l-2">Full Name: </h4>
								<form>
									<input id = "info-basic-full-name-edit-input" type = "text" value = "<?php echo $data['profiles']['full_name'];?>" class = "info-basic-field-value-input col-l-4" />
									<div class = "info-basic-button-wrapper col-l-6">
										<input type = "button" value = "save" class = "info-basic-submit-button" onclick = 'saveField("fname",2)'/>
									</div>
								</form>
							</div>
							
							<!--#######  USER NAME ###########3-->
							
							<div id = "info-basic-user-name" class = "row info-overview">
								<h4 class = "info-basic-field-name col-l-2">User Name: </h4>
								<p id = "info-user-name" class = "info-basic-field-value col-l-4"><?php echo $data['profiles']['user_name'];?></p>
								<div class = "info-basic-button-wrapper col-l-6">
									<button id = "user-name" class = "info-basic-edit-button" onclick = "editField(this.id)">Edit</button>
								</div>
							</div>
							<div id = "info-basic-user-name-edit" class = "row info-overview">
								<h4 class = "info-basic-field-name col-l-2">User Name: </h4>
								<form>
									<input id = "info-basic-user-name-edit-input" type = "text" value = "<?php echo $data['profiles']['user_name'];?>" class = "info-basic-field-value-input col-l-4" />
									<div class = "info-basic-button-wrapper col-l-6">
										<input id = "info-uname" type = "button" value = "save" class = "info-basic-submit-button" onclick = 'saveField("uname",3)'/>
									</div>
								</form>
							</div>
							
							<!--##########  EMAIL  ##########4-->
							
							<div id = "info-basic-email" class = "row info-overview">
								<h4 class = "info-basic-field-name col-l-2">Email: </h4>
								<p id = "info-email" class = "info-basic-field-value col-l-4"><?php echo $data['profiles']['email'];?></p>
								<div class = "info-basic-button-wrapper col-l-6">
									<button id = "email" class = "info-basic-edit-button" onclick = "editField(this.id)">Edit</button>
								</div>
							</div>
							<div id = "info-basic-email-edit" class = "row info-overview">
								<h4 class = "info-basic-field-name col-l-2">Email: </h4>
								<form>
									<input id = "info-basic-email-edit-input" type = "text" value = "<?php echo $data['profiles']['email'];?>" class = "info-basic-field-value-input col-l-4" />
									<div class = "info-basic-button-wrapper col-l-6">
										<input id = "info-mail" type = "button" value = "save" class = "info-basic-submit-button" onclick = 'saveField("mail",4)' />
									</div>
								</form>
							</div>
							
							<!--########## PHONE NUMBER  ##########5-->
							
							<div id = "info-basic-phn" class = "row info-overview">
								<h4 class = "info-basic-field-name col-l-2">Phone : </h4>
								<p id = "info-phn" class = "info-basic-field-value col-l-4"><?php  if($data['profiles']['phone'] != 'NULL') {echo $data['profiles']['phone'];}?></p>
								<div class = "info-basic-button-wrapper col-l-6">
									<button id = "phn" class = "info-basic-edit-button" onclick = "editField(this.id)">Edit</button>
								</div>
							</div>
							<div id = "info-basic-phn-edit" class = "row info-overview">
								<h4 class = "info-basic-field-name col-l-2">Phone : </h4>
								<form>
									<input id = "info-basic-phn-edit-input" type = "text" value = "<?php  if($data['profiles']['phone'] != 'NULL') {echo $data['profiles']['phone'];}?>" class = "info-basic-field-value-input col-l-4" />
									<div class = "info-basic-button-wrapper col-l-6">
										<input id = "info-phn-num" type = "button" value = "save" class = "info-basic-submit-button" onclick = 'saveField("phn",5)'/>
									</div>
								</form>
							</div>
							
							<!--########  ADDRESS  ##########-->
							
							<div id = "info-basic-addrss" class = "row info-overview">
								<h4 class = "info-basic-field-name col-l-2">address : </h4>
								<p id = "info-addrss" class = "info-basic-field-value col-l-4"><?php  if($data['profiles']['address'] != 'NULL') {echo $data['profiles']['address'];}?></p>
								<div class = "info-basic-button-wrapper col-l-6">
									<button id = "addrss" class = "info-basic-edit-button" onclick = "editField(this.id)">Edit</button>
								</div>
							</div>
							<div id = "info-basic-addrss-edit" class = "row info-overview">
								<h4 class = "info-basic-field-name col-l-2">address : </h4>
								<form>
									<input id = "info-basic-addrss-edit-input" type = "text" value = "<?php  if($data['profiles']['address'] != 'NULL') {echo $data['profiles']['address'];}?>" class = "info-basic-field-value-input col-l-4" />
									<div class = "info-basic-button-wrapper col-l-6">
										<input id = "info-adrs" type = "button" value = "save" class = "info-basic-submit-button" onclick = 'saveField("addrss",6)'/>
									</div>
								</form>
							</div>
							
							
							
							
							
						</div>
						
						
						<!-- ######### EDUCATION AND WORKPLACE ############ -->
						
						<div id = "edu" class = "info-details info-edu-wrapper inactive">
							<!--####### SCHOOL  #######-->
							
							<div id = "info-basic-schl" class = "row info-overview">
								<h4 class = "info-basic-field-name col-l-2">school : </h4>
								<p id = "info-schl" class = "info-basic-field-value col-l-4"><?php  if($data['profiles']['school'] != 'NULL') {echo $data['profiles']['school'];}?></p>
								<div class = "info-basic-button-wrapper col-l-6">
									<button id = "schl" class = "info-basic-edit-button" onclick = "editField(this.id)">Edit</button>
								</div>
							</div>
							<div id = "info-basic-schl-edit" class = "row info-overview">
								<h4 class = "info-basic-field-name col-l-2">school : </h4>
								<form>
									<input id = "info-basic-schl-edit-input" type = "text" value = "<?php  if($data['profiles']['school'] != 'NULL') {echo $data['profiles']['school'];}?>" class = "info-basic-field-value-input col-l-4" />
									<div class = "info-basic-button-wrapper col-l-6">
										<input id = "info-school" type = "button" value = "save" class = "info-basic-submit-button" onclick = 'saveField("schl",7)'/>
									</div>
								</form>
							</div>
							
							
							<!--######### COLLEGE  ##############-->
							
							<div id = "info-basic-clg" class = "row info-overview">
								<h4 class = "info-basic-field-name col-l-2">college : </h4>
								<p id = "info-clg" class = "info-basic-field-value col-l-4"><?php  if($data['profiles']['college'] != 'NULL') {echo $data['profiles']['college'];}?></p>
								<div class = "info-basic-button-wrapper col-l-6">
									<button id = "clg" class = "info-basic-edit-button" onclick = "editField(this.id)">Edit</button>
								</div>
							</div>
							<div id = "info-basic-clg-edit" class = "row info-overview">
								<h4 class = "info-basic-field-name col-l-2">college : </h4>
								<form>
									<input id = "info-basic-clg-edit-input" type = "text" value = "<?php  if($data['profiles']['college'] != 'NULL') {echo $data['profiles']['college'];}?>" class = "info-basic-field-value-input col-l-4" />
									<div class = "info-basic-button-wrapper col-l-6">
										<input id = "info-college" type = "button" value = "save" class = "info-basic-submit-button" onclick = 'saveField("clg",8)'/>
									</div>
								</form>
							</div>
							
							
							<!--########## UNIVERSITY ###########-->
							
							<div id = "info-basic-uni" class = "row info-overview">
								<h4 class = "info-basic-field-name col-l-2">university : </h4>
								<p id = "info-uni" class = "info-basic-field-value col-l-4"><?php  if($data['profiles']['university'] != 'NULL') {echo $data['profiles']['university'];}?></p>
								<div class = "info-basic-button-wrapper col-l-6">
									<button id = "uni" class = "info-basic-edit-button" onclick = "editField(this.id)">Edit</button>
								</div>
							</div>
							<div id = "info-basic-uni-edit" class = "row info-overview">
								<h4 class = "info-basic-field-name col-l-2">university : </h4>
								<form>
									<input id = "info-basic-uni-edit-input" type = "text" value = "<?php  if($data['profiles']['university'] != 'NULL') {echo $data['profiles']['university'];}?>" class = "info-basic-field-value-input col-l-4" />
									<div class = "info-basic-button-wrapper col-l-6">
										<input id = "info-university" type = "button" value = "save" class = "info-basic-submit-button" onclick = 'saveField("uni",9)'/>
									</div>
								</form>
							</div>
							
							
							<!--######### WORKPLACE ###########-->
							
							<div id = "info-basic-wrkplc" class = "row info-overview">
								<h4 class = "info-basic-field-name col-l-2">workplace : </h4>
								<p id = "info-wrkplc" class = "info-basic-field-value col-l-4"><?php  if($data['profiles']['workplace'] != 'NULL') {echo $data['profiles']['university'];}?></p>
								<div class = "info-basic-button-wrapper col-l-6">
									<button id = "wrkplc" class = "info-basic-edit-button" onclick = "editField(this.id)">Edit</button>
								</div>
							</div>
							
							<div id = "info-basic-wrkplc-edit" class = "row info-overview">
								<h4 class = "info-basic-field-name col-l-2">workplace : </h4>
								<form>
									<input id = "info-basic-wrkplc-edit-input" type = "text" value = "<?php  if($data['profiles']['workplace'] != 'NULL') {echo $data['profiles']['university'];}?>" class = "info-basic-field-value-input col-l-4" />
									<div class = "info-basic-button-wrapper col-l-6">
										<input id = "info-workplace" type = "button" value = "save" class = "info-basic-submit-button" onclick = 'saveField("wrkplc",10)'/>
									</div>
								</form>
							</div>

						</div>
						
						
					</div>
				</div>
			</div>
			</div>
		</div>
		
		<script type = "text/javascript" src = "../app/view/js/form.js"></script>
		<script type = "text/javascript" src = "../app/view/js/profile.js"></script>
		<script type = "text/javascript" src = "../app/view/js/profileEventListener.js"></script>
    </body>
</html>

