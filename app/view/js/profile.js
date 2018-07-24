
//########### EDIT PROFILE FIELD ############

//GLOBALS
var mainId  = "info-basic-";
var subId   = "";
var id3     = "";
var inputId = "info-";
var keys     = 0;
var buttonId = ""
//mainId     = mainId + id;

function editField( id ){
	//mainId = "info-basic-";
	//console.log(subId   = "info-basic-" + id + "-edit");
	subId   = "info-basic-" + id + "-edit";
	console.log(subId);
	
	id3     = subId  + "-input";
	console.log(id3);
	
	mainId  = "info-basic-" + id;
	console.log(mainId);
	
	inputId = "info-" + id;
	console.log(inputId);
	
	buttonId = "info-basic-" + id + "-edit-input";
	
	
	//console.log(document.getElementById( mainId ).display);
	
	document.getElementById( mainId ).style.display = "none";
	document.getElementById( subId ).style.display  = "block";
	
	document.getElementById( id3 ).focus();
	
}


function saveField( str,ind ){
	
	var elem  = document.getElementById( buttonId );
	var value = elem.value;
	var querry = str + "=" + value;
	var isValid = false;
	keys = ind;
	
	if( buttonId == userFullName )
		isValid = infoFullNameValidation();
	else if( buttonId == userUserName )
		isValid = infoUserNameValidation();
	else if( buttonId == userEmail )
		isValid = infoEmailValidation();
	else if( buttonId == userPhone )
		isValid = infoPhoneNumValidation();
	else if( buttonId == userAddress )
		isValid = infoAddressValidation();
	else if( buttonId == userSchool )
		isValid = infoSchoolValidation();
	else if( buttonId == userCollege )
		isValid = infoCollegeValidation();
	else if( buttonId == userUniversity )
		isValid = infoUniversityValidation();
	else if( buttonId == userWorkplace )
		isValid  = infoWorkplaceValidation();
		
	if( isValid )
		loadAJAX( "POST", "../app/rest/updateProfile.php", querry, checkRes );
	else
		console.log("wrong input");
}

function checkRes( res ){
	console.log(res);
	
	if( res ){
		
		document.getElementById( mainId ).style.display = "block";
		document.getElementById( subId ).style.display = "none";
		var str = 'name=profiles';
		//console.log(res);
		loadAJAX( "POST", '../app/rest/getProfileInfo.php', str ,updateField );
	}
	else{
		console.log("false" + res)
	}
}


function updateField( data ){
	var newData = JSON.parse(data);
	var value   = [];
	
	newData[0]  = JSON.parse(newData[0]);
	
	for( var key in newData[0] ) {
		value.push(newData[0][key]);
	}
	//console.log(newData[0]);
	//console.log(value);
	//console.log(keys);
	
	//console.log(newData[0].key);
	if(keys == 2){
		document.getElementById("main-name").innerHTML  = value[keys];
	}
	console.log(value[keys]);
	document.getElementById( inputId ).innerHTML 		= value[keys] ;
}



//########## INFO PAGE SWITCHING ##############


function switchInfo( id ){
	//var cls = document.getElementById( id ).className;
	if( id == "overview-menu" ){
		document.getElementById( "overview-menu" ).className = "active-info-menu";
		document.getElementById( "basic-menu" ).className = "inactive-info-menu";
		document.getElementById( "edu-menu" ).className = "inactive-info-menu";
		
		var cls = document.getElementById( "overview" ).className.split(" ");
		cls[1] = "active";
		document.getElementById( "overview" ).className = cls[0] + " " + cls[1];
		
		var cls1 = document.getElementById( "basic" ).className.split(" ");
		cls1[1] = "inactive";
		document.getElementById( "basic" ).className = cls1[0] + " " + cls1[1];
		
		var cls2 = document.getElementById( "edu" ).className.split(" ");
		cls2[1] = "inactive";
		document.getElementById( "edu" ).className = cls2[0] + " " + cls2[1];
	}
	else if( id == "basic-menu" ){
		document.getElementById( "basic-menu" ).className = "active-info-menu";
		document.getElementById( "overview-menu" ).className = "inactive-info-menu";
		document.getElementById( "edu-menu" ).className = "inactive-info-menu";
		
		var cls = document.getElementById( "basic" ).className.split(" ");
		cls[1] = "active";
		document.getElementById( "basic" ).className = cls[0] + " " + cls[1];
		
		var cls1 = document.getElementById( "overview" ).className.split(" ");
		cls1[1] = "inactive";
		document.getElementById( "overview" ).className = cls1[0] + " " + cls1[1];
		
		var cls2 = document.getElementById( "edu" ).className.split(" ");
		cls2[1] = "inactive";
		document.getElementById( "edu" ).className = cls2[0] + " " + cls2[1];
	}
	else{
		document.getElementById( "edu-menu" ).className = "active-info-menu";
		document.getElementById( "overview-menu" ).className = "inactive-info-menu";
		document.getElementById( "basic-menu" ).className = "inactive-info-menu";
		
		var cls = document.getElementById( "edu" ).className.split(" ");
		cls[1] = "active";
		document.getElementById( "edu" ).className = cls[0] + " " + cls[1];
		
		var cls1 = document.getElementById( "overview" ).className.split(" ");
		cls1[1] = "inactive";
		document.getElementById( "overview" ).className = cls1[0] + " " + cls1[1];
		
		var cls2 = document.getElementById( "basic" ).className.split(" ");
		cls2[1] = "inactive";
		document.getElementById( "basic" ).className = cls2[0] + " " + cls2[1];
	}
}



