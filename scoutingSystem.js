function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

var idArray = ["foul", "tech"]
function add(n, id) {
	x = parseInt(document.getElementById(idArray[id]).innerHTML);
	x += n;
	if (x<0) {
		x=0
	}
	document.getElementById(idArray[id]).innerHTML = x.toString();
}

function submit() {
	teamName = document.getElementById("teamName").value;
	console.log(teamName);
	teamNo = document.getElementById("teamNo").value;
	console.log(teamNo);
	cross = document.getElementById("cross").checked;
	console.log(cross);
	switchvar = document.getElementById("switch").checked;
	console.log(switchvar);
	scale = document.getElementById("scale").checked;
	console.log(scale);
	foul = document.getElementById("foul").innerHTML;
	console.log(foul);
	tech = document.getElementById("tech").innerHTML;
	console.log(tech);
	yellow = document.getElementById("yellow").checked;
	console.log(yellow);
	red = document.getElementById("red").checked;
	console.log(red);
	attempt = document.getElementById("attempt").checked;
	console.log(attempt);
	fail = document.getElementById("fail").checked;
	console.log(fail);
	park = document.getElementById("park").checked;
	console.log(park);
	comment = document.getElementById("comment").value;
	console.log(comment);
}