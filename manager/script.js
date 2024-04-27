function toggleDiv() {
	let value1 = document.getElementById("select1").value;
	let value2 = document.getElementById("select2").value;
	let value3 = document.getElementById("select3").value;
	let div1 = document.getElementById("one");
	let div2 = document.getElementById("two");
	let div3 = document.getElementById("three");

	if (value1 === "show") {
		div1.style.visibility = "visible";
	}
	else {
		div1.style.visibility = "hidden";
	}

	if (value2 === "show") {
		div2.style.visibility = "visible";
	}
	else {
		div2.style.visibility = "hidden";
	}

	if (value3 === "show") {
		div3.style.visibility = "visible";
	}
	else {
		div3.style.visibility = "hidden";
	}

}
