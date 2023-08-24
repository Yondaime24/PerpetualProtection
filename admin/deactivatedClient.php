<?php
    
    include("../functions/functions.php");

    $client_id = $_GET['client_id'];

   
      $query ="UPDATE `clients` SET `plan_type` = 'deactivated', `status` = 'deactivated' WHERE `client_id` = $client_id;";


     if (mysqli_query($db, $query)) {

        echo "<script>alert('Client data has been deactivated successfully!')</script>";
        echo "<script>window.open('adminPanel.php','_self')</script>";
            
        }else{

        echo "<script>alert('Failed')</script>".mysqli_error($db);

        }

        mysqli_close($db);


if (!isLoggedIn()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: ../index.php');
}
if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../index.php');
}
    
?>