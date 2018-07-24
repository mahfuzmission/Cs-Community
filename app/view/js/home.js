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
	loadAJAX( "POST", "app/rest/setPost.php", querry, checkRes );
	
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
	loadAJAX( "POST", "app/rest/getPost.php", querry, updatePost );
}

function updatePost( data ){
	//console.log(data);
	var result = JSON.parse(data);
	console.log(result);
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
			loadAJAX( "POST", "app/rest/getProfileInfo.php", querry, setUserTable );
			//console.log(querry);
			function setUserTable( data ){
				if(data){
					//console.log(data);
					profile.push( JSON.parse(data) );
					console.log(profile[j]);
					htm += '<div class = "row post-wrapper">';
					htm += '<div class = "row post-info">';
					htm += '<div class = "post-author-info-wrapper col-l-6">';
					htm += '<div class = "row">';
					htm += '<div class = "col-l-6 author-img-wrapper">';
					htm += '<img src = "app/view/images/'+profile[j][0].pic+'" alt = "" class = "post-author-img" />';
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
						console.log(result[result.length - j - 1].comments[x]);
						htm += '<div class = "row comment-box-wrapper">';
						htm += '<div class = "col-l-1">';
						htm += '<div class = "author-img-wrapper">';
						htm += '<img src = "app/view/images/'+result[result.length - j - 1].comments[x].author_pic+'" alt = "" class = "post-author-img" />';
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
						/*htm += '<div class = "comment-box-form col-l-11">';
						htm += '<div class = "row">';
						htm += '<div class = "col-l-3 comment-author">';
						htm += '<div class = "col-l-3 comment-author">';
						htm += '<div class = "row post-author-name"><a href = "profile/'+result[result.length - j - 1].comments[x].user_name+'">'+result[result.length - j - 1].comments[x].author_name+'</a></div>';
						htm += '<div class = "row post-author-time">10/06/1994 - 23:25:24</div>';
						htm += '</div>';
						htm += '<div class = "col-l-9  main-comment">';
						htm += result[result.length - j - 1].comments[x].comment_text;
						htm += '</div></div></div></div>';*/
					
					
					htm += '<div class = "row comment-box-wrapper">';
					htm += '<div class = "col-l-1">';
					htm += '<div class = "author-img-wrapper">';
					htm += '<img src = "app/view/images/'+profile[j][1][0].pic+'" alt = "" class = "post-author-img" />';
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
	loadAJAX( "POST", "app/rest/setLike.php", str, checkLike );
	
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
	loadAJAX( "POST", "app/rest/setComment.php", str, checkComment );
}

function checkComment( res ){
	console.log( res );
}
























