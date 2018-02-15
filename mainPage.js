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
	/*var visibility2 = "showing";
	var g = document.getElementById('outline');
	setInterval(function() {
	   if(visibility2 == "showing"){
		  g.style.visibility = "hidden";
		  visibility2 = "hidden";
	   } else if(visibility2 == "hidden"){
		  g.style.visibility = "visible";
		  visibility2 = "showing";
	   }
	}, 1000);*/
}