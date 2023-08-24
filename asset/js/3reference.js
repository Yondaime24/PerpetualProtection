//Reference 1
const name2 = document.getElementById('name2');
const address2 = document.getElementById('address2');
const contact_num2 = document.getElementById('contact_num2');
const relation2 = document.getElementById('relation2');

function checkInputs(){
	//Reference 1
	const name2Value = name2.value;
	const address2Value = address2.value;
	const contact_num2Value = contact_num2.value;
	const relation2Value = relation2.value;

	let na2=0;let ad2=0;let co2=0;let re2=0;

	// REFERENCES
	if (name2Value === '') {
		setErrorFor(name2, 'Name cannot be blank');
		na2=0;
	}else if (!isLetter(name2Value)){
		setErrorFor(name2, 'Must consist of letters, -, or space only');
		na2=0;
	}else if (!isTrimLetter(name2Value)) {
		setErrorFor(name2, 'Please remove whitespaces');
		na2=0;
	}else{
		setSuccessFor(name2);
		na2=1;
	}

	if (address2Value === '') {
		setErrorFor(address2, 'Address cannot be blank');
		ad2=0;
	}else if (!isAddress(address2Value)) {
		setErrorFor(address2, 'Consist of letters, numbers, comma, - or . only');
		ad2=0;
	}else if (!isTrimAddress(address2Value)) {
		setErrorFor(address2, 'Please remove whitespaces');
		ad2=0;
	}
	else{
		setSuccessFor(address2);
		ad2=1;
	}

	if (contact_num2Value === '') {
		setErrorFor(contact_num2, 'Contact number cannot be blank');
		co2=0;
	}else if (!isContact(contact_num2Value)) {
		setErrorFor(contact_num2, 'Contact number invalid');
		co2=0;
	}else if (contact_num2Value.indexOf('0')!==0) {
		setErrorFor(contact_num2, 'Contact number must start with 0');
		co2=0;
	}else{
		setSuccessFor(contact_num2);
		co2=1;
	}

	if (relation2Value === '') {
		setErrorFor(relation2, 'Relation cannot be blank');
		re2=0;
	}else if (!isLetter(relation2Value)){
		setErrorFor(relation2, 'Must consist of letters, -, or space only');
		re2=0;
	}else if (!isTrimLetter(relation2Value)) {
		setErrorFor(relation2, 'Please remove whitespaces');
		re2=0;
	}else{
		setSuccessFor(relation2);
		re2=1;
	}

	if(na2==1&&ad2==1&&co2==1&&re2==1){
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

function isAddress(add){
	return /^[0-9a-zA-Z\-\,\.\ \s]+$/.test(add);
}
function isTrimAddress(address){
	return /^(?!\s)([0-9a-zA-Z\-\,\.\ ])*?(?<!\s)$/.test(address);
}

