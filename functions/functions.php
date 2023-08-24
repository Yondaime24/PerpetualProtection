<?php 
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'iminsured_web');

// variable declaration
$username = "";
$email    = "";
$errors   = array(); 

// Admin

  define('DBINFO', 'mysql:host=localhost;dbname=iminsured_web');
    define('DBUSER','root');
    define('DBPASS','');

    function fetchAll($query){
        $con = new PDO(DBINFO, DBUSER, DBPASS);
        $stmt = $con->query($query);
        return $stmt->fetchAll();
    }
    function performQuery($query){
        $con = new PDO(DBINFO, DBUSER, DBPASS);
        $stmt = $con->prepare($query);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
// End admin

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
    $payment_mode    =  e($_POST['payment_mode']);
	$fname    =  e($_POST['fname']);
	$mname       =  e($_POST['mname']);
	$lname  =  e($_POST['lname']);
	$age  =  e($_POST['age']);
    $birthday    =  e($_POST['birthday']);
	$place_of_birth       =  e($_POST['place_of_birth']);
	$height  =  e($_POST['height']);
	$weight  =  e($_POST['weight']);
	$gender = e($_POST['gender']);
	$civil_status = e($_POST['civil_status']);
    $occupation    =  e($_POST['occupation']);
	$contact_number       =  e($_POST['contact_number']);
	$email       =  e($_POST['email_address']);
	$residential_address       =  e($_POST['residential_address']);
	$username       =  e($_POST['username']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);
	// $photo = time() . '_' . $_FILES['photo']['name'];

	$name1=$_POST['name1'];
	$address1=$_POST['address1'];
	$contact_num1=$_POST['contact_num1'];
	$relation1=$_POST['relation1'];

	$name2=$_POST['name2'];
	$address2=$_POST['address2'];
	$contact_num2=$_POST['contact_num2'];
	$relation2=$_POST['relation2'];

	$name3=$_POST['name3'];
	$address3=$_POST['address3'];
	$contact_num3=$_POST['contact_num3'];
	$relation3=$_POST['relation3'];

	$bname1=$_POST['bname1'];
	$bage1=$_POST['bage1'];
	$brelationship1=$_POST['brelationship1'];
	$bcontact_num1=$_POST['bcontact_num1'];

	$bname2=$_POST['bname2'];
	$bage2=$_POST['bage2'];
	$brelationship2=$_POST['brelationship2'];
	$bcontact_num2=$_POST['bcontact_num2'];

	$bname3=$_POST['bname3'];
	$bage3=$_POST['bage3'];
	$brelationship3=$_POST['brelationship3'];
	$bcontact_num3=$_POST['bcontact_num3'];

	// $target = '../images/' . $photo;

	move_uploaded_file($_FILES["photo"]["tmp_name"],"../images/" . $_FILES["photo"]["name"]);         
    $photo=$_FILES["photo"]["name"];

   	$isValidUsername = filter_var($username, FILTER_VALIDATE_EMAIL);

	// form validation: ensure that the form is correctly filled
	// if (empty($username)) { 
	// 	array_push($errors, "Username is required"); 
	// }
	// if (empty($email)) { 
	// 	array_push($errors, "Email is required"); 
	// }
	// if (empty($password_1)) { 
	// 	array_push($errors, "Password is required"); 
	// }


	if($db){

    if(strlen($password_1)>40 || strlen($password_1)<3){
        
        echo "<script>alert('Password Must be Less Than 40 and More Than 3')</script>";
        echo "<script>window.open('../pages/register.php','_self')</script>";

    }else if ($isValidUsername === true){

        echo "<script>alert('This Username is Not Valid')</script>";
        echo "<script>window.open('../pages/register.php','_self')</script>";

    }else if ($password_1 != $password_2) {

    	 echo "<script>alert('Password does not match')</script>";
         echo "<script>window.open('../pages/register.php','_self')</script>";

    }else{

        $sqlCheckUsername = "SELECT * FROM `clients` WHERE `username` LIKE '$username' ";
        $usernameQuery = mysqli_query($db,$sqlCheckUsername);

        $sqlCheckEmail = "SELECT * FROM `clients` WHERE `email_address` LIKE '$email' ";
        $emailQuery = mysqli_query($db,$sqlCheckEmail);

        if(mysqli_num_rows($usernameQuery)>0){

            echo "<script>alert('Username is Already Used, Type Another One')</script>";
            echo "<script>window.open('../pages/register.php','_self')</script>";

        }else if (mysqli_num_rows($emailQuery)>0) {

            echo "<script>alert('This Email is Already Registered Type Another One')</script>";
            echo "<script>window.open('../pages/register.php','_self')</script>";
            
        }else if (count($errors) == 0 || move_uploaded_file($_FILES['photo']['tmp_name'], $target)){
        	$password = md5($password_1);//encrypt the password before saving in the database

        if (isset($_POST['plan_type'])) {
			$plan_type = e($_POST['plan_type']);

		$insert="INSERT INTO clients (plan_type, payment_mode, fname, mname, lname, age, birthday, place_of_birth, gender, height, weight, occupation, civil_status, contact_number, email_address, residential_address, username, password, date_registered, status, notif_status, payment_status, due_status, update_status, photo, user_type) VALUES ('$plan_type', '$payment_mode', '$fname', '$mname', '$lname', '$age', '$birthday', '$place_of_birth', '$gender', '$height', '$weight', '$occupation', '$civil_status', '$contact_number', '$email', '$residential_address', '$username', '$password', CURRENT_TIMESTAMP, 'active', 'unread', 'unfinished', 'undue', 'empty', '$photo', 'client')";
		$query=mysqli_query($db,$insert) or die(mysqli_error($db));

		$newUserId = $db->insert_id;

		if($query==1){

		$ins1="INSERT INTO `clients_references`(`client_id`,`name`,`address`,`contact_num`,`relation`) VALUES ('$newUserId','$name1','$address1','$contact_num1','$relation1')";
		$quey1=mysqli_query($db,$ins1) or die(mysqli_error($db));
		if ($quey1==1) {
			echo "";
		}

		$ins2="INSERT INTO `clients_references`(`client_id`,`name`,`address`,`contact_num`,`relation`) VALUES ('$newUserId','$name2','$address2','$contact_num2','$relation2')";
		$quey2=mysqli_query($db,$ins2) or die(mysqli_error($db));
		if ($quey2==1) {
			echo "";
		}

		$ins3="INSERT INTO `clients_references`(`client_id`,`name`,`address`,`contact_num`,`relation`) VALUES ('$newUserId','$name3','$address3','$contact_num3','$relation3')";
		$quey3=mysqli_query($db,$ins3) or die(mysqli_error($db));
		if ($quey3==1) {
			echo "";
		}

		$ins4="INSERT INTO `beneficiary`(`client_id`,`name`,`age`,`relationship`,`contact_num`) VALUES ('$newUserId','$bname1','$bage1','$brelationship1','$bcontact_num1')";
		$quey4=mysqli_query($db,$ins4) or die(mysqli_error($db));
		if ($quey4==1) {
			echo "";
		}

		$ins5="INSERT INTO `beneficiary`(`client_id`,`name`,`age`,`relationship`,`contact_num`) VALUES ('$newUserId','$bname2','$bage2','$brelationship2','$bcontact_num2')";
		$quey5=mysqli_query($db,$ins5) or die(mysqli_error($db));
		if ($quey5==1) {
			echo "";
		}

		$ins6="INSERT INTO `beneficiary`(`client_id`,`name`,`age`,`relationship`,`contact_num`) VALUES ('$newUserId','$bname3','$bage3','$brelationship3','$bcontact_num3')";
		$quey6=mysqli_query($db,$ins6) or die(mysqli_error($db));
		if ($quey6==1) {
			echo "";
		}

		$ins7="INSERT INTO `client_activation`(`client_id`,`plan_type`) VALUES ('$newUserId','$plan_type')";
		$quey7=mysqli_query($db,$ins7) or die(mysqli_error($db));
		if ($quey7==1) {
			echo "";
		}

	}else{
		echo "Failed";
	}
		echo "<script>alert('Account Successfully Created')</script>";
        echo "<script>window.open('../index.php','_self')</script>";

		}else{


		$insert="INSERT INTO clients (plan_type, payment_mode, fname, mname, lname, age, birthday, place_of_birth, gender, height, weight, occupation, civil_status, contact_number, email_address, residential_address, username, password, date_registered, status, notif_status, payment_status, due_status, 'update_status', photo, user_type) VALUES ('$plan_type', '$payment_mode', '$fname', '$mname', '$lname', '$age', '$birthday', '$place_of_birth', '$gender', '$height', '$weight', '$occupation', '$civil_status', '$contact_number', '$email', '$residential_address', '$username', '$password', CURRENT_TIMESTAMP, 'active', 'unread', 'unfinished', 'undue', 'empty', '$photo', 'client')";
		$query=mysqli_query($db,$insert) or die(mysqli_error($db));

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['plan'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "Welcome";
			header('location: ../index.php');					
		}

        }

    }

}
else{

    echo "Connection Error";

	}
}


// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM clients WHERE client_id=" . $id;
	$result = mysqli_query($db, $query);

	$plan = mysqli_fetch_assoc($result);
	return $plan;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	

function isLoggedIn()
{
	if (isset($_SESSION['plan'])) {
		return true;
	}else{
		return false;
	}
}

function isAdmin()
{
	if (isset($_SESSION['plan']) && $_SESSION['plan']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}

function isClient()
{
	if (isset($_SESSION['plan']) && $_SESSION['plan']['user_type'] == 'client' ) {
		return true;
	}else{
		return false;
	}
}

// log user out if logout button clicked
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['plan']);
	header("location: ../index.php");
}

// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
	login();
}

if (isset($_POST['payment_btn'])) {
	payment();
}

function payment(){
	global $db, $username, $errors;

	$payment_mode = e($_POST['payment_mode']);
	$plan_type = e($_POST['plan_type']);

	$query = "SELECT * FROM clients WHERE plan_type='$plan_type' AND payment_mode='$payment_mode' LIMIT 1";
	$results = mysqli_query($db, $query);

	if (mysqli_num_rows($results) == 1) {

		$logged_in_user = mysqli_fetch_assoc($results);

		if ($logged_in_user['plan_type'] == 'Plan 1' && $logged_in_user['payment_mode'] == 'Monthly') {

			header('location: zMonthly1.php');		

		}else if ($logged_in_user['plan_type'] == 'Plan 1' && $logged_in_user['payment_mode'] == 'Quarterly') {

			header('location: zQuarterly1.php');	

		}else if ($logged_in_user['plan_type'] == 'Plan 1' && $logged_in_user['payment_mode'] == 'Semi-Annual') {

			header('location: zSemi_Annual1.php');	

		}else if ($logged_in_user['plan_type'] == 'Plan 1' && $logged_in_user['payment_mode'] == 'Annual') {

			header('location: zAnnual1.php');	

		}else if ($logged_in_user['plan_type'] == 'Plan 1' && $logged_in_user['payment_mode'] == 'Lumpsum') {

			header('location: zLumpsom1.php');	

		}else if ($logged_in_user['plan_type'] == 'Plan 2' && $logged_in_user['payment_mode'] == 'Monthly') {

			header('location: zMonthly2.php');	

		}else if ($logged_in_user['plan_type'] == 'Plan 2' && $logged_in_user['payment_mode'] == 'Quarterly') {

			header('location: zQuarterly2.php');	

		}else if ($logged_in_user['plan_type'] == 'Plan 2' && $logged_in_user['payment_mode'] == 'Semi-Annual') {

			header('location: zSemi_Annual2.php');	

		}else if ($logged_in_user['plan_type'] == 'Plan 2' && $logged_in_user['payment_mode'] == 'Annual') {

			header('location: zAnnual2.php');	

		}else if ($logged_in_user['plan_type'] == 'Plan 2' && $logged_in_user['payment_mode'] == 'Lumpsum') {

			header('location: zLumpsom2.php');	

		}else if ($logged_in_user['plan_type'] == 'Plan 3' && $logged_in_user['payment_mode'] == 'Monthly') {

			header('location: zMonthly3.php');	

		}else if ($logged_in_user['plan_type'] == 'Plan 3' && $logged_in_user['payment_mode'] == 'Quarterly') {

			header('location: zQuarterly3.php');	

		}else if ($logged_in_user['plan_type'] == 'Plan 3' && $logged_in_user['payment_mode'] == 'Semi-Annual') {

			header('location: zSemi_Annual3.php');	

		}else if ($logged_in_user['plan_type'] == 'Plan 3' && $logged_in_user['payment_mode'] == 'Annual') {

			header('location: zAnnual3.php');	

		}else if ($logged_in_user['plan_type'] == 'Plan 3' && $logged_in_user['payment_mode'] == 'Lumpsum') {

			header('location: zLumpsom3.php');	

		}else if ($logged_in_user['plan_type'] == 'Plan 4' && $logged_in_user['payment_mode'] == 'Monthly') {

			header('location: zMonthly4.php');	

		}else if ($logged_in_user['plan_type'] == 'Plan 4' && $logged_in_user['payment_mode'] == 'Quarterly') {

			header('location: zQuarterly4.php');	

		}else if ($logged_in_user['plan_type'] == 'Plan 4' && $logged_in_user['payment_mode'] == 'Semi-Annual') {

			header('location: zSemi_Annual4.php');	

		}else if ($logged_in_user['plan_type'] == 'Plan 4' && $logged_in_user['payment_mode'] == 'Annual') {

			header('location: zAnnual4.php');	

		}else if ($logged_in_user['plan_type'] == 'Plan 4' && $logged_in_user['payment_mode'] == 'Lumpsum') {

			header('location: zLumpsom4.php');	

		}
	}
}

