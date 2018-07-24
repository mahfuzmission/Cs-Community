function getMyPost(  ){
	
	//var str = "";	
	 var str = "name=post";
	 loadAJAX("POST","app/rest/getPost.php", str, load );
}

function load( data ){
	

		/*var result=JSON.parse(data);
		console.log(result);*/
		var newresult =JSON.parse(data);
		console.log(newresult);
		
	/*	
		newresult[0] =JSON.parse(data[0]); 
		
		var str = "post_text: "+result.post_text;
		document.getElementById("loadPost").innerHTML = str;
	*/
	
	
}