<?php 
  include('../functions/functions.php');


  $output = '';
  $output2 = '';

  $sql = "SELECT * FROM payment WHERE client_id='".$_SESSION['plan']['client_id']."'";
  $stmt = $db->query($sql);

  $sql2 = "SELECT sum(amount) AS total FROM payment";
  $stmt2 = $db->query($sql2);
  $row1 = $stmt2->fetch_assoc();



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

    <title>Perpetual Protection | Admin Panel</title>
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
    <link rel="stylesheet" type="text/css" href="assets/css/textarea.css">
    <link rel="stylesheet" type="text/css" href="assets/css/contactTextarea.css">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="adminPanel.php">Perpetual Protection</a>
      

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <a href="z1.php" class="nav-link btn-sm text-white order-1 order-sm-0"><i class="fas fa-sync-alt"></i>
       Refresh 
      </a>
       <ul class="navbar-nav ml-auto ml-md-0">

         <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php

                $query = "SELECT * from `contact_us` where `status` = 'unread'";
                if(count(fetchAll($query))>0){
            ?>
            <span class="badge badge-danger" style="font-size: 10px"><?php echo count(fetchAll($query)); ?></span>

            <?php
                }
            ?>
          </a>
        
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-phone fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-left" aria-labelledby="userDropdown">
            <div class="scroll2">
            <?php 
               $query = "SELECT * from `contact_us` order by `date` DESC";
               if(count(fetchAll($query))>0){
                  foreach(fetchAll($query) as $i){
            ?>

      <?php
        ?>
          <a style="<?php if($i['status']=='unread'){echo "font-weight:bold;";}?>"class="dropdown-item" href="contact_us.php?contact_id=<?php echo $i['contact_id'] ?>">

              <small><i><?php echo date('F j, Y / g:i a',strtotime($i['date'])) ?></i></small><br/>

               <?php
                echo "From: ";
                echo ucfirst($i['fullname']); 
              ?>
             
              </a>
              
              <div class="dropdown-divider"></div>
              <?php 
                  }
                }else{
                  echo "No Contacts Yet";
                }

              ?>  
            </div>
          </div>
        </li>
      </ul>
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
            <a class="dropdown-item" href="changeUsername&Pass.php"> <i class="fas fa-lock"></i> Change Username & Password</a>
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

        <li class="nav-item active">
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

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!-- Icon Cards-->
          <div class="row">

            <div class="col-xl-6 col-sm-7 mb-4">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-user"></i>
                  </div>
          <?php

                $query = "SELECT * from `clients` where `status` = 'active' && `user_type`='client' order by `date_registered` DESC";
                if(count(fetchAll($query))>0){
            ?>

          <?php
          if(count(fetchAll($query))==1){
            ?>
           <div class="mr-5"><?php echo count(fetchAll($query)); ?> Overall Client!</div>
          <?php
            }else{
          ?>
          <div class="mr-5"><?php echo count(fetchAll($query)); ?> Overall Clients!</div>
          </ul>
            <?php }
          ?>           

            <?php
                }else{
                  echo "No Clients Yet!";
                }
            ?>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="adminClients.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

            <div class="col-xl-6 col-sm-7 mb-4">
              <div class="card text-white bg-info o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-money-bill-wave"></i>
                  </div>         
                  <?php
                  if($row1["total"] == '0.00'){
                    ?>
                    <div class="mr-5">No Payments Yet!</div>
                  <?php
                    }else{
                  ?>
                    <div class="mr-5">&#8369;<?php echo number_format($row1["total"], 2, '.', ','); ?> Total Money Received!</div>
                  </ul>
                    <?php }
                  ?> 
                </div>
                <!-- <a class="card-footer text-white clearfix small z-1" href="adminAllPayments.php"> -->
                <a class="card-footer text-white clearfix small z-1" href="#" data-toggle="modal" data-target="#totalMoneyReceived">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

            <div class="col-xl-6 col-sm-7 mb-4">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-exclamation"></i>
                  </div>
                <?php

                    $query = "SELECT * from `clients` where `status` = 'deactivated' && `user_type`='client' order by `date_registered` DESC";
                    if(count(fetchAll($query))>0){
                ?>
                 
                  <?php
                  if(count(fetchAll($query))==1){
                    ?>
                    <div class="mr-5"><?php echo count(fetchAll($query)); ?> Deactivated Account!</div>
                  <?php
                    }else{
                  ?>
                   <div class="mr-5"><?php echo count(fetchAll($query)); ?> Deactivated Accounts!</div>
                  </ul>
                    <?php }
                  ?> 

                <?php
                    }else{
                      echo "No Deactivated Accounts Yet!";
                    }
                ?>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="adminDeactivatedClient.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

             <div class="col-xl-6 col-sm-7 mb-4">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-handshake"></i>
                  </div>
                  <?php

                    $query = "SELECT * from `clients` where `payment_status` = 'finished' order by `date_registered` DESC";
                    if(count(fetchAll($query))>0){
                ?>
                 
                  <?php
                  if(count(fetchAll($query))==1){
                    ?>
                    <div class="mr-5"><?php echo count(fetchAll($query)); ?> Payment Finished!</div>
                  <?php
                    }else{
                  ?>
                   <div class="mr-5"><?php echo count(fetchAll($query)); ?> Payments Finished!</div>
                  </ul>
                    <?php }
                  ?> 

                <?php
                    }else{
                      echo "No Payments Finished Yet!";
                    }
                ?>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="finishedPayments.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

               <div class="col-xl-6 col-sm-7 mb-4">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-exclamation-circle"></i>
                  </div>
                  <?php

                    $query = "SELECT * from `clients` where `due_status` = 'due' order by `date_registered` DESC";
                    if(count(fetchAll($query))>0){
                ?>
                 
                  <?php
                  if(count(fetchAll($query))==1){
                    ?>
                    <div class="mr-5"><?php echo count(fetchAll($query)); ?> Payment Due!</div>
                  <?php
                    }else{
                  ?>
                   <div class="mr-5"><?php echo count(fetchAll($query)); ?> Payments Due!</div>
                  </ul>
                    <?php }
                  ?> 

                <?php
                    }else{
                      echo "No Due Payments Yet!";
                    }
                ?>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="duePayment.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>


               <div class="col-xl-6 col-sm-7 mb-4">
              <div class="card text-white o-hidden h-100" style="background: #2ecc71;">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-check"></i>
                  </div>
                  <?php

                    $query = "SELECT * from `clients_request` where `request_status` = 'granted' order by `date` DESC";
                    if(count(fetchAll($query))>0){
                ?>
                 
                  <?php
                  if(count(fetchAll($query))==1){
                    ?>
                    <div class="mr-5"><?php echo count(fetchAll($query)); ?> Client Request Granted!</div>
                  <?php
                    }else{
                  ?>
                   <div class="mr-5"><?php echo count(fetchAll($query)); ?> Clients Request Granted!</div>
                  </ul>
                    <?php }
                  ?> 

                <?php
                    }else{
                      echo "No Request Granted Yet!";
                    }
                ?>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="grantedRequest.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
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
    <div class="modal fade" id="totalMoneyReceived" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 550px">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Total Money Received</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          
          <div class="card mb-3">
            <div class="card-body">
              <div class="table-responsive">
                  <?php                
                  $query = "SELECT * FROM clients WHERE status='active' && user_type='client'";
                  $result = mysqli_query($db,$query);
                ?>  

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Clients</th>
                      <th>Payment</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Overall Total</th>
                      <th>&#8369;<?php echo number_format($row1["total"], 2, '.', ','); ?></th>
                    </tr>
                  </tfoot>
                  <tbody>
              <?php
                      if($result){
                        while($res = mysqli_fetch_array($result)) {     
                          echo "<tr>"
                            ?>
                             

                          <?php
                                $client_id = $res['client_id'];
                                $query=mysqli_query($db,"SELECT * FROM payment WHERE client_id!='$client_id' LIMIT 1")or die(mysqli_error());

                                $sql2 = "SELECT sum(amount) AS total2 FROM payment WHERE client_id='$client_id'";
                                $stmt2 = $db->query($sql2);
                                $row2 = $stmt2->fetch_assoc();

                                while($row=mysqli_fetch_array($query)){
                            ?>
                                    <?php 
                                    $total=$row2["total2"]; 
                                    $payment_status=$i["payment_status"]; 
                                    if (empty($total)){ 
                                    ?>
                                      <!-- <td style="background: red; color: white;">No Payment Data</td>  -->
                                    <?php } else { ?>
                                       <td><?php echo $res['fname'];?> <?php echo $res['mname'];?> <?php echo $res['lname'];?></td> 
                                       <td>&#8369;<?php echo number_format($row2["total2"], 2, '.', ','); ?></td> 
                                    <?php }
                                    ?>
                          <?php }?>

                            <?php }
                           
                            ?>
                            <?php 
                       }?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Close</button>
            <a class="btn btn-primary btn-sm" href="adminAllPayments.php">View All Payments</a>
          </div>
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