// LOGIN USER
function login(){
	global $db, $username, $errors;

	// grap form values
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required!");
	}
	if (empty($password)) {
		array_push($errors, "Password is required!");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM clients WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['plan_type'] == 'Plan 1') {

				$_SESSION['plan'] = $logged_in_user;
				$_SESSION['success']  = "Welcome";
				header('location: pages/plan.php');		

			}else if ($logged_in_user['plan_type'] == 'Plan 2') {

			 	$_SESSION['plan'] = $logged_in_user;
			 	$_SESSION['success']  = "Welcome";
			 	header('location: pages/plan2.php');		

			}
			else if ($logged_in_user['plan_type'] == 'Plan 3') {

			 	$_SESSION['plan'] = $logged_in_user;
			 	$_SESSION['success']  = "Welcome";
			 	header('location: pages/plan3.php');		

			}
			else if ($logged_in_user['plan_type'] == 'Plan 4') {

			 	$_SESSION['plan'] = $logged_in_user;
			 	$_SESSION['success']  = "Welcome";
			 	header('location: pages/plan4.php');		

			}else if ($logged_in_user['user_type'] == 'admin') {

			 	$_SESSION['plan'] = $logged_in_user;
			 	$_SESSION['success']  = "Welcome";
			 	header('location: admin/z1.php');	

			}else if ($logged_in_user['plan_type'] == 'deactivated') {

			 	header('location: pages/clientAccountDeactivated.php');		

			}

			else{
				$_SESSION['plan'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: admin/adminPanel.php');
			}
		}
		else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}


