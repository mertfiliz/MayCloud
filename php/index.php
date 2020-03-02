    <?php 
        session_start();
        $host = "localhost";
        $username = "maycloud_usr";
        $password = "";
        $db = "maycloud_db";
    
        $conn = mysqli_connect($host, $username, $password, $db); 

       
        $_SESSION['logged'] = "0";

        // Eğer oturum açık değilse, session sıfırla. 
        if(empty($_SESSION['email'])) {            
            session_destroy();
        }
        else {     
            // Mevcut oturum acıksa profile' e yönlendir. Giriş sayfasını açma.
            echo "<script type='text/javascript'> document.location = 'http://maycloud.space/profile.php'; </script>";
                      
        }

    ?>
<html lang="en">
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta charset="utf-8">
<title>MAY Cloud</title>
<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="MAY Cloud">
<meta name="keywords" content="iLand HTML Template, iLand Landing Page, Landing Page Template">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,500,600,700" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/animate.css">
<!-- Resource style -->
<link rel="stylesheet" href="css/owl.carousel.css">
<link rel="stylesheet" href="css/owl.theme.css">
<link rel="stylesheet" href="css/ionicons.min.css">
<!-- Resource style -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
      <link rel="stylesheet" href="css/style2.css">
</head>
<body>
<script>            
        $(document).ready(function() {
            
            $(".register-button").click(function() {                
                window.location = "http://maycloud.space/register.php";
            })
            
            $(".login-button").click(function() {
                var emailText = $(".login-email").val();
                var passwordText = $(".login-password").val();
                if(emailText == "") {
                    $(".alertMessageEmail").html("Email address cannot be empty!");
                }
                else if(passwordText == "") {
                    $(".alertMessageEmail").html("");
                    $(".alertMessageLogin").html("Password cannot be empty!");
                }
                else {
                    $(".alertMessageEmail").html("");
                    $(".alertMessageLogin").html("");
                    $.ajax({
                        url:"login.php",
                        type:"post",
                        data:{sendEmail:emailText, sendPassword:passwordText},
                        success: function(result) {
                            var loginResult = result;  

                            if(loginResult == 0) {
                                $(".alertMessage").html("Wrong!");
                            }
                            else {                                
                                $(".alertMessage").html("Correct!");

                                $.ajax({
                                    url:"login-validate.php",
                                    type:"post",
                                    data:{loggedEmail:emailText},
                                    success: function(resultLogged) { 
                                        <?php $_SESSION["logged"] = "1"; ?>                                   

                                        var url = "http://maycloud.space/profile.php";
                                        $(location).attr('href',url); 
                                    },
                                }); 

                            } 
                        },
                    });
                }  
            })
            
            $(".close-button").click(function() {
                $(".login-email").val("");
                $(".login-password").val("");
            })
        })        
        </script>

		
		
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">      
                    <div class="modal-body"> 
                       <div class="login-space"></div>
                       <div><label>E-mail: </label></div> 
                       <div class="input-login"><input class="login-input login-email" name="login-email" type="text"></div> 
					   
                       <div class="alertMessageEmail alertMsg"></div> 
                       <div class="login-space"></div>  
                       <div><label>Password: </label></div>            
                       <div class="input-login"><input class="login-input login-password" name="login-password" type="password"></div> 
                       <div class="alertMessageLogin alertMsg"></div> 
                       <div class="login-space"></div> 
                       <div class="login-space"></div>                      

                       <div><button type="button" class="btn btn-secondary close-button" data-dismiss="modal">Close</button></div>
                       <div class="login-btn"><button type="button" class="btn btn-primary login-button">Login</button></div>
                       <div class="alertMessage alertMsg"></div>  
                    </div>
                 </div>
              </div>
         </div>


