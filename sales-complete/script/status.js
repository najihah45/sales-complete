function getStatus(select) {

	var item = select.options[select.selectedIndex].value;

	var status = document.getElementById("con_status");

	if (item == '0%') {
		item = "Lost deal";
	} else if (item == '10%') {
		item = "Introduction";
	} else if (item == '20%') {
		item = "Meeting";
	} else if (item == '50%') {
		item = "Quotation";
	} else if (item == '70%') {
		item = "Company selected";
	} else if (item == '90%') {
		item = "Contract negotiation";
	} else if (item == '100%') {
		item = "Closed";
	}

	status.value = item;

	// status.innerHTML =item;

	// alert(value);
}