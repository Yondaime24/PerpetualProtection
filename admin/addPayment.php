<?php 
  include('../functions/functions.php');

  $client_id = $_GET['client_id'];

   if (isset($_POST['adminPayment_btn'])) {
            // call these variables with the global keyword to make them available in function
    $client_id = $_POST['client_id'];
    $amount = $_POST['amount'];
    $status = 'undue';
    
    $query = "INSERT INTO payment (`client_id`, `date`, `amount`, `status`)VALUES('$client_id', CURRENT_TIMESTAMP, '$amount', '$status')";
        mysqli_query($db, $query);

    $query2 ="UPDATE `clients` SET `due_status` = 'undue' WHERE `client_id` = $client_id;";
    performQuery($query2);

    $updatePlan ="UPDATE `clients` SET `update_status` = 'updated' WHERE `client_id` = $client_id;";
    performQuery($updatePlan);

  $query3=mysqli_query($db,"SELECT * from `next_payment` WHERE `client_id`=$client_id order by `nextPayment_id` DESC LIMIT 1")or die(mysqli_error());
    while($row=mysqli_fetch_array($query3)){

    $monthly = '1 month';
    $date = new DateTime($row['nextPayment_date'] . $monthly);
    $todayDate = new DateTime();

    $quarterly = '3 month';
    $date2 = new DateTime($row['nextPayment_date'] . $quarterly);
   
    $semi_annual = '6 month';
    $date3 = new DateTime($row['nextPayment_date'] . $semi_annual);
   
    $annual = '1 year';
    $date4 = new DateTime($row['nextPayment_date'] . $annual);

$query4=mysqli_query($db,"SELECT * from `clients` WHERE `client_id`=$client_id")or die(mysqli_error());
    while($client=mysqli_fetch_array($query4)){
  
  if ($client['payment_mode']=='Monthly') {

      if ($date >= $todayDate) {
                               
        $due_date = $date->format('Y-m-d H:i:s');
        $status = 'undue';
        $stmt = $db->prepare("INSERT INTO next_payment (client_id, nextPayment_date, status) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $client_id, $due_date, $status);
        $stmt->execute(); 

      }
                      
  }else if ($client['payment_mode']=='Quarterly') {

    if ($date2 >= $todayDate) {
                               
        $due_date = $date2->format('Y-m-d H:i:s');
        $status = 'undue';
        $stmt = $db->prepare("INSERT INTO next_payment (client_id, nextPayment_date, status) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $client_id, $due_date, $status);
        $stmt->execute(); 

      }
                            
  }else if ($client['payment_mode']=='Semi-Annual') {

     if ($date3 >= $todayDate) {
                               
        $due_date = $date3->format('Y-m-d H:i:s');
        $status = 'undue';
        $stmt = $db->prepare("INSERT INTO next_payment (client_id, nextPayment_date, status) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $client_id, $due_date, $status);
        $stmt->execute(); 

      }
                           
  }else if ($client['payment_mode']=='Annual') {

      if ($date4 >= $todayDate) {
                               
        $due_date = $date4->format('Y-m-d H:i:s');
        $status = 'undue';
        $stmt = $db->prepare("INSERT INTO next_payment (client_id, nextPayment_date, status) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $client_id, $due_date, $status);
        $stmt->execute(); 
        
      }
                             
  }
}

}

    echo "<script>alert('Payment Has Been Added')</script>";
    echo "<script>window.open('payment_receipt.php?client_id=$client_id','_self')</script>";

        
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
    <link rel="stylesheet" type="text/css" href="assets/css/payment.css">
    <link rel="stylesheet" type="text/css" href="assets/css/addpayment.css">

  </head>

  <body class="bg-dark">
 
    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header"><i class="fas fa-money-bill-wave"> Payment</i></div>
        <div class="card-body">
          <div class="text-center mb-4">
            <h4>Add Payment?</h4>
        <?php
            $query=mysqli_query($db,"SELECT * FROM clients WHERE client_id='$client_id'")or die(mysqli_error());
            while($row=mysqli_fetch_array($query)){
         ?>
              <p>Mr/Mrs. <?php echo $row['fname'] ?> <?php echo $row['mname'] ?> <?php echo $row['lname'] ?></p>
              <p>Payment Will be Added!</p>
         <?php }?>
          </div>

        <?php
            $query=mysqli_query($db,"SELECT * FROM clients WHERE client_id='$client_id'")or die(mysqli_error());
            while($row=mysqli_fetch_array($query)){
        ?>
          <form action="addPayment.php?client_id=<?php echo $row['client_id'] ?>" method="post" enctype="multipart/form-data">
             <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                       <input type="text" id="plan_type" class="form-control" value="<?php echo $row['plan_type'];?>" readonly>
                    <label id="label3"><b>Plan Type</b></label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                      <input type="text" id="payment_mode" class="form-control" value="<?php echo $row['payment_mode'];?>" readonly>
                    <label id="label4"><b>Payment Mode</b></label>
                  </div>
                </div>
              </div>
            </div>

             <div class="form-group">
              <div class="form-label-group text-center">
                <span>Payment Amount</span>
                  <input name="amount" id="amount" class="form-control text-center" readonly="" hidden="true">
                  <input name="commaamount" id="commaamount" class="form-control text-center" readonly="">
              </div>
            </div> 

            <div class="form-group" hidden="">
              <div class="form-label-group text-center">
                <span>Client ID</span>
                  <input name="client_id" class="form-control text-center" value="<?php echo $row['client_id'] ?>" readonly="">
              </div>
            </div> 

          <?php }?>

           <input class="btn btn-outline-warning btn-block" onClick="return confirm('Are you sure you want to add payment for this account?' )" type="submit" value="Add Payment" name="adminPayment_btn">
        <?php
            $query=mysqli_query($db,"SELECT * FROM clients WHERE client_id='$client_id'")or die(mysqli_error());
            while($row=mysqli_fetch_array($query)){
         ?>
          <?php 

          if ($row['due_status']=='due') {
            echo "<a href=\"adminPanel.php\" class=\"btn btn-block btn-outline-secondary\">Cancel</a>";
          }else{
            echo "<a href=\"adminAddPayment.php\" class=\"btn btn-block btn-outline-secondary\">Cancel</a>";
          }
          ?>
         <?php }?>
          </form>
        </div>
      </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="assets/js/adminPayments.js"></script>
    <script src="assets/js/adminPaymentscomma.js"></script>


  </body>

</html>
