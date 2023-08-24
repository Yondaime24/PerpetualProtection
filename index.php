<?php 
  include('functions/functions.php');

  if (isset($_POST['contact_btn'])) {

  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $contact_number = $_POST['contact_number'];
  $message = $_POST['message'];

  $query = "INSERT INTO `contact_us`(`fullname`, `email`, `contact_number`, `message`, `status`, `date`) VALUES ('$fullname','$email','$contact_number','$message', 'unread', CURRENT_TIMESTAMP)";

  $result = mysqli_query($db, $query);

  if ($result) {

    echo "<script>alert('Your message has been sent!')</script>";
    echo "<script>window.open('index.php','_self')</script>";
    
  }else{

  }

}

?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Perpetual Protection | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="images/logo.png">
    <link rel="icon" type="image/png" href="images/logo.png">

    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    
    <link href="asset/customizedCss/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="asset/customizedCss/restyle2.css" type="text/css" rel="stylesheet" media="all">
    <link href="asset/customizedCss/webstyle4.css" type="text/css" rel="stylesheet" media="all">
    <link href="asset/customizedCss/svg.css" type="text/css" rel="stylesheet" media="all">
    <link href="asset/customizedCss/eye.css" type="text/css" rel="stylesheet" media="all">
    <link href="asset/customizedCss/social_media.css" type="text/css" rel="stylesheet" media="all">
    <link href="asset/customizedCss/contact.css" type="text/css" rel="stylesheet" media="all">
    <link href="asset/customizedCss/title2.css" type="text/css" rel="stylesheet" media="all">
    <link href="asset/customizedCss/error.css" type="text/css" rel="stylesheet" media="all">
    <link href="asset/customizedCss/t2.css" type="text/css" rel="stylesheet" media="all">
    <link href="asset/customizedCss/wtf.css" type="text/css" rel="stylesheet" media="all">
    <link href="asset/customizedCss/services3.css" type="text/css" rel="stylesheet" media="all">
    <link href="asset/css/all.css" type="text/css" rel="stylesheet" media="all">
    <link href="asset/customizedCss/timeline3.css" type="text/css" rel="stylesheet" media="all">
    <link href="asset/customizedCss/hover.css" type="text/css" rel="stylesheet" media="all">
    <link href="asset/customizedCss/linkhover.css" type="text/css" rel="stylesheet" media="all">
    <link href="asset/customizedCss/footer2.css" type="text/css" rel="stylesheet" media="all">
    <!-- <link href="asset/customizedCss/validation3.css" type="text/css" rel="stylesheet" media="all"> -->

</head>

<body>

  <nav class="navbar navbar-expand-md navbar-dark bg-transparent">
  <div class="container-fluid">
    <a class="navbar-brand" id="title" href="#" style="margin-top: 5px;">Perpetual</a>
    <a class="navbar-brand" id="title2" href="#" style="margin-top: 2px; margin-left: 18px">Protection</a>
  
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0"></ul>

    <a class="nav-links scroll" style="position: absolute; bottom: 10px; right: 230px;" href="#services" >Services</a>
    <a class="nav-links scroll" style="position: absolute; bottom: 10px; right: 115px;" href="#contact" >Contact</a>
    <a class="nav-links scroll" style="position: absolute; bottom: 10px; right: 10px;"  href="#about" >About</a>

    </div>
  </div>
