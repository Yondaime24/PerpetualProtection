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

     <link rel="apple-touch-icon" sizes="76x76" href="../images/insurance_icon.png">
     <link rel="icon" type="image/png" href="../images/logo.png">
     <title>Perpetual Protection | Request</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous">
    </script>

    <link rel="stylesheet" type="text/css" href="../asset/customizedCss/style4.css">
    <link rel="stylesheet" type="text/css" href="../asset/customizedCss/circularlinks.css">
    <link rel="stylesheet" type="text/css" href="../asset/customizedCss/weblogo.css">
    <link rel="stylesheet" type="text/css" href="../asset/customizedCss/table.css">
    <link rel="stylesheet" type="text/css" href="../asset/customizedCss/a3.css">
    <link rel="stylesheet" type="text/css" href="../asset/customizedCss/timelineDesign.css">
     <link rel="stylesheet" type="text/css" href="../asset/customizedCss/requestInput.css">
    <link rel="stylesheet" type="text/css" href="../asset/css/all.css">

  </head>
  <body>

<div class="container" style="background: url(../images/log.svg);">
  <div class="forms-container">
    <div class="signin-signup">
      <form action="#" class="sign-in-form">
<div class="scroll">
  <div class="main-timeline2">
      <div class="timeline">
          <a href="clientAddRequest.php" class="icon" onclick="return confirm('Are you sure you want submit request?')"><img src="../images/lumpsom.png" class="image" alt="" style="width: 40px" /></a>


    <?php  
    $total=$row1["total"];                                
     if (empty($total)){
    ?>

     <a href="#" id="a1" class="timeline-content" style="background: #3498db; color: #000">
                 <center><h4 style="font-size: 25px;">No Added Request Yet</h4></center>
          </a>
            <a href="#" id="a1" class="timeline-content">Plan Type:
              <center>
                <input id="plan_type" value="<?php echo $_SESSION['plan']['plan_type'];?>"  name="plan_type" type="text">
              </center>
            </a>
            <a href="#" id="a1" class="timeline-content" style="background: #3498db;">Payment Mode:
              <center>
                 <input id="payment_mode" value="<?php echo $_SESSION['plan']['payment_mode'];?>" name="payment_mode" type="text">
              </center>
            </a>
            <a href="#" id="a1" class="timeline-content">Contract Price:
              <center>
                  <input class="contractPrice" type="text" id="contractPrice">
                   <span id="pContract">&#8369;</span>
              </center>
            </a>
           
    <?php
      }else{
    ?>

    

          <a href="viewRequest.php" id="a1" class="timeline-content view" style="background: #3498db; color: #000; pointer-events: auto;">
                 <center><h2><i class="image fas fa-eye" style="font-size: 30px;"></i> View Request</h2></center>
          </a>


            <a href="#" id="a1" class="timeline-content">Plan Type:
              <center>
                <input id="plan_type" value="<?php echo $_SESSION['plan']['plan_type'];?>"  name="plan_type" type="text">
              </center>
            </a>
            <a href="#" id="a1" class="timeline-content" style="background: #3498db;">Payment Mode:
              <center>
                 <input id="payment_mode" value="<?php echo $_SESSION['plan']['payment_mode'];?>" name="payment_mode" type="text">
              </center>
            </a>

            <a href="#" id="a1" class="timeline-content">Contract Price:
              <center>
                  <input class="contractPrice" type="text" id="contractPrice">
                   <span id="pContract">&#8369;</span>
              </center>
            </a>
            <a href="#" id="a1" class="timeline-content" style="background: #3498db;">Total Payment:
              <center>
                 <span id="total">&#8369;<?php echo $row1["total"] ?></span>
              </center>
            </a>

            <a href="#" id="a1" class="timeline-content">Balance:
              <center>
               <input class="payment" type="text" value="<?php echo $row1["total"] ?>" id="payment" hidden>
             
               <input class="balance" type="text" id="balance">
                <span id="pBalance">&#8369;</span>
              </center>
            </a>

            <a href="#" id="a1" class="timeline-content" style="background: #3498db;">Recent Payment:
              <center>

            <?php
                $query=mysqli_query($db,"SELECT * from `payment` WHERE `client_id`='".$_SESSION['plan']['client_id']."' order by `payment_id` DESC LIMIT 1")or die(mysqli_error());
                  while($row=mysqli_fetch_array($query)){
            ?>
               <span id="total"><?php echo date('F j, Y / g:i a',strtotime($row['date']))?></span>
            <?php }?>
              </center>
            </a>

             <?php }?>

            </a>

      </div>
  </div>
</div>
      </form>


          <form action="#" class="sign-up-form">
      
          </form>
        </div>
      </div>

<div class="panels-container">
  <div class="panel left-panel">
    <div class="slide2">
      <h1 style="font-size: 40px; color: #fff">
        <?php echo $_SESSION['plan']['plan_type']; ?>
      </h1>          
        <p style="visibility: hidden;">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis</p>
    <!--     <a href="clientProfile1.php" class="circularlinks"><img src="../images/profile.png" style="margin-left: 125px" class="image" alt="" /><h3 style="margin-left: 50px">Profile</h3></a>
        <br> -->
  <!--        <a href="clientBeneficiaries1.php" class="circularlinks"> <img src="../images/list.png" style="margin-left: 200px"  class="image" alt="" /><h3 style="margin-left: 50px;">Beneficiaries</h3></a>
        <br> -->
        <a href="clientRequest1.php" class="circularlinks"> <img src="../images/payment.png" style="margin-left: 145px" class="image" alt="" /><h3 style="margin-left: 50px">Request</h3></a>
        <br>
        <!-- <a href="viewRequest.php" class="circularlinks"> <img src="../images/logout.png" style="margin-left: 132px"  class="image" alt="" /> <i class="image fas fa-eye" style="font-size: 50px; margin-left: 145px"></i><h3 style="margin-left: 51px">View Request</h3></a>  -->
        <br>
        <br>
        <a href="plan.php"><button class="btn transparent" style="margin-bottom: 100px">Return</button></a>
    </div>
  </div>

    <div class="panel right-panel">
      <div class="content">
      </div>
    </div>

    <script src="../asset/js/app.js"></script>
    <script src="../asset/js/payment4.js"></script>
    <script src="../asset/js/balance2.js"></script>
    <script src="../asset/js/paycontractPriceEqual9.js"></script>

  </body>
</html>
