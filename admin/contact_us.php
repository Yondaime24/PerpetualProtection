<?php  

    include('../functions/functions.php');

  require('PHPMailer/src/PHPMailer.php');
  require('PHPMailer/src/SMTP.php');

 	$contact_id = $_GET['contact_id'];

  $query ="UPDATE `contact_us` SET `status` = 'read' WHERE `contact_id` = $contact_id;";
    performQuery($query);

  if (isset($_POST['sendEmail'])) {

  $mailTo = $_POST['email'];
  $body = $_POST['message'];

  $mail = new PHPMailer\PHPMailer\PHPMailer();

  $mail->isSMTP();

  $mail->Host = "mail.smtp2go.com";

  $mail->SMTPAuth = true;

  $mail->Username = "perpetualprotection";
  $mail->Password = "reinheartmarl@24";

  $mail->SMTPSecure = "tls";

  $mail->Port = "2525";

  $mail->From = "perpetualprotection@gmail.com";
  $mail->FromName = "Perpetual Protection";

  $query=mysqli_query($db,"SELECT * FROM contact_us WHERE contact_id='".$contact_id."'")or die(mysqli_error());
    while($row3=mysqli_fetch_array($query)){

  $mail->addAddress($mailTo, "".$row3['fullname'].""); //client name

  }

  $mail->isHTML(true);

  $mail->Subject = "Contact Us Message";
  $mail->Body = " ".$body." ";
  $mail->AltBody = "This is The Plain Text Version of the Email Content";

  if (!$mail->send()) {
    
    echo "Mailer Error :". $mail->ErrorInfo;

  } else {

    // echo "Message Has Been Sent";

  }
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

    <title>Perpetual Protection | Contact Us</title>
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
    <link rel="stylesheet" type="text/css" href="assets/css/textarea.css">
    <link rel="stylesheet" type="text/css" href="assets/css/messageTextarea.css">
    <link rel="stylesheet" type="text/css" href="assets/css/leftscroll3.css">

  </head>

  <body class="bg-dark">
 
<div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header"> <i class="fas fa-phone"></i> Contact Us</div>
        <div class="card-body">
      <?php
        $query=mysqli_query($db,"SELECT * FROM contact_us WHERE contact_id='$contact_id'")or die(mysqli_error());
        while($row=mysqli_fetch_array($query)){
      ?>
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                   <span>From<br></span><b><?php echo $row['fullname'] ?></b>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                   <span>Contact Number<br></span><b><?php echo $row['contact_number'] ?></b>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <span>Email Address<br></span><b><?php echo $row['email'] ?></b>
              </div>
            </div>

             <div class="form-group text-center">
             <span><b>Message</b></span>
            <div class="form-label-group text-center">
              <textarea type="text" readonly="readonly"><?php echo $row['message'] ?></textarea> 
            </div>
          </div>

         <div class="input-box" hidden="hidden">
            <span class="details">Email Address</span>
            <input type="email" value="<?php echo $row['email']; ?>" name="email" id="email_address" autocomplete="off">
          </div>

          <div class="form-group">
              <div class="form-label-group">
                <textarea style="text-align: justify; height: 100px;" type="text" name="message" placeholder="Type Reply Here..." class="form-control" required="required"></textarea> 
              </div>
            </div>

             <input class="btn btn-outline-success btn-block" type="submit" value="Send Email" name="sendEmail">
            <a href="adminPanel.php" class="btn btn-block btn-outline-secondary">Cancel</a>
          
          </form>
         <?php } ?>
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
