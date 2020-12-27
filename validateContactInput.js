var form = document.getElementById('contactForm');
var customerName = document.getElementById('customerName');
var email = document.getElementById('customerEmail');
var phone = document.getElementById('customerPhone');

form.addEventListener('submit', (e) => {
	var nameError = "";
	var emailError = "";
	var phoneError = "";
	var message = document.getElementById('customerNote');

	document.getElementById("nameError").innerHTML = "";
	document.getElementById("emailError").innerHTML = "";
	document.getElementById("phoneError").innerHTML = "";

	var allErrors = [];

	customerName.value = String(customerName.value).trim();
	var regName = /^[A-Za-z]+$/;
   	if( !customerName.value.match(regName) )
	{
		console.log("nameError");
		nameError = "Only letters and white space allowed";
		document.getElementById("nameError").innerHTML = nameError;
		allErrors.push(nameError);
	}
	
	email.value = String(email.value).trim();
	var regEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
	if( !email.value.match(regEmail) )
	{
		emailError = "Invalid email format";
		document.getElementById("emailError").innerHTML = emailError;
		allErrors.push(emailError);
	}

	if( phone.value != '' || phone.value != null )
	{
		phone.value = String(phone.value).trim();
		regPhone = /^([0-9]{8}|[0-9]{7})*$/;
		if( !phone.value.match(regPhone) )
		{
			phoneError = "Enter a valid phone number";
			document.getElementById("phoneError").innerHTML = phoneError;
			allErrors.push(phoneError);
		}
	}

	if(allErrors.length > 0)
	{
		e.preventDefault();
		document.getElementById("sendError").innerHTML = "Message Not Sent!";
	}
	else
	{
		sendMessage();
		document.getElementById("sendError").innerHTML = "Message Sent!";
	}

	
})

function sendMessage() {
	const FD = new FormData( form );
	const xhr = new XMLHttpRequest();

	xhr.onload = function(){
		document.getElementById("sendError").innerHTML = "Sending Message!";
	};

	xhr.open("POST", "./Includes/ContactUsForm.php", true);
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send(FD);
  }