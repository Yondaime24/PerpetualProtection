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
      <title>Perpetual Protection | Edit Profile</title>
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
  <a href="adminProfile.php"><img src="../images/back_Arrow.png" width="30px"></a>
    <center><div class="title">Edit Profile</div></center>
    <div class="content">

      <?php
        $query=mysqli_query($db,"SELECT * FROM clients WHERE client_id='".$_SESSION['plan']['client_id']."'")or die(mysqli_error());
        while($row=mysqli_fetch_array($query)){
      ?>

    <form class="" id="update_form" action="editProfile.php" method="post" onsubmit="return checkInputs()" enctype="multipart/form-data">

    <?php echo display_error(); ?>

        <div class="user-details">

           <div class="input-box validate" hidden="hidden">
            <span class="details">Client Id</span>
            <input type="text" value="<?php echo $_SESSION['plan']['client_id']; ?>" name="client_id" id="client_id" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <div class="input-box validate">
            <span class="details">First Name</span>
            <input type="text" value="<?php echo $row['fname']; ?>" name="fname" id="fname" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <div class="input-box">
            <span class="details">Middle Name</span>
            <input type="text" value="<?php echo $row['mname']; ?>" name="mname" id="mname" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
 
           <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" value="<?php echo $row['lname']; ?>" name="lname" id="lname" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <div class="input-box" style="margin-top: 6px">
            <label id="label">Change Gender</label>
              <select name="gender" id="gender">
              <option value="Male" <?php if ($row['gender']=='Male') { echo "selected"; }?> >Male</option>
              <option value="Female" <?php if($row['gender']=='Female') { echo "selected"; }?> >Female</option>
            </select>
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <div class="input-box" style="margin-bottom: 0px">
            <label id="label">Age</label>
            <select name="age" id="age">
                <option><?php echo $row['age']; ?></option>
                <?php
                  for($x=18; $x <= 100; $x++)
                  {
                    ?>
                    <option><?php echo $x; ?></option>
                    <?php
                  }
                ?>
              </select>
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

           <div class="input-box">
            <span class="details">Place of Birth</span>
            <input type="text" value="<?php echo $row['place_of_birth']; ?>" name="place_of_birth" id="place_of_birth" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <div class="input-box">
            <span class="details">Birthday</span>
            <input type="date" name="birthday" value="<?php echo $row['birthday']; ?>" id="birthday">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
         
        <div class="input-box">
            <span class="details">Contact Number</span>
            <input type="text" value="<?php echo $row['contact_number']; ?>" name="contact_number" id="contact_number" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
        </div>

          <div class="input-box" hidden="hidden">
            <span class="details">Email Address</span>
            <input type="email" value="<?php echo $row['email_address']; ?>" name="email_address" id="email_address" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <div class="input-box">
            <span class="details">Residential Address</span>
            <input type="text" value="<?php echo $row['residential_address']; ?>" name="residential_address" id="residential_address" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
    
         </div> 
        <div class="button">
          <input type="submit" value="UPDATE" name="updateProfile">
        </div>

      </form>
      <?php } ?>
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

  <script src="../asset/js/editAdmin.js"></script>

</body>
</html>

