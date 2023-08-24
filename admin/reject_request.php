<?php
    
    include("../functions/functions.php");

    $request_id = $_GET['request_id'];

    $query = "DELETE FROM `clients_request` WHERE `request_id` = $request_id;";

     if (mysqli_query($db, $query)) {

        echo "<script>alert('Request data has been deleted successfully!')</script>";
        echo "<script>window.open('adminPanel.php','_self')</script>";
            
        }else{

        echo "<script>alert('Failed')</script>".mysqli_error($db);

        }

        mysqli_close($db);


if (!isLoggedIn()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: ../index.php');
}
    
?>