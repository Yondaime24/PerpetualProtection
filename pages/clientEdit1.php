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
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/agedrop.css">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/modal2.css">

      <script type="text/javascript" src="//code.jquery.com/jquery-1.8.3.js"></script>

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
    <center><div class="title">Edit Profile Details</div></center>
    <div class="content">

<?php
  $query=mysqli_query($db,"SELECT * FROM clients WHERE client_id='".$_SESSION['plan']['client_id']."'")or die(mysqli_error());
  while($row=mysqli_fetch_array($query)){
?>

<form class="" id="reg_form" action="clientEdit1.php" method="post" onsubmit="return checkInputs()" enctype="multipart/form-data">

    <?php echo display_error(); ?>

        <div class="user-details">

          <div class="input-box" hidden="">
            <input type="text" value="<?php echo $_SESSION['plan']['client_id']; ?>" name="client_id" required>
          </div>

          <div class="input-box">
            <span class="details">First Name</a></span>
            <input type="text" value="<?php echo $row['fname'];?>" name="fname" id="fname" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <div class="input-box">
            <span class="details">Middle Name</span>
            <input type="text" value="<?php echo $row['mname'];?>" name="mname" id="mname" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" value="<?php echo $row['lname'];?>" name="lname" id="lname" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <div class="input-box" style="margin-bottom: 0px">
            <label id="label">Select Age</label>
            <select name="age" id="age">
                <option><?php echo $row['age'];?></option>
                <?php
                  for($x=18; $x <= 64; $x++)
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
            <span class="details">Birthday</span>
            <input type="date" value="<?php echo $row['birthday'];?>" name="birthday" id="birthday" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <div class="input-box">
            <span class="details">Place of Birth</span>
            <input type="text" value="<?php echo $row['place_of_birth'];?>" name="place_of_birth" id="place_of_birth" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>


          <div class="input-box" style="margin-top: 6px">
            <label id="label">Select Gender</label>
              <select name="gender" id="gender">
              <option value="Male" <?php if ($row['gender']=='Male') { echo "selected"; }?> >Male</option>
              <option value="Female" <?php if($row['gender']=='Female') { echo "selected"; }?> >Female</option>
            </select>
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>


          <div class="input-box">
            <span class="details">Height in cm</span>
            <input type="text" value="<?php echo $row['height'];?>" name="height" id="height" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <div class="input-box">
            <span class="details">Weight in lb</span>
            <input type="text" value="<?php echo $row['weight'];?>" name="weight" id="weight" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <div class="input-box">
            <span class="details">Occupation</span>
            <input type="text" value="<?php echo $row['occupation'];?>" name="occupation" id="occupation" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

        <div class="input-box" style="margin-top: 6px">
              <label id="label">Select Civil Status</label>
                <select name="civil_status" id="civil_status">
                  <option value="Single" <?php if ($row['civil_status']=='Single') { echo "selected"; }?> >Single</option>
                  <option value="Married" <?php if($row['civil_status']=='Married') { echo "selected"; }?> >Married</option>
                  <option value="Widowed" <?php if ($row['civil_status']=='Widowed') { echo "selected"; }?> >Widowed</option>
                  <option value="Annulled" <?php if($row['civil_status']=='Annulled') { echo "selected"; }?> >Annulled</option>
                </select>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error Message</small>
          </div>

        <div class="input-box">
            <span class="details">Contact Number</span>
            <input type="integer" class="number" value="<?php echo $row['contact_number'];?>" name="contact_number" id="contact_number" autocomplete="off" maxlength="13">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
        </div>

          <div class="input-box" hidden="hidden">
            <span class="details">Email Address</span>
            <input type="email" value="<?php echo $row['email_address'];?>" name="email_address" id="email_address" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <div class="input-box">
            <span class="details">Residential Address</span>
            <input type="text" value="<?php echo $row['residential_address'];?>" name="residential_address" id="residential_address" autocomplete="off">
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

         </div> 
        <div class="button">
          <input type="submit" value="UPDATE" name="update1" id="submit">
        </div>

<?php }?>
      </form>
    </div>
  </div>

   <div class="footer">
    <a style="pointer-events: none;"><img src="../images/logo.png" width="50px"></a>
    <p style="color: #000">&copy; <script>document.write(new Date().getFullYear())</script> Perpetual Protection, Insurance Agency Payment Website
    </p>
  </div>

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Some text in the Modal..</p>
  </div>
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

  <script src="../asset/js/profileValidation5.js"></script>

</body>
</html>