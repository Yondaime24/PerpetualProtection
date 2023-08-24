<?php 
  include('../functions/functions.php');

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
      <title>Perpetual Protection | References</title>
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
    <link rel="stylesheet" type="text/css" href="../asset/css/all.css">
    <link rel="stylesheet" type="text/css" href="../asset/customizedCss/a3.css">
    <link rel="stylesheet" type="text/css" href="../asset/customizedCss/timelineDesign.css">

  </head>
  <body>

<div class="container" style="background: url(../images/log.svg);">
  <div class="forms-container">
    <div class="signin-signup">
      <form action="#" class="sign-in-form">

<div class="scroll">
  <div class="main-timeline2">
      <div class="timeline">
          <a href="reference1Edit1.php" onclick="return confirm('Are you sure you want to edit reference 1?')" class="icon fa fa-edit"></a>
           <a href="#" id="a1" class="timeline-content" style="background: #3498db; color: #000">
                 <center><h4 style="font-size: 25px;">Reference #1</h4></center>
          </a>
            <a href="#" id="a1" class="timeline-content">Name:
      <center><h4 style="font-size: 18px"><?php
        $query=mysqli_query($db,"SELECT name FROM clients_references WHERE client_id='".$_SESSION['plan']['client_id']."' LIMIT 1")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>
          <?php echo $row['name'];?>
      <?php }?></h4></center>
            </a>
            <a href="#" id="a1" class="timeline-content" style="background: #3498db">Address:
      <center><h4 style="font-size: 18px"><?php
        $query=mysqli_query($db,"SELECT address FROM clients_references WHERE client_id='".$_SESSION['plan']['client_id']."' LIMIT 1")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>
          <?php echo $row['address'];?>
      <?php }?></h4></center>
            </a>
            <a href="#" id="a1" class="timeline-content">Contact Number:
      <center><h4 style="font-size: 18px"><?php
        $query=mysqli_query($db,"SELECT contact_num FROM clients_references WHERE client_id='".$_SESSION['plan']['client_id']."' LIMIT 1")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>
          <?php echo $row['contact_num'];?>
      <?php }?></h4></center>
            </a>
            <a href="#" id="a1" class="timeline-content" style="background: #3498db">Relation:
      <center><h4 style="font-size: 18px"><?php
        $query=mysqli_query($db,"SELECT relation FROM clients_references WHERE client_id='".$_SESSION['plan']['client_id']."' LIMIT 1")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>
          <?php echo $row['relation'];?>
      <?php }?></h4></center>
            </a>
      </div>
  </div>
  <div class="main-timeline2">
       <div class="timeline">
          <a href="reference2Edit1.php" onclick="return confirm('Are you sure you want to edit reference 2?')" class="icon fa fa-edit"></a>
          <a href="#" id="a1" class="timeline-content" style="background: #3498db; color: #000">
                 <center><h4 style="font-size: 25px;">Reference #2</h4></center>
          </a>
            <a href="#" id="a1" class="timeline-content">Name:
      <center><h4 style="font-size: 18px"><?php
        $query=mysqli_query($db,"SELECT name FROM clients_references WHERE client_id='".$_SESSION['plan']['client_id']."' LIMIT 1, 1")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>
          <?php echo $row['name'];?>
      <?php }?></h4></center>
            </a>
            <a href="#" id="a1" class="timeline-content" style="background: #3498db">Address:
      <center><h4 style="font-size: 18px"><?php
        $query=mysqli_query($db,"SELECT address FROM clients_references WHERE client_id='".$_SESSION['plan']['client_id']."' LIMIT 1, 1")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>
          <?php echo $row['address'];?>
      <?php }?></h4></center>
            </a>
            <a href="#" id="a1" class="timeline-content">Contact Number:
      <center><h4 style="font-size: 18px"><?php
        $query=mysqli_query($db,"SELECT contact_num FROM clients_references WHERE client_id='".$_SESSION['plan']['client_id']."' LIMIT 1, 1")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>
          <?php echo $row['contact_num'];?>
      <?php }?></h4></center>
            </a>
            <a href="#" id="a1" class="timeline-content" style="background: #3498db">Relation:
      <center><h4 style="font-size: 18px"><?php
        $query=mysqli_query($db,"SELECT relation FROM clients_references WHERE client_id='".$_SESSION['plan']['client_id']."' LIMIT 1, 1")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>
          <?php echo $row['relation'];?>
      <?php }?></h4></center>
            </a>
      </div>
  </div>
    <div class="main-timeline2">
         <div class="timeline">
          <a href="reference3Edit1.php" onclick="return confirm('Are you sure you want to edit reference 3?')" class="icon fa fa-edit"></a>
          <a href="#" id="a1" class="timeline-content" style="background: #3498db; color: #000">
                 <center><h4 style="font-size: 25px;">Reference #3</h4></center>
          </a>
            <a href="#" id="a1" class="timeline-content">Name:
      <center><h4 style="font-size: 18px"><?php
        $query=mysqli_query($db,"SELECT name FROM clients_references WHERE client_id='".$_SESSION['plan']['client_id']."' LIMIT 2, 1")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>
          <?php echo $row['name'];?>
      <?php }?></h4></center>
            </a>
            <a href="#" id="a1" class="timeline-content" style="background: #3498db">Address:
      <center><h4 style="font-size: 18px"><?php
        $query=mysqli_query($db,"SELECT address FROM clients_references WHERE client_id='".$_SESSION['plan']['client_id']."' LIMIT 2, 1")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>
          <?php echo $row['address'];?>
      <?php }?></h4></center>
            </a>
            <a href="#" id="a1" class="timeline-content">Contact Number:
      <center><h4 style="font-size: 18px"><?php
        $query=mysqli_query($db,"SELECT contact_num FROM clients_references WHERE client_id='".$_SESSION['plan']['client_id']."' LIMIT 2, 1")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>
          <?php echo $row['contact_num'];?>
      <?php }?></h4></center>
            </a>
            <a href="#" id="a1" class="timeline-content" style="background: #3498db">Relation:
      <center><h4 style="font-size: 18px"><?php
        $query=mysqli_query($db,"SELECT relation FROM clients_references WHERE client_id='".$_SESSION['plan']['client_id']."' LIMIT 2, 1")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>
          <?php echo $row['relation'];?>
      <?php }?></h4></center>
            </a>
      </div>
  </div>
