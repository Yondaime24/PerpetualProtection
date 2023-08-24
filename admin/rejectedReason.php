<?php 
  include('../functions/functions.php');

  $client_id = $_GET['client_id'];
  $request_id = $_GET['request_id'];


if (isset($_POST['reject_btn'])) {
            // call these variables with the global keyword to make them available in function
    $client_id = $_POST['client_id'];
    $requestReason = $_POST['requestReason'];
    $message = $_POST['message'];

    $reject ="UPDATE `clients_request` SET `request_status` = 'rejected' WHERE `client_id` = '$client_id' && `request_id`='$request_id'";
    mysqli_query($db, $reject);

    $query3 ="UPDATE `clients_request` SET `date_granted` = CURRENT_TIMESTAMP WHERE `client_id` = '$client_id' && `request_id`='$request_id'";
    performQuery($query3);

    $query = "INSERT INTO admin_message (`client_id`, `request_id`, `requestReason`, `datetime`, `message`, `type`, `status`)VALUES('$client_id', '$request_id', '$requestReason', CURRENT_TIMESTAMP, '$message', 'Request', 'unread')";
        mysqli_query($db, $query);

        echo "<script>alert('Request has been rejected')</script>";
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

    <title>Perpetual Protection | Reject Request</title>
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
      <div class="card card-register mx-auto mt-5">
        <div class="card-header"> <i class="fas fa-exclamation"></i> Reject Request </div>
        <div class="card-body">
         
         <form action="rejectedReason.php?client_id=<?php echo $client_id ?>&&request_id=<?php echo $request_id ?>" method="post" enctype="multipart/form-data">

      <?php
        $query=mysqli_query($db,"SELECT * FROM clients WHERE client_id='$client_id'")or die(mysqli_error());
        while($row=mysqli_fetch_array($query)){
      ?>

            <div class="card-header text-center"><span>Requested By<br></span><b><?php echo $row['fname'] ?> <?php echo $row['mname'] ?> <?php echo $row['lname'] ?></b></div> <br>

      <?php } ?>

         <?php
        $query=mysqli_query($db,"SELECT * FROM clients_request WHERE request_id='$request_id'")or die(mysqli_error());
        while($row=mysqli_fetch_array($query)){
      ?>

            <div class="card-header text-center"><span>Requested For<br></span><b><?php echo $row['requestReason'] ?></b><br><small><?php echo date('F j, Y / g:i a',strtotime($row['date'])) ?></small></div> <br>

             <div class="form-group" hidden>
              <div class="form-label-group">
                  <input type="text" name="requestReason" class="form-control" value="<?php echo $row['requestReason']; ?>" readonly>
                <label for="inputEmail">Request Reason</label>
              </div>
            </div>


      <?php } ?>

            <div class="form-group" hidden>
              <div class="form-label-group">
                  <input type="text" name="client_id" class="form-control" value="<?php echo $client_id ?>" readonly>
                <label for="inputEmail">Client ID</label>
              </div>
            </div>

            <div class="form-group">
              <div class="form-label-group">
                <textarea style="text-align: justify; height: 150px;" type="text" name="message" placeholder="Type Reason for Rejection Here..." class="form-control" required="required"></textarea> 
              </div>
            </div>

             <input class="btn btn-outline-danger btn-block" type="submit" value="Reject" onclick="return confirm('Are you sure that you want to reject this request?')" name="reject_btn">
            <a href="adminPanel.php" class="btn btn-block btn-outline-secondary">Cancel</a>

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
