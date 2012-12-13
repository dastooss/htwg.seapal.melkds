function isText(eintrag, id, length, noCheck) {
	text = eintrag.trim();
	if((length > 0 && text.length != length) || text == "") { 
		document.getElementById(id).style.border = "1px solid #FF0033";
		if(!noCheck) isCorrect();
		return false;
	} else {
		document.getElementById(id).style.border = "";
		if(!noCheck) isCorrect();
		return true;
	}
}
   
function isNumber(eintrag, id, length, noCheck) {
	ist_zahl = true;
	if((length > 0 && eintrag.length != length) || eintrag.length == 0) {
		ist_zahl = false;
	} else { 
		for(i = 0; i < eintrag.length; i++) {
			if((eintrag.charAt(i) < "0" || eintrag.charAt(i) > "9") && eintrag.charAt(i) != '.' && eintrag.charAt(i) != ',') {
				ist_zahl = false;
				break;
			}
		}
	}
	if(ist_zahl) {
		document.getElementById(id).style.border = "";
		if(!noCheck) isCorrect();
		return true;
	} else {
		document.getElementById(id).style.border = "1px solid #FF0033";
		if(!noCheck) isCorrect();
		return false;
	}
}
   
function isCorrect() { 
	voll = true; 
	for(i = 0; i < $('input').length; i++) {
		if($('input')[i].value == "" || $('input')[i].style.border == "1px solid rgb(255, 0, 51)") {
			voll = false;
			break;
		}
	}
	if(!voll) {
		document.getElementById('save').disabled = true;
	} else {
		document.getElementById('save').disabled = false;
	}
	return voll; 
}