<?php
    
    include("../functions/functions.php");

    $client_id = $_GET['client_id'];

     $query ="UPDATE `clients` SET `update_status` = 'updated' WHERE `client_id` = $client_id;";

     if (mysqli_query($db, $query)) {

        echo "<script>alert('You are now all set up. Thank you for choosing Perpetual Protection!')</script>";
        echo "<script>window.open('plan.php','_self')</script>";
            
        }else{

        echo "<script>alert('Failed')</script>".mysqli_error($db);

        }

        mysqli_close($db);


    if (!isLoggedIn()) {
      $_SESSION['msg'] = "You must log in first";
      header('location: ../index.php');
    }

    if (!isClient()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ../index.php');
    }
    
?> 