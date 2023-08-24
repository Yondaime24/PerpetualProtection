<?php 
  include('../functions/functions.php');

  $client_id = $_GET['client_id'];

   if (isset($_POST['deactivate_btn'])) {
            // call these variables with the global keyword to make them available in function
  

      $query ="UPDATE `clients` SET `plan_type` = 'deactivated', `status` = 'deactivated' WHERE `client_id` = $client_id;";
        mysqli_query($db, $query);

        echo "<script>alert('Account Has Been Deactivated')</script>";
        echo "<script>window.open('adminClients.php','_self')</script>";
        
    }


    if (isset($_POST['sendMessage_btn'])) {
            // call these variables with the global keyword to make them available in function
    $client_id = $_POST['client_id'];
    $message = $_POST['message'];


    $query = "INSERT INTO admin_message (`client_id`, `requestReason`, `datetime`, `message`, `type`, `status`)VALUES('$client_id', 'N/A', CURRENT_TIMESTAMP, '$message', 'Message', 'unread')";
        mysqli_query($db, $query);

        echo "<script>alert('Message has been sent')</script>";
        echo "<script>window.open('adminViewClients.php?client_id=$client_id','_self')</script>";
        
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

    <title>Perpetual Protection | Admin View Clients</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../images/logo.png">
    <link rel="icon" type="image/png" href="../images/logo.png">

    <!-- Bootstrap core CSS-->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/scroll.css">
    <link rel="stylesheet" type="text/css" href="assets/css/input4.css">
    <link rel="stylesheet" type="text/css" href="assets/css/paymentInput4.css">
    <link rel="stylesheet" type="text/css" href="assets/css/textarea.css">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="adminPanel.php">Perpetual Protection</a>
      

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" style="visibility: hidden;">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Navbar -->
     
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php

                $query = "SELECT * from `clients_request` where `request_status` = 'ungranted' order by `date` DESC";
                if(count(fetchAll($query))>0){
            ?>
            <span class="badge badge-danger" style="font-size: 10px"><?php echo count(fetchAll($query)); ?></span>

            <?php
                }
            ?>
          </a>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i>Client Request</i>
            <?php

                $query = "SELECT * from `client_message` where `status` = 'unread' order by `datetime` DESC";
                if(count(fetchAll($query))>0){
            ?>
            <span class="badge badge-danger" style="font-size: 10px"><?php echo count(fetchAll($query)); ?></span>

            <?php
                }
            ?>
          </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
             <div class="scroll">
            <?php 
               $query = "SELECT * from `clients_request` WHERE `request_status`='ungranted' order by `date` DESC";
               if(count(fetchAll($query))>0){
                  foreach(fetchAll($query) as $i){
            ?>

      <?php
        $request_status = $i['request_status'];

        if ($request_status=="granted"){
          ?>
             <a class="dropdown-item" href="clientRequest.php?request_id=<?php echo $i['request_id'] ?>">

              <small><i><?php echo date('F j, Y / g:i a',strtotime($i['date'])) ?></i></small><br/>
              <small style="background: #2ecc71; color: white;"><i>Granted</i></small><br/>

              <?php
                echo "From: ";
                echo ucfirst($i['fullName']); 
              ?>
              <br>
              <?php    
                echo ucfirst($i['requestReason']);
              ?>

              </a>
          <?php
            }else{
          ?>
          <a style="font-weight:bold;" class="dropdown-item" href="clientRequest.php?request_id=<?php echo $i['request_id'] ?>">

              <small><i><?php echo date('F j, Y / g:i a',strtotime($i['date'])) ?></i></small><br/>
              <small style="background: red; color: white;"><i>New Request</i></small><br/>

              <?php
                echo "From: ";
                echo ucfirst($i['fullName']); 
              ?>
              <br>
              <?php    
                echo ucfirst($i['requestReason']);
              ?>

              </a>
         <?php }
          ?>
              <div class="dropdown-divider"></div>
              <?php 
                  }
                }else{
                  echo "No Request Yet";
                }

              ?>
          </div>
          </div>
        </li>
         <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <?php

                $query = "SELECT * from `clients` where `notif_status` = 'unread' order by `date_registered` DESC";
                if(count(fetchAll($query))>0){
            ?>
            <span class="badge badge-danger" style="font-size: 10px"><?php echo count(fetchAll($query)); ?></span>

            <?php
                }
            ?>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <div class="scroll">
            <?php 
               $query = "SELECT * from `client_message` order by `datetime` DESC";
               if(count(fetchAll($query))>0){
                  foreach(fetchAll($query) as $i){
            ?>


              <a style="<?php if($i['status']=='unread'){echo "font-weight:bold;";}?>"  class="dropdown-item" href="clientMessage.php?message_id=<?php echo $i['message_id'] ?>">

              <small><i><?php echo date('F j, Y / g:i a',strtotime($i['datetime'])) ?></i></small><br/>

              <?php
               echo "From: ";
                echo ucfirst($i['full_name']); 
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
        </li>
         <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <div class="scroll">
            <?php 
              $query = "SELECT * from `clients` WHERE status='active' &&  user_type='client' order by `date_registered` DESC";
               if(count(fetchAll($query))>0){
                  foreach(fetchAll($query) as $i){
            ?>
            <?php 

              if($i['plan_type']=='admin'){
            ?>
              <a style="display: none;"  class="dropdown-item" href="clientNotif.php?client_id=<?php echo $i['client_id'] ?>">
              <small><i><?php echo date('F j, Y / g:i a',strtotime($i['date_registered'])) ?></i></small><br/>
            <?php
              }else{
            ?>
               <a style="<?php if($i['notif_status']=='unread'){echo "font-weight:bold;";}?>"  class="dropdown-item" href="newClientNotif.php?client_id=<?php echo $i['client_id'] ?>">
              <small><i><?php echo date('F j, Y / g:i a',strtotime($i['date_registered'])) ?></i></small><br/>
              <?php
               echo "A new client has been registered! Check to see references";
              ?>
              <br>
              </a>
              <div class="dropdown-divider"></div>
            <?php }
            ?>
            
              <?php 
                  }
                }else{
                  echo "No Clients Yet";
                }

              ?>
          </div>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="adminProfile.php"> <i class="fas fa-user"></i> My Profile</a>
            <a class="dropdown-item" href="changeEmail.php"> <i class="fas fa-envelope"></i> Change Email Address</a>
            <a class="dropdown-item" href="changeUsername&Pass.php"> <i class="fas fa-edit"></i> Change Username & Password</a>
            <a class="dropdown-item" href="addAdmin.php"> <i class="fas fa-plus"></i> Add New Admin</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"> <i class="fas fa-sign-out-alt"></i> Logout</a>
          </div>
        </li>
      </ul>
    </nav>

    <div id="wrapper">
       <!-- Sidebar -->
      <ul class="sidebar navbar-nav">

        <li class="nav-item">
          <a class="nav-link" href="z1.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>

        <div class="dropdown-divider"></div>

        <li class="nav-item dropdown active">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-user"></i>
            <span>Clients</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="adminClients.php"><i class="fas fa-fw fa-user"></i> All Clients</a>
            <div class="dropdown-divider"></div>
             <a class="dropdown-item" href="adminAddClient.php"><i class="fas fa-fw fa-plus"></i> Add Client</a>
          </div>
        </li>

      <div class="dropdown-divider"></div>

        <li class="nav-item">
          <a class="nav-link" href="adminAllPayments.php">
            <i class="fas fa-fw fa-money-bill-wave"></i>
            <span>All Payments</span>
          </a>
        </li>

<!--          <li class="nav-item">
          <a class="nav-link" href="duePayment.php">
            <i class="fas fa-fw fa-exclamation-circle"></i>
            <span>Due Payments</span>
          </a>
        </li> -->

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-exclamation-circle"></i>
            <span>Due Payments</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="oneMonthDue.php"><i class="fas fa-fw fa-calendar-alt"></i>1 Month Due</a>
            <div class="dropdown-divider"></div>
             <a class="dropdown-item" href="twoMonthDue.php"><i class="fas fa-fw fa-calendar-alt"></i> 2 Month Due</a>
          </div>
        </li>

         <li class="nav-item">
          <a class="nav-link" href="finishedPayments.php">
            <i class="fas fa-fw fa-handshake"></i>
            <span>Finished Payments</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="adminAddPayment.php">
            <i class="fas fa-fw fa-plus"></i>
            <span>Add Payment</span>
          </a>
        </li>

         <div class="dropdown-divider"></div>

        <li class="nav-item">
          <a class="nav-link" href="grantedRequest.php">
            <i class="fas fa-fw fa-check"></i>
            <span>Granted Request</span></a>
        </li>

         <div class="dropdown-divider"></div>

        <li class="nav-item">
          <a class="nav-link" href="adminDeactivatedClient.php">
            <i class="fas fa-fw fa-exclamation"></i>
            <span>Deactivated Clients</span></a>
        </li>

      </ul>

    <div id="content-wrapper">
      <div class="container-fluid">
         <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header text-center">
             <b> <i class="fas fa-user"></i>
             Client Profile</b>
             <br>
          <?php
                $query=mysqli_query($db,"SELECT * FROM clients WHERE client_id='$client_id'")or die(mysqli_error());
                while($row=mysqli_fetch_array($query)){
            ?>
          <?php
            $plan_type=$row['plan_type'];
            $payment_status=$row['payment_status'];                              
              if ($plan_type=="deactivated"){
          ?>
            <a href="adminDeactivatedClient.php" class="btn btn-outline-primary btn-sm">Deactivated Clients</a>
          <?php
            }else if ($payment_status=="finished") {
          ?>
            <a href="finishedPayments.php" class="btn btn-outline-primary btn-sm">Return</a>
          <?php
            }else{
          ?>
           <a href="adminClients.php" class="btn btn-outline-primary btn-sm">Clients</a>
         <?php }
          ?>
           <?php }?> 
           </div>
              <div class="card-body">
                <div class="table-responsive">
            
          <div class="card-header">

      <?php
            $query=mysqli_query($db,"SELECT * FROM clients WHERE client_id='$client_id'")or die(mysqli_error());
            while($row=mysqli_fetch_array($query)){
        ?>
          <form action="adminViewClients.php?client_id=<?php echo $row['client_id'] ?>" method="post" enctype="multipart/form-data">
        <?php }?>

            <div class="form-group" hidden="">
              <div class="form-label-group">
                <?php
                        $query=mysqli_query($db,"SELECT * FROM clients WHERE client_id='$client_id'")or die(mysqli_error());
                          while($row=mysqli_fetch_array($query)){
                ?>
                      <input type="text" name="client_id" class="form-control" value="<?php echo $row['client_id'];?>" readonly>
                <?php }?>
                <label for="inputEmail">Residential address</label>
              </div>
            </div>


            <div class="form-group">
              <div class="form-row">
                <div class="col-md-3">
                  <div class="form-label-group">
                    
                <?php
                  $query=mysqli_query($db,"SELECT * FROM clients WHERE client_id='$client_id'")or die(mysqli_error());
                    while($row=mysqli_fetch_array($query)){
                ?>
                  <?php if($row['photo'] != ""): ?>

                  <img width="200" style="border-radius: 100px; margin-left: 50px" src="../images/<?php echo $row['photo']; ?>" alt="First slide">

                  <?php else: ?>

                  <img width="200" style="border-radius: 100px; margin-left: 50px" src="../images/profile.png">
                  <?php endif; ?>
               

                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-label-group">
                  
                    <?php
                    $plan_type=$row['plan_type'];                              
                    if ($plan_type=="deactivated"){
                      ?>
                      <input style="background: red" type="text" id="plan_type" value="<?php echo $row['plan_type'];?>" readonly>
                    <?php
                      }else{
                    ?>
                    <input type="text" id="plan_type" value="<?php echo $row['plan_type'];?>" readonly>
                    </ul>
                      <?php }
                    ?>

                    <label id="label"><b>Plan Type:</b></label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-label-group">
                      <input type="text" id="payment_mode" value="<?php echo $row['payment_mode'];?>" readonly>
                    <label id="label2"><b>Payment Mode:</b></label>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-5">
                  <div class="form-label-group">
                       <input type="text" id="fullname" class="form-control" value="<?php echo $row['fname'];?> <?php echo $row['mname'];?> <?php echo $row['lname'];?>" readonly>
                    <label id="label3"><b>Full Name:</b></label>
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="form-label-group">
                      <input type="text" id="age" class="form-control" value="<?php echo $row['age'];?>" readonly>
                    <label id="label4"><b>Age:</b></label>
                  </div>
                </div>
                  <div class="col-md-6">
                  <div class="form-label-group">
                      <input type="text" class="form-control" id="birthday" value="<?php echo date('F j, Y',strtotime($row['birthday']))?>" readonly>
                    <label id="label5"><b>Birthday:</b></label>
                  </div>
                </div>
              </div>
            </div>

             <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                       <input type="text" id="place_of_birth" class="form-control" value="<?php echo $row['place_of_birth'];?>" readonly>
                    <label id="label6"><b>Place of Birth:</b></label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-label-group">
                      <input type="text" id="gender" class="form-control" value="<?php echo $row['gender'];?>" readonly>
                    <label id="label7"><b>Gender:</b></label>
                  </div>
                </div>
                 <div class="col-md-2">
                  <div class="form-label-group">
                      <input type="text" id="height" class="form-control" value="<?php echo $row['height'];?>cm" readonly>
                    <label id="label8"><b>Height:</b></label>
                  </div>
                </div>
                 <div class="col-md-2">
                  <div class="form-label-group">
                      <input type="text" id="weight" class="form-control" value="<?php echo $row['weight'];?>lb" readonly>
                    <label id="label9"><b>Weight:</b></label>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-4">
                  <div class="form-label-group">
                       <input type="text" id="fullname" class="form-control" value="<?php echo $row['occupation'];?>" readonly>
                    <label id="label3"><b>Occupation:</b></label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-label-group">
                      <input type="text" id="age" class="form-control" value="<?php echo $row['civil_status'];?>" readonly>
                    <label id="label4"><b>Civil Status:</b></label>
                  </div>
                </div>
                  <div class="col-md-4">
                  <div class="form-label-group">
                      <input type="text" class="form-control" id="birthday" value="<?php echo $row['contact_number'];?>" readonly>
                    <label id="label5"><b>Contact Number:</b></label>
                  </div>
                </div>
              </div>
            </div>

             <div class="form-group">
              <div class="form-row">
                <div class="col-md-4">
                  <div class="form-label-group">
                       <input type="text" id="fullname" class="form-control" value="<?php echo $row['email_address'];?>" readonly>
                    <label id="label3"><b>Email Address:</b></label>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-label-group">
                      <input type="text" id="age" class="form-control" value="<?php echo $row['residential_address'];?>" readonly>
                    <label id="label4"><b>Residential Address:</b></label>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-5">
                  <div class="form-label-group">
                       <input type="text" id="fullname" class="form-control" value="<?php echo $row['username'];?>" readonly>
                    <label id="label3"><b>Username:</b></label>
                  </div>
                </div>
                <div class="col-md-7">
                  <div class="form-label-group">
                      <input type="text" id="age" class="form-control" value="<?php echo date('F j, Y / g:i a',strtotime($row['date_registered']))?>" readonly>
                    <label id="label4"><b>Date Registered:</b></label>
                  </div>
                </div>
              </div>
            </div>
          
          <?php }?>
            <?php
                $query=mysqli_query($db,"SELECT * FROM payment WHERE client_id='$client_id' order by `payment_id` ASC LIMIT 1")or die(mysqli_error());
                while($row=mysqli_fetch_array($query)){
            ?>
             <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                       <input type="text" id="age" class="form-control" value="<?php echo date('F j, Y / g:i a',strtotime($row['date']))?>" readonly>
                    <label id="label3"><b>First Payment:</b></label>
                  </div>
                </div>
            <?php }?>

            <?php
                $query=mysqli_query($db,"SELECT * FROM payment WHERE client_id='$client_id' order by `payment_id` DESC LIMIT 1")or die(mysqli_error());
                while($row=mysqli_fetch_array($query)){
            ?>
                <div class="col-md-6">
                  <div class="form-label-group">
                      <input type="text" id="age" class="form-control" value="<?php echo date('F j, Y / g:i a',strtotime($row['date']))?>" readonly>
                    <label id="label4"><b>LaRecent Payment:</b></label>
                  </div>
                </div>
              </div>
            </div>
            <?php }?>

             </div>
            </div>
          </div>
          <div class="card-footer text-center"> 
          <form action="adminViewClients.php">
          <?php
                $query=mysqli_query($db,"SELECT * FROM clients WHERE client_id='$client_id'")or die(mysqli_error());
                while($row=mysqli_fetch_array($query)){
            ?>
          <?php
            $plan_type=$row['plan_type'];                              
              if ($plan_type=="deactivated"){
          ?>
            <a href="adminClientActivation.php?client_id=<?php echo $row['client_id'] ?>" class="btn btn-outline-success">Activate Account</a>
          <?php
            }else{
          ?>
            <a class="btn btn-outline-info" href="#" data-toggle="modal" data-target="#messageModal">Message</a>
            <a class="btn btn-outline-success" href="adminClientBeneficiaries.php?client_id=<?php echo $client_id ?>">Beneficiaries</a>
            <a class="btn btn-outline-secondary" href="adminClientReferences.php?client_id=<?php echo $client_id ?>">References</a>
            <input class="btn btn-outline-danger" onClick="return confirm('Are you sure you want to deactivate this account?' )" type="submit" value="Deactivate" name="deactivate_btn">
         <?php }
          ?>
           <?php }?>
           </form>
          </div>
          </div>
     
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
                 <a style="pointer-events: none;"><img src="../images/logo.png" width="50px"></a>
             <p style="color: #000">&copy; <script>document.write(new Date().getFullYear())</script> Perpetual Protection, Insurance Agency Payment Website
             </p>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

     <!-- Message Modal-->
    <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Send Message</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
        <div class="modal-content">

    <div class="container">
      <div class="card mx-auto">

      <?php
        $query=mysqli_query($db,"SELECT * FROM clients WHERE client_id='$client_id'")or die(mysqli_error());
        while($row=mysqli_fetch_array($query)){
      ?>
        <div class="card-header text-center"><span>To<br></span><b><?php echo $row['fname'] ?> <?php echo $row['mname'] ?> <?php echo $row['lname'] ?></b></div>

        <div class="card-body">

        <form action="adminViewClients.php?client_id=<?php echo $row['client_id'] ?>" method="post" enctype="multipart/form-data">

            <div class="form-group" hidden>
              <div class="form-label-group">
                  <input type="text" name="client_id" class="form-control" value="<?php echo $row['client_id'] ?>" readonly>
                <label for="inputEmail">Client ID</label>
              </div>
            </div>

            <div class="form-group">
              <div class="form-label-group">
                <textarea style="text-align: justify;" type="text" name="message" placeholder="Type Message Here..." class="form-control" required="required"></textarea> 
              </div>
            </div>
        </div>
      </div>
    </div>
      </div>
        <div class="modal-footer">
          <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
          <input class="btn btn-primary btn-sm" type="submit" value="Send" name="sendMessage_btn">
        </div>
      </form>
   <?php }?>
    </div>
  </div>
</div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="adminPanel.php?logout='1'">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="assets/vendor/chart.js/Chart.min.js"></script>
    <script src="assets/vendor/datatables/jquery.dataTables.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="assets/js/demo/datatables-demo.js"></script>
    <script src="assets/js/demo/chart-area-demo.js"></script>

  </body>

</html>