// call the register() function if register_btn is clicked
if (isset($_POST['addBeneficiary1'])) {
	add();
}

// REGISTER USER
function add(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$client_id    =  e($_POST['client_id']);
	$name    =  e($_POST['name']);
	$age    =  e($_POST['age']);
	$relationship    =  e($_POST['relationship']);
	$contact_num    =  e($_POST['contact_num']);



$query = "INSERT INTO beneficiary (client_id, name, age, relationship, contact_num) 
					  VALUES('$client_id', '$name', '$age', '$relationship', '$contact_num')";
		mysqli_query($db, $query);

		echo "<script>alert('Beneficiary Successfully Added')</script>";
        echo "<script>window.open('clientBeneficiaries1.php','_self')</script>";
		
	
}


    function getPhoto(){
      $data=null;
      $stmt = "SELECT * FROM clients";
      if ($sql = $this->con->query($stmt)) {
        while ($row = mysqli_fetch_assoc($sql)){
          $data[] = $row;
        }
      }
      return $data;
    }


if(isset($_POST['update1']))
{   

    
    $client_id = e($_POST['client_id']);
    $fname = e($_POST['fname']);
    $mname = e($_POST['mname']);
    $lname = e($_POST['lname']);
    $age = e($_POST['age']);
    $birthday = e($_POST['birthday']);
    $place_of_birth = e($_POST['place_of_birth']);
    $gender = e($_POST['gender']);
    $height = e($_POST['height']);
    $weight = e($_POST['weight']);
    $occupation = e($_POST['occupation']);
    $civil_status = e($_POST['civil_status']);
    $contact_number = e($_POST['contact_number']);
    $residential_address = e($_POST['residential_address']);

       $query="UPDATE `clients` SET `fname`='$fname',`mname`='$mname',`lname`='$lname',`age`='$age',`birthday`='$birthday',`place_of_birth`='$place_of_birth',`gender`='$gender',`height`='$height',`weight`='$weight',`occupation`='$occupation',`civil_status`='$civil_status',`contact_number`='$contact_number',`residential_address`='$residential_address' WHERE client_id='$client_id'";
       $query_run = mysqli_query($db, $query);

     if ($query_run) {
      // session_destroy();
      // session_reset();
      echo "<script>alert('Update Success!!!')</script>";
      echo "<script>window.open('../pages/clientProfile1.php','_self')</script>";
     }else{

      echo "<script>alert('Update Failed!')</script>";
      echo "<script>window.open('../pages/clientProfile1.php','_self')</script>";

     }
}

