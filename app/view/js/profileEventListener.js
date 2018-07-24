
//############ ON KEY UP PROFILE INFO EDIT EVENTS #############

document.getElementById( userFullName ).addEventListener("keyup",infoFullNameValidation);
document.getElementById( userUserName ).addEventListener("keyup",infoUserNameValidation);
document.getElementById( userEmail ).addEventListener("keyup",infoEmailValidation);
document.getElementById( userPhone ).addEventListener("keyup",infoPhoneNumValidation);
document.getElementById( userAddress ).addEventListener("keyup",infoAddressValidation);
document.getElementById( userSchool ).addEventListener("keyup",infoSchoolValidation);
document.getElementById( userCollege ).addEventListener("keyup",infoCollegeValidation);
document.getElementById( userUniversity ).addEventListener("keyup",infoUniversityValidation);
document.getElementById( userWorkplace ).addEventListener("keyup",infoWorkplaceValidation);
//document.getElementById("login-mail").addEventListener("blur",loginEmailValidation);