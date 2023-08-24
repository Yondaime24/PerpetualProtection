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
<html lang="zxx">
<head>
    <title>Perpetual Protection | Update Plan Type & Payment Mode</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../images/logo.png">
    <link rel="icon" type="image/png" href="../images/logo.png">

    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    
    <link href="../asset/customizedCss/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="../asset/customizedCss/restyle2.css" type="text/css" rel="stylesheet" media="all">
    <link href="../asset/customizedCss/webstyle4.css" type="text/css" rel="stylesheet" media="all">
    <link href="../asset/customizedCss/svg.css" type="text/css" rel="stylesheet" media="all">
    <link href="../asset/customizedCss/eye.css" type="text/css" rel="stylesheet" media="all">
    <link href="../asset/customizedCss/social_media.css" type="text/css" rel="stylesheet" media="all">
    <link href="../asset/customizedCss/update.css" type="text/css" rel="stylesheet" media="all">
    <link href="../asset/customizedCss/title2.css" type="text/css" rel="stylesheet" media="all">
    <link href="../asset/customizedCss/error.css" type="text/css" rel="stylesheet" media="all">
    <link href="../asset/customizedCss/t2.css" type="text/css" rel="stylesheet" media="all">
    <link href="../asset/customizedCss/wtf.css" type="text/css" rel="stylesheet" media="all">
    <link href="../asset/customizedCss/services3.css" type="text/css" rel="stylesheet" media="all">
    <link href="../asset/css/all.css" type="text/css" rel="stylesheet" media="all">
    <link href="../asset/customizedCss/timeline3.css" type="text/css" rel="stylesheet" media="all">
    <link href="../asset/customizedCss/hover.css" type="text/css" rel="stylesheet" media="all">
    <link href="../asset/customizedCss/linkhover.css" type="text/css" rel="stylesheet" media="all">
    <link href="../asset/customizedCss/footer2.css" type="text/css" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="../asset/customizedCss/drop10.css">
    <!-- <link href="asset/customizedCss/validation3.css" type="text/css" rel="stylesheet" media="all"> -->

    <style>
      body{
        background: linear-gradient(135deg, #fff, #3498db);
      }
    </style>

</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark bg-transparent">
  <div class="container-fluid">
    <a class="navbar-brand" id="title" href="#" style="margin-top: 5px;">Perpetual</a>
    <a class="navbar-brand" id="title2" href="#" style="margin-top: 2px; margin-left: 18px">Protection</a>
  
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0"></ul>

    <a class="nav-links scroll" style="position: absolute; bottom: 10px; right: 115px;"  href="#services" >Services</a>
    <a class="nav-links" style="position: absolute; bottom: 10px; right: 10px;"  href="plan.php?logout='1'" onClick="return confirm('Are you sure you want to logout?' )">Logout</a>

    </div>
  </div>
</nav>

           <?php
                      $client_id=$_SESSION['plan']['client_id'];
                      $query = "SELECT * FROM clients WHERE client_id='$client_id'";
                      $result = mysqli_query($db,$query);
                      while($res = mysqli_fetch_array($result)) {  
                    ?>

         <section class="contact" id="contact">
            <div class="content" style="position: absolute; top: 20px;">
              <a style="font-size: 30px; color: #000">Update Plan Type & Payment Mode</a>
            </div>
            <div class="container" style="position: absolute; top: 80px;">
              <div class="contactForm" style="border: solid 1px black;">
                <form class="" id="updatePlan" action="updatePlan.php" method="post" onsubmit="return checkInputs()" enctype="multipart/form-data">
                  <a href="plan.php" style="width: 32px;"><img src="../images/back_Arrow.png" width="30px"></a>
                    <br><br>
                    <div class="input-box" hidden="">
                      <input type="text" value="<?php echo $_SESSION['plan']['client_id']; ?>" name="client_id" required>
                    </div>
                    <div class="input-box" style="margin-left: 30px;">
                      <select name="plan_type" id="plan_type">
                        <option value="Plan 1" <?php if ($res['plan_type']=='Plan 1') { echo "selected"; }?> >Plan 1</option>
                        <option value="Plan 2" <?php if ($res['plan_type']=='Plan 2') { echo "selected"; }?>>Plan 2</option>
                        <option value="Plan 3" <?php if ($res['plan_type']=='Plan 3') { echo "selected"; }?>>Plan 3</option>
                        <option value="Plan 4" <?php if ($res['plan_type']=='Plan 4') { echo "selected"; }?>>Plan 4</option>
                      </select>
                       <span style="position: absolute; top: 100px; right: 505px;">Change Plan Type</span>
                    </div>
                    <br><br>
                    <div class="input-box" style="margin-left: 32px;">
                      <select name="payment_mode" id="payment_mode">
                        <option value="Monthly" <?php if ($res['payment_mode']=='Monthly') { echo "selected"; }?>>Monthly</option>
                        <option value="Quarterly" <?php if ($res['payment_mode']=='Quarterly') { echo "selected"; }?>>Quarterly</option>
                        <option value="Semi-Annual" <?php if ($res['payment_mode']=='Semi-Annual') { echo "selected"; }?>>Semi-Annual</option>
                        <option value="Annual" <?php if ($res['payment_mode']=='Annual') { echo "selected"; }?>>Annual</option>
                        <option value="Lumpsum" <?php if ($res['payment_mode']=='Lumpsum') { echo "selected"; }?>>Lumpsum</option>
                      </select>
                       <span style="position: absolute; top: 200px; right: 475px;">Change Mode of Payment</span>
                    </div>
                    <br>
                  <div class="inputBox">
                    <input type="submit" value="Update" name="updatePlan" id="submit">
                  </div>
                </form>
              </div>
            </div>
        </section>
        <?php } ?>

    <!-- services -->
    <h1 style="margin-top: 550px; position: absolute; color: transparent;" id="services">services</h1>
    <div class="more-services py-lg-5">
        <div class="container pt-sm-5" >
            <div class="row grid pt-sm-5">
           <div class="content services-title">
              <a>Services</a>
              <p>Perpetual Protection, Insurance Agency Payment Website</p>
            </div>
                <div class="figure-1 col-lg-3 col-6">
                    <figure class="effect-layla">
                    <img src="../images/p1.jpg" alt="img" class="img-fluid"/>
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
                        <img src="../images/p2.jpg" alt="img" class="img-fluid" />
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
                        <img src="../images/p3.jpg" alt="img" class="img-fluid" />
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
                        <img src="../images/p4.jpg" alt="img" class="img-fluid" />
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
                    <div style="position: absolute; left: 495px; top: 20px; background: #3498db; border-radius: 50px;">
                     <a style="font-size: 50px; color: #fff; pointer-events: none;">Plan 1</a>
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
                    <div style="position: absolute; left: 495px; top: 20px; background: #3498db; border-radius: 50px;">
                     <a style="font-size: 50px; color: #fff; pointer-events: none;">Plan 2</a>
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
                    <div style="position: absolute; left: 495px; top: 20px; background: #3498db; border-radius: 50px;">
                     <a style="font-size: 50px; color: #fff; pointer-events: none;">Plan 3</a>
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
                    <div style="position: absolute; left: 495px; top: 20px; background: #3498db; border-radius: 50px;">
                     <a style="font-size: 50px; color: #fff; pointer-events: none;">Plan 4</a>
                    </div>
                     <a class="scroll linkhover" style="color: #000; width: 150px; margin: 0 auto" href="#services">Return to Services</a>
                </div>
            </div>
        </div>
    </div>

    <div class="cpy-right">
       <a style="pointer-events: none;"><img src="../images/logo.png" width="50px"></a>
        <p style="color: #000">&copy; <script>document.write(new Date().getFullYear())</script> Perpetual Protection, Insurance Agency Payment Website
        </p>
    </div>
    <!-- js -->
    <script type="text/javascript" src="../asset/js/main.js"></script>
    <script src="../asset/js/jquery-2.2.3.min.js"></script>
    <!-- //js -->
    <!-- testimonials  Responsiveslides -->
    <script src="../asset/js/responsiveslides.min.js"></script>
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
    <script src="../asset/js/move-top.js"></script>
    <script src="../asset/js/easing.js"></script>
    
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
    <script src="../asset/js/SmoothScroll.min.js"></script>
    <!-- //smooth-scrolling-of-move-up -->
    <script src="../asset/js/counter.js"></script>
    <!-- //stats -->
    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../asset/js/bootstrap.js"></script>

</body>

</html>