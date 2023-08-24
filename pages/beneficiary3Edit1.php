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

      <link rel="apple-touch-icon" sizes="76x76" href="../images/insurance_icon.png">
      <link rel="icon" type="image/png" href="../images/logo.png">
      <title>Perpetual Protection | Edit Beneficiary 3</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />

     
      <link rel="stylesheet" type="text/css" href="../asset/css/bootsrap.min.css">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/navbar3.css">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/reg11.css">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/drop.css">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/a.css">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/profile.css">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/pointer.css">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/footer4.css">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/ref.css">
      <link href="../asset/css/all.css" type="text/css" rel="stylesheet" media="all">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/beneficiaryAge2.css">

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

        <a class="nav-links scroll" style="position: absolute; bottom: 10px; right: 230px;" href="clientProfile1.php"><span class="fa fa-user"></span> Profile</a>
        <a class="nav-links scroll" style="position: absolute; bottom: 10px; right: 115px;" href="clientRequest1.php">Request <span class="fa fa-wallet"></span></a>
        <a class="nav-links scroll" style="position: absolute; bottom: 10px; right: 10px;"  href="plan.php?logout='1'" onClick="return confirm('Are you sure you want to logout?' )">Logout <span class="fa fa-sign-out-alt"></span> </a>

    </div>
  </div>
</nav>

  <div class="container">
  <a href="clientBeneficiaries1.php"><img src="../images/back_Arrow.png" width="30px"></a>
    <center><div class="title">Edit Beneficiary</div></center>
    <div class="content">

<form class="" id="reg_form" action="beneficiary3Edit1.php" method="post" onsubmit="return checkInputs()" enctype="multipart/form-data">

    <?php echo display_error(); ?>

        <div class="user-details">

          <div class="container2">

          <div class="title-box">
            <h4>Beneficiary #3</h4>  
          </div>
          <div class="title-box"></div>

          <div class="input-box" hidden="">
            <input type="text" value="<?php echo $_SESSION['plan']['client_id']; ?>" name="client_id" required>
          </div>

           <div class="input-box" hidden="">
            <span class="details">Beneficiary id</span>
            <?php
                $query=mysqli_query($db,"SELECT beneficiary_id FROM beneficiary WHERE client_id='".$_SESSION['plan']['client_id']."' LIMIT 2, 1")or die(mysqli_error());
                  while($row=mysqli_fetch_array($query)){
            ?>
               <input type="text" value="<?php echo $row['beneficiary_id'];?>"  name="beneficiary_id" id="beneficiary_id" autocomplete="off">
            <?php }?>
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <div class="input-box">
            <span class="details">Name</span>
            <?php
                $query=mysqli_query($db,"SELECT name FROM beneficiary WHERE client_id='".$_SESSION['plan']['client_id']."' LIMIT 2, 1")or die(mysqli_error());
                  while($row=mysqli_fetch_array($query)){
            ?>
               <input type="text" value="<?php echo $row['name'];?>"  name="bname3" id="bname3" autocomplete="off">
            <?php }?>
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <div class="input-box">
            <label id="label">Select Age</label>
            <?php
                $query=mysqli_query($db,"SELECT age FROM beneficiary WHERE client_id='".$_SESSION['plan']['client_id']."' LIMIT 2, 1")or die(mysqli_error());
                  while($row=mysqli_fetch_array($query)){
            ?>
            <select name="bage3" id="bage3">
            <option><?php echo $row['age'];?></option>
            <?php }?>
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
             <?php
                $query=mysqli_query($db,"SELECT relationship FROM beneficiary WHERE client_id='".$_SESSION['plan']['client_id']."' LIMIT 2, 1")or die(mysqli_error());
                  while($row=mysqli_fetch_array($query)){
            ?>
                <input type="text" value="<?php echo $row['relationship'];?>" name="brelationship3" id="brelationship3" autocomplete="off">
            <?php }?>
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
          <div class="input-box">
            <span class="details">Contact Number</span>
            <?php
                $query=mysqli_query($db,"SELECT contact_num FROM beneficiary WHERE client_id='".$_SESSION['plan']['client_id']."' LIMIT 2, 1")or die(mysqli_error());
                  while($row=mysqli_fetch_array($query)){
            ?>
                <input type="text" value="<?php echo $row['contact_num'];?>" name="bcontact_num3" id="bcontact_num3" autocomplete="off">
            <?php }?>
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
          </div>
        

         </div> 
        <div class="button">
          <input type="submit" value="UPDATE" name="beneficiary3" id="submit">
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

  <script src="../asset/js/3beneficiary1.js"></script>

</body>
</html>