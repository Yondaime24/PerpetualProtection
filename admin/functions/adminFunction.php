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
        echo "<script>window.open('adminPanel.php','_self')</script>";

		}else{


		$insert="INSERT INTO clients (plan_type, payment_mode, fname, mname, lname, age, birthday, place_of_birth, gender, height, weight, occupation, civil_status, contact_number, email_address, residential_address, username, password, date_registered, status, notif_status, payment_status, due_status, 'update_status', photo, user_type) VALUES ('$plan_type', '$payment_mode', '$fname', '$mname', '$lname', '$age', '$birthday', '$place_of_birth', '$gender', '$height', '$weight', '$occupation', '$civil_status', '$contact_number', '$email', '$residential_address', '$username', '$password', CURRENT_TIMESTAMP, 'active', 'unread', 'unfinished', 'undue', 'empty', '$photo', 'client')";
		$query=mysqli_query($db,$insert) or die(mysqli_error($db));

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['plan'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "Welcome";
			header('location: adminPanel.php');					
		}

        }

    }

}
else{

    echo "Connection Error";

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

function isAdmin()
{
	if (isset($_SESSION['plan']) && $_SESSION['plan']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}
