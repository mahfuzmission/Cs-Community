
//########### GLOBAL VARIABLE ##############

var loginEmail       = "login-mail";
var loginPass   	 = "login-pass";

var signUpName 	     = "sign-up-fname";
var signUpMail	     = "sign-up-mail";
var signUpPass	     = "sign-up-pass";
var signUpConfPass   = "sign-up-conf-pass";
var maleGender       = "sign-up-male";
var femaleGender     = "sign-up-female";
var signUpEmailExist = true;

var userFullName     = "info-basic-full-name-edit-input";
var userUserName     = "info-basic-user-name-edit-input";
var userEmail        = "info-basic-email-edit-input";
var userPhone        = "info-basic-phn-edit-input";
var userAddress      = "info-basic-addrss-edit-input";
var userSchool       = "info-basic-schl-edit-input";
var userCollege      = "info-basic-clg-edit-input";
var userUniversity   = "info-basic-uni-edit-input";
var userWorkplace    = "info-basic-wrkplc-edit-input";


//########### FORM CLEAR UP AND ADD UP #############

function clearLoginEmail(){
	var email = document.getElementById( loginEmail );
	if(email.value == "Email: example@email.com")
		email.value = '';
}

function addLoginEmail(){
	var email = document.getElementById( loginEmail );
	if(email.value == "")
		email.value = "Email: example@email.com";
}


function clearLoginPass(){
	var pass = document.getElementById( loginPass );
	if(pass.value == "--------")
		pass.value = "";
}

function addLoginPass(){
	var pass = document.getElementById( loginPass );
	if(pass.value == '')
		pass.value = "--------";
}

function clearfName(){
	var name = document.getElementById( signUpName );
	if(name.value == "Full Name")
		name.value="";
}
function addfName(){
	var name = document.getElementById( signUpName );
	if(name.value=="")
		name.value="Full Name";
}

function clearSignUpEmail()
{
	var email = document.getElementById( signUpMail );
	if( email.value == "example@email.com" )
		email.value="";
	
}
function addSignUpEmail()
{
	var email = document.getElementById( signUpMail );
	if( email.value == "" )
		email.value="example@email.com";
}

function clearSignUpPass()
{
	var pass = document.getElementById( signUpPass );
	if( pass.value=="--------" )
		pass.value = "";
}

function addSignUpPass()
{
	var pass = document.getElementById( signUpPass );
	if( pass.value=="" )
		pass.value = "--------";
}

function clearSignUpcPass()
{
	var pass = document.getElementById( signUpConfPass );
	if( pass.value=="--------" )
		pass.value = "";
}

function addSignUpcPass()
{
	var pass = document.getElementById( signUpConfPass );
	if( pass.value=="" )
		pass.value = "--------";
}



//############# VALIDATION FUNCTION ###############



function emailValidation( email ){
	var mailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	var value      = email.value;
	if( !value.match( mailFormat ) || value == "example@email.com" || value == "Email: example@email.com" ){
		email.style.borderColor = "#b71c1c";
		//console.log("moraa");
		return false;
	}
	else{
		if( email.id == loginEmail ){
			email.style.borderColor = "#004D40";
			return true;
		}
		else{
			//console.log("baal");
			emailExists( email );
			if( signUpEmailExist ){
				console.log("email milla gese");
				email.style.borderColor = "#b71c1c";
				return false;
			}
			else{
				email.style.borderColor = "#004D40";
				return true;
			}
		}	
	}
	
}

function emailExists( email ){
	
	var str = "name=users&mail="+email.value;
	console.log(str);
	loadAJAX( "POST", 'app/rest/getProfileInfo.php', str ,checkEmail );
	
	function checkEmail( res ){
		console.log(res);
		if( res ){
			email.style.borderColor = "#b71c1c";
			signUpEmailExist = true;
		}
		else{
			email.style.borderColor = "#004D40";
			signUpEmailExist = false;
		}
	}
}

function passwordValidation( pass ){
	var val = pass.value;
	var pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*_-]).{8,20}$/;
	
	if( !val.match(pattern) || val == "--------" ){
		pass.style.borderColor = "#b71c1c";
		return false;
	}
	else{
		pass.style.borderColor = "#004D40";
		//console.log("working");
		return true;
	}
		
}

function nameValidation( name ){
	var pattern1 =  /^[A-Za-z ]+$/;
	var pattern2 =  /^[A-Z]/;
	var val = name.value;
	var nm  = val.trim();
	var word = nm.split(" ");
	if(!val.match(pattern1) || !val[0].match(pattern2) || val.length>40 || val.length==0 || val == "Full Name" || word.length < 2 ){
		name.style.borderColor = "#b71c1c";
		return false;
	}
	else{
		name.style.borderColor = "#004D40";
		return true;
	}
}

function userNameValidation( userName ){
	var pattern =  /^[A-Za-z0-9._]+$/;
	var pattern2 = /^[A-Za-z]/;
	var val = userName.value;
	//console.log("ok");
	if( !val.match(pattern) || !val[0].match(pattern2) || val.length > 40 ){
		userName.style.borderColor = "#b71c1c";
		return false;
	}
	else{
		userName.style.borderColor = "#004D40";
		return true;
	}
}