</nav>

  <img class="wave" src="images/wave.png">
  <h2 class="t2"  style="color: #ffffff;">PERPETUAL</h2>
  <h2 class="t3"  style="color: #ffffff;">PROTECTION</h2>

    <div class="login-container">
    <div class="img" style="position: absolute; left: 150px; top: 116px;">
      <img src="images/undraw_personal_finance_tqcd.svg" style="margin-left: 35px">
    </div>
  <div class="login-content" style="position: absolute; right: 200px; top: 105px;">

    <div style="position: absolute; bottom: 480px; right: 30px; width: 300px">
       <?php 
       echo display_error();
       ?>
    </div>

      <form method="post" action="index.php">
 
        <img class="image" src="images/logo.png">
              <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-user"></i>
                 </div>
                 <div class="div">
                      <h5>Username</h5>
                    <input type="text" class="input" name="username" autocomplete="off">
                 </div>
              </div>
              <div class="input-div pass">
                 <div class="i"> 
                    <i class="fas fa-lock"></i>
                 </div>
                 <div class="div">
                    <h5>Password</h5>
                    <input type="password" id="password" class="input" name="password" autocomplete="off">
                    <span><i class="fas fa-eye" id="eye" onclick="toggle()"></i></span>
                 </div>
              </div>
              <br>
      <p>Not yet a member? 
      <a href="pages/register.php">Sign up</a>
      <a href="pages/forgotPass.php">Forgot Password?</a>
      </p>
              <!-- <a href="#">Forgot Password?</a> -->
              <input type="submit" class="btn btn-info" name="login_btn" value="Login">

            </form>
        </div>
    </div>
    <!-- services -->
    <div class="more-services py-lg-5">
        <div class="container pt-sm-5" id="services">
            <div class="row grid pt-sm-5" style="margin-top: 100px">
           <div class="content services-title">
              <a>Services</a>
              <p>Perpetual Protection, Insurance Agency Payment Website</p>
            </div>
                <div class="figure-1 col-lg-3 col-6">
                    <figure class="effect-layla">
                    <img src="images/p1.jpg" alt="img" class="img-fluid"/>
                     <a href="#plan1" class="scroll">
                         <figcaption>
                            <h4>Plan 1</h4>
                            <p>Contract Price</p>
                            <p>&#8369;15,000.00</p>
                        </figcaption></a>
                    </figure>
                </div>
                <div class="col-lg-3 col-6">
                    <figure class="effect-layla">
                        <img src="images/p2.jpg" alt="img" class="img-fluid" />
                        <a href="#plan2" class="scroll">
                         <figcaption>
                            <h4>Plan 2</h4>
                            <p>Contract Price</p>
                            <p>&#8369;21,000.00</p>
                        </figcaption></a>
                    </figure>
                </div>
                <div class="col-lg-3 col-6">
                   <figure class="effect-layla">
                        <img src="images/p3.jpg" alt="img" class="img-fluid" />
                        <a href="#plan3" class="scroll">
                        <figcaption>
                            <h4>Plan 3</h4>
                            <p>Contract Price</p>
                            <p>&#8369;27,000.00</p>
                        </figcaption></a>
                    </figure>
                </div>
                <div class="col-lg-3 col-6">
                     <figure class="effect-layla">
                        <img src="images/p4.jpg" alt="img" class="img-fluid" />
                        <a href="#plan4" class="scroll">
                        <figcaption>
                            <h4>Plan 4</h4>
                            <p>Contract Price</p>
                            <p>&#8369;45,000.00</p>
                        </figcaption></a>
                    </figure>
                </div>
            </div>
        </div>
    </div>