if(isset($_POST['update2']))
{   

    
    $client_id = $_POST['client_id'];
    $photo = $_FILES["photo"]['name'];

    if (empty($photo)) {
    	 echo "<script>alert('Please Select New Profile Picture!')</script>";
    	 echo "<script>window.open('../pages/clientPictureEdit1.php','_self')</script>";
    }else{

       $query="UPDATE `clients` SET `photo`='$photo' WHERE client_id='$client_id'";
       $query_run = mysqli_query($db, $query);

    }

     if ($query_run) {
      move_uploaded_file($_FILES["photo"]["tmp_name"],"../images/".$_FILES["photo"]["name"]);  
      echo "<script>alert('Update Success!!!')</script>";
      echo "<script>window.open('../pages/clientProfile1.php','_self')</script>";
     }else{

      echo "<script>alert('Update Failed!')</script>";
      echo "<script>window.open('../pages/clientProfile1.php','_self')</script>";

     }
}

if(isset($_POST['update3']))
{   

    
    $client_id = $_POST['client_id'];
    $username = $_POST['username'];
    $password = $_POST['password_1'];

    	$password = md5($password);

       $query="UPDATE `clients` SET `username`='$username',`password`='$password' WHERE client_id='$client_id'";
       $query_run = mysqli_query($db, $query);

     if ($query_run) {
      echo "<script>alert('Update Success!!!')</script>";
      echo "<script>window.open('../pages/clientProfile1.php','_self')</script>";
     }else{

      echo "<script>alert('Update Failed!')</script>";
      echo "<script>window.open('../pages/clientProfile1.php','_self')</script>";

     }
}

if(isset($_POST['adminChangeUserPass']))
{   

    
    $client_id = $_POST['client_id'];
    $username = $_POST['username'];
    $password = $_POST['password_1'];

    	$password = md5($password);

       $query="UPDATE `clients` SET `username`='$username',`password`='$password' WHERE client_id='$client_id'";
       $query_run = mysqli_query($db, $query);

     if ($query_run) {
      echo "<script>alert('Update Success!!!')</script>";
      echo "<script>window.open('adminPanel.php','_self')</script>";
     }else{

      echo "<script>alert('Update Failed!')</script>";
      echo "<script>window.open('adminPanel.php','_self')</script>";

     }
}


if(isset($_POST['reference1']))
{   

    
    $name1 = $_POST['name1'];
    $address1 = $_POST['address1'];
    $contact_num1 = $_POST['contact_num1'];
    $relation1 = $_POST['relation1'];
	$client_id = $_POST['client_id'];

       $query="UPDATE `clients_references` SET `name`='$name1',`address`='$address1',`contact_num`='$contact_num1',`relation`='$relation1' WHERE client_id='$client_id' LIMIT 1";
       $query_run = mysqli_query($db, $query);


     if ($query_run) {
      // session_destroy();
      // session_unset();
      echo "<script>alert('Update Success!!!')</script>";
      // echo "<script>alert('In order for this changes to take effect you need to login again')</script>";
      echo "<script>window.open('../pages/clientReferences1.php','_self')</script>";
     }else{

      echo "<script>alert('Update Failed!')</script>";
      echo "<script>window.open('../pages/clientReferences1.php','_self')</script>";

     }
}

