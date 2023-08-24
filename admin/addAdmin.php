<?php 
include('../functions/functions.php');

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
      <title>Perpetual Protection | Add New Admin</title>
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
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/admin_eye.css">
  
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-transparent">
  <div class="container-fluid">
    <a class="navbar-brand" id="title" href="#" style="margin-top: 5px;">Perpetual</a>
    <a class="navbar-brand" id="title2" href="#" style="margin-top: 2px; margin-left: 18px">Protection</a>
  
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0"></ul>

      <a class="nav-links scroll" style="position: absolute; bottom: 10px; right: 10px;"  href="adminPanel.php?logout='1'" onClick="return confirm('Are you sure you want to logout?' )">Logout <span class="fa fa-sign-out-alt"></span> </a>

    </div>
  </div>
</nav>

<div class="container">
  <a href="adminPanel.php"><img src="../images/back_Arrow.png" width="30px"></a>
    <center><div class="title">Add New Admin</div></center>
    <div class="content">

    <form class="" id="addAdmin" action="addAdmin.php" method="post" onsubmit="return checkInputs()" enctype="multipart/form-data">

    <?php echo display_error(); ?>

        <div class="user-details">

          <div class="input-box validate">
            <span class="details">First Name</span>
            <input type="text" placeholder="Enter First Name" name="fname" id="fname" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <div class="input-box">
            <span class="details">Middle Name</span>
            <input type="text" placeholder="Enter Middle Name" name="mname" id="mname" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
 
           <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" placeholder="Enter Last Name" name="lname" id="lname" autocomplete="off">
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
            <span class="details">Place of Birth</span>
            <input type="text"  placeholder="Enter Place of Birth" name="place_of_birth" id="place_of_birth" autocomplete="off">
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
            <span class="details">Contact Number</span>
            <input type="text"  placeholder="Enter Contact Number" name="contact_number" id="contact_number" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
        </div>

          <div class="input-box">
            <span class="details">Email Address</span>
            <input type="email"  placeholder="Enter Email Address" name="email_address" id="email_address" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <div class="input-box">
            <span class="details">Residential Address</span>
            <input type="text"  placeholder="Enter Residential Address" name="residential_address" id="residential_address" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

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

          <div class="input-box">
            <img style="border-radius: 50px;" src="../images/profile.png" onclick="triggerClick()" id="profileDisplay" />
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

         </div> 
        <div class="button">
          <input type="submit" value="ADD" name="addAdmin">
        </div>

         <span><i class="fas fa-eye eye1" id="eye" onclick="toggle1()"></i></span>  
         <span><i class="fas fa-eye eye2" id="eye2" onclick="toggle2()"></i></span>

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

  <script src="../asset/js/addAdmin.js"></script>

</body>
</html>

