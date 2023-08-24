//Beneficiary 1
const bname1 = document.getElementById('payment');
const bage1 = document.getElementById('requestReason');
var request_btn = document.getElementById("request_btn");

function checkInputs(){
	//Beneficiary 1
	const bname1Value = bname1.value;
	const bage1Value = bage1.value.trim();

	let bn1=0;let ba1=0;

	// BENEFICIARIES
	if (bname1Value === '') {
		setErrorFor(bname1, 'Please add payment first');
		bn1=0;
	}else if (!isNumber(bname1Value)){
		setErrorFor(bname1, 'Must consist of letters, -, or space only');
		bn1=0;
	}else{
		// setSuccessFor(bname1);
		bn1=1;
	}

	if (bage1Value === '') {
		alert("Please Select Reason For Request");
		setErrorFor(bage1, '');
		ba1=0;
	}else{
		setSuccessFor(bage1);
		ba1=1;
	}

	if(bn1==1&&ba1==1){
		return true;
	}else{
		alert("Form submission denied");
		return false;
	}
}

function setErrorFor(input, message){
	const inputBox = input.parentElement;  // .form-control
	const small = inputBox.querySelector('small');

	//add error message inside small
	small.innerText = message;

	//add error class
	inputBox.className = 'input-box error';

}


function setSuccessFor(input){
	const inputBox = input.parentElement;  // .form-control
	inputBox.className = 'input-box success';

}

function isEmail(email){
	return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email);
}

function isLetter(letter){
	return /^[a-zA-Z\-\ \s]+$/.test(letter);
}
function isTrimLetter(letterspace){
	return /^(?!\s)([a-zA-Z\-\ ])*?(?<!\s)$/.test(letterspace);
}


function isNumber(number){
	return /^[0-9\.]+$/.test(number);
}
function isTrimNumber(trimNumber){
	return /^(?!\s)([0-9])*?(?<!\s)$/.test(trimNumber);
}

function isContact(contact_num){
	return /^\d{11}$/.test(contact_num);
}

function lettersOnly(all){
	return /^[a-zA-Z\s]+$/.test(all);
}
function trimLettersOnly(lettersonly){
	return /^(?!\s)([a-zA-Z])*?(?<!\s)$/.test(lettersonly);
}

function isUsername(username){
	return /^[0-9a-zA-Z\.\@\_\s]+$/.test(username);
}
function isTrimUsername(space){
	return /^(?!\s)([a-zA-Z0-9\.\@\_])*?(?<!\s)$/.test(space);
}