if(isset($_POST['reference2']))
{   

    
    $name2 = $_POST['name2'];
    $address2 = $_POST['address2'];
    $contact_num2 = $_POST['contact_num2'];
    $relation2 = $_POST['relation2'];
    $reference_id = $_POST['reference_id'];

       $query="UPDATE `clients_references` SET `name`='$name2',`address`='$address2',`contact_num`='$contact_num2',`relation`='$relation2' WHERE reference_id='$reference_id'";
       $query_run = mysqli_query($db, $query);


     if ($query_run) {
      // session_destroy();
      // session_unset();
      echo "<script>alert('Update Success!!!')</script>";
      // echo "<script>alert('In order for this changes to take effect you need to login again')</script>";
      echo "<script>window.open('../pages/clientReferences1.php','_self')</script>";
     }else{

      echo "<script>alert('Update Failed!')</script>";
      echo "<script>window.open('../pages/clientReferences1.php','_self')</script>";

     }
}

if(isset($_POST['reference3']))
{   

    
    $name2 = $_POST['name2'];
    $address2 = $_POST['address2'];
    $contact_num2 = $_POST['contact_num2'];
    $relation2 = $_POST['relation2'];
    $reference_id = $_POST['reference_id'];

       $query="UPDATE `clients_references` SET `name`='$name2',`address`='$address2',`contact_num`='$contact_num2',`relation`='$relation2' WHERE reference_id='$reference_id'";
       $query_run = mysqli_query($db, $query);


     if ($query_run) {
      // session_destroy();
      // session_unset();
      echo "<script>alert('Update Success!!!')</script>";
      // echo "<script>alert('In order for this changes to take effect you need to login again')</script>";
      echo "<script>window.open('../pages/clientReferences1.php','_self')</script>";
     }else{

      echo "<script>alert('Update Failed!')</script>";
      echo "<script>window.open('../pages/clientReferences1.php','_self')</script>";

     }
}

if(isset($_POST['beneficiary1']))
{   

    
    $bname1 = $_POST['bname1'];
    $bage1 = $_POST['bage1'];
    $brelationship1 = $_POST['brelationship1'];
    $bcontact_num1 = $_POST['bcontact_num1'];
	$client_id = $_POST['client_id'];

       $query="UPDATE `beneficiary` SET `name`='$bname1',`age`='$bage1',`relationship`='$brelationship1',`contact_num`='$bcontact_num1' WHERE client_id='$client_id' LIMIT 1";
       $query_run = mysqli_query($db, $query);


     if ($query_run) {
      // session_destroy();
      // session_unset();
      echo "<script>alert('Update Success!!!')</script>";
      // echo "<script>alert('In order for this changes to take effect you need to login again')</script>";
      echo "<script>window.open('../pages/clientBeneficiaries1.php','_self')</script>";
     }else{

      echo "<script>alert('Update Failed!')</script>";
      echo "<script>window.open('../pages/clientBeneficiaries1.php','_self')</script>";

     }
}

if(isset($_POST['beneficiary2']))
{   

    
    $bname2 = $_POST['bname2'];
    $bage2 = $_POST['bage2'];
    $brelationship2 = $_POST['brelationship2'];
    $bcontact_num2 = $_POST['bcontact_num2'];
	$beneficiary_id = $_POST['beneficiary_id'];

       $query="UPDATE `beneficiary` SET `name`='$bname2',`age`='$bage2',`relationship`='$brelationship2',`contact_num`='$bcontact_num2' WHERE beneficiary_id='$beneficiary_id'";
       $query_run = mysqli_query($db, $query);


     if ($query_run) {
      // session_destroy();
      // session_unset();
      echo "<script>alert('Update Success!!!')</script>";
      // echo "<script>alert('In order for this changes to take effect you need to login again')</script>";
      echo "<script>window.open('../pages/clientBeneficiaries1.php','_self')</script>";
     }else{

      echo "<script>alert('Update Failed!')</script>";
      echo "<script>window.open('../pages/clientBeneficiaries1.php','_self')</script>";

     }
}

if(isset($_POST['beneficiary3']))
{   

    
    $bname3 = $_POST['bname3'];
    $bage3 = $_POST['bage3'];
    $brelationship3 = $_POST['brelationship3'];
    $bcontact_num3 = $_POST['bcontact_num3'];
	$beneficiary_id = $_POST['beneficiary_id'];

       $query="UPDATE `beneficiary` SET `name`='$bname3',`age`='$bage3',`relationship`='$brelationship3',`contact_num`='$bcontact_num3' WHERE beneficiary_id='$beneficiary_id'";
       $query_run = mysqli_query($db, $query);


     if ($query_run) {
      // session_destroy();
      // session_unset();
      echo "<script>alert('Update Success!!!')</script>";
      // echo "<script>alert('In order for this changes to take effect you need to login again')</script>";
      echo "<script>window.open('../pages/clientBeneficiaries1.php','_self')</script>";
     }else{

      echo "<script>alert('Update Failed!')</script>";
      echo "<script>window.open('../pages/clientBeneficiaries1.php','_self')</script>";

     }
}

