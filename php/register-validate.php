
    <?php 
        session_start();
        $host = "localhost";
        $username = "maycloud_usr";
        $password = "";
        $db = "maycloud_db";
    
        $conn = mysqli_connect($host, $username, $password, $db); 

        $name = $_POST['sendName'];
        $surname = $_POST['sendSurname'];
        $email = $_POST['sendEmail'];
        $password = $_POST['sendPassword'];

        $sqlUserExists = "SELECT * FROM user WHERE email = '$email'";
        $resultUserExists = mysqli_query($conn, $sqlUserExists);


        if(mysqli_num_rows($resultUserExists) >= 1) {  
            $userExists = true;        
            echo $userExists;
        }
        else {     
            $userExists = false;
            echo $userExists;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $sql = "INSERT INTO user (name, surname, email, password) VALUES('$name', '$surname','$email','$password')";
            mysqli_query($conn, $sql);
        }


       

    

    ?>
    
