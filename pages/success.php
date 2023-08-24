
<!DOCTYPE html>
<html lang="en">

  <head>

   
    <link rel="apple-touch-icon" sizes="76x76" href="images/insurance_icon.png">
    <link rel="icon" type="image/png" href="../images/logo.png">
    <title>Perpetual Protection | Reset Success</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Bootstrap core CSS-->
    <link href="../admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../admin/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="../admin/assets/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../asset/customizedCss/resetPass2.css">

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
        <div class="card-header">Success!</div>
        <div class="card-body">
          <div class="text-center mb-4">
             <img src="../images/success.png" width="100">
             <br>
            <span> <b>Your Password Has Been Successfully Changed!</b> </span>
          </div>

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
    <script src="../asset/js/resetpass2.js"></script>
    <!-- !validators -->

    <!-- Core plugin JavaScript-->
    <script src="../admin/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <script>
    var state=false;
    function toggle1(){
      if (state) {
        document.getElementById("passWord").setAttribute("type","password");
        document.getElementById("eye").style.color='#3498db';
        state = false;
      }else{
        document.getElementById("passWord").setAttribute("type","text");
        document.getElementById("eye").style.color='#2ecc71';
        state = true;
      }
    }
  </script>

    <script>
    var state2=false;
    function toggle2(){
      if (state2) {
        document.getElementById("confirm_password").setAttribute("type","password");
        document.getElementById("eye2").style.color='#3498db';
        state2 = false;
      }else{
        document.getElementById("confirm_password").setAttribute("type","text");
        document.getElementById("eye2").style.color='#2ecc71';
        state2 = true;
      }
    }
  </script>

  </body>

</html>
