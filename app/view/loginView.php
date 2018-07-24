<?php //print_r($_SESSION);?>
<!DOCTYPE html>

<html>
	<head>
	   <title>CS Community</title>
        
         <link rel = "stylesheet" type = "text/css" href = "app/view/css/cols.css" />
         <link rel = "stylesheet" type = "text/css" href = "app/view/css/rows.css" />
         <link rel = "stylesheet" type = "text/css" href = "app/view/css/style.css" />
         <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
         <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
		 
		 <script type = "text/javascript" src = "app/view/js/ajax.js"></script>
	</head>
	
	<body>
		<div class = "row sign-up-bg sign-up-wrapper">
			<div class = "fw flex-box">
				<div class = "col-l-6 col-md-6 col-sm-12 col-s-12 vertical-center">
					<div class="flex-box space-around">
						<div class="vertical-center">
							<span class="main-txt-bold ">CS<span class="main-txt-thin">Community</span></span><br/>
							<span class="main-moto"> A Community for Computer Science Students</span>
						</div>
					</div>
				</div>
				<div id = "form-holder" class = "col-l-6 col-md-6 col-sm-12 col-s-12">
					<div id = "form-wrapper" class = "row">
						<div class = "flex-box space-around">
							<div class = "col-l-8 col-md-8 col-sm-8 col-s-11">
								<div class="login-box flex-box content-center vertical-center">
									<form method = "post" action = "login" onsubmit = "return loginFormValidation()" id = "login-form" class="vertical-center flex">
										<h3>Sign in</h3><br/>
										<input type="text" name="logName" value="Email: example@email.com" id = "login-mail" class="log-input"/><br/>
										<input type="password" name="logPass" value="--------" id = "login-pass" class="log-input"/><br/>
										<input type="Submit" value = "Sign in" class ="log-submit"/>
									</form>
								</div>
							</div>
						
							<div class = "col-l-8 col-md-8 col-sm-8 col-s-11">
								<div class="sign-up-box flex-box content-center vertical-center">
									<form method = "post" action = "registration" onsubmit = "return signUpFormValidation()" id = "sign-up-form" class="vertical-center">
										<h3>Sign Up</h3><br/>
										<label for="fName">Full Name:</label><br/>
										<input type="text" name="fName" value="Full Name" id = "sign-up-fname" class="log-input"/><br/>
										<label for="email">Email:</label><br/>
										<input type="text" name="email" value="example@email.com" id = "sign-up-mail" class="log-input"/><br/>
										<label for="signPass">Password:</label><br/>
										<input type="password" name="signPass" value="--------" id = "sign-up-pass" class="log-input"/><br/>
										<label for="signCPass">Confirm Password:</label><br/>
										<input type="password" name="signCPass" value="--------" id = "sign-up-conf-pass" class="log-input"/><br/>
										<label>Gender</label><br/>
										<span>Male</span>
										<input type="radio" value="male" name="gender[]" id = "sign-up-male" class="gender-btn"/>
										<span>Female</span>
										<input type="radio" value="female" name="gender[]" id = "sign-up-female" class="gender-btn"/><br/>
										<input type="Submit" value = "Join In" class ="log-submit"/>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<script type = "text/javascript" src = "app/view/js/form.js"></script>
		<script type = "text/javascript" src = "app/view/js/eventListener.js"></script>
	</body>
</html>