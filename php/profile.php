
    <?php 
        session_start();
        $host = "localhost";
        $username = "maycloud_usr";
        $password = "";
        $db = "maycloud_db";
    
        $conn = mysqli_connect($host, $username, $password, $db); 


        if(empty($_SESSION['email']))
        {           
            header("Location: http://maycloud.space/");           
            echo "<script type='text/javascript'> document.location = 'http://maycloud.space/'; </script>";
            exit();
        }
        else {
            $loggedEmail = $_SESSION['email']; 
            $loggedName = $_SESSION['name']; 
        }		
    ?>
<html lang="en">
<head>

<style>

input[type=submit] {
    width: 500px;
    background-color: #42C0FB;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #42C0FB;
}


#mytable {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#mytable td, #mytable th {
    border: 1px solid #ddd;
    padding: 8px;
}

#mytable tr:nth-child(even){background-color: #f2f2f2;}

#mytable tr:hover {background-color: #ddd;}

#mytable th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #42C0FB;
    color: white;
}

</style>

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
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

    function Kopyala(element) {
            var $temp = $("<input>")
            $("body").append($temp);
            $temp.val($(element).text()).select();
            document.execCommand("copy");
            $temp.remove();
            alert("Kopyalandı")
     };
  </script>  
  
  
</head>
<body>

 <script>
                $(document).ready(function() {
                    $(".sign-out").click(function() { 
                        
                        var signOut = confirm("Do you want to sign out?");
                        
                        if(signOut) {
                            $.ajax({    
                                url:"sign-out.php",
                                type:"post",
                                data:{signOut:signOut},
                                success: function(result) {
                                    if(result = "1") {
                                        window.location.href = 'http://maycloud.space/';
                                    }
                                } 
                            });
                        }
                       
                    });
                    
                    $(".delete-btn").click(function() {
                        
                        var delete_id = $(this).val();
                        var deleteFile = confirm("Do you want to delete?");
                        
                        if(deleteFile) {
                            $.ajax({    
                                url:"delete-file.php",
                                type:"post",
                                data:{                                
                                    deleteFile:deleteFile,
                                    delete_id:delete_id,
                                },
                                success: function(result) {
                                    if(result == "1") {
                                        //alert("File deleted!");
                                        window.location.href = 'http://maycloud.space/profile.php';
                                    }
                                } 
                            });                            
                        }                        
                    });         
                })		
           </script>




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
            <li><a  ><?php  echo "Welcome " . $loggedName; ?></a></li>
	<li> <a href="#" class="sign-out" ><span>Sign Out</span></a></li>
            <li><a class="page-scroll" href="#contact">Contact</a></li>			
          </ul>
        </div>
      </div>
    </nav>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid -->
  
  <div class="main app form" id="main"><!-- Main Section-->
  

    <div class="app-features text-center" id="features">
      <div class="container">
        <h1 class="wow fadeInDown" data-wow-delay="0.1s">Download & Upload</h1>
        <p class="wow fadeInDown" data-wow-delay="0.2s"> Aliquam sagittis ligula et sem lacinia, ut facilisis enim sollicitudin. Proin nisi est,<br class="hidden-xs">
          convallis nec purus vitae, iaculis posuere sapien. </p>
 <hr>
	
<div align = "center">     
<form action="upload.php" method="post" enctype="multipart/form-data">
   <input type="file" name="dosya" />
   <input type="submit" value="Gönder" /> 
    </div>
</form>
 <hr>
	
<?php
			
$sql="SELECT id,filename,size,date,link,date FROM file where username='$loggedName' ORDER BY id DESC LIMIT 25 ";

?><table id="mytable">
       <thead>
        <tr><th>File Name</th>
        <th>File Size</th>
<th>Upload Date</th>
<th>Delete File</th>
<th>Share File</th>
<th>Download File</th></tr>
    </thead>

<?php
            
  $counter2 = 0; 
if ($result = mysqli_query($conn, $sql)) {
    while ($row = mysqli_fetch_assoc($result)) {
		$row['id'];
		  
        $counter = 0;        
        $var = array(); // boş array
        //array_push($var,$row);
        array_push($var,$row,$row['id']); // boş array' e row['id'] ekliyoruz dongu içinde
        //print_r($var);
        $counter = $counter + 1;    
		 $counter2 = $counter2 + 1;  
        //echo $var[$counter];
        //print_r($id_array);
		?>
                    <tr> 
                        <td><?php echo $row['filename']; ?></td> 
                        <td><?php echo $row['size']; ?> KB</td> 
						 <td><?php echo $row['date']; ?></td> 
                        <td><button href="" class="delete-btn" value="<?php echo $var[$counter];?>">Delete</button></td> 
			
						 <td>   <a href="#" onclick="return Kopyala('#<?php echo $counter2; ?>')">Share Link</a>
						  <div id="<?php echo $counter2; ?>" style="display:none"><?php echo $row['link']; ?></div>
</td> 
                        <td><a  href="<?php echo $row['link']; ?>">Download</a></td> 
                    </tr>             
  	<?php   } 
	?></table> <?php 
    mysqli_free_result($result);
}
?>
		
      </div>
    </div>

 
    <!-- Footer Section -->
    <div class="footer">
      <div class="container">
        <div class="col-md-7"> <img src="images/logo.png"  alt="Image" />
          <p>MAY Cloud </p>
          <div class="footer-text">
            <p> Copyright © 2016 iLand. All Rights Reserved.</p>
          </div>
        </div>
        <div class="col-md-5">
            <h1>Contact Us</h1>
            <p> Contact our 24/7 customer support if you have any <br class="hidden-xs">
              questions. We'll help you out. </p>
            <a href="mailto:admin@maycloud.space">admin@maycloud.space</a> </div>
        </div>
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