// call the register() function if register_btn is clicked
if (isset($_POST['request_btn'])) {
	request();
}

function request(){

	global $db, $errors, $username, $email;

	$client_id = $_POST['client_id'];
    $plan_type = $_POST['plan_type'];
    $payment_mode = $_POST['payment_mode'];
    $fullName = $_POST['fullName'];
    $contact_number = $_POST['contact_number'];
    $residential_address = $_POST['residential_address'];
    $contractPrice = $_POST['contractPrice'];
    $payment = $_POST['payment'];
    $balance = $_POST['balance'];
    $first_payment = $_POST['first_payment'];
    $last_payment = $_POST['last_payment'];
    $requestReason = $_POST['requestReason'];



$query = "INSERT INTO clients_request (`client_id`, `plan_type`, `payment_mode`, `fullName`, `contact_number`, `residential_address`, `contractPrice`, `payment`, `balance`, `first_payment`, `last_payment`, `requestReason`, `date`, `status`, `request_status`, `type`)VALUES('$client_id', '$plan_type', '$payment_mode', '$fullName', '$contact_number', '$residential_address', '$contractPrice', '$payment', '$balance', '$first_payment', '$last_payment', '$requestReason', CURRENT_TIMESTAMP, 'unread', 'ungranted', 'request')";
		mysqli_query($db, $query);

		echo "<script>alert('Thank You! your request is being processed, please wait the agency will contact you soon!')</script>";
        echo "<script>window.open('clientRequest1.php','_self')</script>";
		
}

// call the register() function if register_btn is clicked
if (isset($_POST['message_btn'])) {
	message();
}

function message(){

	global $db, $errors, $username, $email;

	$client_id = $_POST['client_id'];
    $full_name = $_POST['full_name'];
    $contact_number = $_POST['contact_number'];
    $message = $_POST['message'];


$query = "INSERT INTO client_message (`client_id`, `full_name`, `contact_number`, `message`, `type`, `status`, `datetime`)VALUES('$client_id', '$full_name', '$contact_number', '$message', 'message', 'unread', CURRENT_TIMESTAMP)";
		mysqli_query($db, $query);

		echo "<script>alert('Thank You! your message has been sent')</script>";
        echo "<script>window.open('plan.php','_self')</script>";
		
}

if(isset($_POST['adminChangePhoto']))
{   

    $client_id = $_POST['client_id'];
    $photo = $_FILES["photo"]['name'];

    if (empty($photo)) {
    	 echo "<script>alert('Please Select New Profile Picture!')</script>";
    	 echo "<script>window.open('../admin/changePhoto.php','_self')</script>";
    }else{

       $query="UPDATE `clients` SET `photo`='$photo' WHERE client_id='$client_id'";
       $query_run = mysqli_query($db, $query);

    }

     if ($query_run) {
      move_uploaded_file($_FILES["photo"]["tmp_name"],"../images/".$_FILES["photo"]["name"]);  
      echo "<script>alert('Update Success!!!')</script>";
      echo "<script>window.open('adminProfile.php','_self')</script>";
     }else{

      echo "<script>alert('Update Failed!')</script>";
      echo "<script>window.open('adminProfile.php','_self')</script>";

     }
}


