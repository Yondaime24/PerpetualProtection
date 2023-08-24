const plan_type = document.getElementById('plan_type');
const payment_mode = document.getElementById('payment_mode');

const fname = document.getElementById('fname');
const mname = document.getElementById('mname');
const lname = document.getElementById('lname');
const age = document.getElementById('age');
const birthday = document.getElementById('birthday');
const place_of_birth = document.getElementById('place_of_birth');
const gender = document.getElementById('gender');
const height = document.getElementById('height');
const weight = document.getElementById('weight');
const occupation = document.getElementById('occupation');
const civil_status = document.getElementById('civil_status');
const contact_number = document.getElementById('contact_number');
const email_address = document.getElementById('email_address');
const residential_address = document.getElementById('residential_address');
//Beneficiary 1
const bname1 = document.getElementById('bname1');
const bage1 = document.getElementById('bage1');
const brelationship1 = document.getElementById('brelationship1');
const bcontact_num1 = document.getElementById('bcontact_num1');
//Beneficiary 2
const bname2 = document.getElementById('bname2');
const bage2 = document.getElementById('bage2');
const brelationship2 = document.getElementById('brelationship2');
const bcontact_num2 = document.getElementById('bcontact_num2');
//Beneficiary 3
const bname3 = document.getElementById('bname3');
const bage3 = document.getElementById('bage3');
const brelationship3 = document.getElementById('brelationship3');
const bcontact_num3 = document.getElementById('bcontact_num3');
//Reference 1
const name1 = document.getElementById('name1');
const address1 = document.getElementById('address1');
const contact_num1 = document.getElementById('contact_num1');
const relation1 = document.getElementById('relation1');
// Reference 2
const name2 = document.getElementById('name2');
const address2 = document.getElementById('address2');
const contact_num2 = document.getElementById('contact_num2');
const relation2 = document.getElementById('relation2');
// Reference 3
const name3 = document.getElementById('name3');
const address3 = document.getElementById('address3');
const contact_num3 = document.getElementById('contact_num3');
const relation3 = document.getElementById('relation3');

const username = document.getElementById('username');
const password_1 = document.getElementById('password_1');
const password_2 = document.getElementById('password_2');

