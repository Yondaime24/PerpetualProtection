<?php 
  include('../functions/functions.php');

  $output = '';
  $output2 = '';

  $sql = "SELECT * FROM payment WHERE client_id='".$_SESSION['plan']['client_id']."'";
  $stmt = $db->query($sql);

  $sql2 = "SELECT sum(amount) AS total FROM payment WHERE client_id='".$_SESSION['plan']['client_id']."'";
  $stmt2 = $db->query($sql2);
  $row1 = $stmt2->fetch_assoc();

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
    <title>Perpetual Protection | Plan 4</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous">
    </script>

    <link rel="stylesheet" type="text/css" href="../asset/customizedCss/style4.css">
    <link rel="stylesheet" type="text/css" href="../asset/customizedCss/circularlinks.css">
    <link rel="stylesheet" type="text/css" href="../asset/customizedCss/weblogo3.css">
    <link rel="stylesheet" type="text/css" href="../asset/customizedCss/rightpanel7.css">
    <link rel="stylesheet" type="text/css" href="../asset/customizedCss/paymentTable2.css">
    <link rel="stylesheet" type="text/css" href="../asset/customizedCss/table4.css">
    <link rel="stylesheet" type="text/css" href="../asset/customizedCss/plantimelineDesign2.css">
    <link rel="stylesheet" type="text/css" href="../asset/css/all.css">
    <link rel="stylesheet" type="text/css" href="../asset/customizedCss/badge9.css">
    <link rel="stylesheet" type="text/css" href="../asset/customizedCss/dateFinished.css">
    <link rel="stylesheet" type="text/css" href="../asset/customizedCss/commaoncontract.css">
    <link rel="stylesheet" type="text/css" href="../asset/customizedCss/pesosymbol.css">

  </head>
  <body>

<div class="container" style="background: url(../images/log.svg);">
  <div class="forms-container">
    <div class="signin-signup">
      <form action="#" class="sign-in-form">
       <?php if (isset($_SESSION['success'])) : ?>
       <div class="error success" >
        <h3 style="color: #3498db">
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
          <?php  if (isset($_SESSION['plan'])) : ?>
          <strong><?php echo $_SESSION['plan']['fname']; ?></strong>
           <strong><?php echo $_SESSION['plan']['lname']; ?></strong>
         <?php endif ?>!!!
        </h3>
      </div>
    <?php endif ?>
        <h1 class="title" style="color: #3498db;">Perpetual<a style="color: #2ecc71;">Protection</a></h1>
        <h4>Tubigon Branch</h4>

        <div class="dropdown">
          <?php
                $query = "SELECT * from `admin_message` where `status` = 'unread' && `client_id`='".$_SESSION['plan']['client_id']."' order by `datetime` DESC";
                if(count(fetchAll($query))>0){
            ?>
            <span class="badge"><?php echo count(fetchAll($query)); ?></span>
            <?php
                }
            ?>
          <i class="fas fa-envelope fa-2x"></i>
          <div class="dropdown-content">
            <div class="scroll2">
            <?php 
               $query = "SELECT * from `admin_message` where `client_id`='".$_SESSION['plan']['client_id']."' order by `datetime` DESC";
               if(count(fetchAll($query))>0){
                  foreach(fetchAll($query) as $i){
            ?>
            <small>From: Admin <i><?php echo date('F j, Y / g:i a',strtotime($i['datetime'])) ?></i></small><br/>

            <a style="<?php if($i['status']=='unread'){echo "font-weight:bold;";}?>" href="adminMessage.php?admin_id=<?php echo $i['admin_id'] ?>&&request_id=<?php echo $i['request_id'] ?>">
             
             <?php 
                  
                if($i['type']=='Request'){
                    echo "Request message notification";
                }else if($i['type']=='Message'){
                     echo "You have a new message.";
                }else if($i['type']=='New User Message'){
                     echo "New user message notification";
                }
                  
              ?>
              <br>
            </a>
            <div class="dropdown-divider"></div>
            <?php 
                  }
                }else{
                  echo "No Messages Yet";
                }

              ?>
          </div>
          </div>
        </div>
        
        <span>Contact Us: +639175870524 / 02-500-0824</span>
        <small>or</small>
        <a href="sendMessage.php" id="sendMessage">SEND MESSAGE</a>


        <a href="#" class="logo" style="pointer-events: none"><img src="../images/logo.png" class="image" alt="" /></a>
  <!--  RECCOMENDATION -->
    <?php
        $query=mysqli_query($db,"SELECT * FROM clients WHERE client_id='".$_SESSION['plan']['client_id']."'")or die(mysqli_error());
        while($row=mysqli_fetch_array($query)){
    ?>


     <?php if ($row['update_status']=='empty') {?>

        <div style="background: transparent; height: 200px; width: 500px;">
          <hr>
          <br>
          <center>
          <span style="color: red; background: white">You selected <u><?php echo $row['plan_type'] ?></u> with payment mode of  <u><?php echo $row['payment_mode'] ?></u>.</span>
          <br><br>
          <span style="color: red; background: white;">Are you sure that this details are correct?</span>
          <br><br>
            <a href="updateStatus.php?client_id=<?php echo $_SESSION['plan']['client_id'] ?>" onclick="return confirm('Before proceeding make sure that the details of plan type and payment mode is correct. Continue?')" id="sendMessage">Yes, proceed</a>  
            <a href="updatePlan.php" id="sendMessage">No, update</a>
            <br><br>
          </center>
          <hr>
        </div>

     <?php }else{ ?>

          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>     

    <?php } ?>


  <?php } ?>
