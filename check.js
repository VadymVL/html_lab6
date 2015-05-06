var error = false;

function check() {
	var name = document.mainform.name.value;
	if(name.length == 0) {
		alert("Please, input your name!");
		document.mainform.name.className = "error";
		document.getElementById("errorLog").innerHTML = "Input your name!<br>";
		error = true;
		return;
	} else {
		document.mainform.name.className = "ok";
		document.getElementById("errorLog").innerHTML = "";
		error = false;
	}
	
	var password = document.mainform.password.value;
	if(password.length < 6) {
		alert("Please, your password must be more then 6 charaters!");
		document.mainform.password.className = "error";
		document.getElementById("errorLog").innerHTML += "Input your password!<br>";
		error = true;
		return;
	} else {
		document.mainform.password.className = "ok";
		document.getElementById("errorLog").innerHTML = "";
		error = false;
	}
	
	if(error == false) document.mainform.submit();
}