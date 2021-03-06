var error = false;


function check() {
	var mainform = document.getElementById('mainform');
	
	var first_name = mainform.first_name.value;
	if(first_name.length == 0) {
		flag_error(mainform.first_name, "Input your first name!");
		return;
	} else {
		flag_ok(mainform.first_name);
	}
	
	var last_name = mainform.last_name.value;
	if(last_name.length == 0) {
		flag_error(mainform.last_name, "Input your last name!");
		return;
	} else {
		flag_ok(mainform.last_name);
	}
	
	var email = mainform.email.value;
	if(email.length == 0) {
		flag_error(mainform.email, "Input your e-mail!");
		return;
	} else if((email.indexOf("@") == -1) || (email.indexOf(".") == -1)) { //Do not contain @ nor .
		flag_error(mainform.email, "Your e-mail must be a valid adress!");
		return;
	} else if(email.indexOf(" ") > -1) {
		flag_error(mainform.email, "Your e-mail must not contain space character ' '!");
		return;
	} else {
		flag_ok(mainform.email);
	}
	
	var password = mainform.password.value;
	if(password.length < 6) {
		flag_error(mainform.password, "Your password must be more then 6 charaters!");
		return;
	} else {
		flag_ok(mainform.password);
	}
	
	var password = mainform.password.value;
	if(password.length < 6) {
		flag_error(mainform.password, "Your password must be more then 6 charaters!");
		return;
	} else {
		flag_ok(mainform.password);
	}
	
	var gender = mainform.gender;
	var gender_group_border = document.getElementById("gender_group_border");
	for(i=0;i<gender.length;i++) {
		if(gender[i].checked) {
			flag_ok(gender_group_border);
			break;
		} else if(i == gender.length-1) {
			gender_group_border.className = "error";
			document.getElementById("errorLog").innerHTML = "You must to choose your gender!<br>";
			error = true;
			return;
		}
	}
	
	var lang = mainform.lang;
	if(lang.selectedIndex == 0) {
		flag_error(lang, "You must choose your language!");
		return;
	}
	else {
		flag_ok(lang);
	}
	
	var checkbox = mainform.checkbox;
	var checkbox_terms_border = document.getElementById("checkbox_terms_border");
	if(checkbox.checked ==false) {
		flag_error(checkbox_terms_border, "Your must agree with terms to completer registration!");
		return;
	} else {
		flag_ok(checkbox_terms_border);
	}
	
	if(error == false) {mainform.submit();alert("Success!");}
	else alert("Your input contains errors!");
}

function flag_error(input, message) {
	input.className = "error";
	input.focus();
	document.getElementById("errorLog").innerHTML = message+"<br>";
	error = true;
	return;
}

function flag_ok(object) {
	object.className = "ok";
	document.getElementById("errorLog").innerHTML = "";
	error = false;
}

function checkJS() {
	document.getElementById("submit_button").style.display = "inline";
}