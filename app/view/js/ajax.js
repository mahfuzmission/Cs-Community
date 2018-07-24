function loadAJAX( method, url, value, callback ){
	var xhttp = new XMLHttpRequest();
	xhttp.open( method, url, true );
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send( value );
	xhttp.onreadystatechange = function() {
		if ( this.readyState == 4 && this.status == 200 ) {
			callback( this.responseText );
		}
	};
}

