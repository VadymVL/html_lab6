var counter = 0;
function check(e) {
	var caller = e.target || e.srcElement;
	var name = document.mainform.name.value;
	if(name=="Vadym") {
		counter++;
		alert("SUCCESS!" + ", " + counter + ", " + caller);
	}
}