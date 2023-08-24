//Beneficiary 1
const bname3 = document.getElementById('bname3');
const bage3 = document.getElementById('bage3');
const brelationship3 = document.getElementById('brelationship3');
const bcontact_num3 = document.getElementById('bcontact_num3');

function checkInputs(){
	//Beneficiary 1
	const bname3Value = bname3.value;
	const bage3Value = bage3.value.trim();
	const brelationship3Value = brelationship3.value;
	const bcontact_num3Value = bcontact_num3.value;

	let bn3=0;let ba3=0;let br3=0;let bc3=0;

	// BENEFICIARIES
	if (bname3Value === '') {
		setErrorFor(bname3, 'Name cannot be blank');
		bn3=0;
	}else if (!isLetter(bname3Value)){
		setErrorFor(bname3, 'Must consist of letters, -, or space only');
		bn3=0;
	}else if (!isTrimLetter(bname3Value)) {
		setErrorFor(bname3, 'Please remove whitespaces');
		bn3=0;
	}else{
		setSuccessFor(bname3);
		bn3=1;
	}

	if (bage3Value === '') {
		alert("Please Select Third Beneficiary Age");
		setErrorFor(bage3, '');
		ba3=0;
	}else{
		setSuccessFor(bage3);
		ba3=1;
	}

	if (brelationship3Value === '') {
		setErrorFor(brelationship3, 'Relation cannot be blank');
		br3=0;
	}else if (!isLetter(brelationship3Value)){
		setErrorFor(brelationship3, 'Must consist of letters, -, or space only');
		br3=0;
	}else if (!isTrimLetter(brelationship3Value)) {
		setErrorFor(brelationship3, 'Please remove whitespaces');
		br3=0;
	}else{
		setSuccessFor(brelationship3);
		br3=1;
	}

	if (bcontact_num3Value === '') {
		setErrorFor(bcontact_num3, 'Contact number cannot be blank');
		bc3=0;
	}else if (!isContact(bcontact_num3Value)) {
		setErrorFor(bcontact_num3, 'Contact number invalid');
		bc3=0;
	}else if (bcontact_num3Value.indexOf('0')!==0) {
		setErrorFor(bcontact_num3, 'Contact number must start with 0');
		bc3=0;
	}else{
		setSuccessFor(bcontact_num3);
		bc3=1;
	}

	if(bn3==1&&ba3==1&&br3==1&&bc3==1){
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


