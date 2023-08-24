<?php 
include('functions/adminFunction.php');


if (!isLoggedIn()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: ../index.php');
}
if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>

      <link rel="apple-touch-icon" sizes="76x76" href="../images/insurance_icon.png">
      <link rel="icon" type="image/png" href="../images/logo.png">
      <title>Perpetual Protection | Admin Client Registration</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />

      <link rel="stylesheet" type="text/css" href="../asset/css/bootsrap.min.css">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/navbar3.css">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/reg11.css">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/drop10.css">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/a.css">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/profile.css">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/pointer.css">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/footer4.css">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/ref.css">
      <link href="../asset/css/all.css" type="text/css" rel="stylesheet" media="all">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/reg_eye6.css">

      <script type="text/javascript" src="//code.jquery.com/jquery-1.8.3.js"></script>
  
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-transparent">
  <div class="container-fluid">
    <a class="navbar-brand" id="title" href="#" style="margin-top: 5px;">Perpetual</a>
    <a class="navbar-brand" id="title2" href="#" style="margin-top: 2px; margin-left: 18px">Protection</a>
  
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0"></ul>

    </div>
  </div>
</nav>

<div class="container">
  <a href="adminPanel.php"><img src="../images/back_Arrow.png" width="30px"></a>
    <center><div class="title">Admin Client Registration</div></center>
    <div class="content">

    <form class="" id="reg_form" action="adminAddClient.php" method="post" onsubmit="return checkInputs()" enctype="multipart/form-data">

    <?php echo display_error(); ?>

        <div class="user-details">

          <div class="input-box" style="margin-bottom: 0px">
            <label id="label">Select Plan Type</label>
            <select name="plan_type" id="plan_type">
              <option value=""></option>
              <option value="Plan 1">Plan 1</option>
              <option value="Plan 2">Plan 2</option>
              <option value="Plan 3">Plan 3</option>
              <option value="Plan 4">Plan 4</option>
            </select>
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <div class="input-box" style="margin-bottom: 0px">
            <label id="label">Select Mode of Payment</label>
            <select name="payment_mode" id="payment_mode">
              <option value=""></option>
              <option value="Monthly">Monthly</option>
              <option value="Quarterly">Quarterly</option>
              <option value="Semi-Annual">Semi-Annual</option>
              <option value="Annual">Annual</option>
              <option value="Lumpsum">Lumpsum</option>
            </select>
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" placeholder="Enter first name" name="fname" id="fname" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <div class="input-box">
            <span class="details">Middle Name</span>
            <input type="text" placeholder="Enter middle name" name="mname" id="mname" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
 
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" placeholder="Enter last name" name="lname" id="lname" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <div class="input-box" style="margin-bottom: 0px">
            <label id="label">Select Age</label>
            <select name="age" id="age">
                <option></option>
                <?php
                  for($x=18; $x <= 64; $x++)
                  {
                    ?>
                    <option><?php echo $x; ?></option>
                    <?php
                  }
                ?>
              </select>&nbsp; &nbsp;
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <div class="input-box">
            <span class="details">Birthday</span>
            <input type="date" name="birthday" id="birthday">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <div class="input-box">
            <span class="details">Place of Birth</span>
            <input type="text" placeholder="Enter place of birth" name="place_of_birth" id="place_of_birth" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <div class="input-box" style="margin-top: 6px">
            <label id="label">Select Gender</label>
              <select name="gender" id="gender">
              <option value=""></option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <div class="input-box">
            <span class="details">Height in cm</span>
            <input type="text" placeholder="Enter height" name="height" id="height" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <div class="input-box">
            <span class="details">Weight in lb</span>
            <input type="text" placeholder="Enter weight" name="weight" id="weight" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <div class="input-box">
            <span class="details">Occupation</span>
            <input type="text" placeholder="Enter occupation" name="occupation" id="occupation" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <div class="input-box" style="margin-top: 6px">
              <label id="label">Select Civil Status</label>
                <select name="civil_status" id="civil_status">
                  <option value=""></option>
                  <option value="Single">Single</option>
                  <option value="Married">Married</option>
                  <option value="Widowed">Widowed</option>
                  <option value="Annulled">Annulled</option>
                </select>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error Message</small>
          </div>

        <div class="input-box">
            <span class="details">Contact Number</span>
            <input type="integer" class="number" name="contact_number" value="+63" maxlength="13" id="contact_number" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
        </div>

          <div class="input-box">
            <span class="details">Email Address</span>
            <input type="email" value="<?php echo $email; ?>" placeholder="Enter email address" name="email_address" id="email_address" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <div class="input-box">
            <span class="details">Residential Address</span>
            <input type="text" placeholder="Enter residential address" name="residential_address" id="residential_address" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <h3 style="margin-left: 238px">Add Beneficiaries</h3>

          <div class="container2">
          <div class="title-box">
            <h4>Beneficiary #1</h4>  
          </div>
          <div class="title-box"></div>

          <div class="input-box">
            <span class="details">Name</span>
            <input type="text" placeholder="Enter full name" name="bname1" id="bname1" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
          <div class="input-box" style="margin-bottom: 0px">
            <label id="label">Select Age</label>
            <select name="bage1" id="bage1">
                <option></option>
                <?php
                  for($x=18; $x <= 100; $x++)
                  {
                    ?>
                    <option><?php echo $x; ?></option>
                    <?php
                  }
                ?>
              </select>&nbsp; &nbsp;
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
          <div class="input-box">
            <span class="details">Relation</span>
            <input type="text" placeholder="Enter relation" name="brelationship1" id="brelationship1" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
          <div class="input-box">
            <span class="details">Contact Number</span>
            <input type="text" placeholder="Enter contact number" name="bcontact_num1" id="bcontact_num1" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
          </div>

          <div class="container2">
          <div class="title-box">
            <h4>Beneficiary #2</h4>  
          </div>
          <div class="title-box"></div>

          <div class="input-box">
            <span class="details">Name</span>
            <input type="text" placeholder="Enter full name" name="bname2" id="bname2" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
          <div class="input-box" style="margin-bottom: 0px">
            <label id="label">Select Age</label>
            <select name="bage2" id="bage2">
                <option></option>
                <?php
                  for($x=18; $x <= 100; $x++)
                  {
                    ?>
                    <option><?php echo $x; ?></option>
                    <?php
                  }
                ?>
              </select>&nbsp; &nbsp;
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
          <div class="input-box">
            <span class="details">Relation</span>
            <input type="text" placeholder="Enter relation" name="brelationship2" id="brelationship2" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
          <div class="input-box">
            <span class="details">Contact Number</span>
            <input type="text" placeholder="Enter contact number" name="bcontact_num2" id="bcontact_num2" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
          </div>

           <div class="container2">
          <div class="title-box">
            <h4>Beneficiary #3</h4>  
          </div>
          <div class="title-box"></div>

          <div class="input-box">
            <span class="details">Name</span>
            <input type="text" placeholder="Enter full name" name="bname3" id="bname3" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
          <div class="input-box" style="margin-bottom: 0px">
            <label id="label">Select Age</label>
            <select name="bage3" id="bage3">
                <option></option>
                <?php
                  for($x=18; $x <= 100; $x++)
                  {
                    ?>
                    <option><?php echo $x; ?></option>
                    <?php
                  }
                ?>
              </select>&nbsp; &nbsp;
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
          <div class="input-box">
            <span class="details">Relation</span>
            <input type="text" placeholder="Enter relation" name="brelationship3" id="brelationship3" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
          <div class="input-box">
            <span class="details">Contact Number</span>
            <input type="text" placeholder="Enter contact number" name="bcontact_num3" id="bcontact_num3" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
          </div>

          <h3 style="margin-left: 240px">Add References</h3>

          <div class="container2">

          <div class="title-box">
            <h4>Reference #1</h4>  
          </div>
          <div class="title-box"></div>

          <div class="input-box">
            <span class="details">Name</span>
            <input type="text" placeholder="Enter full name" name="name1" id="name1" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" placeholder="Enter address" name="address1" id="address1" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
          <div class="input-box">
            <span class="details">Contact Number</span>
            <input type="text" placeholder="Enter contact number" name="contact_num1" id="contact_num1" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
          <div class="input-box">
            <span class="details">Relation</span>
            <input type="text" placeholder="Enter relation" name="relation1" id="relation1" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
          </div>

          <div class="container2">
          <div class="title-box">
            <h4>Reference #2</h4>  
          </div>
          <div class="title-box"></div>
          <div class="input-box">
            <span class="details">Name</span>
            <input type="text" placeholder="Enter full name" name="name2" id="name2" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" placeholder="Enter address" name="address2" id="address2" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
          <div class="input-box">
            <span class="details">Contact Number</span>
            <input type="text" placeholder="Enter contact number" name="contact_num2" id="contact_num2" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
          <div class="input-box">
            <span class="details">Relation</span>
            <input type="text" placeholder="Enter relation" name="relation2" id="relation2" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
          </div>

          <div class="container2">
          <div class="title-box">
            <h4>Reference #3</h4>  
          </div>
          <div class="title-box"></div>
          <div class="input-box">
            <span class="details">Name</span>
            <input type="text" placeholder="Enter full name" name="name3" id="name3" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" placeholder="Enter address" name="address3" id="address3" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
          <div class="input-box">
            <span class="details">Contact Number</span>
            <input type="text" placeholder="Enter contact number" name="contact_num3" id="contact_num3" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
          <div class="input-box">
            <span class="details">Relation</span>
            <input type="text" placeholder="Enter relation" name="relation3" id="relation3" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
          </div>

          <div class="title-box"></div>
          <div class="title-box"></div>

          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="Enter username" name="username" value="<?php echo $username; ?>" id="username" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter password" name="password_1" id="password_1">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
          <span><i class="fas fa-eye eye1" id="eye" onclick="toggle1()"></i></span>  

          <div class="input-box">
            <img style="border-radius: 50px" src="../images/profile.png" onclick="triggerClick()" id="profileDisplay" />
            <label id="profileLabel" for="profileImage" style="margin-left: 103px">Profile Picture</label>
            <input type="file" name="photo" onchange="displayImage(this)" id="profileImage" style="display: none;">
          </div>    

          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Enter password" name="password_2" id="password_2">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
          <span><i class="fas fa-eye eye2" id="eye2" onclick="toggle2()"></i></span>

         </div> 
        <div class="button">
          <input type="submit" value="Register" name="register_btn">
         </div>

      </form>
    </div>
  </div>

  <div class="footer">
    <a style="pointer-events: none;"><img src="../images/logo.png" width="50px"></a>
    <p style="color: #000">&copy; <script>document.write(new Date().getFullYear())</script> Perpetual Protection, Insurance Agency Payment Website
    </p>
  </div>

 <script>   
  function triggerClick(){
  document.querySelector('#profileImage').click();

}

function displayImage(e) {
  if (e.files[0]){
    var reader = new FileReader();

    reader.onload = function(e) {
      document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}
 </script>

  <script>
    var state=false;
    function toggle1(){
      if (state) {
        document.getElementById("password_1").setAttribute("type","password");
        document.getElementById("eye").style.color='#3498db';
        state = false;
      }else{
        document.getElementById("password_1").setAttribute("type","text");
        document.getElementById("eye").style.color='#2ecc71';
        state = true;
      }
    }
  </script>

    <script>
    var state2=false;
    function toggle2(){
      if (state2) {
        document.getElementById("password_2").setAttribute("type","password");
        document.getElementById("eye2").style.color='#3498db';
        state2 = false;
      }else{
        document.getElementById("password_2").setAttribute("type","text");
        document.getElementById("eye2").style.color='#2ecc71';
        state2 = true;
      }
    }
  </script>

    <script>
       $('input.number').keyup(function(){
              if (
                  ($(this).val().length > 0) && ($(this).val().substr(0,3) != '+63')
                  || ($(this).val() == '')
                  ){
                  $(this).val('+63');    
              }
          });
   </script>

  <script src="../asset/js/validation16.js"></script>

</body>
</html>

