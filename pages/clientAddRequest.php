<?php 
include('../functions/functions.php');

  $output = '';
  $output2 = '';

  $sql = "SELECT * FROM payment WHERE client_id='".$_SESSION['plan']['client_id']."'";
  $stmt = $db->query($sql);

  $sql2 = "SELECT sum(amount) AS total FROM payment WHERE client_id='".$_SESSION['plan']['client_id']."'";
  $stmt2 = $db->query($sql2);
  $row1 = $stmt2->fetch_assoc();

  $sql = mysqli_query($db, "SELECT * FROM clients_request ORDER BY request_id DESC LIMIT 1");
  $print_data = mysqli_fetch_row($sql);

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
      <title>Perpetual Protection | Add Request</title>
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
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/requestReason.css">

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
  <a href="clientRequest1.php"><img src="../images/back_Arrow.png" width="30px"></a>
    <center><div class="title">Add Request</div></center>
    <div class="content">

<form class="" id="reg_form" action="clientAddRequest.php" method="post" onsubmit="return checkInputs()" enctype="multipart/form-data">

    <?php echo display_error(); ?>

        <div class="user-details">

          <div class="input-box" hidden="">
            <input type="text" value="<?php echo $_SESSION['plan']['client_id']; ?>" name="client_id" required>
          </div>

          <div class="input-box">
            <span class="details">Plan Type</span>
            <input type="text" name="plan_type" id="plan_type" value="<?php echo $_SESSION['plan']['plan_type']; ?>" readonly>
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <div class="input-box">
            <span class="details">Payment Mode</span>
            <input type="text" name="payment_mode" id="payment_mode" value="<?php echo $_SESSION['plan']['payment_mode']; ?>" readonly>
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name="fullName" id="fullName" value="<?php echo $_SESSION['plan']['fname']; ?> <?php echo $_SESSION['plan']['mname']; ?> <?php echo $_SESSION['plan']['lname']; ?>" readonly>
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
            <span class="details">Residential Address</span>
            <input type="text" value="<?php echo $_SESSION['plan']['residential_address']; ?>" name="residential_address" id="residential_address" autocomplete="off" readonly>
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <div class="input-box">
            <span class="details">Contract Price</span>
            <input class="contractPrice" type="text" id="contractPrice" name="contractPrice" readonly>
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
        
          <div class="input-box">
            <span class="details">Total Payment</span>
            <input type="text" id="payment" name="payment" value="<?php echo $row1["total"] ?>" readonly>
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          

            <?php  
            $total=$row1["total"];                                
             if (empty($total)){
            ?>

          <div class="input-box">
            <span class="details">Balance</span>
            <input class="contractPrice" value="No Payment Added" readonly>
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

               <?php
              }else{
            ?>
          <div class="input-box">
            <span class="details">Balance</span>
            <input class="balance" type="text" id="balance" name="balance" readonly>
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>
            <?php }?>

           

          <div class="input-box">
            <span class="details">First Payment</span>
              <?php
                  $query=mysqli_query($db,"SELECT * from `payment` WHERE `client_id`='".$_SESSION['plan']['client_id']."' order by `payment_id` ASC LIMIT 1")or die(mysqli_error());
                    while($row=mysqli_fetch_array($query)){
              ?>
                  <input type="text" name="first_payment" value="<?php echo date('F j, Y / g:i a',strtotime($row['date']))?>" readonly>
              <?php }?>
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

           <div class="input-box">
            <span class="details">Recent Payment</span>
              <?php
                  $query=mysqli_query($db,"SELECT * from `payment` WHERE `client_id`='".$_SESSION['plan']['client_id']."' order by `payment_id` DESC LIMIT 1")or die(mysqli_error());
                    while($row=mysqli_fetch_array($query)){
              ?>
                  <input type="text" name="last_payment" value="<?php echo date('F j, Y / g:i a',strtotime($row['date']))?>" readonly>
              <?php }?>
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

          <div class="input-box">
            <label id="label">Select Reason For Request</label>
            <select name="requestReason" id="requestReason">
              <option value=""></option>
              <option value="Hospital income benefit">Hospital income benefit</option>
              <option value="Damage to properties due to earthquake">Damage to properties due to earthquake</option>
              <option value="Damage to properties due to fire or lightning">Damage to properties due to fire or lightning</option>
              <option value="Medical Reimbursement (Due to Accident Only)">Medical Reimbursement (Due to Accident Only)</option>
              <option value="Death due to accident (1 month observation period)">Death due to accident (1 month observation period)</option>
              <option value="Cash burial assistance (6 months contentstability period)">Cash burial assistance (6 months contentstability period)</option>
               <option value="Bereavement assistance for death due to causes other than accident">Bereavement assistance for death due to causes other than accident</option>
            </select>
            <i  style="position: absolute; left: 600px" class="fas fa-check-circle"></i>
            <i style="position: absolute; left: 600px" class="fas fa-exclamation-circle"></i>
            <small>Error Message</small>
          </div>

           <h1 id="finish"></h1>

         </div> 

        <div class="button">
          <input type="submit" value="ADD" name="request_btn" id="request_btn">
        </div>


      </form>
    </div>
  </div>

   <div class="footer">
    <a style="pointer-events: none;"><img src="../images/logo.png" width="50px"></a>
    <p style="color: #000">&copy; <script>document.write(new Date().getFullYear())</script> Perpetual Protection, Insurance Agency Payment Website
    </p>
  </div>

    <script src="../asset/js/app.js"></script>
    <script src="../asset/js/payment4.js"></script>
    <script src="../asset/js/balance2.js"></script>
    <script src="../asset/js/paycontractPriceEqual9.js"></script>
    <script src="../asset/js/requestValidation.js"></script>

</body>
</html>