</div>

<!-- <center>
  <table class="table table-condensed table-light table-striped">
      <tr>
        <th>Name</th>
        <th>Address</th>
        <th>Contact Number</th>
        <th>Relation</th>
        <th><span style="color: #000;"><i class="fas fa-cog"></i></span></th>
      </tr>
    <td>  
      <?php
        $query=mysqli_query($db,"SELECT name FROM clients_references WHERE client_id='".$_SESSION['plan']['client_id']."' LIMIT 1")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>
          <?php echo $row['name'];?>
      <?php }?>
    </td>
    <td>  
      <?php
        $query=mysqli_query($db,"SELECT address FROM clients_references WHERE client_id='".$_SESSION['plan']['client_id']."' LIMIT 1")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>
          <?php echo $row['address'];?>
      <?php }?>
    </td>
    <td>  
      <?php
        $query=mysqli_query($db,"SELECT contact_num FROM clients_references WHERE client_id='".$_SESSION['plan']['client_id']."' LIMIT 1")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>
          <?php echo $row['contact_num'];?>
      <?php }?>
    </td>
    <td>  
      <?php
        $query=mysqli_query($db,"SELECT relation FROM clients_references WHERE client_id='".$_SESSION['plan']['client_id']."' LIMIT 1")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>
          <?php echo $row['relation'];?>
      <?php }?>
    </td>
    <td>  
       <a id="edit" href="reference1Edit1.php" onclick="return confirm('Are you sure you want to edit?')"><span><i class="fas fa-edit"></i></span>Edit</a>
    </td>
   
   <tr>
     <td>  
      <?php
        $query=mysqli_query($db,"SELECT name FROM clients_references WHERE client_id='".$_SESSION['plan']['client_id']."' LIMIT 1, 1")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>
          <?php echo $row['name'];?>
      <?php }?>
    </td>
    <td>  
      <?php
        $query=mysqli_query($db,"SELECT address FROM clients_references WHERE client_id='".$_SESSION['plan']['client_id']."' LIMIT 1, 1")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>
          <?php echo $row['address'];?>
      <?php }?>
    </td>
    <td>  
      <?php
        $query=mysqli_query($db,"SELECT contact_num FROM clients_references WHERE client_id='".$_SESSION['plan']['client_id']."' LIMIT 1, 1")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>
          <?php echo $row['contact_num'];?>
      <?php }?>
    </td>
    <td>  
      <?php
        $query=mysqli_query($db,"SELECT relation FROM clients_references WHERE client_id='".$_SESSION['plan']['client_id']."' LIMIT 1, 1")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>
          <?php echo $row['relation'];?>
      <?php }?>
    </td>
    <td>  
       <a id="edit" href="reference2Edit1.php" onclick="return confirm('Are you sure you want to edit?')"><span><i class="fas fa-edit"></i></span>Edit</a>
    </td>
   </tr>

   <tr>
     <td>  
      <?php
        $query=mysqli_query($db,"SELECT name FROM clients_references WHERE client_id='".$_SESSION['plan']['client_id']."' LIMIT 2, 1")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>
          <?php echo $row['name'];?>
      <?php }?>
    </td>
    <td>  
      <?php
        $query=mysqli_query($db,"SELECT address FROM clients_references WHERE client_id='".$_SESSION['plan']['client_id']."' LIMIT 2, 1")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>
          <?php echo $row['address'];?>
      <?php }?>
    </td>
    <td>  
      <?php
        $query=mysqli_query($db,"SELECT contact_num FROM clients_references WHERE client_id='".$_SESSION['plan']['client_id']."' LIMIT 2, 1")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>
          <?php echo $row['contact_num'];?>
      <?php }?>
    </td>
    <td>  
      <?php
        $query=mysqli_query($db,"SELECT relation FROM clients_references WHERE client_id='".$_SESSION['plan']['client_id']."' LIMIT 2, 1")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
      ?>
          <?php echo $row['relation'];?>
      <?php }?>
    </td>
    <td>  
      <a id="edit" href="reference3Edit1.php" onclick="return confirm('Are you sure you want to edit?')"><span><i class="fas fa-edit"></i></span>Edit</a>
    </td>
   </tr>

  </table>
</center>-->
       
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
    <!--     <a href="clientProfile1.php" class="circularlinks"><img src="../images/profile.png" style="margin-left: 125px" class="image" alt="" /><h3 style="margin-left: 50px">Profile</h3></a>
        <br> -->
  <!--        <a href="clientBeneficiaries1.php" class="circularlinks"> <img src="../images/list.png" style="margin-left: 200px"  class="image" alt="" /><h3 style="margin-left: 50px;">Beneficiaries</h3></a>
        <br> -->
        <a href="clientReferences1.php" class="circularlinks"> <img src="../images/reference.jpg" style="margin-left: 145px" class="image" alt="" /><h3 style="margin-left: 50px">References</h3></a>
        <br>
<!--         <a href="plan1.php?logout='1'" class="circularlinks" style="visibility: hidden;"> <img src="../images/logout.png" style="margin-left: 132px"  class="image" alt="" /><h3 style="margin-left: 51px">Logout</h3></a>  -->
        <br>
        <br>
        <a href="plan.php"><button class="btn transparent" style="margin-bottom: 100px">Return</button></a>
    </div>
  </div>

    <div class="panel right-panel">
      <div class="content">
      </div>
    </div>
  </body>
</html>
