<?php 
  include('../functions/functions.php');

  $client_id = $_GET['client_id'];

//   require('PHPMailer/src/PHPMailer.php');
//   require('PHPMailer/src/SMTP.php');

// require $_SERVER['DOCUMENT_ROOT'] . '/PerpetualProtection/admin/vendor/autoload.php';

//   $MessageBird = new \MessageBird\Client('Jbl8Ts8mcCQTjsoixUfTKKH0v');
//   $Message = new \MessageBird\Objects\Message();
//   $Message->originator = 'PaymentSMS';

// $query=mysqli_query($db,"SELECT * FROM clients WHERE client_id='".$client_id."'")or die(mysqli_error());
//   while($sms=mysqli_fetch_array($query)){

//   $Message->recipients = array($sms['contact_number']);

//  $query=mysqli_query($db,"SELECT * FROM payment WHERE client_id='".$client_id."' ORDER BY payment_id DESC LIMIT 1")or die(mysqli_error());
//           while($msg=mysqli_fetch_array($query)){

//   $Message->body = 'Perpetual Protection: This is to inform you that at exactly '.date('F j, Y / g:i a',strtotime($msg['date'])).' your payment amounting PHP '.$msg['amount'].' as initial payment for '.$sms['plan_type'].' has been succesfully paid. Thank You!';

//   $MessageBird->messages->create($Message);

//  }
// }

//   $query=mysqli_query($db,"SELECT * FROM clients WHERE client_id='".$client_id."'")or die(mysqli_error());
//           while($row=mysqli_fetch_array($query)){

//   $mailTo = $row['email_address'];

//  }

//  $query=mysqli_query($db,"SELECT * FROM payment WHERE client_id='".$client_id."' ORDER BY payment_id DESC LIMIT 1")or die(mysqli_error());
//           while($notif=mysqli_fetch_array($query)){

//   $body = "

//           <center>
//             <h4>This is to inform you that your payment with the amount of</h4> <h1 style=\"color: #2ecc71\">PHP ".$notif['amount']."</h1> <h4>on</h4> <h1 style=\"color: #3498db\">".date('F j, Y / g:i a',strtotime($notif['date']))."</h1> <h4>as initial payment for</h4> 
//           </center>

//           ";
//   }

//    $query=mysqli_query($db,"SELECT * FROM clients WHERE client_id='".$client_id."'")or die(mysqli_error());
//           while($row2=mysqli_fetch_array($query)){

//   $body2 = "

//           <center>
//             <h1 style=\"color: #2ecc71\">".$row2['plan_type']."</h1> <h4>has been succesfully paid. Thank you!</h4>
//           </center>

//           ";
//   }


//   $mail = new PHPMailer\PHPMailer\PHPMailer();

//   $mail->isSMTP();

//   $mail->Host = "mail.smtp2go.com";

//   $mail->SMTPAuth = true;

//   $mail->Username = "perpetualprotection";
//   $mail->Password = "reinheartmarl@24";

//   $mail->SMTPSecure = "tls";

//   $mail->Port = "2525";

//   $mail->From = "perpetualprotection@gmail.com";
//   $mail->FromName = "Perpetual Protection";

//   $query=mysqli_query($db,"SELECT * FROM clients WHERE client_id='".$client_id."'")or die(mysqli_error());
//     while($row3=mysqli_fetch_array($query)){

//   $mail->addAddress($mailTo, " ".$row3['fname']." ".$row3['lname']." "); //client name

//   }

//   $mail->isHTML(true);

//   $mail->Subject = "Payment Notification";
//   $mail->Body = " ".$body." ".$body2." ";
//   $mail->AltBody = "This is The Plain Text Version of the Email Content";

//   if (!$mail->send()) {
    
//     echo "Mailer Error :". $mail->ErrorInfo;

//   } else {

//     // echo "Message Has Been Sent";

//   }


 // $sql = mysqli_query($db, "SELECT * FROM payment WHERE client_id='".$_SESSION['plan']['client_id']."'");
  // $sql = mysqli_query($db, "SELECT * FROM payment ORDER BY payment_id DESC LIMIT 1 WHERE client_id='".$_SESSION['plan']['client_id']."'");
    $query=mysqli_query($db,"SELECT * FROM clients WHERE client_id='$client_id'")or die(mysqli_error());
      while($row=mysqli_fetch_array($query)){

        $query2 ="UPDATE `clients` SET `due_status` = 'undue' WHERE `client_id` = '".$row['client_id']."'";
        performQuery($query2);
                
      }

  $sql = mysqli_query($db, "SELECT * FROM payment WHERE client_id='$client_id' ORDER BY payment_id DESC LIMIT 1");
  $print_data = mysqli_fetch_row($sql);
          

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
<html lang = "en">
<head>

    <link rel="apple-touch-icon" sizes="76x76" href="images/insurance_icon.png">
    <link rel="icon" type="image/png" href="../images/logo.png">
    <title>Perpetual Protection | Payment Receipt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <link rel="stylesheet" type="text/css" href="../asset/customizedCss/style.css">
  <link rel="stylesheet" type="text/css" href="../asset/customizedCss/receipt.css">
  <link rel="stylesheet" type="text/css" href="../asset/customizedCss/navbar3.css">
  <link rel="stylesheet" type="text/css" href="../asset/customizedCss/footer4.css">