var oldPost = "";

function getPostValue(){
	var post          = document.getElementById("write-post-text").value;
	document.getElementById("write-post-text").value = "";
	//console.log(post);
	//var author        = document.getElementById("author").value;
	//console.log(author);
	
	var post_category = document.getElementById("write-post-category").value;
	///document.getElementById("write-post-category").value = "";
	//console.log(post_category);
	
	post = post.split('\n');
	var mainPost = "";
	
	var ind = 0;
	
	for( ind in post ){
		mainPost += post[ind] + "</br>";
	}
	//var mainPost      = post.replace("\n", '</br>');
	
	//console.log(mainPost);
	
	//document.getElementById("faltu").innerHTML =  mainPost + "</br>" + author + "</br>" + post_link + "</br>" + post_category + "</br>";
	
	var querry = "post=" + mainPost + "&post-category=" + post_category;
	
	//console.log(querry);
	loadAJAX( "POST", "../app/rest/setPost.php", querry, checkRes );
	
}
	
function checkRes( res ){
	if(res){
		console.log("true");
		writePost();
	}
	else
		console.log("false");
		//document.getElementById("loadPost").innerHTML = "No Post found.";
	
	
}


function writePost(){
	var querry = "name=post"
	loadAJAX( "POST", "../app/rest/getProfilePost.php", querry, updatePost );
}

function updatePost( data ){
	//console.log(data);
	var result = JSON.parse(data);
//	console.log(result);
	var htm = "";
	var querry = '';
	var i = 0;
	var j = 0;
	//var profile = [];
	//console.log(result);
	if( result.length >= oldPost.length ){
		var profile = [];
		for( i = result.length - 1; i >= oldPost.length; i-- ){
			querry = "name=profiles&id="+result[i].author_user_id;
			loadAJAX( "POST", "../app/rest/getProfileInfo.php", querry, setUserTable );
			//console.log(querry);
			function setUserTable( data ){
				if(data){
					profile.push( JSON.parse(data) );
					htm += '<div class = "row post-wrapper">';
					htm += '<div class = "row post-info">';
					htm += '<div class = "post-author-info-wrapper col-l-6">';
					htm += '<div class = "row">';
					htm += '<div class = "col-l-6 author-img-wrapper">';
					htm += '<img src = "../app/view/images/'+profile[j][0].pic+'" alt = "" class = "post-author-img" />';
					htm += '</div>';
					htm += '<div class = "col-l-6 post-author-info" >';
					htm += '<div class = "row post-author-name"><a href = "profile/'+profile[j][0].user_name+'">'+profile[j][0].full_name+'</a></div>';
					htm += '<div class = "row post-author-time">'+result[result.length - j - 1].time+'</div>';
					htm += '</div></div></div>';
					htm += '<div class = "post-author-editable col-l-6"></div></div>';
					htm += '<div class = "row post-box">';
					htm += '<div id = "loadPost" class = "post-text-box">';
					htm += result[result.length - j - 1].post_text;
					htm += '</div></div>';
					htm += '<div class = "row post-emote-box">';
					htm += '<div id = "post-id-'+result[result.length - j - 1].post_id+'" class = "col-l-6 post-like" onclick = "setLike(this)">'
					if( result[result.length - j - 1].like ){
						htm += "unlike ";
					}
					else{
						htm += "like ";
					}
					htm += '<span class = "post-like-num">';
					if( result[result.length - j - 1].like_num == 0 )
						htm += "";
					else
						htm += '( '+ result[result.length - j - 1].like_num + ' )';
					htm += '</span> </div>';
					htm += '<div class = "col-l-6 post-comment"> <span class = "post-comment-num">';
					if( result[result.length - j - 1].like_num == 0 )
						htm += "";
					else
						htm += '( ' + result[result.length - j - 1].comment_num + ' )';
					htm += '</span> comment </div></div>';
					
					var x = 0;
					for( x = 0; x < result[result.length - j - 1].comments.length; x++){
						
						htm += '<div class = "row comment-box-wrapper">';
						htm += '<div class = "col-l-1">';
						htm += '<div class = "author-img-wrapper">';
						htm += '<img src = "../app/view/images/'+result[result.length - j - 1].comments[x].author_pic+'" alt = "" class = "post-author-img" />';
						htm += '</div>';
						htm += '</div>';
						htm += '<div class = "comment-box-form col-l-11">';
						htm += '<div class = "row">';
						htm += '<div class = "col-l-3 comment-author">';
						htm += '<div class = "row post-author-name"><a href = "profile/'+result[result.length - j - 1].comments[x].user_name+'">'+result[result.length - j - 1].comments[x].author_name+'</a></div>';
						htm += '<div class = "row post-author-time">'+result[result.length - j - 1].comments[x].time+'</div>';
						htm += '</div>';
						htm += '<div class = "col-l-9  main-comment">';
						htm += result[result.length - j - 1].comments[x].comment_text;
						htm += '</div>';
						htm += '</div>';
						htm += '</div>';
						htm += '</div>';
					}
					
					
					htm += '<div class = "row comment-box-wrapper">';
					htm += '<div class = "col-l-1">';
					htm += '<div class = "author-img-wrapper">';
					htm += '<img src = "../app/view/images/'+profile[j][0].pic+'" alt = "" class = "post-author-img" />';
					htm += '</div></div>'
					htm += '<form class = "col-l-11 comment-box-form">';
					htm += '<div class = "row">';
					htm += '<input type = "text" class = "col-l-9" id = "comment-id-input-edit-'+result[result.length - j - 1].post_id+'"/>';
					htm += '<div class = "col-l-1"></div>';
					htm += '<input class = "col-l-2" type = "button" value = "comment" id = "comment-id-input-'+result[result.length - j - 1].post_id+'" onclick = "getComment(this.id)"/>';
					htm += '</div></form></div>'
					
					
					
					htm += '</div></div>';
					
					if( (result.length - j -1) == oldPost.length ){
						
						htm += document.getElementById('main-post-container').innerHTML;
						document.getElementById('main-post-container').innerHTML = htm;
						//console.log(htm);
						oldPost = result;
						j = 0;
					}
					j++;
				}
				else console.log("false");
			}
		}
	}
}


