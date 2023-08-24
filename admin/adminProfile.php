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
      <title>Perpetual Protection | Admin Profile</title>
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
      <link href="../asset/css/all.css" type="text/css" rel="stylesheet" media="all">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/reg_eye6.css">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/btn.css">

  
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
    <center><div class="title">My Profile</div></center>
    <div class="content">
      <br>

      <?php
          $query=mysqli_query($db,"SELECT * FROM clients WHERE client_id='".$_SESSION['plan']['client_id']."'")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>

    <form class="" id="reg_form" action="register.php" method="post" onsubmit="return checkInputs()" enctype="multipart/form-data">

    <?php echo display_error(); ?>

        <div class="user-details">

         <div class="input-box" style="margin-left: 180px;">
        <?php if($row['photo'] != ""): ?>

        <img width="200" style="border-radius: 100px; margin-left: 50px" src="../images/<?php echo $row['photo']; ?>" alt="First slide">

        <?php else: ?>

        <img width="200" style="border-radius: 100px; margin-left: 50px" src="../images/profile.png">
        <?php endif; ?>
      </div>

          <div class="input-box" style="width: 800px;">
           <center>
            <span class="details" style="color: gray">Full Name</span>
          </center>
            <input style="border: none; text-align: center; font-size: 20px;" type="text" value="<?php echo $row['fname']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?>" readonly>
          </div>


          <div class="input-box" style="color: gray">
           <center>
            <span class="details" style="color: gray">Gender</span>
          </center>
             <input style="border: none; text-align: center; font-size: 20px;" type="text" value="<?php echo $row['gender']; ?>" readonly>
          </div>


         

          <div class="input-box" style="color: gray">
            <center>
            <span class="details" style="color: gray">Age</span>
          </center>
             <input style="border: none; text-align: center; font-size: 20px;" type="text" value="<?php echo $row['age']; ?>" readonly>
          </div>


          <div class="input-box" style="width: 800px;">
            <center>
            <span class="details" style="color: gray">Place of Birth</span>
          </center>
            <input style="border: none; text-align: center; font-size: 20px;" type="text" value="<?php echo $row['place_of_birth']; ?>" readonly>
          </div>

             <div class="input-box" style="color: gray">
             <center>
            <span class="details" style="color: gray">Birthday</span>
          </center>
           <input style="border: none; text-align: center; font-size: 20px;" type="text" value="<?php echo date('F j, Y',strtotime($row['birthday'])); ?>" readonly>
        </div>

        <div class="input-box" style="color: gray">
             <center>
            <span class="details" style="color: gray">Contact Number</span>
          </center>
           <input style="border: none; text-align: center; font-size: 20px;" type="text" value="<?php echo $row['contact_number']; ?>" readonly>
        </div>

        <div class="input-box" style="margin-left: 160px;">
           <center>
            <span class="details" style="color: gray">Email Address</span>
          </center>
           <input style="border: none; text-align: center; font-size: 20px;" type="text" value="<?php echo $row['email_address']; ?>" readonly>
        </div>

         <div class="input-box" style="width: 800px;">
             <center>
            <span class="details" style="color: gray">Residential Address</span>
          </center>
            <input style="border: none; text-align: center; font-size: 20px;" type="text" value="<?php echo $row['residential_address']; ?>" readonly>
          </div>
       
         </div> 
        <center>
           <a class="btn" href="changePhoto.php">Change Photo</a>
           <a class="btn" href="editProfile.php">Edit Profile</a>
        </center>
      </form>
    <?php } ?>
    </div>
  </div>

  <div class="footer">
    <a style="pointer-events: none;"><img src="../images/logo.png" width="50px"></a>
    <p style="color: #000">&copy; <script>document.write(new Date().getFullYear())</script> Perpetual Protection, Insurance Agency Payment Website
    </p>
  </div>



  <script src="../asset/js/validation15.js"></script>

</body>
</html>