<!--     plan info's -->
    <h4 id="plan1" style="position: absolute; left: 640px; top: 1360px; color: #ffffff00">space</h4>
    <div class="agile-works py-5">
        <div class="container py-lg-5">
            <div class="row py-md-5 pt-5">
                <div class="col-md-12">
                    <div class="main-timeline2">
                        <div class="timeline">
                            <span class="icon fa fa-briefcase" style="pointer-events: none;"></span>
                            <a href="#" id="a1" class="timeline-content">
                                <h3 class="title">MODE OF PAYMENT</h3>
                                    <table class="table table-condensed table-striped">
                                    <tr>
                                          <td>Monthly 250.00</td>
                                    </tr>
                                    <tr>
                                          <td>Quarterly 745.00</td>
                                    </tr>
                                    <tr>
                                          <td>Semi-Annual 1,470.00</td>
                                    </tr>
                                     <tr>
                                          <td>Annual 2,910.00</td>
                                    </tr>
                                     <tr>
                                          <td>Lump-Sum 14,250.00</td>
                                    </tr>
                                </table>
                                <a class="btn btn-lg btn-info btn-end" href="pages/register.php">Sign up</a>
                            </a>
                        </div>
                        <div class="timeline">
                            <span class="icon fa fa-mobile" style="pointer-events: none;"></span>
                            <a href="#" id="a1" class="timeline-content">
                                <h3 class="title">BENEFITS AND PREVILEGES</h3>
                                <table class="table table-condensed table-striped">
                                    <tr style="line-height: 14px;">
                                        <td>Hospital income benefit (Maximum of 15 days) 150/day</td>
                                    </tr >
                                     <tr style="line-height: 14px;">
                                        <td>Damage to properties due to earthquake 2,000.00</td>
                                    </tr>
                                     <tr style="line-height: 14px;">
                                        <td>Damage to properties due to fire or lightning 5,000.00</td>
                                    </tr>
                                     <tr style="line-height: 14px;">
                                        <td>Medical Reimbursement (Due to Accident Only) 5,000.00</td>
                                    </tr>
                                     <tr style="line-height: 14px;">
                                        <td>Death due to accident (1 month observation period) 50,000.00</td>
                                    </tr>
                                     <tr style="line-height: 14px;">
                                        <td>Cash burial assistance (6 months contentstability period) 10,000.00</td>
                                    </tr>
                                     <tr style="line-height: 14px;">
                                        <td>Bereavement assistance for death due to causes other than accident 1,000.00</td>
                                    </tr>                                                                        
                                </table>
                            </a>
                        </div>
                    </div>
                    <div style="position: absolute; left: 500px; top: 20px; background: #fff; border-radius: 50px;">
                     <a style="font-size: 50px; color: #3498db; pointer-events: none;">Plan 1</a>
                    </div>
                     <a class="scroll linkhover" style="color: #000; width: 150px; margin: 0 auto" href="#services">Return to Services</a>
                </div>
            </div>
        </div>
    </div>
    <!-- //how it works -->

    <!--     plan info's -->
 <h4 id="plan2" style="position: absolute; left: 640px; top: 2293px; color: #ffffff00">space</h4>
    <div class="agile-works py-5">
        <div class="container py-lg-5">
            <div class="row py-md-5 pt-5">
                <div class="col-md-12">
                    <div class="main-timeline2">
                        <div class="timeline">
                            <span class="icon fa fa-globe" style="pointer-events: none;"></span>
                            <a href="#" id="a1" class="timeline-content">
                                <h3 class="title">MODE OF PAYMENT</h3>
                                    <table class="table table-condensed table-striped">
                                    <tr>
                                          <td class="text-center">Monthly 350.00</td>
                                    <tr>
                                          <td class="text-center">Quarterly 1,040.00</td>
                                    </tr>
                                    <tr>
                                          <td class="text-center">Semi-Annual 2,058.00</td>
                                    </tr>
                                     <tr>
                                          <td class="text-center">Annual 4,075.00</td>
                                    </tr>
                                     <tr>
                                          <td class="text-center">Lump-Sum 19,950.00</td>
                                    </tr>
                                </table>
                                <a class="btn btn-lg btn-info btn-end" href="pages/register.php">Sign up</a>
                            </a>
                        </div>
                        <div class="timeline">
                            <span class="icon fa fa-rocket" style="pointer-events: none;"></span>
                            <a href="#" id="a1" class="timeline-content">
                                <h3 class="title">BENEFITS AND PREVILEGES</h3>
                                <table class="table table-condensed table-striped">
                                    <tr style="line-height: 14px;">
                                        <td>Hospital income benefit (Maximum of 15 days) 200/day</td>
                                    </tr >
                                     <tr style="line-height: 14px;">
                                        <td>Damage to properties due to earthquake 2,500.00</td>
                                    </tr>
                                     <tr style="line-height: 14px;">
                                        <td>Damage to properties due to fire or lightning 10,000.00</td>
                                    </tr>
                                     <tr style="line-height: 14px;">
                                        <td>Medical Reimbursement (Due to Accident Only) 5,000.00</td>
                                    </tr>
                                     <tr style="line-height: 14px;">
                                        <td>Death due to accident (1 month observation period) 75,000.00</td>
                                    </tr>
                                     <tr style="line-height: 14px;">
                                        <td>Cash burial assistance (6 months contentstability period) 12,500.00</td>
                                    </tr>
                                     <tr style="line-height: 14px;">
                                        <td>Bereavement assistance for death due to causes other than accident 1,500.00</td>
                                    </tr>                                                                        
                                </table>
                            </a>
                        </div>
                    </div>
                    <div style="position: absolute; left: 500px; top: 20px; background: #fff; border-radius: 50px;">
                     <a style="font-size: 50px; color: #3498db; pointer-events: none;">Plan 2</a>
                    </div>
                     <a class="scroll linkhover" style="color: #000; width: 150px; margin: 0 auto" href="#services">Return to Services</a>
                </div>
            </div>
        </div>
    </div>
    <!-- //how it works -->

     <!--     plan info's -->
 <h4 id="plan3" style="position: absolute; left: 640px; top: 3226px; color: #ffffff00">space</h4>
    <div class="agile-works py-5">
        <div class="container py-lg-5">
            <div class="row py-md-5 pt-5">
                <div class="col-md-12">
                    <div class="main-timeline2">
                        <div class="timeline">
                            <span class="icon fa fa-briefcase" style="pointer-events: none;"></span>
                            <a href="#" id="a1" class="timeline-content">
                                <h3 class="title">MODE OF PAYMENT</h3>
                                    <table class="table table-condensed table-striped">
                                    <tr>
                                          <td class="text-center">Monthly 450.00</td>
                                    </tr>
                                    <tr>
                                          <td class="text-center">Quarterly 1,340.00</td>
                                    </tr>
                                    <tr>
                                          <td class="text-center">Semi-Annual 2,646.00</td>
                                    </tr>
                                     <tr>
                                          <td class="text-center">Annual 5,238.00</td>
                                    </tr>
                                     <tr>
                                          <td class="text-center">Lump-Sum 25,650.00</td>
                                    </tr>
                                </table>
                                <a class="btn btn-lg btn-info btn-end" href="pages/register.php">Sign up</a>
                            </a>
                        </div>
                        <div class="timeline">
                            <span class="icon fa fa-mobile" style="pointer-events: none;"></span>
                            <a href="#" id="a1" class="timeline-content">
                                <h3 class="title">BENEFITS AND PREVILEGES</h3>
                                <table class="table table-condensed table-striped">
                                    <tr style="line-height: 14px;">
                                        <td>Hospital income benefit (Maximum of 15 days) 250/day</td>
                                    </tr >
                                     <tr style="line-height: 14px;">
                                        <td>Damage to properties due to earthquake 3,000.00</td>
                                    </tr>
                                     <tr style="line-height: 14px;">
                                        <td>Damage to properties due to fire or lightning 15,000.00</td>
                                    </tr>
                                     <tr style="line-height: 14px;">
                                        <td>Medical Reimbursement (Due to Accident Only) 5,000.00</td>
                                    </tr>
                                     <tr style="line-height: 14px;">
                                        <td>Death due to accident (1 month observation period) 100,000.00</td>
                                    </tr>
                                     <tr style="line-height: 14px;">
                                        <td>Cash burial assistance (6 months contentstability period) 15,000.00</td>
                                    </tr>
                                     <tr style="line-height: 14px;">
                                        <td>Bereavement assistance for death due to causes other than accident 2,000.00</td>
                                    </tr>                                                                        
                                </table>
                            </a>
                        </div>
                    </div>
                    <div style="position: absolute; left: 500px; top: 20px; background: #fff; border-radius: 50px;">
                     <a style="font-size: 50px; color: #3498db; pointer-events: none;">Plan 3</a>
                    </div>
                     <a class="scroll linkhover" style="color: #000; width: 150px; margin: 0 auto" href="#services">Return to Services</a>
                </div>
            </div>
        </div>
    </div>
    <!-- //how it works -->

     <!--     plan info's -->
 <h4 id="plan4" style="position: absolute; left: 640px; top: 4160px; color: #ffffff00">space</h4>
    <div class="agile-works py-5">
        <div class="container py-lg-5">
            <div class="row py-md-5 pt-5">
                <div class="col-md-12">
                    <div class="main-timeline2">
                        <div class="timeline">
                            <span class="icon fa fa-globe" style="pointer-events: none;"></span>
                            <a href="#" id="a1" class="timeline-content">
                                <h3 class="title">MODE OF PAYMENT</h3>
                                    <table class="table table-condensed table-striped">
                                    <tr>
                                          <td class="text-center">Monthly 750.00</td>
                                    </tr>
                                    <tr>
                                          <td class="text-center">Quarterly 2,230.00</td>
                                    </tr>
                                    <tr>
                                          <td class="text-center">Semi-Annual 4,410.00</td>
                                    </tr>
                                     <tr>
                                          <td class="text-center">Annual 8,730.00</td>
                                    </tr>
                                     <tr>
                                          <td class="text-center">Lump-Sum 42,750.00</td>
                                    </tr>
                                </table>
                                <a class="btn btn-lg btn-info btn-end" href="pages/register.php">Sign up</a>
                            </a>
                        </div>
                        <div class="timeline">
                            <span class="icon fa fa-rocket" style="pointer-events: none;"></span>
                            <a href="#" id="a1" class="timeline-content">
                                <h3 class="title">BENEFITS AND PREVILEGES</h3>
                                <table class="table table-condensed table-striped">
                                    <tr style="line-height: 14px;">
                                        <td>Hospital income benefit (Maximum of 15 days) 300/day</td>
                                    </tr >
                                     <tr style="line-height: 14px;">
                                        <td>Damage to properties due to earthquake 3,500.00</td>
                                    </tr>
                                     <tr style="line-height: 14px;">
                                        <td>Damage to properties due to fire or lightning 20,000.00</td>
                                    </tr>
                                     <tr style="line-height: 14px;">
                                        <td>Medical Reimbursement (Due to Accident Only) 5,000.00</td>
                                    </tr>
                                     <tr style="line-height: 14px;">
                                        <td>Death due to accident (1 month observation period) 150,000.00</td>
                                    </tr>
                                     <tr style="line-height: 14px;">
                                        <td>Cash burial assistance (6 months contentstability period) 25,000.00</td>
                                    </tr>
                                     <tr style="line-height: 14px;">
                                        <td>Bereavement assistance for death due to causes other than accident 2,500.00</td>
                                    </tr>                                                                        
                                </table>
                            </a>
                        </div>
                    </div>
                    <div style="position: absolute; left: 500px; top: 20px; background: #fff; border-radius: 50px;">
                     <a style="font-size: 50px; color: #3498db; pointer-events: none;">Plan 4</a>
                    </div>
                     <a class="scroll linkhover" style="color: #000; width: 150px; margin: 0 auto" href="#services">Return to Services</a>
                </div>
            </div>
        </div>
    </div>
    <!-- //how it works -->