</head>
  <body>

    
      <style>
        @media print {
        body * {
          visibility: hidden;
        }
        .print-container, .print-container * {
          visibility: visible;
        }
      }
      </style>

    <nav class="navbar navbar-expand-md navbar-dark bg-transparent">
      <div class="container-fluid">
        <a class="navbar-brand" id="title" href="#" style="margin-top: 5px;">Perpetual</a>
        <a class="navbar-brand" id="title2" href="#" style="margin-top: 2px; margin-left: 18px">Protection</a>
      
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0"></ul>

       <!--  <a class="nav-links scroll" style="position: absolute; bottom: 10px; right: 230px;" href="clientProfile1.php"><span class="fa fa-user"></span> Profile</a> -->
      <!--   <a class="nav-links scroll" style="position: absolute; bottom: 10px; right: 115px;" href="clientRequest1.php">Request <span class="fa fa-wallet"></span></a> -->
   <!--      <a class="nav-links scroll" style="position: absolute; bottom: 10px; right: 10px;"  href="plan.php?logout='1'" onClick="return confirm('Are you sure you want to logout?' )">Logout <span class="fa fa-sign-out-alt"></span> </a> -->

        </div>
      </div>
    </nav>

      <div style="display: flex;">
      <a href="" onclick="window.print();" style="background: #fff; width: 100px; border-radius: 50px; margin-top: 20px; margin-left: 500px;">Print</a>
      <a  href="adminPanel.php" style="background: #fff; width: 100px; border-radius: 50px; margin-top: 20px; margin-left: 150px;">Done</a>
      </div>

      <?php  
        $query=mysqli_query($db,"SELECT * FROM clients WHERE client_id='$client_id'")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>

        <section class="contact print-container" id="contact">
            <div class="content" style="position: absolute; top: 20px;">
              <a style="font-size: 40px; color: #fff">Official Receipt</a>
              <p style="color: #fff">Perpetual Protection, Insurance Agency Payment Website</p>
            </div>
              <div class="contactForm" style="position: absolute; right: 80px; top: 60px;">
                <form class="" action="index.php" method="post" enctype="multipart/form-data">
                  <p id="p_content1">Received from</p>
                  <div class="inputBox q">
                    <input style="font-size: 20px;" id="input1" value="<?php echo $row['fname']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?>" disabled>
                  </div>
                   <p id="p_content2">the sum of Pesos (Php</p>
                   <div class="inputBox q">
                    <input  style="font-size: 20px;" id="input2" value="<?php  echo $print_data[3]; ?>" disabled>
                  </div>
                   <p id="p_content3">)on</p>
                  <div class="inputBox q">
                     <input  style="font-size: 18px;" id="input3" value="<?php  echo date('F j, Y / g:i a',strtotime($print_data[2])); ?>" disabled>
                  </div>
                  <p id="p_content4">as initial payment for</p>
                  <div class="inputBox q">
                     <input style="font-size: 20px;" id="input4" value="<?php echo $row['plan_type']; ?>" disabled>
                  </div>
                   <p id="p_content5" style="color: #000; top: 175px; position: absolute; left: 290px;">.</p>
                </form>
                <div class="inputBox q">
                     <input  style="font-size: 9px; width: 200px; position: absolute; top: 200px; background: transparent; left: 400px;" id="input2" disabled>
                  </div>
                     <input  style="font-size: 9px; width: 200px; position: absolute; top: 285px; background: transparent; left: 445px; border: none;"disabled value="Cashier's Signature Over Printed Name">
              </div>
          </section>

        <?php } ?>

  <div class="footer" style="position: absolute;">
    <a style="pointer-events: none;"><img src="../images/logo.png" width="50px"></a>
    <p style="color: #000">&copy; <script>document.write(new Date().getFullYear())</script> Perpetual Protection, Insurance Agency Payment Website
    </p>
  </div>

</body>
</html>

