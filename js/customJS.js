/* Show WLAP List */
function showWLAPList() {
	document.getElementById('WLAPList').style.display = "none";
	document.getElementById('WLAPList2').style.display = "none";
	document.getElementById('WLAPList').style.display = "block";
}
function showWLAPList2() {
	document.getElementById('WLAPList').style.display = "none";
	document.getElementById('WLAPList2').style.display = "none";
	document.getElementById('WLAPList2').style.display = "block";
}

/* Upload new photo */
function showPhotoInput() {
	document.getElementById('changePhoto').style.display = "none";
	document.getElementById('fileToUpload').style.display = "block";
	document.getElementById('submit').style.display = "inline-block";
	document.getElementById('can').style.display = "inline-block";
}

function hidePhotoInput() {
	document.getElementById('changePhoto').style.display = "block";
	document.getElementById('fileToUpload').style.display = "none";
	document.getElementById('submit').style.display = "none";
	document.getElementById('can').style.display = "none";
}

/* Show Faculty Schedule */
function showFacSchedule() {
	document.getElementById('facSched').style.display = "none";
	document.getElementById('facSched').style.display = "block";
}