<div class="wrapper">
  <div class="container">
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container"> 
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand page-scroll" href="#main"><img src="images/logo.png"  alt="iLand" /></a> </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a  href="register.php">Register</a></li>
            <li> <a href="#" class="btn-cta" data-toggle="modal" data-target="#loginModal"><span>Login</span></a></li>
            <li><a class="page-scroll" href="#contact">Contact</a></li>
			
			
			
          </ul>
        </div>
      </div>
    </nav>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid -->
  
  <div class="main app form" id="main"><!-- Main Section-->
    <div class="hero-section">
      <div class="container nopadding">
        <div class="col-md-5"> <img class="img-responsive wow fadeInUp" data-wow-delay="0.1s" src="images/cloud.png" alt="App" /> </div>
        <div class="col-md-7">
          <div class="hero-content">
            <h1 class="wow fadeInUp" data-wow-delay="0.1s">All your files, ready when you are</h1>
            <p class="wow fadeInUp" data-wow-delay="0.2s">Drive starts you off with 15 GB of free Google online storage, so you can keep photos, stories, designs, drawings, recordings, videos – anything. </p>
    
          </div>
        </div>
      </div>
    </div>
    
    <!-- Client Section -->

    <div id="pricing" class="pricing-section text-center">
      <div class="container">
        <div class="col-md-12 col-sm-12 nopadding">
          <div class="pricing-intro">
            <h1 class="wow fadeInUp" data-wow-delay="0s">Easy Pricing Plans</h1>
            <p class="wow fadeInUp" data-wow-delay="0.2s">You can choose a package according to your need </p>
          </div>
          <div class="col-sm-4">
            <div class="table-left wow fadeInUp" data-wow-delay="0.4s">
              <div class="icon"> <i class="ion-ios-paperplane-outline"></i> </div>
              <div class="pricing-details">
                <h2>Starter Plan</h2>
                <span>Free</span>
                <ul>
                  <li>15GB Disk Space</li>

                </ul>
                <button class="btn btn-primary btn-action btn-fill">Get Plan</button>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="table-right table-center wow fadeInUp" data-wow-delay="0.6s">
              <div class="icon"> <i class="ion-ios-analytics-outline"></i> </div>
              <div class="pricing-details">
                <h2>Popular Plan</h2>
                <span>$3.99</span>
              
                <ul>
                  <li>50GB Disk Space</li>

                </ul>
                <button class="btn btn-primary btn-action btn-fill">Buy Now</button>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="table-right wow fadeInUp" data-wow-delay="0.6s">
              <div class="icon"> <i class="ion-ios-color-wand-outline"></i> </div>
              <div class="pricing-details">
                <h2>Premium Plan</h2>
                <span>$9.50</span>
                <ul>
                  <li>150GB Disk Space</li>

                </ul>
                <button class="btn btn-primary btn-action btn-fill">Buy Now</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Subscribe Form -->

    
    <!-- Footer Section -->
    <div class="footer">
      <div class="container">
        <div class="col-md-7"> <img src="images/logo.png"  alt="Image" />
          <p> MAY Cloud </p>
          <div class="footer-text">
            <p> Copyright © 2018 MAY Cloud. All Rights Reserved.</p>
          </div>
        </div>
        <div class="col-md-5">
            <h1>Contact Us</h1>
            <p> Contact our 24/7 customer support if you have any <br class="hidden-xs">
              questions. We'll help you out. </p>
            <a href="mailto:admin@maycloud.space">admin@maycloud.com</a> </div>
        </div>
      </div>
 
    
    <!-- Scroll To Top --> 
    
    <a id="back-top" class="back-to-top page-scroll" href="#main"> <i class="ion-ios-arrow-thin-up"></i> </a> 
    
    <!-- Scroll To Top Ends--> 
    
  </div>
  <!-- Main Section --> 
</div>
<!-- Wrapper--> 

<!-- Jquery and Js Plugins --> 
<script type="text/javascript" src="js/jquery-2.1.1.js"></script> 
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/plugins.js"></script> 
<script type="text/javascript" src="js/menu.js"></script> 
<script type="text/javascript" src="js/custom.js"></script>
<script src="js/jquery.subscribe.js"></script> 
</body>
</html>
