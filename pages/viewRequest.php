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
     <title>Perpetual Protection | View Request</title>
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




    <a href="#" id="a1" class="timeline-content">

        <?php
                                     
                  $query = "SELECT * FROM clients_request WHERE client_id='".$_SESSION['plan']['client_id']."'";
                  $result = mysqli_query($db,$query);
                
                ?> 
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Request</th>
                      <th>Requested On</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Option</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Request</th>
                      <th>Requested On</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Option</th>
                    </tr>
                  </tfoot>
                  <tbody>
                     <?php
                    if($result){
                      while($res = mysqli_fetch_array($result)) {     
                        echo "<tr>";
                          echo "<td>".$res['requestReason']."</td>";
                          echo "<td>".date('F j, Y',strtotime($res['date']))."</td>";

                          if ($res['request_status']=='ungranted') {
                              echo "<td>"."<span style=\"background: white\">Pending</span>"."</td>";
                              echo "<td>"."<span style=\"background: white\">Pending</span>"."</td>";
                          }else if ($res['request_status']=='granted') {
                              echo "<td><span style=\"background: white; color: #2ecc71;\">Granted On: ".date('F j, Y',strtotime($res['date_granted']))."</span></td>";
                              echo "<td style=\"color: white;\">"."<span style=\"background: white; color: #2ecc71;\">Granted</span>"."</td>";
                          }else{
                              echo "<td><span style=\"background: white; color: red;\">Rejected On: ".date('F j, Y',strtotime($res['date_granted']))."</span></td>";
                              echo "<td style=\"color: white;\">"."<span style=\"background: white; color: red;\">Rejected</span>"."</td>";
                          }


                          if ($res['request_status']=='ungranted') {
                               echo "
                                <td>
                                <center>
                                    <a href=\"sendMessage.php\" style=\"pointer-events: auto; font-size: 12px; color: white; background: blue;\">Message</a>
                                    </center>
                                </td>
                                ";
                          }else if ($res['request_status']=='granted') {
                              echo "
                                <td>
                                <center>
                                    <a href=\"sendMessage.php\" style=\"pointer-events: auto; font-size: 12px; color: white; background: blue;\">Message</a>
                                    </center>
                                </td>
                                ";
                          }else{
                              echo "
                                <td>
                                <center>
                                    <a href=\"sendMessage.php\" style=\"pointer-events: auto; font-size: 12px; color: white; background: blue;\">Message</a>
                                    <a href=\"deleteRequest.php?request_id=$res[request_id]\" onclick=\"return confirm('Are you sure you want to delete this request?')\" style=\"pointer-events: auto; font-size: 12px; color: white; background: red; margin-top: 5px;\">Delete</a>
                                    </center>
                                </td>
                                ";
                          }

                         echo "</tr>";                                   
                      }
                    }?> 
                  </tbody>
                </table>
                
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
        <a href="viewRequest.php" class="circularlinks"> <i class="image fas fa-eye" style="font-size: 50px; margin-left: 145px"></i><h3 style="margin-left: 51px">View Request</h3></a> 
        <br>
        <br>
        <a href="clientRequest1.php"><button class="btn transparent" style="margin-bottom: 100px">Return</button></a>
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
