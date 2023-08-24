//Beneficiary 1
const bname2 = document.getElementById('bname2');
const bage2 = document.getElementById('bage2');
const brelationship2 = document.getElementById('brelationship2');
const bcontact_num2 = document.getElementById('bcontact_num2');

function checkInputs(){
	//Beneficiary 1
	const bname2Value = bname2.value;
	const bage2Value = bage2.value.trim();
	const brelationship2Value = brelationship2.value;
	const bcontact_num2Value = bcontact_num2.value;

	let bn2=0;let ba2=0;let br2=0;let bc2=0;

	// BENEFICIARIES
	if (bname2Value === '') {
		setErrorFor(bname2, 'Name cannot be blank');
		bn2=0;
	}else if (!isLetter(bname2Value)){
		setErrorFor(bname2, 'Must consist of letters, -, or space only');
		bn2=0;
	}else if (!isTrimLetter(bname2Value)) {
		setErrorFor(bname2, 'Please remove whitespaces');
		bn2=0;
	}else{
		setSuccessFor(bname2);
		bn2=1;
	}

	if (bage2Value === '') {
		alert("Please Select Second Beneficiary Age");
		setErrorFor(bage2, '');
		ba2=0;
	}else{
		setSuccessFor(bage2);
		ba2=1;
	}

	if (brelationship2Value === '') {
		setErrorFor(brelationship2, 'Relation cannot be blank');
		br2=0;
	}else if (!isLetter(brelationship2Value)){
		setErrorFor(brelationship2, 'Must consist of letters, -, or space only');
		br2=0;
	}else if (!isTrimLetter(brelationship2Value)) {
		setErrorFor(brelationship2, 'Please remove whitespaces');
		br2=0;
	}else{
		setSuccessFor(brelationship2);
		br2=1;
	}

	if (bcontact_num2Value === '') {
		setErrorFor(bcontact_num2, 'Contact number cannot be blank');
		bc2=0;
	}else if (!isContact(bcontact_num2Value)) {
		setErrorFor(bcontact_num2, 'Contact number invalid');
		bc2=0;
	}else if (bcontact_num2Value.indexOf('0')!==0) {
		setErrorFor(bcontact_num2, 'Contact number must start with 0');
		bc2=0;
	}else{
		setSuccessFor(bcontact_num2);
		bc2=1;
	}

	if(bn2==1&&ba2==1&&br2==1&&bc2==1){
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


