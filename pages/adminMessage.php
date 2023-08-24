<?php 
  include('../functions/functions.php');

  $admin_id = $_GET['admin_id'];
  $request_id = $_GET['request_id'];

  $query ="UPDATE `admin_message` SET `status` = 'read' WHERE `admin_id` = $admin_id;";
    performQuery($query);

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
      <title>Perpetual Protection | Admin Message</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous">
    </script>

    <link rel="stylesheet" type="text/css" href="../asset/css/all.css">
    <link rel="stylesheet" type="text/css" href="../asset/customizedCss/style4.css">
    <link rel="stylesheet" type="text/css" href="../asset/customizedCss/circularlinks.css">
    <link rel="stylesheet" type="text/css" href="../asset/customizedCss/weblogo.css">
    <link rel="stylesheet" type="text/css" href="../asset/customizedCss/table.css">
    <link rel="stylesheet" type="text/css" href="../asset/customizedCss/a3.css">
    <link rel="stylesheet" type="text/css" href="../asset/customizedCss/timelineDesign.css">

  </head>
  <body>

<div class="container" style="background: url(../images/log.svg);">
  <div class="forms-container">
    <div class="signin-signup">
      <form action="#" class="sign-in-form">

<div class="scroll">
  <div class="main-timeline2">
      <div class="timeline">
        <a class="icon fa fa-envelope" href="sendMessage.php"></a>
         <?php
            $query=mysqli_query($db,"SELECT * FROM admin_message WHERE admin_id='$admin_id'")or die(mysqli_error());
            while($row=mysqli_fetch_array($query)){
            ?>
        <a href="#" id="a1" class="timeline-content" style="color: #000;">
            <center><h4 style="font-size: 25px;">From: Admin</h4>
            <!--   <h3 style="color: #fff"><?php echo $row['type'];?></h3> -->

        <?php
            $query2=mysqli_query($db,"SELECT * FROM clients_request WHERE request_id='$request_id'")or die(mysqli_error());
            while($row2=mysqli_fetch_array($query2)){
          ?>

          <?php if ($row2['request_status']=='ungranted') { ?>

                <span style="background: white">Status: Pending</span>
            
          <?php }else if ($row2['request_status']=='granted') { ?>

                <span style="background: white; color: #2ecc71">Status: Granted</span>

          <?php }else { ?>

                <span style="background: white; color: red">Status: Rejected</span>
                
          <?php } ?>

        <?php } ?>



            </center>

        </a>
        <?php
          $requestReason=$row['requestReason'];                              
        if ($requestReason=="N/A"){
          ?>
        <a style="display: none;" href="#" id="a1" class="timeline-content"><h1 style="font-size: 18px; color: #000;">Reason for Request:</h1>
            <br/>
        <center>
            <h3><?php echo $row['requestReason'];?></h3>
        </center>
            <br/> 
        </a>
          <?php
        }else{
        ?>

        <a href="#" id="a1" class="timeline-content" style="background: #3498db;"><h1 style="font-size: 18px; color: #000;">Reason for Request:</h1>
            <br/>
        <center>
            <h3><?php echo $row['requestReason'];?></h3>
        </center>
            <br/> 
        </a>

          </ul>
        <?php }
        ?>

        <?php
          $type=$row['type'];
        if ($type=="Message" || $type=="New User Message"){
          ?>
        
        <a href="#" id="a1" class="timeline-content" style="background: #3498db;"><h1 style="font-size: 18px; color: #000;">Message:</h1>
            <br/>
        <center>
            <h3><?php echo $row['message'];?></h3>
        </center>
         <br/> 
        </a>

          <?php
        }else{
        ?>

        <a href="#" id="a1" class="timeline-content"><h1 style="font-size: 18px; color: #000;">Message:</h1>
            <br/>
        <center>
            <h3><?php echo $row['message'];?></h3>
        </center>
         <br/> 
        </a>
            
          </ul>
        <?php }
        ?>



        <?php }?>

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
        <br/>
        <br/>
        <a style="color: black; display: flex;"> <i style="margin-left: 50px" class="fas fa-envelope fa-2x"></i><h3 style="margin-left: 50px; pointer-events: none;">Message</h3></a>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <a href="plan.php"><button class="btn transparent" style="margin-bottom: 100px">Return</button></a>
    </div>
  </div>

    <div class="panel right-panel">
      <div class="content">
      </div>
    </div>
  </body>
</html>
