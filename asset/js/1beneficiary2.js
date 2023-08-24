//Beneficiary 1
const bname1 = document.getElementById('bname1');
const bage1 = document.getElementById('bage1');
const brelationship1 = document.getElementById('brelationship1');
const bcontact_num1 = document.getElementById('bcontact_num1');

function checkInputs(){
	//Beneficiary 1
	const bname1Value = bname1.value;
	const bage1Value = bage1.value.trim();
	const brelationship1Value = brelationship1.value;
	const bcontact_num1Value = bcontact_num1.value;

	let bn1=0;let ba1=0;let br1=0;let bc1=0;

	// BENEFICIARIES
	if (bname1Value === '') {
		setErrorFor(bname1, 'Name cannot be blank');
		bn1=0;
	}else if (!isLetter(bname1Value)){
		setErrorFor(bname1, 'Must consist of letters, -, or space only');
		bn1=0;
	}else if (!isTrimLetter(bname1Value)) {
		setErrorFor(bname1, 'Please remove whitespaces');
		bn1=0;
	}else{
		setSuccessFor(bname1);
		bn1=1;
	}

	if (bage1Value === '') {
		alert("Please Select First Beneficiary Age");
		setErrorFor(bage1, '');
		ba1=0;
	}else{
		setSuccessFor(bage1);
		ba1=1;
	}

	if (brelationship1Value === '') {
		setErrorFor(brelationship1, 'Relation cannot be blank');
		br1=0;
	}else if (!isLetter(brelationship1Value)){
		setErrorFor(brelationship1, 'Must consist of letters, -, or space only');
		br1=0;
	}else if (!isTrimLetter(brelationship1Value)) {
		setErrorFor(brelationship1, 'Please remove whitespaces');
		br1=0;
	}else{
		setSuccessFor(brelationship1);
		br1=1;
	}

	if (bcontact_num1Value === '') {
		setErrorFor(bcontact_num1, 'Contact number cannot be blank');
		bc1=0;
	}else if (!isContact(bcontact_num1Value)) {
		setErrorFor(bcontact_num1, 'Contact number invalid');
		bc1=0;
	}else if (bcontact_num1Value.indexOf('0')!==0) {
		setErrorFor(bcontact_num1, 'Contact number must start with 0');
		bc1=0;
	}else{
		setSuccessFor(bcontact_num1);
		bc1=1;
	}

	if(bn1==1&&ba1==1&&br1==1&&bc1==1){
		return true;
	}else{
		alert("Form submission denied. Please check the form and provide valid information to continue! Note no whitespaces at beggining or end");
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
	return /^[0-9\s]+$/.test(number);
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


