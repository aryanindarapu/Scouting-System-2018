function blink() {
	var visibility = "showing";
	var f = document.getElementById('PressStart');
	setInterval(function() {
	   if(visibility == "showing"){
		  f.style.visibility = "hidden";
		  visibility = "hidden";
	   } else if(visibility == "hidden"){
		  f.style.visibility = "visible";
		  visibility = "showing";
	   }
	}, 1000);
}