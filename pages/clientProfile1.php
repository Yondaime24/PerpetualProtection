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
<html lang = "en">
<head>

    <link rel="apple-touch-icon" sizes="76x76" href="images/insurance_icon.png">
    <link rel="icon" type="image/png" href="../images/logo.png">
    <title>Perpetual Protection | Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <link rel="stylesheet" type="text/css" href="../asset/css/all.css">
  <link rel="stylesheet" type="text/css" href="../asset/customizedCss/clientStyle3.css">
  <link rel="stylesheet" type="text/css" href="../asset/customizedCss/circularlinks.css">
  <link rel="stylesheet" type="text/css" href="../asset/customizedCss/weblogo.css">
  <link rel="stylesheet" type="text/css" href="../asset/customizedCss/table.css">
  <link rel="stylesheet" type="text/css" href="../asset/customizedCss/dropdown7.css">
  <link rel="stylesheet" type="text/css" href="../asset/customizedCss/info8.css">
  <link rel="stylesheet" type="text/css" href="../asset/customizedCss/timelineDesign.css">
  <link rel="stylesheet" type="text/css" href="../asset/customizedCss/settings.css">
  
</head>
  <body>
   
<!--  <div class="container" style="background: url(../images/profile_background2.png); background-repeat: no-repeat;background-position: 500px; background-size: cover;"> -->
  <div class="container" style="background: url(../images/log.svg); background-repeat: no-repeat;background-position: 1080px; background-size: cover;">
  <div class="forms-container"  style="background: url(../images/log.svg); background-repeat: no-repeat;background-position: -620px; background-size: cover;">

    <div class="signin-signup">
      <form action="#" class="sign-in-form">

<div class="scroll">
  <div class="main-timeline2">
      <div class="timeline">
       <div class="dropdown">
       <a href="beneficiary1Edit1.php" onclick="return confirm('Are you sure you want to edit beneficiary 1?')" id="icon" class="icon fa fa-edit"></a>
     </div>
           <a href="#" id="a1" class="timeline-content" style="color: #000">
                 <center>
                   <?php
                      $client_id=$_SESSION['plan']['client_id'];
                      $query = "SELECT * FROM clients WHERE client_id='$client_id'";
                      $result = mysqli_query($db,$query);
                      while($res = mysqli_fetch_array($result)) {  
                    ?>
                      <?php if($res['photo'] != ""): ?>
                      <img width="120" style="border-radius: 60px" src="../images/<?php echo $res['photo']; ?>" alt="First slide">
                      <?php else: ?>
                      <img width="120" style="border-radius: 60px" src="../images/profile.png">
                      <?php endif; ?>
                   
                    <h2><?php echo $res['fname'];?> <?php echo $res['mname'];?> <?php echo $res['lname'];?></h2>
                 </center>
          </a>
           <a href="#" id="a1" class="timeline-content" style="background: #3498db; color: #000">
           <div class="box a"><h3><i class="fas fa-child"></i> Age</h3></div>
           <center><h3><?php echo $res['age'];?></h3></center>
          </a>
           <a href="#" id="a1" class="timeline-content" style="color: #000">
           <div class="box a"><h3><i class="fas fa-birthday-cake"></i> Birthday</h3></div>
           <center><h3><?php echo date('F j, Y',strtotime($res['birthday']));?></h3></center>
          </a>
           <a href="#" id="a1" class="timeline-content" style="background: #3498db; color: #000">
           <div class="box a"><h3><i class="fas fa-map"></i> Birthplace</h3></div>
           <center><h3><?php echo $res['place_of_birth'];?></h3></center>
          </a>
          </a>
           <a href="#" id="a1" class="timeline-content" style="color: #000">
           <div class="box a"><h3><i class="fas fa-venus-mars"></i> Gender</h3></div>
           <center><h3><?php echo $res['gender'];?></h3></center>
          </a>
           <a href="#" id="a1" class="timeline-content" style="background: #3498db; color: #000">
           <div class="box a"><h3><i class="fas fa-text-height"></i> Height</h3></div>
           <center><h3><?php echo $res['height'];?>cm</h3></center>
          </a>
          <a href="#" id="a1" class="timeline-content" style="color: #000">
           <div class="box a"><h3><i class="fas fa-weight"></i> Weight</h3></div>
           <center><h3><?php echo $res['weight'];?>lb</h3></center>
          </a>
          <a href="#" id="a1" class="timeline-content" style="background: #3498db; color: #000">
           <div class="box a"><h3><i class="fas fa-briefcase"></i> Occupation</h3></div>
           <center><h3><?php echo $res['occupation'];?></h3></center>
          </a>
          <a href="#" id="a1" class="timeline-content" style="color: #000">
           <div class="box a"><h3><i class="fas fa-heart"></i> Civil Status</h3></div>
           <center><h3><?php echo $res['civil_status'];?></h3></center>
          </a>
           <a href="#" id="a1" class="timeline-content" style="background: #3498db; color: #000">
           <div class="box a"><h3><i class="fas fa-phone"></i> Contact Number</h3></div>
           <center><h3><?php echo $res['contact_number'];?></h3></center>
          </a>
          <a href="#" id="a1" class="timeline-content" style="color: #000">
           <div class="box a"><h3><i class="fas fa-envelope"></i> Email Address</h3></div>
           <center><h3><?php echo $res['email_address'];?></h3></center>
          </a>
          <a href="#" id="a1" class="timeline-content" style="background: #3498db; color: #000">
           <div class="box a"><h3><i class="fas fa-map-marker"></i> Residential Address</h3></div>
           <center><h3><?php echo $res['residential_address'];?></h3></center>
          </a>
           <a href="#" id="a1" class="timeline-content" style="color: #000">
           <div class="box a"><h3><i class="fas fa-user"></i> Username</h3></div>
           <center><h3><?php echo $res['username'];?></h3></center>
          </a>

          <a href="#" id="a1" class="timeline-content" style="background: #3498db; color: #000">
           <div class="box a"><h3><i class="fas fa-calendar"></i> Registered at</h3></div>
               <center><h3><?php echo date('F j, Y / g:i a',strtotime($res['date_registered'])); ?></h3></center>
          </a>
     <?php } ?>
      </div>
  </div>