function passMatchValidation( pass1, pass2 ){
	if( pass1.value != pass2.value ){
		pass2.style.borderColor = "#b71c1c";
		return false;
	}
	else{
		pass2.style.borderColor = "#004D40";
		//console.log("working");
		return true;
	}
}


function phoneNumberValidation( phone ){
	var pattern = /^[0-9]+$/;
	var value   = phone.value;
	if( !value.match( pattern ) || value.length > 15 ){
		phone.style.borderColor = "#b71c1c";
		return false;
	}
	else{
		phone.style.borderColor = "#004D40";
		return true;
	}
}

function addressValidation( address ){
	var pattern = /^[A-Za-z-,]+$/;
	var val = address.value;
	if( !val.match( pattern ) ){
		address.style.borderColor = "#b71c1c";
		return false;
	}
	else{
		address.style.borderColor = "#004D40";
		return false;
	}
}

function schoolValidation( school ){
	var pattern = /^[A-Za-z- ]+$/;
	var val = school.value;
	if( !val.match( pattern ) ){
		school.style.borderColor = "#b71c1c";
		return false;
	}
	else{
		school.style.borderColor = "#004D40";
		return false;
	}
}



//#############  LOGIN FORM VALIDATION ################


function loginEmailValidation(){
	var email = document.getElementById( loginEmail );
	if( emailValidation( email ) )
		return true;
	else 
		return false;
	
}

function loginPasswordValidation(){
	var pass = document.getElementById( loginPass );
	
	if( passwordValidation( pass ) ){
		//console.log("working");
		return true;
	
	}
	else
		return false;
}


function loginFormValidation(){
	//console.log("working");
	//console.log(loginEmailValidation());
	//console.log(loginPasswordValidation());
	if( loginEmailValidation() && loginPasswordValidation() ){
		//console.log("working");
		return true;
		
	}
	else
		return false;
}


//############# REGISTRATION FORM VALIDATION ##############


function signUpNameValidation(){
	var name = document.getElementById( signUpName );
	
	if( nameValidation( name ) )
		return true;
	else 
		return false;
}

function signUpEmailValidation(){
	var email = document.getElementById( signUpMail );
	if( emailValidation( email ) )
		return true;
	else
		return false;
}

function signUpPassValidation(){
	var pass = document.getElementById( signUpPass );
	
	if( passwordValidation( pass ) )
		return true;
	else 
		return false;
}

function signUpConfPassValidation(){
	var pass = document.getElementById( signUpConfPass );
	var confPass = document.getElementById( signUpConfPass );
	
	if( passwordValidation( pass ) && passwordValidation( confPass ) && passMatchValidation( pass, confPass ) )
		return true;
	else 
		return false;
}


function signUpFormValidation(){
	var male    = document.getElementById( maleGender );
	var female  = document.getElementById( femaleGender );
	var isValid = true; 
	var isValid = [signUpNameValidation(),signUpEmailValidation(),signUpPassValidation(),signUpConfPassValidation()];
	emailExists( document.getElementById( signUpMail ) );
	if( male.checked || female.checked){
		isValid.push(true);
	}
	else
		isValid.push(false);
	
	
	if( !isValid[0] ){
		document.getElementById( signUpName ).focus();
		return false;
	}
	if( !isValid[1] ){
		document.getElementById( signUpMail ).focus();
		return false;
	}
	if( !isValid[2] ){
		document.getElementById( signUpPass ).focus();
		return false;
	}
	if( !isValid[3] ){
		document.getElementById( signUpConfPass ).focus();
		return false;
	}
	if( !isValid[4] ){
		male.focus();
		return false;
	}
	return true;
}


//############## PROFILE FORM VALIDATION ################



function infoFullNameValidation(){
	var name = document.getElementById( userFullName );
	if( nameValidation( name ) ){
		console.log("fck");
		return true;
	}
	else
		return false;
}

function infoUserNameValidation(){
	var userName = document.getElementById( userUserName );
	//console.log("fck");
	if( userNameValidation( userName ) ){
		return true;
	}
	else
		return false;
}


function infoEmailValidation(){
	var email = document.getElementById( userEmail );
	//console.log("fck");
	if( emailValidation( email ) ){
		return true;
	}
	else
		return false;
}

function infoPhoneNumValidation(){
	var phone = document.getElementById( userPhone );
	//console.log("fck");
	if( phoneNumberValidation( phone ) ){
		return true;
	}
	else
		return false;
}

function infoAddressValidation(){
	var address = document.getElementById( userAddress );
	//console.log("fck");
	if( addressValidation( address ) ){
		return true;
	}
	else
		return false;
}

function infoSchoolValidation(){
	var school = document.getElementById( userSchool );
	if( schoolValidation( school ) )
		return true;
	else
		return false;
}

function infoCollegeValidation(){
	var school = document.getElementById( userCollege );
	if( schoolValidation( school ) )
		return true;
	else
		return false;
}

function infoUniversityValidation(){
	var school = document.getElementById( userUniversity );
	if( schoolValidation( school ) )
		return true;
	else
		return false;
}

function infoWorkplaceValidation(){
	var school = document.getElementById( userWorkplace );
	if( schoolValidation( school ) )
		return true;
	else
		return false;
}