function checkInputs(){

	const plan_typeValue = plan_type.value.trim();
	const payment_modeValue = payment_mode.value.trim();

	const fnameValue = fname.value;
	const mnameValue = mname.value;
	const lnameValue = lname.value;
	const ageValue = age.value.trim();
	const birthdayValue = birthday.value.trim();
	const place_of_birthValue = place_of_birth.value;
	const genderValue = gender.value.trim();
	const heightValue = height.value;
	const weightValue = weight.value;
	const occupationValue = occupation.value;
	const civil_statusValue = civil_status.value.trim();
	const contact_numberValue = contact_number.value.trim();
	const email_addressValue = email_address.value.trim();
	const residential_addressValue = residential_address.value;
	//Beneficiary 1
	const bname1Value = bname1.value;
	const bage1Value = bage1.value.trim();
	const brelationship1Value = brelationship1.value;
	const bcontact_num1Value = bcontact_num1.value;
	//Beneficiary 2
	const bname2Value = bname2.value;
	const bage2Value = bage2.value.trim();
	const brelationship2Value = brelationship2.value;
	const bcontact_num2Value = bcontact_num2.value;
	//Beneficiary 3
	const bname3Value = bname3.value;
	const bage3Value = bage3.value.trim();
	const brelationship3Value = brelationship3.value;
	const bcontact_num3Value = bcontact_num3.value;
	//Reference 1
	const name1Value = name1.value;
	const address1Value = address1.value;
	const contact_num1Value = contact_num1.value;
	const relation1Value = relation1.value;
	//Reference 2
	const name2Value = name2.value;
	const address2Value = address2.value;
	const contact_num2Value = contact_num2.value;
	const relation2Value = relation2.value;
	//Reference 3
	const name3Value = name3.value;
	const address3Value = address3.value;
	const contact_num3Value = contact_num3.value;
	const relation3Value = relation3.value;

	const password_1Value = password_1.value.trim();
	const password_2Value = password_2.value.trim();
	const usernameValue = username.value;

	let p_t=0;let p_m=0;
	let fn=0;let mn=0;let ln=0;let ag=0;let bi=0;let pl=0;let ge=0;let he=0;let we=0;let oc=0;let ci=0;let co=0;let em=0;let re=0;
	let bn1=0;let ba1=0;let br1=0;let bc1=0;
	let bn2=0;let ba2=0;let br2=0;let bc2=0;
	let bn3=0;let ba3=0;let br3=0;let bc3=0;
	let na1=0;let ad1=0;let co1=0;let re1=0;
	let na2=0;let ad2=0;let co2=0;let re2=0;
	let na3=0;let ad3=0;let co3=0;let re3=0;
	let pa1=0;let pa2=0;let us=0;


	if (plan_typeValue === '') {
		alert("Please Select Plan Type");
		setErrorFor(plan_type, '');
		p_t=0;
	}else{
		setSuccessFor(plan_type);
		p_t=1;
	}

	if (payment_modeValue === '') {
		alert("Please Select Payment Mode");
		setErrorFor(payment_mode, '');
		p_m=0;
	}else{
		setSuccessFor(payment_mode);
		p_m=1;
	}

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

	if (ageValue === '') {
		alert("Please Select Age");
		setErrorFor(age, '');
		ag=0;
	}else{
		setSuccessFor(age);
		ag=1;
	}

	if (birthdayValue === '') {
		setErrorFor(birthday, 'Birthday cannot be blank');
		bi=0;
	}else{
		setSuccessFor(birthday);
		bi=1;
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

	if (genderValue === '') {
		alert("Please Select Gender");
		setErrorFor(gender, '');
		ge=0;
	}else{
		setSuccessFor(gender);
		ge=1;
	}

	if (heightValue === '') {
		setErrorFor(height, 'Height cannot be blank');
		he=0;
	}else if (!isNumber(heightValue)){
		setErrorFor(height, 'Height must consist of numbers only');
		he=0;
	}else if (heightValue.length>3) {
		setErrorFor(height, 'Height must have maximum of 3 numbers only');
		he=0;
	}else if (heightValue.length<2) {
		setErrorFor(height, 'Height must have minimun of 2 numbers only');
		he=0;
	}else if (!isTrimNumber(heightValue)) {
		setErrorFor(height, 'Please remove whitespaces');
		he=0;
	}else{
		setSuccessFor(height);
		he=1;
	}

	if (weightValue === '') {
		setErrorFor(weight, 'Weight cannot be blank');
		we=0;
	}else if (!isNumber(weightValue)){
		setErrorFor(weight, 'Weight must consist of numbers only');
		we=0;
	}else if (weightValue.length>3) {
		setErrorFor(weight, 'Weight must have maximum of 3 numbers only');
		we=0;
	}else if (weightValue.length<2) {
		setErrorFor(weight, 'Weight must have minimun of 2 numbers only');
		we=0;
	}else if (!isTrimNumber(weightValue)) {
		setErrorFor(weight, 'Please remove whitespaces');
		we=0;
	}else{
		setSuccessFor(weight);
		we=1;
	}

	if (occupationValue === '') {
		setErrorFor(occupation, 'Occupation cannot be blank');
		oc=0;
	}else if (!lettersOnly(occupationValue)){
		setErrorFor(occupation, 'Occupation must consist of letters only');
		oc=0;
	}else if (!trimLettersOnly(occupationValue)) {
		setErrorFor(occupation, 'Please remove whitespaces');
		uc=0;
	}else{
		setSuccessFor(occupation);
		oc=1;
	}

	if (civil_statusValue === '') {
		alert("Please Select Civil Status");
		setErrorFor(civil_status, '');
		ci=0;
	}else{
		setSuccessFor(civil_status);
		ci=1;
	}

	if (contact_numberValue === '') {
		setErrorFor(contact_number, 'Contact number cannot be blank');
		co=0;
	}else if (!isMessageBird(contact_numberValue)) {
		setErrorFor(contact_number, 'Contact number invalid');
		co=0;
	}else if (contact_numberValue.length<13) {
		setErrorFor(contact_number, 'Invalid contact number');
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

	if (name3Value === '') {
		setErrorFor(name3, 'Name cannot be blank');
		na3=0;
	}else if (!isLetter(name3Value)){
		setErrorFor(name3, 'Must consist of letters, -, or space only');
		na3=0;
	}else if (!isTrimLetter(name3Value)) {
		setErrorFor(name3, 'Please remove whitespaces');
		na3=0;
	}else{
		setSuccessFor(name3);
		na3=1;
	}

	if (address3Value === '') {
		setErrorFor(address3, 'Address cannot be blank');
		ad3=0;
	}else if (!isAddress(address3Value)) {
		setErrorFor(address3, 'Consist of letters, numbers, comma, - or . only');
		ad3=0;
	}else if (!isTrimAddress(address3Value)) {
		setErrorFor(address3, 'Please remove whitespaces');
		ad3=0;
	}
	else{
		setSuccessFor(address3);
		ad3=1;
	}

	if (contact_num3Value === '') {
		setErrorFor(contact_num3, 'Contact number cannot be blank');
		co3=0;
	}else if (!isContact(contact_num3Value)) {
		setErrorFor(contact_num3, 'Contact number invalid');
		co3=0;
	}else if (contact_num3Value.indexOf('0')!==0) {
		setErrorFor(contact_num3, 'Contact number must start with 0');
		co3=0;
	}else{
		setSuccessFor(contact_num3);
		co3=1;
	}

	if (relation3Value === '') {
		setErrorFor(relation3, 'Relation cannot be blank');
		re3=0;
	}else if (!isLetter(relation3Value)){
		setErrorFor(relation3, 'Must consist of letters, -, or space only');
		re3=0;
	}else if (!isTrimLetter(relation3Value)) {
		setErrorFor(relation3, 'Please remove whitespaces');
		re3=0;
	}else{
		setSuccessFor(relation3);
		re3=1;
	}

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

	if(p_t==1&&p_m==1&&fn==1&&mn==1&&ln==1&&ag==1&&bi==1&&pl==1&&ge==1&&he==1&&we==1&&oc==1&&ci==1&&co==1&&em==1
		&&re==1&&na1==1&&ad1==1&&co1==1&&re1==1&&na2==1&&ad2==1&&co2==1&&re2==1&&na3==1&&ad3==1&&co3==1&&re3==1&&us==1
		&&pa1==1&&pa2==1&&bn1==1&&ba1==1&&br1==1&&bc1==1&&bn2==1&&ba2==1&&br2==1&&bc2==1&&bn3==1&&ba3==1&&br3==1&&bc3==1){
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
function isMessageBird(bird){
	return /^[0-9\+]+$/.test(bird);
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