<!--     <section class="contact" id="contact" style="background: url(images/contact_us.jpg); height: 100%; background-position: center; background-repeat: no-repeat; background-size: cover;"> -->
          <section class="contact" id="contact">
            <div class="content" style="position: absolute; top: 20px;">
              <a style="font-size: 40px; color: #000">Contact Us</a>
              <p style="color: #000">Perpetual Protection, Insurance Agency Payment Website</p>
            </div>
            <div class="container" style="position: absolute; top: 80px;">
              <div class="contactInfo" style="position: absolute; left: 100px; top: 70px;">
                <div class="box" style="margin-bottom: 20px">
                  <div class="icon" style="border: solid 2px black;"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                    <div class="text">
                      <h3>Address</h3>
                      <p style="color: #000">Sulpicio Falcon St.(Sitio Polba), Pooc Oriental, Tubigon, Bohol</p>
                  </div>
                </div>
                <div class="box" style="margin-bottom: 20px">
                  <div class="icon" style="border: solid 2px black;"><i class="fa fa-phone" aria-hidden="true"></i></div>
                  <div class="text">
                    <h3>Phone</h3>
                    <p style="color: #000">+639175870524 / 02-500-0824</p>
                  </div>
                </div>
               <div class="box" style="margin-bottom: 20px">
                  <div class="icon" style="border: solid 2px black;"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                  <div class="text">
                    <h3>Email</h3>
                    <p style="color: #000">perpetualprotectionofficial@gmail.com</p>
                  </div>
                </div>
              <p class="social-text" style="color: #000">Or connect with us:</p>
              <div class="social-media" style="position: absolute; bottom: 0px; top: 335px;">
              <a href="#" class="social-icon" style="background: #fff">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon" style="background: #fff">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon" style="background: #fff">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon" style="background: #fff">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
              </div>
              <div class="contactForm" style="position: absolute; right: 80px; top: 40px; border: solid 2px black;">
                <form class="" action="index.php" method="post" enctype="multipart/form-data">
                  <h2>Send Message</h2>
                  <div class="inputBox">
                    <input type="text" name="fullname" required="required" autocomplete="off">
                    <span>Full Name</span>
                  </div>
                  <div class="inputBox">
                    <input type="Email" name="email" required="required" autocomplete="off">
                    <span>Email</span>
                  </div>
                  <div class="inputBox">
                    <input type="number" name="contact_number" required="required" autocomplete="off">
                    <span>Contact Number</span>
                  </div>
                  <div class="inputBox">
                    <textarea required="required" name="message" autocomplete="off"></textarea>
                    <span>Type your Message...</span>
                  </div>
                  <div class="inputBox">
                    <input type="submit" value="Send" name="contact_btn">
                  </div>
                </form>
              </div>
            </div>
        </section>


    <section class="contact">
        <div class="content" style="position: absolute; top: 100px;">
          <a style="font-size: 40px; color: #000;" id="about">About Us</a>
          <p style="color: #000">Perpetual Protection, Insurance Agency Payment Website</p>
        </div>
        <div class="container" style="position: absolute; top: 80px;">
        <img class="image" src="images/logo.png" width="350px" style="position: absolute; left: 50px; top: 120px;">

          <div class="contactForm" style="position: absolute; right: 0px; top: 100px; width: 60%;">
            <a class="navbar-brand" id="title" href="#" style="font-size: 40px;">Perpetual</a>
            <a class="navbar-brand" id="title2" href="#" style="font-size: 40px; margin-left: 120px;">Protection</a>  
           <p style="color: #000; font-size: 20px; text-indent: 70px; text-align: justify;">Is an insurance agency payment website that is well commited, to offer consistent payment method using online transactions. Through the use of PayPal payment methods.</p>
            <p style="color: #000; font-size: 20px; text-indent: 70px; text-align: justify;">We assure that as you create your own account we dont gather any commodities or informations that would harm your own personal informations. And that this informations are only gathered for transaction purposes only and for the insurance agency to collect.</p>
          </div>
        </div>
    </section>

    <!-- //footer -->
    <div class="cpy-right">
       <a style="pointer-events: none;"><img src="images/logo.png" width="50px"></a>
        <p style="color: #000">&copy; <script>document.write(new Date().getFullYear())</script> Perpetual Protection, Insurance Agency Payment Website
        </p>
    </div>
    <!-- js -->
  <script type="text/javascript" src="asset/js/main.js"></script>

  <script>
    var state=false;
    function toggle(){
      if (state) {
        document.getElementById("password").setAttribute("type","password");
        document.getElementById("eye").style.color='#3498db';
        state = false;
      }else{
        document.getElementById("password").setAttribute("type","text");
         document.getElementById("eye").style.color='#2ecc71';
        state = true;
      }
    }
  </script>
    <script src="asset/js/jquery-2.2.3.min.js"></script>
    <!-- //js -->
    <!-- script for password match -->
    <script>
        window.onload = function () {
            document.getElementById("password1").onchange = validatePassword;
            document.getElementById("password2").onchange = validatePassword;
        }

        function validatePassword() {
            var pass2 = document.getElementById("password2").value;
            var pass1 = document.getElementById("password1").value;
            if (pass1 != pass2)
                document.getElementById("password2").setCustomValidity("Passwords Don't Match");
            else
                document.getElementById("password2").setCustomValidity('');
            //empty string means no validation error
        }
    </script>
    <!-- script for password match -->
    <!-- testimonials  Responsiveslides -->
    <script src="asset/js/responsiveslides.min.js"></script>
    <script>
        // You can also use"$(window).load(function() {"
        $(function () {
            // Slideshow 4
            $("#slider3").responsiveSlides({
                auto: true,
                pager: true,
                nav: false,
                speed: 500,
                namespace: "callbacks",
                before: function () {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                    $('.events').append("<li>after event fired.</li>");
                }
            });

        });
    </script>
    <!-- //testimonials  Responsiveslides -->
    <!-- start-smooth-scrolling -->
    <script src="asset/js/move-top.js"></script>
    <script src="asset/js/easing.js"></script>
    
    <script>
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();

                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- //end-smooth-scrolling -->
    <!-- smooth-scrolling-of-move-up -->
    <script>
        $(document).ready(function () {
            /*
            var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
            };
            */
            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <script src="asset/js/SmoothScroll.min.js"></script>
    <!-- //smooth-scrolling-of-move-up -->
    <script src="asset/js/counter.js"></script>
    <!-- //stats -->
    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="asset/js/bootstrap.js"></script>

</body>

</html>