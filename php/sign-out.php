<?php 
    session_start();
    $host = "localhost";
    $username = "maycloud_usr";
    $password = "";
    $db = "maycloud_db";

    $conn = mysqli_connect($host, $username, $password, $db);    

    $signOut = $_POST['signOut'];  

    if($signOut == true) {
        session_destroy();
        echo "1";
    }
    else {
        echo "0";
    }
    
  
?>