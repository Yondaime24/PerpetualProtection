<?php 
include('../functions/functions.php');
  if (!isLoggedIn()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: ../index.php');
}
if (!isClient()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ../index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="apple-touch-icon" sizes="76x76" href="images/insurance_icon.png">
    <link rel="icon" type="image/png" href="../images/logo.png">
    <title>Perpetual Protection | Edit Picture</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

      <link rel="stylesheet" type="text/css" href="../asset/css/bootsrap.min.css">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/navbar3.css">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/reg11.css">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/drop.css">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/a.css">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/profile.css">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/pointer.css">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/fixedFooter.css">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/ref.css">
      <link href="../asset/css/all.css" type="text/css" rel="stylesheet" media="all">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/agedrop.css">

      <style>
        a:hover{
          color: #fff;
        }
      </style>


</head>
<body>


<nav class="navbar navbar-expand-md navbar-dark bg-transparent">
  <div class="container-fluid">
    <a class="navbar-brand" id="title" href="#" style="margin-top: 5px;">Perpetual</a>
    <a class="navbar-brand" id="title2" href="#" style="margin-top: 2px; margin-left: 18px">Protection</a>
  
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0"></ul>

         <!--  <a class="nav-links scroll" style="position: absolute; bottom: 10px; right: 230px;" href="clientProfile1.php"><span class="fa fa-user"></span> Profile</a> -->
    <a class="nav-links scroll" style="position: absolute; bottom: 10px; right: 115px;" href="clientRequest1.php">Request <span class="fa fa-wallet"></span></a>
    <a class="nav-links scroll" style="position: absolute; bottom: 10px; right: 10px;"  href="plan.php?logout='1'" onClick="return confirm('Are you sure you want to logout?' )">Logout <span class="fa fa-sign-out-alt"></span> </a>

    </div>
  </div>
</nav>

  <div class="container">
  <a href="clientProfile1.php"><img src="../images/back_Arrow.png" width="30px"></a>
    <center><div class="title">Change Profile Picture</div></center>
    <div class="">
      <form class="" action="../functions/functions.php" method="post" enctype="multipart/form-data">
    <?php echo display_error(); ?>
        <div class="user-details" style="">

         <div class="input-box" style="visibility: hidden;">
            <input type="text" value="<?php echo $_SESSION['plan']['client_id']; ?>" name="client_id" required>
        </div>

<center><div class="input-box">
      <?php
        $client_id=$_SESSION['plan']['client_id'];
        $query = "SELECT * FROM clients WHERE client_id='$client_id'";
        $result = mysqli_query($db,$query);
        while($res = mysqli_fetch_array($result)) {  
      ?>
        <?php if($res['photo'] != ""): ?>
            <img src="../images/<?php echo $res['photo']; ?>" onclick="triggerClick()" id="profileDisplay" />
            <label id="profileLabel" for="profileImage">Click to Change Picture</label>
            <input type="file" name="photo" onchange="displayImage(this)" id="profileImage" style="display: none;">
        <?php else: ?>
        <img src="../images/profile.png" onclick="triggerClick()" id="profileDisplay">
        <label id="profileLabel" for="profileImage">Click to Change Picture</label>
        <input type="file" name="photo" onchange="displayImage(this)" id="profileImage" style="display: none;">
        <?php endif; ?>
      <?php
      }
      ?>
 </div></center>

        <!-- <center><div class="input-box">
            <img src="../images/<?php echo $_SESSION['plan']['photo']; ?>" onclick="triggerClick()" id="profileDisplay" />
            <label id="profileLabel" for="profileImage">Click to Change Picture</label>
            <input type="file" name="photo" onchange="displayImage(this)" id="profileImage" style="display: none;">
        </div></center> -->

         </div> 
        <div class="button">
          <input type="submit" value="UPDATE" name="update2" id="submit">
        </div>
      </form>
    </div>
  </div>

<div class="container" style="visibility: hidden;">
  <a href="clientProfile1.php"><img src="../images/back_Arrow.png" width="30px"></a>
    <center><div class="title">Change Profile Picture</div></center>
    <div class="">
      <form class="" action="../functions/functions.php" method="post" enctype="multipart/form-data">
      </form>
    </div>
  </div>

  <div class="fixed-footer">
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
    function toggle(){
      if (state) {
        document.getElementById("password").setAttribute("type","password");
        document.getElementById("eye").style.color='#3498db';
        state = false;
      }else{
        document.getElementById("password").setAttribute("type","text");
         document.getElementById("eye").style.color='#2ecc71';
        state = true;
      }
    }
  </script>

</body>
</html>