<div class="dropdown">
       <a class="nav-links" href="#" ><i class="fas fa-cog fa-lg"></i></a>
        <div class="dropdown-content">

      <a style="color: #4481eb;" href="clientEdit1.php?client_id=<?php echo $_SESSION['plan']['client_id']; ?>"onClick="return confirm('Are you sure you want to edit your info?')"><span style="color: #4481eb; "><i class="fas fa-edit"></i></span>Edit</a>

      <a style="color: #4481eb;" href="clientPictureEdit1.php?client_id=<?php echo $_SESSION['plan']['client_id']; ?>"onClick="return confirm('Are you sure you want to edit your profile picture?')"><span style="color: #4481eb; "><i class="fas fa-user"></i></span>Change Photo</a>

      <a style="color: #4481eb;" href="changeEmail.php?client_id=<?php echo $_SESSION['plan']['client_id']; ?>"onClick="return confirm('Are you sure you want to change email address?' )"><span style="color: #4481eb; "><i class="fas fa-envelope"></i></span>Change Email</a>

      <a style="color: #4481eb; " href="clientPassUsernameEdit1.php?client_id=<?php echo $_SESSION['plan']['client_id']; ?>"onClick="return confirm('Change Password?' )"><span style="color: #4481eb; "><i class="fas fa-lock"></i></span>Change Password</a>

        </div>
      </div>
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
            <a href="clientProfile1.php" class="circularlinks"><img src="../images/profile.png" style="margin-left: 125px" class="image" alt="" /><h3 style="margin-left: 50px">Profile</h3></a>
            <br>
    <!--          <a href="clientBeneficiaries1.php" class="circularlinks"> <img src="../images/list.png" style="margin-left: 200px"  class="image" alt="" /><h3 style="margin-left: 50px;">Beneficiaries</h3></a>
            <br> -->
          <!--   <a href="clientRequest1.php" class="circularlinks" style="visibility: hidden;"> <img src="../images/payment.png" style="margin-left: 145px" class="image" alt="" /><h3 style="margin-left: 50px">Request</h3></a>
            <br>
            <a href="plan1.php?logout='1'" class="circularlinks" style="visibility: hidden;"> <img src="../images/logout.png" style="margin-left: 132px"  class="image" alt="" /><h3 style="margin-left: 51px">Logout</h3></a> -->
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

