//Reference 1
const name1 = document.getElementById('name1');
const address1 = document.getElementById('address1');
const contact_num1 = document.getElementById('contact_num1');
const relation1 = document.getElementById('relation1');

function checkInputs(){
	//Reference 1
	const name1Value = name1.value;
	const address1Value = address1.value;
	const contact_num1Value = contact_num1.value;
	const relation1Value = relation1.value;

	let na1=0;let ad1=0;let co1=0;let re1=0;

	// REFERENCES
	if (name1Value === '') {
		setErrorFor(name1, 'Name cannot be blank');
		na1=0;
	}else if (!isLetter(name1Value)){
		setErrorFor(name1, 'Must consist of letters, -, or space only');
		na1=0;
	}else if (!isTrimLetter(name1Value)) {
		setErrorFor(name1, 'Please remove whitespaces');
		na1=0;
	}else{
		setSuccessFor(name1);
		na1=1;
	}

	if (address1Value === '') {
		setErrorFor(address1, 'Address cannot be blank');
		ad1=0;
	}else if (!isAddress(address1Value)) {
		setErrorFor(address1, 'Consist of letters, numbers, comma, - or . only');
		ad1=0;
	}else if (!isTrimAddress(address1Value)) {
		setErrorFor(address1, 'Please remove whitespaces');
		ad1=0;
	}
	else{
		setSuccessFor(address1);
		ad1=1;
	}

	if (contact_num1Value === '') {
		setErrorFor(contact_num1, 'Contact number cannot be blank');
		co1=0;
	}else if (!isContact(contact_num1Value)) {
		setErrorFor(contact_num1, 'Contact number invalid');
		co1=0;
	}else if (contact_num1Value.indexOf('0')!==0) {
		setErrorFor(contact_num1, 'Contact number must start with 0');
		co1=0;
	}else{
		setSuccessFor(contact_num1);
		co1=1;
	}

	if (relation1Value === '') {
		setErrorFor(relation1, 'Relation cannot be blank');
		re1=0;
	}else if (!isLetter(relation1Value)){
		setErrorFor(relation1, 'Must consist of letters, -, or space only');
		re1=0;
	}else if (!isTrimLetter(relation1Value)) {
		setErrorFor(relation1, 'Please remove whitespaces');
		re1=0;
	}else{
		setSuccessFor(relation1);
		re1=1;
	}

	if(na1==1&&ad1==1&&co1==1&&re1==1){
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

