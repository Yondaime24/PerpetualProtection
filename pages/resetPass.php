<?php 

 include("../functions/functions.php");

 $email_address = $_GET['email_address'];
 $birthday = $_GET['birthday'];

if (isset($_POST['resetBtn'])) {
           
    $password = $_POST['password'];
    $email_address = $_POST['email_address'];
    $birthday = $_POST['birthday'];
    $password2 = md5($password);

   		$changepass=mysqli_query($db, "UPDATE clients SET password='".$password2."' WHERE email_address='".$email_address."' && birthday='".$birthday."'");

   		if ($changepass==1) {
   			echo "<script>alert('Your Password Has Been Successfully Changed!')</script>";
            // header('location:success.php?email_address='.$email_address);
             header('location:success.php?email_address='.$email_address.'&&birthday='.$birthday.'');
   		}else{
   			echo "ERROR";
   		}
        
    }

?>
<!DOCTYPE html>
<html lang="en">

  <head>

   
    <link rel="apple-touch-icon" sizes="76x76" href="images/insurance_icon.png">
    <link rel="icon" type="image/png" href="../images/logo.png">
    <title>Perpetual Protection | Reset Password</title>
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
        <div class="card-header">Reset Password</div>
        <div class="card-body">
          <div class="text-center mb-4">
            <h4>Your Account Has Been Verified!</h4>
            <p>Enter new password.</p>
          </div>

          <form id="verify" action="resetPass.php" method="post">

            <div class="form-group validate">
              <div class="form-label-group">
                 <input type="password" id="passWord" class="form-control" placeholder="Password" name="password">
                  <label for="passWord">Enter New Password</label>
                  <div class="input-group-append">
                      <span><i class="fas fa-eye eye1" id="eye" onclick="toggle1()"></i></span>
                  </div>
                </div>
            </div>

            <div class="form-group validate">
              <div class="form-label-group">
                    <input type="password" id="confirm_password" class="form-control" placeholder="Confirm Password" name="confirm_password">
                    <label for="confirm_password">Confirm New Password</label>
                  <div class="input-group-append">
                     <span><i class="fas fa-eye eye2" id="eye2" onclick="toggle2()"></i></span>
                  </div>
                  </div>
            </div>

            <div class="form-group validate" hidden="hidden">
              <div class="form-label-group">
                <input type="email" name="email_address" id="inputEmail" class="form-control" value="<?php echo $email_address; ?>" required="required" autofocus="autofocus" autocomplete="off">
                <label for="inputEmail">Email</label>
              </div>
            </div>

             <div class="form-group validate" hidden="hidden">
              <div class="form-label-group">
                <input type="text" name="birthday" id="qwerty" class="form-control" value="<?php echo $birthday; ?>" required="required" autofocus="autofocus" autocomplete="off">
                <label for="qwerty">Birthday</label>
              </div>
            </div>

            <input class="btn btn-primary btn-block" type="submit" value="Reset Password" name="resetBtn">
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
