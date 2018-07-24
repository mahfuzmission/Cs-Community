

document.getElementById("sign-up-fname").addEventListener("focus",clearfName);
document.getElementById("sign-up-fname").addEventListener("blur",addfName);

document.getElementById("sign-up-mail").addEventListener("focus",clearSignUpEmail);
document.getElementById("sign-up-mail").addEventListener("blur",addSignUpEmail);

document.getElementById("sign-up-pass").addEventListener("focus",clearSignUpPass);
document.getElementById("sign-up-pass").addEventListener("blur",addSignUpPass);

document.getElementById("sign-up-conf-pass").addEventListener("focus",clearSignUpcPass);
document.getElementById("sign-up-conf-pass").addEventListener("blur",addSignUpcPass);

//####### RUNTIME FORM VALIDATION EVENT #########



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
