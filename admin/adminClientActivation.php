<?php 
  include('../functions/functions.php');

  $client_id = $_GET['client_id'];

   if (isset($_POST['activate_btn'])) {
            // call these variables with the global keyword to make them available in function
    $plan_type = $_POST['plan_type'];

      $query ="UPDATE `clients` SET `plan_type` = '$plan_type', `status` = 'active' WHERE `client_id` = $client_id;";
        mysqli_query($db, $query);

        echo "<script>alert('Account Has Been Activated')</script>";
        echo "<script>window.open('adminPanel.php','_self')</script>";
        
    }

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

    <title>Perpetual Protection | Activate Client</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../images/logo.png">
    <link rel="icon" type="image/png" href="../images/logo.png">

    <!-- Bootstrap core CSS-->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/input4.css">

  </head>

  <body class="bg-dark">
 
    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Activation</div>
        <div class="card-body">
          <div class="text-center mb-4">
            <h4>Activate Client?</h4>
        <?php
            $query=mysqli_query($db,"SELECT * FROM clients WHERE client_id='$client_id'")or die(mysqli_error());
            while($row=mysqli_fetch_array($query)){
         ?>
              <p>Mr/Mrs. <?php echo $row['fname'] ?> <?php echo $row['mname'] ?> <?php echo $row['lname'] ?></p>
              <p>Account Will Be Activated!</p>
         <?php }?>
          </div>

        <?php
            $query=mysqli_query($db,"SELECT * FROM clients WHERE client_id='$client_id'")or die(mysqli_error());
            while($row=mysqli_fetch_array($query)){
        ?>
          <form action="adminClientActivation.php?client_id=<?php echo $row['client_id'] ?>" method="post" enctype="multipart/form-data">
         <?php }?>

            <div class="form-group">
              <div class="form-label-group">
                <span>Plan Type</span>

        <?php
            $query=mysqli_query($db,"SELECT * FROM client_activation WHERE client_id='$client_id'")or die(mysqli_error());
            while($row=mysqli_fetch_array($query)){
        ?>
            <input name="plan_type" id="age" class="form-control text-center" value="<?php echo $row['plan_type'] ?>" readonly="">
         <?php }?>
               
              </div>
            </div>

            <input class="btn btn-outline-success btn-block" onClick="return confirm('Are you sure you want to activate this account?' )" type="submit" value="Activate Account" name="activate_btn">
            <a href="adminDeactivatedClient.php" class="btn btn-block btn-outline-secondary">Cancel</a>

          </form>
         
        </div>
      </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
