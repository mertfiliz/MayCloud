<?php 
    session_start();
    $host = "localhost";
    $username = "maycloud_usr";
    $password = "";
    $db = "maycloud_db";

    $conn = mysqli_connect($host, $username, $password, $db);    

    $deleteFile = $_POST['deleteFile'];
    $delete_id = $_POST['delete_id'];  

    if($deleteFile == true) {
        $silSorgusu="DELETE FROM file WHERE id='$delete_id'";
        mysqli_query($conn, $silSorgusu);
        echo "1";         
    }   
    else {
        echo "0";
    }
    
  
?>