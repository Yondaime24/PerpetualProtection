
<!DOCTYPE html>
<html lang="en">

  <head>

    <title>Perpetual Protection | Forgot Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../images/logo.png">
    <link rel="icon" type="image/png" href="../images/logo.png">

    <!-- Bootstrap core CSS-->
    <link href="../admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../admin/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="../admin/assets/css/sb-admin.css" rel="stylesheet">

    <style>
      .error{
        color: red;
        font-style: italic;
        font-size: 15px;
      }
    </style>

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Reset Password</div>
        <div class="card-body">
          <div class="text-center mb-4">
            <h4>Forgot your password?</h4>
            <p>Enter the same email address that you have used on your account.</p>
          </div>

<?php 

 include("../functions/functions.php");

if (isset($_POST['forgotPassBtn'])) {
           
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];

    $check_email=mysqli_query($db,"SELECT * FROM clients WHERE email_address='".$email."'");
    $check_birthday=mysqli_query($db,"SELECT * FROM clients WHERE birthday='".$birthday."'");

    // if (mysqli_num_rows($check_email)==0) {
    //   echo "<center><h5 style=\"color: red; margin-bottom: 20px; font-size: 15px;\">Email Address Not Found!</h5></center>";
    // }else if (mysqli_num_rows($check_birthday)==0) {
    //   echo "<center><h5 style=\"color: red; margin-bottom: 20px; font-size: 15px;\">Incorrect Birthday!</h5></center>";
    // }else{
    //   header('location:resetpass.php?email_address='.$email);
    // }

    if (mysqli_num_rows($check_email)==0) {
      echo "<center><h5 style=\"color: red; margin-bottom: 20px; font-size: 15px;\">Email Address Not Found!</h5></center>";
    }else if (mysqli_num_rows($check_birthday)==0) {
      echo "<center><h5 style=\"color: red; margin-bottom: 20px; font-size: 15px;\">Incorrect Birthday!</h5></center>";
    }else{
      header('location:resetpass.php?email_address='.$email.'&&birthday='.$birthday.'');
    }
        
    }

?>


          <form id="email" action="forgotPass.php" method="post">

            <div class="form-group validate">
              <div class="form-label-group">
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Enter email address" required="required" autofocus="autofocus" autocomplete="off">
                <label for="inputEmail">Enter email address</label>
              </div>
            </div>

            <div class="form-group validate">
              <div class="form-label-group">
                <input type="date" name="birthday" id="birthday" class="form-control">
                <label for="birthday">Enter Date of Birth</label>
              </div>
            </div>

            <input class="btn btn-primary btn-block" type="submit" value="Verify" name="forgotPassBtn">
          </form>

          <div class="text-center">
            <a class="d-block small mt-3" href="register.php">Register an Account</a>
            <a class="d-block small" href="../index.php">Login Page</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../admin/assets/vendor/jquery/jquery.min.js"></script>
    <script src="../admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- validators -->
    <script src="../asset/js/jquery.validator.js"></script>
    <script src="../asset/js/additional-methods.min.js"></script>
    <script src="../asset/js/email2.js"></script>
    <!-- !validators -->

    <!-- Core plugin JavaScript-->
    <script src="../admin/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
