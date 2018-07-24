
//############# INPUT EFFECT #################
function clearLoginEmail(){
	var email = document.getElementById("login-mail");
	if(email.value == "Email: example@email.com")
		email.value = '';
}

function addLoginEmail(){
	var email = document.getElementById("login-mail");
	if(email.value == "")
		email.value = "Email: example@email.com";
}

function clearLoginPass(){
	var pass = document.getElementById("login-pass");
	if(pass.value == "--------")
		pass.value = "";
}

function addLoginPass(){
	var pass = document.getElementById("login-pass");
	if(pass.value == '')
		pass.value = "--------";
}

function clearfName(){
	var name = document.getElementById("sign-up-fname");
	if(name.value == "Full Name")
		name.value="";
}
function addfName(){
	var name = document.getElementById("sign-up-fname");
	if(name.value=="")
		name.value="Full Name";
}

function clearSignUpEmail()
{
	var email = document.getElementById("sign-up-mail");
	if( email.value == "example@email.com" )
		email.value="";
	
}
function addSignUpEmail()
{
	var email = document.getElementById("sign-up-mail");
	if( email.value == "" )
		email.value="example@email.com";
}

function clearSignUpPass()
{
	var pass = document.getElementById("sign-up-pass");
	if( pass.value=="--------" )
		pass.value = "";
}

function addSignUpPass()
{
	var pass = document.getElementById("sign-up-pass");
	if( pass.value=="" )
		pass.value = "--------";
}

function clearSignUpcPass()
{
	var pass = document.getElementById("sign-up-conf-pass");
	if( pass.value=="--------" )
		pass.value = "";
}

function addSignUpcPass()
{
	var pass = document.getElementById("sign-up-conf-pass");
	if( pass.value=="" )
		pass.value = "--------";
}


//############# VALIDATION ##################

//login form
function checkLoginEmail(){
	var mailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	var email = document.getElementById("login-mail");
	var val = email.value;
	
	if( !val.match(mailFormat) || val == "Email: example@email.com" ){
		email.style.borderColor = "#b71c1c";
		return false;
	}
	else{
		email.style.borderColor = "#004D40";
		return true;
	}
}


//registration form
function checkSignUpName(){
	var name = document.getElementById("sign-up-fname");
	var pattern1 =  /^[A-Za-z ]+$/;
	var pattern2 =  /^[A-Z]/;
	var val = name.value;
	if(!val.match(pattern1) || !val[0].match(pattern2) || val.length>40 || val.length==0 || val == "Full Name" ){
		name.style.borderColor = "#b71c1c";
		return false;
	}
	else{
		name.style.borderColor = "#004D40";
		return true;
	}
}

function checkSignUpEmail(){
	var mailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	var email = document.getElementById("sign-up-mail");
	var val = email.value;
	
	if(!val.match(mailFormat) || val == "example@email.com"){
		email.style.borderColor = "#b71c1c";
		return false;
	}
	else{
		email.style.borderColor = "#004D40";
		return true;
	}
}

function checkSignUpPass(){
	var pass = document.getElementById("sign-up-pass");
	var val = pass.value;
	var pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*_-]).{8,20}$/;
	if( !val.match(pattern) || val == "--------" ){
		pass.style.borderColor = "#b71c1c";
		return false;
	}
	else{
		pass.style.borderColor = "#004D40";
		return true;
	}
		
}

function checkSignUpMatchPass(){
	var pass1 = document.getElementById("sign-up-pass");
	var pass2 = document.getElementById("sign-up-conf-pass");
	var val1 = pass1.value;
	var val2 = pass2.value;
	if( val1 != val2 || val2 == "--------" ){
		pass2.style.borderColor = "#b71c1c";
		return false;
	}
	else{
		pass2.style.borderColor = "#004D40";
		return true;
	}
		
}

//############# ON SUBMIT FORM VALIDATION ##################

//Login Form

function loginValidation(){
	var isValid = [checkLoginEmail()];
	var pass = document.getElementById("login-pass");
	if( pass.value.length < 8 || pass.value == "--------" || pass.value == "" ){
		document.getElementById("login-pass").style.borderColor = "#b71c1c";
		isValid.push(false);
	}
	else{
		isValid.push(true);
	}
	
	console.log(isValid);
	if(!isValid[0]){
		document.getElementById("login-mail").focus();
		return false;
	}
	if(!isValid[1]){
		document.getElementById("login-pass").focus();
		return false;
	}
	
	return true;
}

//Registration Form
function signUpValidation(){
	var isValid = [checkSignUpName(),checkSignUpEmail(),checkSignUpPass(),checkSignUpMatchPass()];
	
	var male = document.getElementById("sign-up-male");
	var female = document.getElementById("sign-up-female");
	
	if(male.checked || female.checked){
		isValid.push(true);
	}
	else
		isValid.push(false);
	
	//console.log(isValid[0]+","+isValid[1]+","+isValid[2]+);
	
	if( !isValid[0] ){
		document.getElementById("sign-up-fname").focus();
		return false;
	}
	if( !isValid[1] ){
		document.getElementById("sign-up-mail").focus();
		return false;
	}
	if( !isValid[2] ){
		document.getElementById("sign-up-pass").focus();
		return false;
	}
	if( !isValid[3] ){
		document.getElementById("sign-up-conf-pass").focus();
		return false;
	}
	if( !isValid[4] ){
		document.getElementById("sign-up-male").focus();
		return false;
	}
	
	return true;
}