function setLike( elem ){
	var id = elem.id;
	id = id.split("-");
	var pid = id[2];
	
	var str = "pid=" + pid;
	//console.log(str);
	loadAJAX( "POST", "../app/rest/setLike.php", str, checkLike );
	
	function checkLike( res ){
		if(res == "deleted"){
			var txt = elem.innerHTML;
			console.log(txt);
			txt = txt.split(" ");
			txt[0] = "like";
			var htm = "";
			var ind = 0;
			for( ind = 0 ; ind  < txt.length; ind++ ){
				htm += txt[ind]+" ";
			}
			console.log(htm);
			elem.innerHTML = htm;
			console.log("d");
		}
		else if(res){
			var txt = elem.innerHTML;
			console.log(txt);
			txt = txt.split(" ");
			txt[0] = "unlike";
			var htm = "";
			var ind = 0;
			for( ind = 0 ; ind  < txt.length; ind++ ){
				htm += txt[ind]+" ";
			}
			console.log(htm);
			elem.innerHTML = htm;
			console.log("e");
		}
	}
	
	
}

writePost();

setInterval(writePost,1000);
//setInterval(getLikes,500);


//html_entity_decode();




function getComment( id ){
	console.log(id);
	var inputId = "";
	id = id.split("-");
	inputId = id[0]+"-"+id[1]+"-"+id[2]+"-edit-"+id[3];
	console.log(inputId);
	var value = document.getElementById(inputId).value;
	var str = "cmmnt="+value+"&pst="+id[3];
	console.log(str);
	loadAJAX( "POST", "../app/rest/setComment.php", str, checkComment );
}

function checkComment( res ){
	console.log( res );
}




function switchMenu( elem ){
	if( elem.id == "menu-feed" ){
		elem.style.backgroundColor = '#fff';
		elem.style.color = '#00897b';
		document.getElementById('menu-info').style.backgroundColor = '#00897b';
		document.getElementById('menu-info').style.color = '#fff';
		document.getElementById('feed-container').style.display = 'block';
		document.getElementById('info-container').style.display = 'none';
	}
	else if( elem.id == "menu-info" ){
		elem.style.backgroundColor = '#fff';
		elem.style.color = '#00897b';
		document.getElementById('menu-feed').style.backgroundColor = '#00897b';
		document.getElementById('menu-feed').style.color = '#fff';
		document.getElementById('feed-container').style.display = 'none';
		document.getElementById('info-container').style.display = 'block';
	}
}


function uploadImage(){
        var fileObj = document.getElementById("edit-pic");
        
		console.log(fileObj.files[0]);
        var file = fileObj.files[0];
		
		console.log(file);
        //Preparing the form data
        var formdata = new FormData();
        formdata.append("img", file);

		//loadAJAX( "POST", "../app/rest/image.php", formdata, upload );
		var xhttp = new XMLHttpRequest();
		xhttp.open( "POST", "../app/rest/image.php", true );
		//xhttp.setRequestHeader("Content-type", "multipart/form-data");
		
		xhttp.onreadystatechange = function() {
			if ( this.readyState == 4 && this.status == 200 ) {
				upload( this.responseText );
			}
		};
        xhttp.send( formdata );
    }
	
function upload ( result ) {
	var img = document.getElementById("timeline-picture");
	console.log(result);
	img.src = "../app/view/images/"+result; 
}	
	
	



