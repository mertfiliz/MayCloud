<?php 
    session_start();
    $host = "localhost";
    $username = "maycloud_usr";
    $password = "";
    $db = "maycloud_db";

    $conn = mysqli_connect($host, $username, $password, $db);    

    $loggedEmail = $_POST['loggedEmail'];      

    $_SESSION['email'] = $loggedEmail;

    $sql = "SELECT name FROM user WHERE email = '$loggedEmail'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {            
        while($row = $result->fetch_assoc()) {
            $_SESSION['name'] = $row['name'];
        }
    }        

    $conn->close();
?>