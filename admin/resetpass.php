<?php  

    include('../functions/functions.php');

 	$reset_id = $_GET['reset_id'];
	
	$query ="UPDATE `reset_password` SET `status` = 'read' WHERE `reset_id` = $reset_id;";
    performQuery($query);

      header('location: adminPanel.php');

?>