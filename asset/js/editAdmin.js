const fname = document.getElementById('fname');
const mname = document.getElementById('mname');
const lname = document.getElementById('lname');
const gender = document.getElementById('gender');
const age = document.getElementById('age');
const place_of_birth = document.getElementById('place_of_birth');
const birthday = document.getElementById('birthday');
const contact_number = document.getElementById('contact_number');
const email_address = document.getElementById('email_address');
const residential_address = document.getElementById('residential_address');

function checkInputs(){

	const fnameValue = fname.value;
	const mnameValue = mname.value;
	const lnameValue = lname.value;
	const genderValue = gender.value.trim();
	const ageValue = age.value.trim();
	const place_of_birthValue = place_of_birth.value;
	const birthdayValue = birthday.value.trim();
	const contact_numberValue = contact_number.value.trim();
	const email_addressValue = email_address.value.trim();
	const residential_addressValue = residential_address.value;

	let fn=0;
	let mn=0;
	let ln=0;
	let ge=0;
	let ag=0;
	let pl=0;
	let bi=0;
	let co=0;
	let em=0;
	let re=0;


	if (fnameValue === '') {
		setErrorFor(fname, 'First name cannot be blank');
		fn=0;
	}else if (!isLetter(fnameValue)){
		setErrorFor(fname, 'Must consist of letters, -, or space only');
		fn=0;
	}else if (!isTrimLetter(fnameValue)) {
		setErrorFor(fname, 'Please remove whitespaces');
		fn=0;
	}else{
		setSuccessFor(fname);
		fn=1;
	}

	if (!isTrimLetter(mnameValue)) {
		setErrorFor(mname, 'Must consist of letters and no whitespaces');
		mn=0;
	}else{
		setSuccessFor(mname);
		mn=1;
	}

	if (lnameValue === '') {
		setErrorFor(lname, 'Last name cannot be blank');
		ln=0;
	}else if (!isLetter(lnameValue)){
		setErrorFor(lname, 'Must consist of letters, -, or space only');
		ln=0;
	}else if (!isTrimLetter(lnameValue)) {
		setErrorFor(lname, 'Please remove whitespaces');
		ln=0;
	}else{
		setSuccessFor(lname);
		ln=1;
	}

	if (genderValue === '') {
		alert("Please Select Gender");
		setErrorFor(gender, '');
		ge=0;
	}else{
		setSuccessFor(gender);
		ge=1;
	}

	if (ageValue === '') {
		alert("Please Select Age");
		setErrorFor(age, '');
		ag=0;
	}else{
		setSuccessFor(age);
		ag=1;
	}


	if (place_of_birthValue === '') {
		setErrorFor(place_of_birth, 'Place of birth cannot be blank');
		pl=0;
	}else if (!isAddress(place_of_birthValue)) {
		setErrorFor(place_of_birth, 'Consist of letters, numbers, comma, - or . only');
		pl=0;
	}else if (!isTrimAddress(place_of_birthValue)) {
		setErrorFor(place_of_birth, 'Please remove whitespaces');
		pl=0;
	}
	else{
		setSuccessFor(place_of_birth);
		pl=1;
	}

	if (birthdayValue === '') {
		setErrorFor(birthday, 'Birthday cannot be blank');
		bi=0;
	}else{
		setSuccessFor(birthday);
		bi=1;
	}


	if (contact_numberValue === '') {
		setErrorFor(contact_number, 'Contact number cannot be blank');
		co=0;
	}else if (!isContact(contact_numberValue)) {
		setErrorFor(contact_number, 'Contact number invalid');
		co=0;
	}else if (contact_numberValue.indexOf('0')!==0) {
		setErrorFor(contact_number, 'Contact number must start with 0');
		co=0;
	}else{
		setSuccessFor(contact_number);
		co=1;
	}

	if (email_addressValue === '') {
		setErrorFor(email_address, 'Email cannot be blank');
		em=0;
	}else if (!isEmail(email_addressValue)){
		setErrorFor(email_address, 'Email is not valid');
		em=0;
	}else{
		setSuccessFor(email_address);
		em=1;
	}


	if (residential_addressValue === '') {
		setErrorFor(residential_address, 'Residential address cannot be blank');
		re=0;
	}else if (!isAddress(residential_addressValue)) {
		setErrorFor(residential_address, 'Consist of letters, numbers, comma, - or . only');
		re=0;
	}else if (!isTrimAddress(residential_addressValue)) {
		setErrorFor(residential_address, 'Please remove whitespaces');
		re=0;
	}
	else{
		setSuccessFor(residential_address);
		re=1;
	}


	if(fn==1&&mn==1&&ln==1&&ge==1&&ag==1&&pl==1&&bi==1&&co==1&&em==1&&re==1){
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
