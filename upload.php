<script>
    function uploadImage(){
        //Returns a list of files
        var fileObj = document.getElementById("up");
        //Picking the first one
		//console.log(fileObj.files[0]);
        var file = fileObj.files[0];
		
		
        //Preparing the form data
        var formdata = new FormData();
        formdata.append("img", file);

        xhr = new XMLHttpRequest();
        xhr.open("POST", "handle.php", true);

        xhr.onreadystatechange = function(){
            if(xhr.readyState==4){
                //Displaying the image receieved from the server
                var img = document.getElementById("ok");
				console.log(this.responseText);
				img.src = xhr.responseText;                
            }
        }
        xhr.send(formdata);
    }
</script>

<input name="img" type="file" id = "up"/>
<hr/>
<input type="button" onclick="uploadImage()" value="UPLOAD"/>
<hr/>
<img id = "ok" >