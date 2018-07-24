
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
		 
		 <script src = "../app/view/js/ajax.js"></script>
    </head>
    
    <body class = "profile-body"> 
	
        <div class="header">
			<ul class = "menu-bar">
				<li><a href = "../home">home</a></li>
				<li><a href = "../profile">profile</a></li>
				<li><a href = "../logout">log out</a></li>
			</ul>
		</div>
		
        <div class = "row">
		
			<div class = "row fw">
			
				<div class = "timeline-pic-wrapper" class = "row">
					<img id = "timeline-picture" src = "../app/view/images/<?php echo $data['profiles']['pic']?>"  alt="<?php echo $data['profiles']['pic']?>" />
				</div>
				<div class="row">
					<div class = "profile-menu-wrapper">
						<div class="col-md-6 name-wrapper flex-box content-center">
							<h4 class = "profile-name vertical-center"><a href = "../profile/<?php echo $data['profiles']['user_name'];?>"><?php echo $data['profiles']['full_name'];?></a></h4>
						</div>
						<div class="col-md-6 profile-menu-box">
							<ul class = "row tik">
								<div class = "col-l-3"></div>
								<li class = "col-l-3 profile-menu flex-box content-center">
									<span class = "vertical-center">feed</span>
								</li>
								<li class = "col-l-3 profile-menu flex-box content-center">
									<span class = "vertical-center">info</span>
								</li>
								<li class = "col-l-3 profile-menu flex-box content-center">
									<span class = "vertical-center">follow</span>
								</li>
							</ul>
						</div>
					</div>
					
				</div>
				
		<!-- ####################################################################### -->		
				<div class = "row info-wrapper">
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
						</div>
						
						
						<!--########  BASIC INFO #########-->
						<div id = "basic" class = "info-details info-basic-wrapper inactive">
						
							<!--#######  FULL NAME #########2-->
							<div id = "info-basic-full-name" class = "row info-overview">
								<h4 class = "info-basic-field-name col-l-2">Full Name: </h4>
								<p id = "info-full-name" class = "info-basic-field-value col-l-4"><?php echo $data['profiles']['full_name'];?></p>
							</div>
							<!--#######  USER NAME ###########3-->
							
							<div id = "info-basic-user-name" class = "row info-overview">
								<h4 class = "info-basic-field-name col-l-2">User Name: </h4>
								<p id = "info-user-name" class = "info-basic-field-value col-l-4"><?php echo $data['profiles']['user_name'];?></p>
							</div>
							
							<!--##########  EMAIL  ##########4-->
							
							<div id = "info-basic-email" class = "row info-overview">
								<h4 class = "info-basic-field-name col-l-2">Email: </h4>
								<p id = "info-email" class = "info-basic-field-value col-l-4"><?php echo $data['profiles']['email'];?></p>
							</div>
							
							<!--########## PHONE NUMBER  ##########5-->
							
							<div id = "info-basic-phn" class = "row info-overview">
								<h4 class = "info-basic-field-name col-l-2">Phone : </h4>
								<p id = "info-phn" class = "info-basic-field-value col-l-4"><?php  if($data['profiles']['phone'] != 'NULL') {echo $data['profiles']['phone'];}?></p>
							</div>
							
							<!--########  ADDRESS  ##########-->
							
							<div id = "info-basic-addrss" class = "row info-overview">
								<h4 class = "info-basic-field-name col-l-2">address : </h4>
								<p id = "info-addrss" class = "info-basic-field-value col-l-4"><?php  if($data['profiles']['address'] != 'NULL') {echo $data['profiles']['address'];}?></p>
							</div>
										
						</div>
						
						
						<!-- ######### EDUCATION AND WORKPLACE ############ -->
						
						<div id = "edu" class = "info-details info-edu-wrapper inactive">
							<!--####### SCHOOL  #######-->
							
							<div id = "info-basic-schl" class = "row info-overview">
								<h4 class = "info-basic-field-name col-l-2">school : </h4>
								<p id = "info-schl" class = "info-basic-field-value col-l-4"><?php  if($data['profiles']['school'] != 'NULL') {echo $data['profiles']['school'];}?></p>
							</div>
							
							
							<!--######### COLLEGE  ##############-->
							
							<div id = "info-basic-clg" class = "row info-overview">
								<h4 class = "info-basic-field-name col-l-2">college : </h4>
								<p id = "info-clg" class = "info-basic-field-value col-l-4"><?php  if($data['profiles']['college'] != 'NULL') {echo $data['profiles']['college'];}?></p>
							</div>
							
							
							<!--########## UNIVERSITY ###########-->
							
							<div id = "info-basic-uni" class = "row info-overview">
								<h4 class = "info-basic-field-name col-l-2">university : </h4>
								<p id = "info-uni" class = "info-basic-field-value col-l-4"><?php  if($data['profiles']['university'] != 'NULL') {echo $data['profiles']['university'];}?></p>
							</div>
							
							
							<!--######### WORKPLACE ###########-->
							
							<div id = "info-basic-wrkplc" class = "row info-overview">
								<h4 class = "info-basic-field-name col-l-2">workplace : </h4>
								<p id = "info-wrkplc" class = "info-basic-field-value col-l-4"><?php  if($data['profiles']['workplace'] != 'NULL') {echo $data['profiles']['university'];}?></p>
							</div>

						</div>
						
						
					</div>
				</div>
			</div>
			</div>
		</div>
		
		<script src = "../app/view/js/profile.js"></script> 
    </body>
</html>