<!--  RECCOMENDATION -->        
      </form>


      <form action="#" class="sign-up-form">

        <div class="scroll">
          <div class="main-timeline2">
              <div class="timeline">

    <?php  
    $total=$row1["total"];                                
     if (empty($total)){
    ?>

    <a href="#" id="a1" class="timeline-content" style="text-decoration: none;">
      <center>
        <h3>No payment data! Please add payment first!</h3>
        <img style="width: 400px" src="../images/logo.png" class="image" alt="" />
        <span style="color: white; background: red">*Payment history will be displayed once payment has been transacted!</span>
      </center>
    </a>

    <?php
      }else{
    ?>
          <a href="#" id="a1" class="timeline-content" style="color: #000; text-decoration: none;">
            <center>
              <h1>Payment History</h1><br>
              <h4>Recent Payment</h4>
              <?php
                  $query=mysqli_query($db,"SELECT * from `payment` WHERE `client_id`='".$_SESSION['plan']['client_id']."' order by `payment_id` DESC LIMIT 1")or die(mysqli_error());
                    while($row=mysqli_fetch_array($query)){
              ?>
                  <span id="total" style="background: white;"><?php echo date('F j, Y / g:i a',strtotime($row['date']))?></span>
              <br>

              <?php }?>

              <br>

            <?php
                  $query=mysqli_query($db,"SELECT * from `payment` WHERE `client_id`='".$_SESSION['plan']['client_id']."' order by `payment_id` DESC LIMIT 1")or die(mysqli_error());
                    while($row=mysqli_fetch_array($query)){
              ?>
                    <?php 

                    $monthly = '1 month';
                    $date = new DateTime($row['date'] . $monthly);
                    $todayDate = new DateTime();

                    $quarterly = '3 month';
                    $date2 = new DateTime($row['date'] . $quarterly);
                    $todayDate2 = new DateTime();

                    $semi_annual = '6 month';
                    $date3 = new DateTime($row['date'] . $semi_annual);
                    $todayDate3 = new DateTime();

                    $annual = '1 year';
                    $date4 = new DateTime($row['date'] . $annual);
                    $todayDate4 = new DateTime();

// 1
        if ($_SESSION['plan']['payment_mode']=='Monthly') {

              if ($date >= $todayDate) {


$payment=mysqli_query($db,"SELECT * from `payment` WHERE `client_id`='".$_SESSION['plan']['client_id']."' order by `payment_id` ASC LIMIT 1")or die(mysqli_error());
    while($pay=mysqli_fetch_array($payment)){

      $status  = $pay['status'];

      if ($status == 'undue') {


     if ($row1["total"]=='15000.00'  && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Monthly') {

            echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='14900.00' && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Quarterly'){

             echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='14700.00' && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Semi-Annual'){

               echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='14550.00' && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='14250.00' && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Lumpsum'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='21000.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Monthly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='20800.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Quarterly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='20580.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Semi-Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='20375.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='19950.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Lumpsum'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='27000.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Monthly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='26800.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Quarterly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='26460.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Semi-Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='26190.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='25650.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Lumpsum'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='45000.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Monthly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='44600.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Quarterly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='44100.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Semi-Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='43650.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='42750.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Lumpsum'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else{

       
        echo "<h4>Next Payment(".$_SESSION['plan']['payment_mode'].")</h4>";
        echo "<span style=\"background: white;\">" . $date->format('F j, Y / g:i a') . "</span><br>";

      }

      }else{

        $sql = "SELECT * from `next_payment` WHERE `client_id`='".$_SESSION['plan']['client_id']."' order by `nextPayment_id` DESC LIMIT 1";
          $result = mysqli_query($db,$sql);
            while($row=mysqli_fetch_array($result)){

     if ($row1["total"]=='15000.00'  && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Monthly') {

            echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='14900.00' && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Quarterly'){

             echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='14700.00' && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Semi-Annual'){

               echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='14550.00' && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='14250.00' && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Lumpsum'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='21000.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Monthly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='20800.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Quarterly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='20580.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Semi-Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='20375.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='19950.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Lumpsum'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='27000.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Monthly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='26800.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Quarterly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='26460.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Semi-Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='26190.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='25650.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Lumpsum'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='45000.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Monthly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='44600.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Quarterly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='44100.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Semi-Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='43650.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='42750.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Lumpsum'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else{

            $payment_mode = $_SESSION['plan']['payment_mode'];
            echo "<h4>Next Payment (". $payment_mode . ")</h4> ";
            echo "<span id=\"total\" style=\"background: white;\">" . date('F j, Y / g:i a',strtotime($row['nextPayment_date'])) . "</span><br><br>";

          }

        }

      }

  }
                               
              $query2 ="UPDATE `clients` SET `due_status` = 'undue' WHERE `client_id` = '".$_SESSION['plan']['client_id']."';";
              performQuery($query2);


                              }else{

                          echo "<h4>(".$_SESSION['plan']['payment_mode'].") Payment Due On</h4>";
                          echo "<span style=\"background: white;\">" . $date->format('F j, Y / g:i a') . "</span><br>";
                          echo "<br><span style=\"background: red; color: white;\">Your payment is due please pay the correspoding amount immediately to avoid acount deactivation!</span>";

                          $client_id = $_SESSION['plan']['client_id'];
                          $due_date = $date->format('Y-m-d H:i:s');
                          $status = 'due';
                          $stmt = $db->prepare("INSERT INTO next_payment (client_id, nextPayment_date, status) VALUES (?, ?, ?)");
                          $stmt->bind_param("sss", $client_id, $due_date, $status);
                          $stmt->execute();

                          $query2 ="UPDATE `clients` SET `due_status` = 'due' WHERE `client_id` = '".$_SESSION['plan']['client_id']."';";
                          performQuery($query2);

                          $query4 ="UPDATE `payment` SET `status` = 'due' WHERE `client_id` = '".$_SESSION['plan']['client_id']."';";
                          performQuery($query4);

                              }
// 2
                    }else if ($_SESSION['plan']['payment_mode']=='Quarterly') {

                              if ($date2 >= $todayDate2) {


$payment=mysqli_query($db,"SELECT * from `payment` WHERE `client_id`='".$_SESSION['plan']['client_id']."' order by `payment_id` ASC LIMIT 1")or die(mysqli_error());
    while($pay=mysqli_fetch_array($payment)){

      $status  = $pay['status'];

      if ($status == 'undue') {


     if ($row1["total"]=='15000.00'  && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Monthly') {

            echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='14900.00' && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Quarterly'){

             echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='14700.00' && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Semi-Annual'){

               echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='14550.00' && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='14250.00' && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Lumpsum'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='21000.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Monthly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='20800.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Quarterly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='20580.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Semi-Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='20375.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='19950.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Lumpsum'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='27000.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Monthly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='26800.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Quarterly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='26460.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Semi-Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='26190.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='25650.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Lumpsum'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='45000.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Monthly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='44600.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Quarterly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='44100.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Semi-Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='43650.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='42750.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Lumpsum'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else{

       
        echo "<h4>Next Payment(".$_SESSION['plan']['payment_mode'].")</h4>";
        echo "<span style=\"background: white;\">" . $date2->format('F j, Y / g:i a') . "</span><br>";

      }

      }else{

        $sql = "SELECT * from `next_payment` WHERE `client_id`='".$_SESSION['plan']['client_id']."' order by `nextPayment_id` DESC LIMIT 1";
          $result = mysqli_query($db,$sql);
            while($row=mysqli_fetch_array($result)){

     if ($row1["total"]=='15000.00'  && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Monthly') {

            echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='14900.00' && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Quarterly'){

             echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='14700.00' && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Semi-Annual'){

               echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='14550.00' && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='14250.00' && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Lumpsum'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='21000.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Monthly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='20800.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Quarterly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='20580.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Semi-Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='20375.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='19950.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Lumpsum'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='27000.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Monthly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='26800.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Quarterly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='26460.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Semi-Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='26190.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='25650.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Lumpsum'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='45000.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Monthly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='44600.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Quarterly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='44100.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Semi-Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='43650.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='42750.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Lumpsum'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else{

            $payment_mode = $_SESSION['plan']['payment_mode'];
            echo "<h4>Next Payment (". $payment_mode . ")</h4> ";
            echo "<span id=\"total\" style=\"background: white;\">" . date('F j, Y / g:i a',strtotime($row['nextPayment_date'])) . "</span><br><br>";

          }

        }

      }

  }


                          $query2 ="UPDATE `clients` SET `due_status` = 'undue' WHERE `client_id` = '".$_SESSION['plan']['client_id']."';";
                          performQuery($query2);

                              }else{
                                echo "<h4>(".$_SESSION['plan']['payment_mode'].") Payment Due On</h4>";
                                echo "<span style=\"background: white;\">" . $date2->format('F j, Y / g:i a') . "</span><br>";
                                echo "<br><span style=\"background: red; color: white;\">Your payment is due please pay the correspoding amount immediately to avoid acount deactivation!</span>";

                          $client_id = $_SESSION['plan']['client_id'];
                          $due_date = $date2->format('Y-m-d H:i:s');
                          $status = 'due';
                          $stmt = $db->prepare("INSERT INTO next_payment (client_id, nextPayment_date, status) VALUES (?, ?, ?)");
                          $stmt->bind_param("sss", $client_id, $due_date, $status);
                          $stmt->execute();

                          $query2 ="UPDATE `clients` SET `due_status` = 'due' WHERE `client_id` = '".$_SESSION['plan']['client_id']."';";
                          performQuery($query2);

                          $query4 ="UPDATE `payment` SET `status` = 'due' WHERE `client_id` = '".$_SESSION['plan']['client_id']."';";
                          performQuery($query4);

                              }
// 3
                    }else if ($_SESSION['plan']['payment_mode']=='Semi-Annual') {

                              if ($date3 >= $todayDate3) {

$payment=mysqli_query($db,"SELECT * from `payment` WHERE `client_id`='".$_SESSION['plan']['client_id']."' order by `payment_id` ASC LIMIT 1")or die(mysqli_error());
    while($pay=mysqli_fetch_array($payment)){

      $status  = $pay['status'];

      if ($status == 'undue') {


     if ($row1["total"]=='15000.00'  && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Monthly') {

            echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='14900.00' && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Quarterly'){

             echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='14700.00' && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Semi-Annual'){

               echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='14550.00' && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='14250.00' && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Lumpsum'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='21000.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Monthly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='20800.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Quarterly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='20580.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Semi-Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='20375.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='19950.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Lumpsum'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='27000.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Monthly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='26800.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Quarterly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='26460.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Semi-Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='26190.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='25650.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Lumpsum'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='45000.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Monthly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='44600.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Quarterly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='44100.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Semi-Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='43650.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='42750.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Lumpsum'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else{

       
        echo "<h4>Next Payment(".$_SESSION['plan']['payment_mode'].")</h4>";
        echo "<span style=\"background: white;\">" . $date3->format('F j, Y / g:i a') . "</span><br>";

      }

      }else{

        $sql = "SELECT * from `next_payment` WHERE `client_id`='".$_SESSION['plan']['client_id']."' order by `nextPayment_id` DESC LIMIT 1";
          $result = mysqli_query($db,$sql);
            while($row=mysqli_fetch_array($result)){

     if ($row1["total"]=='15000.00'  && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Monthly') {

            echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='14900.00' && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Quarterly'){

             echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='14700.00' && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Semi-Annual'){

               echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='14550.00' && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='14250.00' && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Lumpsum'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='21000.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Monthly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='20800.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Quarterly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='20580.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Semi-Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='20375.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='19950.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Lumpsum'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='27000.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Monthly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='26800.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Quarterly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='26460.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Semi-Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='26190.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='25650.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Lumpsum'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='45000.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Monthly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='44600.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Quarterly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='44100.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Semi-Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='43650.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='42750.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Lumpsum'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else{

            $payment_mode = $_SESSION['plan']['payment_mode'];
            echo "<h4>Next Payment (". $payment_mode . ")</h4> ";
            echo "<span id=\"total\" style=\"background: white;\">" . date('F j, Y / g:i a',strtotime($row['nextPayment_date'])) . "</span><br><br>";

          }

        }

      }

  }

                          $query2 ="UPDATE `clients` SET `due_status` = 'undue' WHERE `client_id` = '".$_SESSION['plan']['client_id']."';";
                          performQuery($query2);

                              }else{
                                echo "<h4>(".$_SESSION['plan']['payment_mode'].") Payment Due On</h4>";
                                echo "<span style=\"background: white;\">" . $date3->format('F j, Y / g:i a') . "</span><br>";
                                echo "<br><span style=\"background: red; color: white;\">Your payment is due please pay the correspoding amount immediately to avoid acount deactivation!</span>";

                          $client_id = $_SESSION['plan']['client_id'];
                          $due_date = $date3->format('Y-m-d H:i:s');
                          $status = 'due';
                          $stmt = $db->prepare("INSERT INTO next_payment (client_id, nextPayment_date, status) VALUES (?, ?, ?)");
                          $stmt->bind_param("sss", $client_id, $due_date, $status);
                          $stmt->execute();

                          $query2 ="UPDATE `clients` SET `due_status` = 'due' WHERE `client_id` = '".$_SESSION['plan']['client_id']."';";
                          performQuery($query2);

                          $query4 ="UPDATE `payment` SET `status` = 'due' WHERE `client_id` = '".$_SESSION['plan']['client_id']."';";
                          performQuery($query4);

                              }
// 4
                    }else if ($_SESSION['plan']['payment_mode']=='Annual') {

                              if ($date4 >= $todayDate4) {

$payment=mysqli_query($db,"SELECT * from `payment` WHERE `client_id`='".$_SESSION['plan']['client_id']."' order by `payment_id` ASC LIMIT 1")or die(mysqli_error());
    while($pay=mysqli_fetch_array($payment)){

      $status  = $pay['status'];

      if ($status == 'undue') {


     if ($row1["total"]=='15000.00'  && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Monthly') {

            echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='14900.00' && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Quarterly'){

             echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='14700.00' && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Semi-Annual'){

               echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='14550.00' && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='14250.00' && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Lumpsum'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='21000.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Monthly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='20800.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Quarterly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='20580.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Semi-Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='20375.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='19950.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Lumpsum'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='27000.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Monthly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='26800.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Quarterly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='26460.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Semi-Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='26190.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='25650.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Lumpsum'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='45000.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Monthly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='44600.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Quarterly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='44100.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Semi-Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='43650.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='42750.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Lumpsum'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else{

       
        echo "<h4>Next Payment(".$_SESSION['plan']['payment_mode'].")</h4>";
        echo "<span style=\"background: white;\">" . $date4->format('F j, Y / g:i a') . "</span><br>";

      }

      }else{

        $sql = "SELECT * from `next_payment` WHERE `client_id`='".$_SESSION['plan']['client_id']."' order by `nextPayment_id` DESC LIMIT 1";
          $result = mysqli_query($db,$sql);
            while($row=mysqli_fetch_array($result)){

     if ($row1["total"]=='15000.00'  && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Monthly') {

            echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='14900.00' && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Quarterly'){

             echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='14700.00' && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Semi-Annual'){

               echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='14550.00' && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='14250.00' && $_SESSION['plan']['plan_type']=='Plan 1' && $_SESSION['plan']['payment_mode']=='Lumpsum'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='21000.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Monthly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='20800.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Quarterly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='20580.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Semi-Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='20375.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='19950.00' && $_SESSION['plan']['plan_type']=='Plan 2' && $_SESSION['plan']['payment_mode']=='Lumpsum'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='27000.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Monthly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='26800.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Quarterly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='26460.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Semi-Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='26190.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='25650.00' && $_SESSION['plan']['plan_type']=='Plan 3' && $_SESSION['plan']['payment_mode']=='Lumpsum'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='45000.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Monthly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='44600.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Quarterly'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='44100.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Semi-Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='43650.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Annual'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else if($row1["total"]=='42750.00' && $_SESSION['plan']['plan_type']=='Plan 4' && $_SESSION['plan']['payment_mode']=='Lumpsum'){

                 echo "<span style=\"background: white;\">Payment Finished</span><br>";

        }else{

            $payment_mode = $_SESSION['plan']['payment_mode'];
            echo "<h4>Next Payment (". $payment_mode . ")</h4> ";
            echo "<span id=\"total\" style=\"background: white;\">" . date('F j, Y / g:i a',strtotime($row['nextPayment_date'])) . "</span><br><br>";

          }

        }

      }

  }

                          $query2 ="UPDATE `clients` SET `due_status` = 'undue' WHERE `client_id` = '".$_SESSION['plan']['client_id']."';";
                          performQuery($query2);

                              }else{
                                echo "<h4>(".$_SESSION['plan']['payment_mode'].") Payment Due On</h4>";
                                echo "<span style=\"background: white;\">" . $date4->format('F j, Y / g:i a') . "</span><br>";
                                echo "<br><span style=\"background: red; color: white;\">Your payment is due please pay the correspoding amount immediately to avoid acount deactivation!</span>";

                          $client_id = $_SESSION['plan']['client_id'];
                          $due_date = $date4->format('Y-m-d H:i:s');
                          $status = 'due';
                          $stmt = $db->prepare("INSERT INTO next_payment (client_id, nextPayment_date, status) VALUES (?, ?, ?)");
                          $stmt->bind_param("sss", $client_id, $due_date, $status);
                          $stmt->execute();

                          $query2 ="UPDATE `clients` SET `due_status` = 'due' WHERE `client_id` = '".$_SESSION['plan']['client_id']."';";
                          performQuery($query2);

                          $query4 ="UPDATE `payment` SET `status` = 'due' WHERE `client_id` = '".$_SESSION['plan']['client_id']."';";
                          performQuery($query4);

                              }
                        }

                    ?>
              <?php }?>
            </center>
          </a>

          <a href="#" id="a1" class="timeline-content" style="background: #3498db; color: #000; text-decoration: none;">
            <h3>Total Payment:</h3>
              <center>
                <h1 style="font-family: Lucida Handwriting, cursive; color: white">&#8369;<?php echo number_format($row1["total"], 2, '.', ','); ?></h1>
            </center>
                   
          </a>

          <a href="#" id="a1" class="timeline-content" style="color: #000; text-decoration: none;">
            <center>
              <div class="row" style="display: flex;">  
                <div class="column" style="flex: 50%;">
                   <h5 style="font-size: 18px;">Date/Time</h5>
                <?php
                    $query=mysqli_query($db,"SELECT date FROM payment WHERE client_id='".$_SESSION['plan']['client_id']."'")or die(mysqli_error());
                      while($row=mysqli_fetch_array($query)){
                ?>  
                   <h5 style="padding: 10px; font-size: 15px; color: #fff"><?php echo date('F j, Y / g:i a',strtotime($row['date'])); ?></h5>
                <?php }?>
                </div>
                <div class="column" style="flex: 35%;">
                  <h5 style="font-size: 18px;">Amount</h5>
                 <?php
                    $query=mysqli_query($db,"SELECT amount FROM payment WHERE client_id='".$_SESSION['plan']['client_id']."'")or die(mysqli_error());
                      while($row=mysqli_fetch_array($query)){
                ?>  
                   <h5 style="padding: 10px; font-size: 15px; color: #fff">&#8369;<?php echo number_format($row['amount'], 2, '.', ','); ?></h5>
                <?php }?>
                 </div>
              </div>  
              <input id="emptyPayment" style="border: none; text-align: center; background: #fff; color: #e74c3c; font-size: 18px; width: 400px; margin-top: 20px">
             </center>
      
          </a>
        <?php }
        ?>      
        </div>
    </div>
  </div> 


          </form>
        </div>
      </div>

<div class="panels-container">
  <div class="panel left-panel">
    <div class="content">
      <h1 style="font-size: 40px">
    <?php
        $query=mysqli_query($db,"SELECT * FROM clients WHERE client_id='".$_SESSION['plan']['client_id']."'")or die(mysqli_error());
        while($row=mysqli_fetch_array($query)){
    ?>

        <?php echo $row['plan_type']; ?>

    <?php } ?>
      </h1>          
        <p style="visibility: hidden;">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis</p>
        <a href="clientProfile1.php" class="circularlinks"><img src="../images/profile.png" style="margin-left: 125px" class="image" alt="" /><h3 style="margin-left: 50px">Profile</h3></a>
        <br>
        <a href="clientBeneficiaries1.php" class="circularlinks"> <img src="../images/beneficiary.jpg" style="margin-left: 200px"  class="image" alt="" /><h3 style="margin-left: 50px">Beneficiaries</h3></a>
        <br>
        <a href="clientReferences1.php" class="circularlinks"> <img src="../images/reference.jpg" style="margin-left: 180px" class="image" alt="" /><h3 style="margin-left: 50px">References</h3></a>
        <br>
        <a href="clientRequest1.php" class="circularlinks request" onclick="request()" id="request"> <img src="../images/payment.png" style="margin-left: 145px" class="image" alt="" /><h3 style="margin-left: 50px">Request</h3></a>
        <br>
        <a href="plan.php?logout='1'" class="circularlinks" onClick="return confirm('Are you sure you want to logout?' )"> <img src="../images/logout.png" style="margin-left: 132px"  class="image" alt="" /><h3 style="margin-left: 51px">Logout</h3></a>
        <br>
        <br>

      <!--  RECCOMENDATION -->
    <?php
        $query=mysqli_query($db,"SELECT * FROM clients WHERE client_id='".$_SESSION['plan']['client_id']."'")or die(mysqli_error());
        while($row=mysqli_fetch_array($query)){
    ?>


     <?php if ($row['update_status']=='empty') {?>

       <br><br>
       <br><br>
       <br><br>

     <?php }else{ ?>

        <button class="btn transparent" id="sign-up-btn" style="margin-bottom: 100px">Pay</button>

    <?php } ?>


  <?php } ?>
<!--  RECCOMENDATION -->           
    </div>
  </div>

<div class="panel right-panel">
  <div class="content">

 <!-- h1 class="Plan-type"><?php echo $_SESSION['plan']['plan_type'];?></h1> 
 <h1 class="Payment-mode"><?php echo $_SESSION['plan']['payment_mode'];?></h1> -->
 <h1 class="contractTitle">Contract Price</h1> 

 <h1 class="pesoSign2">&#8369;</h1> 

 <!-- <h1 class="statusTitle">Status</h1>  -->

 <p style="visibility: hidden;">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis</p>

    <!--   <h1 style="position: absolute;"><?php echo $row1["total"] ?></h1>-->

  <form method="post" action="plan.php">

   <input id="plan_type" value="<?php echo $_SESSION['plan']['plan_type'];?>"  name="plan_type" type="text" hidden>
   <input id="payment_mode" value="<?php echo $_SESSION['plan']['payment_mode'];?>" name="payment_mode" type="text" hidden>

   <input class="contractPrice" type="text" id="contractPrice" disabled="" hidden="true">

   <input class="commaoncontract" type="text" id="commaoncontract" disabled="">

   <input class="payment" type="text" value="<?php echo $row1["total"] ?>" id="payment" hidden>

   <?php  
    $total=$row1["total"];                                
     if (empty($total)){
    ?>
      <div style="position: absolute; bottom: 90px;">
       <h4><?php echo $_SESSION['plan']['plan_type']; ?> (<?php echo $_SESSION['plan']['payment_mode']; ?>)</h4></h4>
       <h1 class="title" style="color: #3498db;">Perpetual<a style="color: #2ecc71;">Protection</a></h1>
      </div>
    <?php
      }else{
    ?>

  <h1 class="pesosymbol">&#8369;</h1> 
  <h1 class="balanceTitle">Balance</h1> 

   <input class="balance" type="text" id="balance" disabled>

  <input class="status" type="text" id="finish" value="Payment Finished" disabled="">
  <?php
    $query=mysqli_query($db,"SELECT * FROM payment WHERE client_id='".$_SESSION['plan']['client_id']."' order by `payment_id` DESC LIMIT 1")or die(mysqli_error());
    while($row=mysqli_fetch_array($query)){
      ?>
      <input class="dateFinished" type="text" id="finish2" value="<?php echo date('F j, Y / g:i a',strtotime($row['date']))?>" disabled="">
  <?php }?>

     <?php }?>

    <a  style="margin-top: 10px" href="sendMessage.php" id="finishBtn">SEND MESSAGE</a>

   <input type="submit" class="btn btn-info transparent" id="payment_btn" name="payment_btn" value="Pay">

  </form>

        <button class="btn transparent" id="sign-in-btn" style="width: 40px; height: 40px; border: none;"><img src="../images/back_Arrow.png" width="30px"></button>
      </div>
      </div>
  </div>
</div>

    <script src="../asset/js/app.js"></script>
    <script src="../asset/js/payment4.js"></script>
    <script src="../asset/js/balance4.js"></script>
    <script src="../asset/js/paycontractPriceEqual10.js"></script>
    <script src="../asset/js/emptyPayment.js"></script>

    <script src="../asset/js/contractprice.js"></script>

  </body>
</html>
