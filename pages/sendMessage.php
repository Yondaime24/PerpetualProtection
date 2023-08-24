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
      <title>Perpetual Protection | Send Message</title>
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
       <link rel="stylesheet" type="text/css" href="../asset/customizedCss/textarea2.css">
      <link href="../asset/css/all.css" type="text/css" rel="stylesheet" media="all">
     

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

    <a class="nav-links scroll" style="position: absolute; bottom: 10px; right: 115px;" href="clientProfile1.php">Profile <span class="fa fa-user"></span></a>
    <a class="nav-links scroll" style="position: absolute; bottom: 10px; right: 10px;"  href="plan.php?logout='1'" onClick="return confirm('Are you sure you want to logout?' )">Logout <span class="fa fa-sign-out-alt"></span> </a>

    </div>
  </div>
</nav>

  <div class="container">
  <a href="plan.php"><img src="../images/back_Arrow.png" width="30px"></a>
    <center><div class="title">Send Message</div></center>
    <div class="content">

<form class="" id="reg_form" action="sendMessage.php" method="post" onsubmit="return checkInputs()" enctype="multipart/form-data">

    <?php echo display_error(); ?>

        <div class="user-details">

          <div class="input-box" hidden="">
            <input type="text" value="<?php echo $_SESSION['plan']['client_id']; ?>" name="client_id" required>
          </div>

          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name="full_name" id="full_name" value="<?php echo $_SESSION['plan']['fname']; ?> <?php echo $_SESSION['plan']['mname']; ?> <?php echo $_SESSION['plan']['lname']; ?>" readonly>
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

         <div class="input-box">
            <span class="details">Contact Number</span>
            <input type="text" name="contact_number" id="contact_number" value="<?php echo $_SESSION['plan']['contact_number']; ?>" readonly>
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>


          <div class="input-box">
            <span class="details">Message</span>
             <textarea type="text" name="message" placeholder="Send Message..." class="form-control" id="textarea" autofocus=""></textarea> 
            <i style="margin-top: 142px;" class="fas fa-check-circle"></i>
            <i style="margin-top: 142px;" class="fas fa-exclamation-circle"></i>
            <small style="margin-top: 110px;">Error Message</small>
          </div>
        

         </div> 

        <div class="button">
          <input type="submit" value="SEND" name="message_btn" id="message_btn">
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
      
      const textarea = document.getElementById('textarea');

      function checkInputs(){
        
        const textareaValue = textarea.value.trim();

        let te=0;

        // BENEFICIARIES
        if (textareaValue === '') {
          alert('Please Add Message');
          setErrorFor(textarea, '');
          te=0;
        }else if (textareaValue.length<5){
          setErrorFor(textarea, 'Message must be more than 10 characters');
          te=0;
        }else{
          // setSuccessFor(bname1);
          te=1;
        }

        if(te==1){
          return true;
        }else{
          alert("Message submission denied");
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
    </script>


</body>
</html>