
const username = document.getElementById('username');
const password_1 = document.getElementById('password_1');
const password_2 = document.getElementById('password_2');

function checkInputs(){

	const password_1Value = password_1.value.trim();
	const password_2Value = password_2.value.trim();
	const usernameValue = username.value;

	let pa1=0;let pa2=0;let us=0;

	if (usernameValue === '') {
		setErrorFor(username, 'Username cannot be blank');
		us=0;
	}else if (usernameValue.length<5) {
		setErrorFor(username, 'Username must have a minimun of 5 characters');
		us=0;
	}
	else if (!isUsername(usernameValue)) {
		setErrorFor(username, 'Must only consist of letters, numbers, dot, @ or underscore');
		us=0;
	}else if (!isTrimUsername(usernameValue)) {
		setErrorFor(username, 'Please remove whitespaces');
		us=0;
	}else{
		setSuccessFor(username);
		us=1;
	}


	if (password_1Value === '') {
		setErrorFor(password_1, 'Password cannot be blank');
		pa1=0;
	}else if (password_1Value.length<5) {
		setErrorFor(password_1, 'Password must be more than 5 characters');
		pa1=0;
	}else{
		setSuccessFor(password_1);
		pa1=1;
	}

	if (password_2Value === '') {
		setErrorFor(password_2, 'Password2 cannot be blank');
		pa2=0;
	}else if (password_1Value !== password_2Value) {
		setErrorFor(password_2, 'Passwords does not match');
		pa2=0;
	}else{
		setSuccessFor(password_2);
		pa2=1;
	}

	if(us==1&&pa1==1&&pa2==1){
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