if(isset($_POST['updateProfile']))
{   
    
    $client_id = $_POST['client_id'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $place_of_birth = $_POST['place_of_birth'];
    $birthday = $_POST['birthday'];
    $contact_number = $_POST['contact_number'];
    $email_address = $_POST['email_address'];
    $residential_address = $_POST['residential_address'];

    // $sqlCheckEmail = "SELECT * FROM `clients` WHERE `email_address` LIKE '$email_address' ";
    // $emailQuery = mysqli_query($db,$sqlCheckEmail);

    // if (mysqli_num_rows($emailQuery)>0) {

    //    echo "<script>alert('This Email is Already Registered Type Another One')</script>";
    //    echo "<script>window.open('../admin/editProfile.php','_self')</script>";
            
    // }else{

       $query="UPDATE `clients` SET `fname`='$fname',`mname`='$mname',`lname`='$lname',`gender`='$gender',`age`='$age',`place_of_birth`='$place_of_birth',`birthday`='$birthday',`contact_number`='$contact_number',`email_address`='$email_address',`residential_address`='$residential_address' WHERE client_id='$client_id'";
       $query_run = mysqli_query($db, $query);

    // }

     if ($query_run) {
      echo "<script>alert('Update Success!!!')</script>";
      echo "<script>window.open('adminProfile.php','_self')</script>";
     }else{

      echo "<script>alert('Update Failed!')</script>";
      echo "<script>window.open('adminProfile.php','_self')</script>";

     }
}

if(isset($_POST['addAdmin']))
{   
    
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $place_of_birth = $_POST['place_of_birth'];
    $birthday = $_POST['birthday'];
    $contact_number = $_POST['contact_number'];
    $email_address = $_POST['email_address'];
    $residential_address = $_POST['residential_address'];
    $username = $_POST['username'];
	$password_1 = $_POST['password_1'];
	$password_2 = $_POST['password_2'];

	$password = md5($password_1);

	move_uploaded_file($_FILES["photo"]["tmp_name"],"../images/" . $_FILES["photo"]["name"]);         
    $photo=$_FILES["photo"]["name"];

    $sqlCheckEmail = "SELECT * FROM `clients` WHERE `email_address` LIKE '$email_address' ";
    $emailQuery = mysqli_query($db,$sqlCheckEmail);

    if (mysqli_num_rows($emailQuery)>0) {

       echo "<script>alert('This Email is Already Registered Type Another One')</script>";
       echo "<script>window.open('../admin/addAdmin.php','_self')</script>";
            
    }else{

     

      $query="INSERT INTO clients (plan_type, payment_mode, fname, mname, lname, age, birthday, place_of_birth, gender, height, weight, occupation, civil_status, contact_number, email_address, residential_address, username, password, date_registered, status, notif_status, payment_status, due_status, photo, user_type) VALUES ('', '', '$fname', '$mname', '$lname', '$age', '$birthday', '$place_of_birth', '$gender', '', '', '', '', '$contact_number', '$email_address', '$residential_address', '$username', '$password', '', 'active', '', '', '', '$photo', 'admin')";
       $query_run = mysqli_query($db, $query);

    }

     if ($query_run) {
      echo "<script>alert('New Admin Has Been Successfully Registered')</script>";
      echo "<script>window.open('../admin/adminPanel.php','_self')</script>";
     }else{

      echo "<script>alert('Failed!')</script>";
      echo "<script>window.open('../admin/adminPanel.php','_self')</script>";

     }
}

if(isset($_POST['updateEmail']))
{   
    
    $client_id = $_POST['client_id'];
    $email_address = $_POST['email_address'];

       $query="UPDATE `clients` SET `email_address`='$email_address' WHERE client_id='$client_id'";
       $query_run = mysqli_query($db, $query);

     if ($query_run) {
      echo "<script>alert('Email Address Has Been Changed Successfully!!!')</script>";
      echo "<script>window.open('changeEmail.php','_self')</script>";
     }else{

      echo "<script>alert('Update Failed!')</script>";
      echo "<script>window.open('changeEmail.php','_self')</script>";

     }
}

if(isset($_POST['updatePlan']))
{   

	error_reporting(0);

    $client_id = $_POST['client_id'];
    $plan_type = $_POST['plan_type'];
    $payment_mode = $_POST['payment_mode'];


  //       $check = mysqli_query($db, "SELECT * FROM `clients` WHERE `plan_type`='$plan_type' AND `payment_mode`='$payment_mode'");
		// $checkrows=mysqli_num_rows($check);

		// if ($checkrows>0) {
		// 	echo "<script>alert('Please Select New Plan Type & Payment Mode!')</script>";
		// 	echo "<script>window.open('updatePlan.php','_self')</script>";
		// }else{

			 $query="UPDATE `clients` SET `plan_type`='$plan_type',`payment_mode`='$payment_mode' WHERE client_id='$client_id'";
             $query_run = mysqli_query($db, $query);

		      echo "<script>alert('Update Success!!!')</script>";
		      echo "<script>window.open('plan.php','_self')</script>";

		// }

}