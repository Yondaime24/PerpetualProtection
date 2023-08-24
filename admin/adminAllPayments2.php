<?php 
  include('../functions/functions.php');

  $sql1 = "SELECT sum(amount) AS total FROM payment";
  $stmt1 = $db->query($sql1);
  $row1 = $stmt1->fetch_assoc();

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

    <title>Perpetual Protection | Admin Payments</title>
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
     <link rel="stylesheet" type="text/css" href="assets/css/leftscroll3.css">

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

        <li class="nav-item dropdown">
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

        <li class="nav-item active">
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
            <a class="dropdown-item" href="duePayment.php"><i class="fas fa-fw fa-calendar-alt"></i> All Due Payments</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="oneMonthDue.php"><i class="fas fa-fw fa-calendar-alt"></i> 1 Month Due</a>
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

           <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-money-bill-wave"></i>
               All Payments
               <span style="margin-left: 580px;">Payment Legend:
                 <span class="badge" style="font-size: 15px; background: #2ecc71"><small class="text-white">Finished</small></span>
                 <span class="badge" style="font-size: 15px; background: white"><small>Ongoing Payment</small></span>
                 <span class="badge" style="font-size: 15px; background: red"><small class="text-white">Error</small></span>
               </span>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                <?php                
                  $query = "SELECT * FROM clients WHERE status='active' && user_type='client'";
                  $result = mysqli_query($db,$query);
                ?>  

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Full Name</th>
                      <th>Plan Type</th>
                      <th>Payment Mode</th>
                      <th>Date Registered</th>
                      <th>Contract Price</th>
                      <th>Recent Payment</th>
                      <th>Next Payment</th>
                      <th>Total Payment</th>
                      <th>Option</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Overall Total:</th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th>&#8369;<?php echo $row1["total"] ?></th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
              <?php
                      if($result){
                        while($res = mysqli_fetch_array($result)) {     
                          echo "<tr>"
                            ?>
                      <?php     
                             $payment_status=$res['payment_status'];

                            if ($payment_status=="finished"){
                            ?>
                              <td><?php echo $res['fname'];?> <?php echo $res['mname'];?> <?php echo $res['lname'];?></td>  
                              <td><?php echo $res['plan_type'];?></td> 
                              <td><?php echo $res['payment_mode'];?></td>  
                              <td><?php echo date('F j, Y / g:i a',strtotime($res['date_registered']))?></td> 

                               <?php 
                              if ($res["plan_type"]=='Plan 1' && $res["payment_mode"]=='Monthly') { 

                                echo "<td>&#8369;15,000.00</td>";  

                               }else if ($res["plan_type"]=='Plan 1' && $res["payment_mode"]=='Quarterly') {

                                echo "<td>&#8369;14,900.00</td>";  

                               }else if ($res["plan_type"]=='Plan 1' && $res["payment_mode"]=='Semi-Annual') {

                                echo "<td>&#8369;14,700.00</td>";  

                               }else if ($res["plan_type"]=='Plan 1' && $res["payment_mode"]=='Annual') {

                                echo "<td>&#8369;14,550.00</td>";  

                               }else if ($res["plan_type"]=='Plan 1' && $res["payment_mode"]=='Lumpsum') {

                                echo "<td>&#8369;14,250.00</td>";  

                               }else if ($res["plan_type"]=='Plan 2' && $res["payment_mode"]=='Monthly') { 

                                echo "<td>&#8369;21,000.00</td>";  

                               }else if ($res["plan_type"]=='Plan 2' && $res["payment_mode"]=='Quarterly') {

                                echo "<td>&#8369;20,800.00</td>";  

                               }else if ($res["plan_type"]=='Plan 2' && $res["payment_mode"]=='Semi-Annual') {

                                echo "<td>&#8369;20,580.00</td>";  

                               }else if ($res["plan_type"]=='Plan 2' && $res["payment_mode"]=='Annual') {

                                echo "<td>&#8369;20,375.00</td>";  

                               }else if ($res["plan_type"]=='Plan 2' && $res["payment_mode"]=='Lumpsum') {

                                echo "<td>&#8369;19,950.00</td>";  

                               }else if ($res["plan_type"]=='Plan 3' && $res["payment_mode"]=='Monthly') { 

                                echo "<td>&#8369;27,000.00</td>";  

                               }else if ($res["plan_type"]=='Plan 3' && $res["payment_mode"]=='Quarterly') {

                                echo "<td>&#8369;26,800.00</td>";  

                               }else if ($res["plan_type"]=='Plan 3' && $res["payment_mode"]=='Semi-Annual') {

                                echo "<td>&#8369;26,460.00</td>";  

                               }else if ($res["plan_type"]=='Plan 3' && $res["payment_mode"]=='Annual') {

                                echo "<td>&#8369;26,190.00</td>";  

                               }else if ($res["plan_type"]=='Plan 3' && $res["payment_mode"]=='Lumpsum') {

                                echo "<td>&#8369;25,650.00</td>";  

                               }else if ($res["plan_type"]=='Plan 4' && $res["payment_mode"]=='Monthly') { 

                                echo "<td>&#8369;45,000.00</td>";  

                               }else if ($res["plan_type"]=='Plan 4' && $res["payment_mode"]=='Quarterly') {

                                echo "<td>&#8369;44,600.00</td>";  

                               }else if ($res["plan_type"]=='Plan 4' && $res["payment_mode"]=='Semi-Annual') {

                                echo "<td>&#8369;44,100.00</td>";  

                               }else if ($res["plan_type"]=='Plan 4' && $res["payment_mode"]=='Annual') {

                                echo "<td>&#8369;43,650.00</td>";  

                               }else if ($res["plan_type"]=='Plan 4' && $res["payment_mode"]=='Lumpsum') {

                                echo "<td>&#8369;42,750.00</td>";  

                               }else{

                               echo "<td>N/A</td>";   
                                
                               }
                              ?>
                               <td style="background: #2ecc71; color: white;">Finished</td>
                                <td style="background: #2ecc71; color: white;">Finished</td>
                               <td style="background: #2ecc71; color: white;">Finished</td>

                            <?php
                            }else{
                            ?>
                              <td><?php echo $res['fname'];?> <?php echo $res['mname'];?> <?php echo $res['lname'];?></td> 
                              <td><?php echo $res['plan_type'];?></td> 
                              <td><?php echo $res['payment_mode'];?></td>  
                              <td><?php echo date('F j, Y / g:i a',strtotime($res['date_registered']))?></td>

                             <?php 
                              if ($res["plan_type"]=='Plan 1' && $res["payment_mode"]=='Monthly') { 

                                echo "<td>&#8369;15,000.00</td>";  

                               }else if ($res["plan_type"]=='Plan 1' && $res["payment_mode"]=='Quarterly') {

                                echo "<td>&#8369;14,900.00</td>";  

                               }else if ($res["plan_type"]=='Plan 1' && $res["payment_mode"]=='Semi-Annual') {

                                echo "<td>&#8369;14,700.00</td>";  

                               }else if ($res["plan_type"]=='Plan 1' && $res["payment_mode"]=='Annual') {

                                echo "<td>&#8369;14,550.00</td>";  

                               }else if ($res["plan_type"]=='Plan 1' && $res["payment_mode"]=='Lumpsum') {

                                echo "<td>&#8369;14,250.00</td>";  

                               }else if ($res["plan_type"]=='Plan 2' && $res["payment_mode"]=='Monthly') { 

                                echo "<td>&#8369;21,000.00</td>";  

                               }else if ($res["plan_type"]=='Plan 2' && $res["payment_mode"]=='Quarterly') {

                                echo "<td>&#8369;20,800.00</td>";  

                               }else if ($res["plan_type"]=='Plan 2' && $res["payment_mode"]=='Semi-Annual') {

                                echo "<td>&#8369;20,580.00</td>";  

                               }else if ($res["plan_type"]=='Plan 2' && $res["payment_mode"]=='Annual') {

                                echo "<td>&#8369;20,375.00</td>";  

                               }else if ($res["plan_type"]=='Plan 2' && $res["payment_mode"]=='Lumpsum') {

                                echo "<td>&#8369;19,950.00</td>";  

                               }else if ($res["plan_type"]=='Plan 3' && $res["payment_mode"]=='Monthly') { 

                                echo "<td>&#8369;27,000.00</td>";  

                               }else if ($res["plan_type"]=='Plan 3' && $res["payment_mode"]=='Quarterly') {

                                echo "<td>&#8369;26,800.00</td>";  

                               }else if ($res["plan_type"]=='Plan 3' && $res["payment_mode"]=='Semi-Annual') {

                                echo "<td>&#8369;26,460.00</td>";  

                               }else if ($res["plan_type"]=='Plan 3' && $res["payment_mode"]=='Annual') {

                                echo "<td>&#8369;26,190.00</td>";  

                               }else if ($res["plan_type"]=='Plan 3' && $res["payment_mode"]=='Lumpsum') {

                                echo "<td>&#8369;25,650.00</td>";  

                               }else if ($res["plan_type"]=='Plan 4' && $res["payment_mode"]=='Monthly') { 

                                echo "<td>&#8369;45,000.00</td>";  

                               }else if ($res["plan_type"]=='Plan 4' && $res["payment_mode"]=='Quarterly') {

                                echo "<td>&#8369;44,600.00</td>";  

                               }else if ($res["plan_type"]=='Plan 4' && $res["payment_mode"]=='Semi-Annual') {

                                echo "<td>&#8369;44,100.00</td>";  

                               }else if ($res["plan_type"]=='Plan 4' && $res["payment_mode"]=='Annual') {

                                echo "<td>&#8369;43,650.00</td>";  

                               }else if ($res["plan_type"]=='Plan 4' && $res["payment_mode"]=='Lumpsum') {

                                echo "<td>&#8369;42,750.00</td>";  

                               }else{

                               echo "<td>N/A</td>";   

                               }
                              ?>


            <?php
                $client_id = $res['client_id'];
                $query=mysqli_query($db,"SELECT * FROM payment WHERE client_id!='$client_id' LIMIT 1")or die(mysqli_error());

                $sql2 = "SELECT sum(amount) AS total2 FROM payment WHERE client_id='$client_id'";
                $stmt2 = $db->query($sql2);
                $row2 = $stmt2->fetch_assoc();

                if($row2["total2"]=='15000.00' && $res["plan_type"]=='Plan 1' && $res["payment_mode"]=='Monthly'){

                  $query ="UPDATE `clients` SET `payment_status` = 'finished' WHERE `client_id` = $client_id;";
                  performQuery($query);

                }else if($row2["total2"]=='14900.00' && $res["plan_type"]=='Plan 1' && $res["payment_mode"]=='Quarterly'){

                  $query ="UPDATE `clients` SET `payment_status` = 'finished' WHERE `client_id` = $client_id;";
                  performQuery($query);

                }else if($row2["total2"]=='14700.00' && $res["plan_type"]=='Plan 1' && $res["payment_mode"]=='Semi-Annual'){

                  $query ="UPDATE `clients` SET `payment_status` = 'finished' WHERE `client_id` = $client_id;";
                  performQuery($query);

                }else if($row2["total2"]=='14550.00' && $res["plan_type"]=='Plan 1' && $res["payment_mode"]=='Annual'){

                  $query ="UPDATE `clients` SET `payment_status` = 'finished' WHERE `client_id` = $client_id;";
                  performQuery($query);

                }else if($row2["total2"]=='14250.00' && $res["plan_type"]=='Plan 1' && $res["payment_mode"]=='Lumpsum'){

                  $query ="UPDATE `clients` SET `payment_status` = 'finished' WHERE `client_id` = $client_id;";
                  performQuery($query);

                }else if($row2["total2"]=='21000.00' && $res["plan_type"]=='Plan 2' && $res["payment_mode"]=='Monthly'){

                  $query ="UPDATE `clients` SET `payment_status` = 'finished' WHERE `client_id` = $client_id;";
                  performQuery($query);

                }else if($row2["total2"]=='20800.00' && $res["plan_type"]=='Plan 2' && $res["payment_mode"]=='Quarterly'){

                  $query ="UPDATE `clients` SET `payment_status` = 'finished' WHERE `client_id` = $client_id;";
                  performQuery($query);

                }else if($row2["total2"]=='20580.00' && $res["plan_type"]=='Plan 2' && $res["payment_mode"]=='Semi-Annual'){

                  $query ="UPDATE `clients` SET `payment_status` = 'finished' WHERE `client_id` = $client_id;";
                  performQuery($query);

                }else if($row2["total2"]=='20375.00' && $res["plan_type"]=='Plan 2' && $res["payment_mode"]=='Annual'){

                  $query ="UPDATE `clients` SET `payment_status` = 'finished' WHERE `client_id` = $client_id;";
                  performQuery($query);

                }else if($row2["total2"]=='19950.00' && $res["plan_type"]=='Plan 2' && $res["payment_mode"]=='Lumpsum'){

                  $query ="UPDATE `clients` SET `payment_status` = 'finished' WHERE `client_id` = $client_id;";
                  performQuery($query);

                }else if($row2["total2"]=='27000.00' && $res["plan_type"]=='Plan 3' && $res["payment_mode"]=='Monthly'){

                  $query ="UPDATE `clients` SET `payment_status` = 'finished' WHERE `client_id` = $client_id;";
                  performQuery($query);

                }else if($row2["total2"]=='26800.00' && $res["plan_type"]=='Plan 3' && $res["payment_mode"]=='Quarterly'){

                  $query ="UPDATE `clients` SET `payment_status` = 'finished' WHERE `client_id` = $client_id;";
                  performQuery($query);

                }else if($row2["total2"]=='26460.00' && $res["plan_type"]=='Plan 3' && $res["payment_mode"]=='Semi-Annual'){

                  $query ="UPDATE `clients` SET `payment_status` = 'finished' WHERE `client_id` = $client_id;";
                  performQuery($query);

                }else if($row2["total2"]=='26190.00' && $res["plan_type"]=='Plan 3' && $res["payment_mode"]=='Annual'){

                  $query ="UPDATE `clients` SET `payment_status` = 'finished' WHERE `client_id` = $client_id;";
                  performQuery($query);

                }else if($row2["total2"]=='25650.00' && $res["plan_type"]=='Plan 3' && $res["payment_mode"]=='Lumpsum'){

                  $query ="UPDATE `clients` SET `payment_status` = 'finished' WHERE `client_id` = $client_id;";
                  performQuery($query);

                }else if($row2["total2"]=='45000.00' && $res["plan_type"]=='Plan 4' && $res["payment_mode"]=='Monthly'){

                  $query ="UPDATE `clients` SET `payment_status` = 'finished' WHERE `client_id` = $client_id;";
                  performQuery($query);

                }else if($row2["total2"]=='44600.00' && $res["plan_type"]=='Plan 4' && $res["payment_mode"]=='Quarterly'){
                  $query ="UPDATE `clients` SET `payment_status` = 'finished' WHERE `client_id` = $client_id;";
                  performQuery($query);

                }else if($row2["total2"]=='44100.00' && $res["plan_type"]=='Plan 4' && $res["payment_mode"]=='Semi-Annual'){

                  $query ="UPDATE `clients` SET `payment_status` = 'finished' WHERE `client_id` = $client_id;";
                  performQuery($query);

                }else if($row2["total2"]=='43650.00' && $res["plan_type"]=='Plan 4' && $res["payment_mode"]=='Annual'){

                  $query ="UPDATE `clients` SET `payment_status` = 'finished' WHERE `client_id` = $client_id;";
                  performQuery($query);

                }else if($row2["total2"]=='42750.00' && $res["plan_type"]=='Plan 4' && $res["payment_mode"]=='Lumpsum'){

                  $query ="UPDATE `clients` SET `payment_status` = 'finished' WHERE `client_id` = $client_id;";
                  performQuery($query);

                }


              while($row=mysqli_fetch_array($query)){
              ?>
                <?php 
                  $total=$row2["total2"]; 
                  $payment_status=$i["payment_status"]; 
                  if (empty($total)){ 
                  ?>
                    <td style="background: red; color: white;">No Payment Data</td> 
                    <td style="background: red; color: white;">No Payment Data</td> 
                    <td style="background: red; color: white;">No Payment Data</td> 
                  <?php } else { ?>


          <?php
                  $query=mysqli_query($db,"SELECT * from `payment` WHERE `client_id`='".$res['client_id']."' ORDER BY `payment_id` DESC LIMIT 1")or die(mysqli_error());
                  while($row=mysqli_fetch_array($query)){
            ?>
                <td><?php echo date('F j, Y / g:i a',strtotime($row['date']))?></td>

          <?php }?>


          <?php
            $query=mysqli_query($db,"SELECT * from `payment` WHERE `client_id`='".$res['client_id']."' order by `payment_id` DESC LIMIT 1")or die(mysqli_error());
            $payment=mysqli_query($db,"SELECT * from `payment` WHERE `client_id`='".$res['client_id']."' order by `payment_id` ASC LIMIT 1")or die(mysqli_error());
         
           
            while($row=mysqli_fetch_array($query) && $pay=mysqli_fetch_array($payment)){
          ?>
                  
  <?php 

   $timeDate=mysqli_query($db,"SELECT * from `payment` WHERE `client_id`='".$res['client_id']."' order by `payment_id` DESC LIMIT 1")or die(mysqli_error());
 while($dateTime=mysqli_fetch_array($timeDate)){
                    $monthly = '1 month';
                    $date = new DateTime($dateTime['date'] . $monthly);
                    // $date = new DateTime('last day of this month - ' . $monthly);
                    $todayDate = new DateTime();

                    $quarterly = '3 month';
                    $date2 = new DateTime($dateTime['date'] . $quarterly);
                    $todayDate2 = new DateTime();

                    $semi_annual = '6 month';
                    $date3 = new DateTime($dateTime['date'] . $semi_annual);
                    $todayDate3 = new DateTime();

                    $annual = '1 year';
                    $date4 = new DateTime($dateTime['date'] . $annual);
                    $todayDate4 = new DateTime();
                    
                    
                  if ($res['payment_mode']=='Monthly') {

                        if ($date >= $todayDate) {

  $status  = $pay['status'];
      if ($status == 'undue') {
   
        echo "<td>". $date->format('F j, Y / g:i a') . "</td>";

      }else{

        $nextpayment=mysqli_query($db,"SELECT * from `next_payment` WHERE `client_id`='".$res['client_id']."' order by `nextPayment_id` DESC LIMIT 1")or die(mysqli_error());
            while($next=mysqli_fetch_array($nextpayment)){

            echo "<td>" . date('F j, Y / g:i a',strtotime($next['nextPayment_date'])) . "</td>";

          }

      }
                          // $query2 ="UPDATE `clients` SET `due_status` = 'undue' WHERE `client_id` = '".$res['client_id']."';";
                          // performQuery($query2);

                        }else{

                          $query2 ="UPDATE `clients` SET `due_status` = 'due' WHERE `client_id` = '".$res['client_id']."';";
                          performQuery($query2);
                          echo "<td style=\"background: red; color: white;\">Due Payment</td> ";

                          $client_id = $res['client_id'];
                          $due_date = $date->format('Y-m-d H:i:s');
                          $status = 'due';
                          $stmt = $db->prepare("INSERT INTO next_payment (client_id, nextPayment_date, status) VALUES (?, ?, ?)");
                          $stmt->bind_param("sss", $client_id, $due_date, $status);
                          $stmt->execute();

                          $query4 ="UPDATE `payment` SET `status` = 'due' WHERE `client_id` = '".$res['client_id']."';";
                          performQuery($query4);
                        }

                    }else if ($res['payment_mode']=='Quarterly') {
                        if ($date2 >= $todayDate2) {

   $status  = $pay['status'];
      if ($status == 'undue') {
   
        echo "<td>". $date2->format('F j, Y / g:i a') . "</td>";

      }else{

        $nextpayment=mysqli_query($db,"SELECT * from `next_payment` WHERE `client_id`='".$res['client_id']."' order by `nextPayment_id` DESC LIMIT 1")or die(mysqli_error());
            while($next=mysqli_fetch_array($nextpayment)){

            echo "<td>" . date('F j, Y / g:i a',strtotime($next['nextPayment_date'])) . "</td>";

          }

      }
                                   
                          // $query2 ="UPDATE `clients` SET `due_status` = 'undue' WHERE `client_id` = '".$res['client_id']."';";
                          // performQuery($query2);

                        }else{
                          $query2 ="UPDATE `clients` SET `due_status` = 'due' WHERE `client_id` = '".$res['client_id']."';";
                          performQuery($query2);
                          echo "<td style=\"background: red; color: white;\">Due Payment</td> ";

                          $client_id = $res['client_id'];
                          $due_date = $date2->format('Y-m-d H:i:s');
                          $status = 'due';
                          $stmt = $db->prepare("INSERT INTO next_payment (client_id, nextPayment_date, status) VALUES (?, ?, ?)");
                          $stmt->bind_param("sss", $client_id, $due_date, $status);
                          $stmt->execute();

                          $query4 ="UPDATE `payment` SET `status` = 'due' WHERE `client_id` = '".$res['client_id']."';";
                          performQuery($query4);
                        }
                    }else if ($res['payment_mode']=='Semi-Annual') {
                        if ($date3 >= $todayDate3) {
                                 
  $status  = $pay['status'];
      if ($status == 'undue') {
   
        echo "<td>". $date3->format('F j, Y / g:i a') . "</td>";

      }else{

        $nextpayment=mysqli_query($db,"SELECT * from `next_payment` WHERE `client_id`='".$res['client_id']."' order by `nextPayment_id` DESC LIMIT 1")or die(mysqli_error());
            while($next=mysqli_fetch_array($nextpayment)){

            echo "<td><b>" . date('F j, Y / g:i a',strtotime($next['nextPayment_date'])) . "</td>";

          }

      }

                          // $query2 ="UPDATE `clients` SET `due_status` = 'undue' WHERE `client_id` = '".$res['client_id']."';";
                          // performQuery($query2);

                        }else{
                          $query2 ="UPDATE `clients` SET `due_status` = 'due' WHERE `client_id` = '".$res['client_id']."';";
                          performQuery($query2);
                          echo "<td style=\"background: red; color: white;\">Due Payment</td> ";

                          $client_id = $res['client_id'];
                          $due_date = $date3->format('Y-m-d H:i:s');
                          $status = 'due';
                          $stmt = $db->prepare("INSERT INTO next_payment (client_id, nextPayment_date, status) VALUES (?, ?, ?)");
                          $stmt->bind_param("sss", $client_id, $due_date, $status);
                          $stmt->execute();

                          $query4 ="UPDATE `payment` SET `status` = 'due' WHERE `client_id` = '".$res['client_id']."';";
                          performQuery($query4);
                        }
                    }else if ($res['payment_mode']=='Annual') {
                        if ($date4 >= $todayDate4) {
                                
  $status  = $pay['status'];
      if ($status == 'undue') {
   
        echo "<td>". $date4->format('F j, Y / g:i a') . "</td>";

      }else{

        $nextpayment=mysqli_query($db,"SELECT * from `next_payment` WHERE `client_id`='".$res['client_id']."' order by `nextPayment_id` DESC LIMIT 1")or die(mysqli_error());
            while($next=mysqli_fetch_array($nextpayment)){

            echo "<td><b>DUE </b>" . date('F j, Y / g:i a',strtotime($next['nextPayment_date'])) . "</td>";

          }

      }
                          // $query2 ="UPDATE `clients` SET `due_status` = 'undue' WHERE `client_id` = '".$res['client_id']."';";
                          // performQuery($query2);

                        }else{
                          $query2 ="UPDATE `clients` SET `due_status` = 'due' WHERE `client_id` = '".$res['client_id']."';";
                          performQuery($query2);
                          echo "<td style=\"background: red; color: white;\">Due Payment</td> ";

                          $client_id = $res['client_id'];
                          $due_date = $date4->format('Y-m-d H:i:s');
                          $status = 'due';
                          $stmt = $db->prepare("INSERT INTO next_payment (client_id, nextPayment_date, status) VALUES (?, ?, ?)");
                          $stmt->bind_param("sss", $client_id, $due_date, $status);
                          $stmt->execute();

                          $query4 ="UPDATE `payment` SET `status` = 'due' WHERE `client_id` = '".$res['client_id']."';";
                          performQuery($query4);
                        }
                    }
}

  ?>

          <?php }?>

                <td>&#8369;<?php echo number_format($row2["total2"], 2, '.', ','); ?></td>
                        <?php }
                      ?>
              <?php }?>

                            <?php }
                           echo "<td class=\"text-center\">
                                  <p>
                                    <a class=\"btn btn-sm btn-block dropdown-toggle\" style=\"background: #3498db; color: white\" data-toggle=\"collapse\" href=\"#collapseExample\" role=\"button\" aria-expanded=\"false\" aria-controls=\"collapseExample\"><i class\"fas fa-cog\"></i></a>
                                  </p>

                                  <div class=\"collapse\" id=\"collapseExample\">
                                      <a class=\"btn btn-outline-success btn-sm btn-block\" href=\"adminViewPayments.php?client_id=$res[client_id]\">View Payments</a>
                                      <a class=\"btn btn-outline-warning btn-sm btn-block\" href=\"addPayment.php?client_id=$res[client_id]\">Add Payment</a>
                                      <a class=\"btn btn-outline-info btn-sm btn-block\" href=\"adminMsgClient.php?client_id=$res[client_id]\">Message</a>
                                      <a class=\"btn btn-outline-danger btn-sm btn-block\" onClick=\"return confirm('Are you sure you want to deactivate this account?' )\" href=\"deactivatedClient.php?client_id=$res[client_id]\">Deactivate</a>
                                  </div>
                                  </td>";
                            ?>
                            <?php 
                          echo "</tr>"; 
                        }
                       }?>
                  </tbody>
                </table>
              </div>
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
