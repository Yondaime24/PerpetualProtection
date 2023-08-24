<?php 

include('../functions/functions.php');

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

    <title>Perpetual Protection | Admin Clients</title>
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
    <!-- Start datatable css -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css"> -->

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

         <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-user"></i>
             Clients</div>
            <div class="card-body">
              <div class="table-responsive">

                <?php
                                     
                  $query = "SELECT * FROM clients WHERE status='active' && user_type='client'";
                  $result = mysqli_query($db,$query);
                
                ?>  

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <!-- <table id="dataTable" class="text-center"> -->
                  <!-- <thead class="bg-light text-capitalize"> -->
                  <thead>
                    <tr>
                      <th>Full Name</th>
                      <th>Plan Type</th>
                      <th>Payment Mode</th>
                      <th>Contact Number</th>
                      <th>Email Address</th>
                      <th>Date Registered</th>
                      <th>Status</th>
                      <th>Option</th>
                    </tr>
                  </thead>
                  <!-- <tfoot class="bg-light text-capitalize"> -->
                  <tfoot>
                    <tr>
                      <th>Full Name</th>
                      <th>Plan Type</th>
                      <th>Payment Mode</th>
                      <th>Contact Number</th>
                      <th>Email Address</th>
                      <th>Date Registered</th>
                      <th>Status</th>
                      <th>Option</th>
                    </tr>
                  </tfoot>
                  <tbody>

                    <?php
                      if($result){
                        while($res = mysqli_fetch_array($result)) {     
                          echo "<tr>"
                            ?>
                          <?php  
                             $status=$res['status'];
                             $admin= "deactivated";

                            if ($status=="deactivated"){
                            ?>
                              <td style="background: red; color: white"><?php echo $res['fname'];?> <?php echo $res['mname'];?> <?php echo $res['lname'];?></td>  
                              <td style="background: red; color: white"><?php echo $res['plan_type'];?></td> 
                              <td style="background: red; color: white"><?php echo $res['payment_mode'];?></td>  
                              <td style="background: red; color: white"><?php echo $res['contact_number'];?></td>   
                              <td style="background: red; color: white"><?php echo $res['email_address'];?></td>  
                              <td style="background: red; color: white"><?php echo date('F j, Y / g:i a',strtotime($res['date_registered']))?></td>  
                              <td style="background: red; color: white"><?php echo $res['status'];?></td>  
                            <?php
                            }else{
                            ?>
                              <td><?php echo $res['fname'];?> <?php echo $res['mname'];?> <?php echo $res['lname'];?></td> 
                              <td><?php echo $res['plan_type'];?></td> 
                              <td><?php echo $res['payment_mode'];?></td>  
                              <td><?php echo $res['contact_number'];?></td>   
                              <td><?php echo $res['email_address'];?></td>  
                              <td><?php echo date('F j, Y / g:i a',strtotime($res['date_registered']))?></td>  
                              <td><?php echo $res['status'];?></td>
                            </ul>
                            <?php }
                             echo "<td class=\"text-center\">
                            <p>
                              <a class=\"btn btn-sm btn-block dropdown-toggle\" style=\"background: #3498db; color: white\" data-toggle=\"collapse\" href=\"#collapseExample\" role=\"button\" aria-expanded=\"false\" aria-controls=\"collapseExample\"><i class\"fas fa-cog\"></i></a>
                            </p>

                            <div class=\"collapse\" id=\"collapseExample\">
                                    <a class=\"btn btn-outline-primary btn-sm btn-block\" href=\"adminViewClients.php?client_id=$res[client_id]\">Profile</a>
                                    <a class=\"btn btn-outline-success btn-sm btn-block\" href=\"adminClientBeneficiaries.php?client_id=$res[client_id]\">Beneficiaries</a>
                                    <a class=\"btn btn-outline-secondary btn-sm btn-block\" href=\"adminClientReferences.php?client_id=$res[client_id]\">References</a>
                                    <a class=\"btn btn-outline-info btn-sm btn-block\" href=\"adminMsgClient.php?client_id=$res[client_id]\">Message</a>
                                    <a class=\"btn btn-outline-danger btn-sm btn-block\" onClick=\"return confirm('Are you sure you want to deactivate this account?' )\" href=\"deactivatedClient.php?client_id=$res[client_id]\">Deactivate</a>
                            </div>
                                  </td>";
                            ?>
                            </ul>
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

    <!-- Start datatable js -->
<!--     <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script> -->

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="assets/js/demo/datatables-demo.js"></script>
    <script src="assets/js/demo/chart-area-demo.js"></script>

  </body>

</html>
