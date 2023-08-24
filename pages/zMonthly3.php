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

    <link rel="apple-touch-icon" sizes="76x76" href="images/insurance_icon.png">
    <link rel="icon" type="image/png" href="../images/logo.png">
    <title>Perpetual Protection | Monthly</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

     
      <link rel="stylesheet" type="text/css" href="../asset/css/bootsrap.min.css">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/navbar3.css">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/reg11.css">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/a.css">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/pointer.css">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/footer4.css">
      <link href="../asset/css/all.css" type="text/css" rel="stylesheet" media="all">
      <link rel="stylesheet" type="text/css" href="../asset/customizedCss/paypal3.css">

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

   <!--  <a class="nav-links scroll" style="position: absolute; bottom: 10px; right: 230px;" href="clientProfile1.php"><span class="fa fa-user"></span> Profile</a> -->
    <a class="nav-links scroll" style="position: absolute; bottom: 10px; right: 115px;" href="clientRequest1.php">Request <span class="fa fa-wallet"></span></a>
    <a class="nav-links scroll" style="position: absolute; bottom: 10px; right: 10px;"  href="plan.php?logout='1'" onClick="return confirm('Are you sure you want to logout?' )">Logout <span class="fa fa-sign-out-alt"></span> </a>

    </div>
  </div>
</nav>

  <div class="container">
  <a href="plan.php"><img src="../images/back_Arrow.png" width="30px"></a>
  <br>
  <br>
    <center><div class="title"><h3>Plan 3 Monthly</h3></div></center>
  <br>
  <br>
    <div class="content">

    <h2 id="a">&#8369; 450.00</h2>
    <p id="u">_____________Pay With_____________</p>

      <a href="#" class="logo"><img src="../images/monthly.png" class="image" alt="" width="200" style="margin-left: 60px; cursor: auto; margin-top: 25px" /></a>
      <h1 style="margin-left: 80px; margin-top: 20px;">Payment</h1>

     <!-- Set up a container element for the button -->
      <div id="paypal-button-container"></div>
    <!-- Include the PayPal JavaScript SDK -->
      <script src="https://www.paypal.com/sdk/js?client-id=AcKWT8P-lS13FI3puFICc1oXMk_NO_n-Xtau2DOuwcxLzuHkzvVG4lzBRGZ10-n0I8uyrxTQXdjnD-Hf&currency=PHP"></script> 
    
    </div>
  </div>


   <div class="footer">
    <a style="pointer-events: none;"><img src="../images/logo.png" width="50px"></a>
    <p style="color: #000">&copy; <script>document.write(new Date().getFullYear())</script> Perpetual Protection, Insurance Agency Payment Website
    </p>
  </div>

<script>
  paypal.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
   return actions.order.create({
        purchase_units: [{
          amount: {
            value: '450'
          }
        }]
      });
    },
    onApprove: function(data, actions) {
  return actions.order.capture().then(function() {
  window.location = "payment/transaction-completed.php?&orderID="+data.orderID;;  //redirect             
  });
}
  }).render('#paypal-button-container');
  //This function displays Smart Payment Buttons on your web page.
</script>

</body>
</html>