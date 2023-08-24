<?php
    
    include("../functions/functions.php");

    $client_id = $_GET['client_id'];

    $query = "DELETE FROM `clients` WHERE `client_id` = $client_id;";
    $query2 = "DELETE FROM `beneficiary` WHERE `client_id` = $client_id;";
    $query3 = "DELETE FROM `clients_references` WHERE `client_id` = $client_id;";


     if (mysqli_query($db, $query) && mysqli_query($db, $query2) && mysqli_query($db, $query3)) {

        echo "<script>alert('Client data has been deleted successfully!')</script>";
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