
//####### ONCLICK  START FORM EVENT ############

document.getElementById("login-mail").addEventListener("focus",clearLoginEmail);
document.getElementById("login-mail").addEventListener("blur",addLoginEmail);

document.getElementById("login-pass").addEventListener("focus",clearLoginPass);
document.getElementById("login-pass").addEventListener("blur",addLoginPass);

document.getElementById("sign-up-fname").addEventListener("focus",clearfName);
document.getElementById("sign-up-fname").addEventListener("blur",addfName);

document.getElementById("sign-up-mail").addEventListener("focus",clearSignUpEmail);
document.getElementById("sign-up-mail").addEventListener("blur",addSignUpEmail);

document.getElementById("sign-up-pass").addEventListener("focus",clearSignUpPass);
document.getElementById("sign-up-pass").addEventListener("blur",addSignUpPass);

document.getElementById("sign-up-conf-pass").addEventListener("focus",clearSignUpcPass);
document.getElementById("sign-up-conf-pass").addEventListener("blur",addSignUpcPass);

//####### RUNTIME FORM VALIDATION EVENT #########


document.getElementById("login-mail").addEventListener("keyup",loginEmailValidation);
document.getElementById("login-mail").addEventListener("blur",loginEmailValidation);

document.getElementById("login-pass").addEventListener("keyup",loginPasswordValidation);
document.getElementById("login-pass").addEventListener("blur",loginPasswordValidation);

document.getElementById("sign-up-fname").addEventListener("keyup",signUpNameValidation);
document.getElementById("sign-up-fname").addEventListener("blur",signUpNameValidation);

document.getElementById("sign-up-mail").addEventListener("keyup",signUpEmailValidation);
document.getElementById("sign-up-mail").addEventListener("blur",signUpEmailValidation);


document.getElementById("sign-up-pass").addEventListener("keyup",signUpPassValidation);
document.getElementById("sign-up-pass").addEventListener("blur",signUpPassValidation);

document.getElementById("sign-up-pass").addEventListener("keyup",signUpPassValidation);
document.getElementById("sign-up-pass").addEventListener("blur",signUpPassValidation);

document.getElementById("sign-up-conf-pass").addEventListener("keyup",signUpConfPassValidation);
document.getElementById("sign-up-conf-pass").addEventListener("blur",signUpConfPassValidation);












